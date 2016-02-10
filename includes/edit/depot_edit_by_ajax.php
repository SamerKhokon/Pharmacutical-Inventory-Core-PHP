<?php     include("../../db.php");

		$depot_id = trim($_POST["depot_id"]);
		$depot_name = trim($_POST["depot_name"]);
		$depot_address = trim($_POST["depot_address"]);
		$depot_contact_no = trim($_POST["depot_contact_no"]);
		$depot_flag = trim($_POST["depot_flag"]);
		
	
		$update_query = "UPDATE `decent_pharma_db`.`inv_depot_info` 
						SET
						`depot_flag` = '$depot_flag',
						`depot_name` = '$depot_name' , 						
						`depot_address` = '$depot_address' , 
						`depot_contact_no` = '$depot_contact_no' 
						WHERE	`depot_id` = '$depot_id';";
		$sql = mysql_query($update_query);
		if($sql)
		echo "Data modified successfully";
		else
		echo "Error";
?>