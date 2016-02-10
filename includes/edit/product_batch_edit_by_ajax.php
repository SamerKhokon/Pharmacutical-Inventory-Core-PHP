<?php     include("../../db.php");

		$product_batch_id = trim($_POST["product_batch_id"]);
		$product_batch_code = trim($_POST["product_batch_code"]);
		$product_id = trim($_POST["product_id"]);
		$product_code = get_productCode($product_id);
		$product_quantity = trim($_POST["product_quantity"]);
		$mfg_date = trim($_POST["mfg_date"]);
		$exp_date = trim($_POST["exp_date"]);
		
		
	
		$update_query = "UPDATE `decent_pharma_db`.`product_batch_info` 
								SET
								`product_batch_code` = '$product_batch_code' , 
								`product_id` = '$product_id' , 
								`product_code` = '$product_code' , 
								`product_quantity` = '$product_quantity' , 
								`mfg_date` = '$mfg_date' , 
								`exp_date` = '$exp_date'								
								WHERE
								`product_batch_id` = '$product_batch_id';";
									$sql = mysql_query($update_query);
									if($sql)
									echo "Data modified successfully";
									else
									echo "Error";
		function get_productCode($product_id){
		  $str = "select product_code from product_info where product_id=$product_id";
		  $sql = mysql_query($str);
		  $res = mysql_fetch_row($sql);
		  return $res[0];
        }		
?>