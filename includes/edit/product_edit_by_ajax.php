<?php     include("../../db.php");

		$product_id = trim($_POST["product_id"]);
		$generic_name_id = trim($_POST["generic_name_id"]);
		$product_code = trim($_POST["product_code"]);
		$product_name = trim($_POST["product_name"]);
		$product_pack_size_id = trim($_POST["product_pack_size_id"]);
		$product_pack_size = get_product_pack_size($product_pack_size_id);
		$product_unit_id = trim($_POST["product_unit_id_e"]);
		$product_unit = get_product_unit($product_unit_id);
		$unit_price = trim($_POST["unit_price"]);
		$description = trim($_POST["description"]);
		
		
	
		 $update_query = "UPDATE `decent_pharma_db`.`product_info` 
								SET
								`generic_name_id` = '$generic_name_id' , 
								`product_code` = '$product_code' , 
								`product_name` = '$product_name' , 
								`product_pack_size_id` = '$product_pack_size_id' , 
								`product_pack_size` = '$product_pack_size' , 
								`product_unit_id` = '$product_unit_id' , 
								`product_unit` = '$product_unit' , 
								`unit_price` = '$unit_price' , 
								`description` = '$description'								
								
								WHERE
								`product_id` = '$product_id';";
									$sql = mysql_query($update_query);
									if($sql)
									echo "Data modified successfully";
									else
									echo "Error";
			

			
			function get_product_pack_size($product_pack_size_id){
			  $str = "SELECT product_pack_size FROM product_pack_size 
			  WHERE `product_pack_size_id`=$product_pack_size_id";
			  $sql = mysql_query($str);
			  $res = mysql_fetch_row($sql);
			  return $res[0];
			}
						
									
			function get_product_unit($unit_id) {
			  $str = "SELECT product_unit FROM product_unit_info`
				where product_unit_id=$unit_id";
				$sql = mysql_query($str);
				$res = mysql_fetch_row($sql);
				return $res[0];
			}						
?>