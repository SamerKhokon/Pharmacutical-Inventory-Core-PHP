<?php     include("../../db.php");

		$module_id = trim($_POST["module_id"]);
		$module_name = trim($_POST["module_name"]);
		$module_folder = trim($_POST["module_folder"]);
		
		
	
		$update_query = "UPDATE `decent_pharma_db`.`st_module_info` 
						SET
						`module_id` = '$module_id',
						`module_name` = '$module_name' , 						
						`module_folder` = '$module_folder'
						
						WHERE	`module_id` = '$module_id';";
		$sql = mysql_query($update_query);
		if($sql)
		echo "Data modified successfully";
		else
		echo "Error";
?>