<?php     include("../../db.php");

		
		
		$customer_id = trim($_POST["customer_id"]);	
		$customer_code = trim($_POST["customer_code"]);
		$depot_id = trim($_POST["depot_id"]);
		$zone_id = trim($_POST["zone_id"]);
		$customer_name = trim($_POST["customer_name"]);
		$org_name = trim($_POST["org_name"]);
		$owner_name = trim($_POST["owner_name"]);
		$customer_address = trim($_POST["customer_address"]);
		$customer_contact_no = trim($_POST["customer_contact_no"]);
		$customer_bank_acc_no = trim($_POST["customer_bank_acc_no"]);
		
		
	
	 $update_query = "UPDATE `decent_pharma_db`.`inv_customer_info` 
							SET
							`customer_id` = '$customer_id' , 
							`customer_code` = '$customer_code' , 
							`depot_id` = '$depot_id' , 
							`zone_id` = '$zone_id' , 
							`customer_name` = '$customer_name' , 
							`org_name` = '$org_name' , 
							`owner_name` = '$owner_name' , 
							`customer_address` = '$customer_address' , 
							`customer_contact_no` = '$customer_contact_no' , 
							`customer_bank_acc_no` = '$customer_bank_acc_no' 
							
							
							WHERE
							`customer_id` = '$customer_id';";
								$sql = mysql_query($update_query);
								if($sql)
								echo "Data modified successfully";
								else
								echo "Error";
?>