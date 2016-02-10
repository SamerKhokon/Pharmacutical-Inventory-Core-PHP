<?php     include("../../db.php");

		$product_pack_id = trim($_POST["product_pack_id"]);
		$product_pack_size = trim($_POST["product_pack_size"]);
		$product_quantity = trim($_POST["product_quantity"]);
		
		
	
		 $update_query = "UPDATE `decent_pharma_db`.`product_pack_size` 
						SET
						`product_pack_size` = '$product_pack_size',
						`product_quantity` = '$product_quantity'
						WHERE	`product_pack_size_id` = '$product_pack_id';";
		$sql = mysql_query($update_query);
		if($sql)
		echo "Data modified successfully";
		else
		echo "Error";
?>