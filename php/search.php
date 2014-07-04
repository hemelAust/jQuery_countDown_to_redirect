<?php 
	require 'db.php';

	if(isset($_POST['search_term']))
	{
		$search_term= mysql_real_escape_string(htmlentities($_POST['search_term']));
		
		if(!empty($search_term))
		{
			$search = mysql_query("SELECT * FROM `places` WHERE `place` LIKE '%$search_term%'");
			$result_count=mysql_num_rows($search);
			
			$suffix = ($result_count != 1) ? 's' : '';
			
			echo '<p>Your search for <strong> '. $search_term.' </strong> returned '.$result_count.' result' . $suffix . '</p>' ;
			
			while($result_row=mysql_fetch_assoc($search))
			{
				echo '<p><strong> ' . $result_row['place']. '  </strong></p>  <strong>'. $result_row['description'] .'</strong>';
			}
		}
	}
?>