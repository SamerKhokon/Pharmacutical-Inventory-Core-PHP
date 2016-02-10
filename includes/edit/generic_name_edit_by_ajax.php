<?php     include("../../db.php");

		$generic_id = trim($_POST["generic_id"]);
		$generic_name = trim($_POST["generic_name"]);
		$generic_name_code = trim($_POST["generic_name_code"]);
		
		
	
		$update_query = "UPDATE `decent_pharma_db`.`generic_name_info` 
						SET
						`generic_name` = '$generic_name',
						`generic_name_code` = '$generic_name_code'						
						
						WHERE	`generic_name_id` = '$generic_id';";
		$sql = mysql_query($update_query);
		if($sql)
		echo "Data modified successfully";
		else
		echo "Error";
?>