<?php     include("../../db.php");

		$product_unit_id = trim($_POST["product_unit_id"]);
		$product_unit = trim($_POST["product_unit"]);
		
		
	
		$update_query = "UPDATE `decent_pharma_db`.`product_unit_info` 
						SET
						`product_unit` = '$product_unit'
						WHERE	`product_unit_id` = '$product_unit_id';";
		$sql = mysql_query($update_query);
		if($sql)
		echo "Data modified successfully";
		else
		echo "Error";
?>