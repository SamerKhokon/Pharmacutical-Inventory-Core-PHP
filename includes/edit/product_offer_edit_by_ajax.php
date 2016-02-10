<?php     include("../../db.php");

		$product_offer_id = trim($_POST["product_offer_id"]);
		$product_offer = trim($_POST["product_offer"]);
		$product_batch_id = trim($_POST["product_batch_id"]);
		$offer_start_date = trim($_POST["offer_start_date"]);
		$offer_end_date = trim($_POST["offer_end_date"]);
		
		
	
		 $update_query = "UPDATE `decent_pharma_db`.`product_offer_info` 
								SET
								`product_offer` = '$product_offer' , 
								`product_batch_id` = '$product_batch_id' , 
								`offer_start_date` = '$offer_start_date' , 
								`offer_end_date` = '$offer_end_date'
								
								WHERE
								`product_offer_id` = '$product_offer_id';";
								
									$sql = mysql_query($update_query);
									if($sql)
									echo "Data modified successfully";
									else
									echo "Error";
?>