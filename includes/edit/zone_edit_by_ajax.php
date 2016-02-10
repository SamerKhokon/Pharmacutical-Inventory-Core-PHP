<?php     include("../../db.php");

		
		$zone_id =  trim($_POST["zone_id"]);	
		$depot_id =  trim($_POST["depot_id"]);
		$zone_name =  trim($_POST["zone_name"]);
		$mio_id =  trim($_POST["mio_id"]);
		$sv_id =  trim($_POST["sv_id"]);
		
		
	
	 $update_query = "UPDATE `decent_pharma_db`.`inv_customer_zone` 
								SET
								`depot_id` = '$depot_id' , 
								`zone_name` = '$zone_name' , 
								`mio_id` = '$mio_id' , 
								`sv_id` = '$sv_id'
								WHERE
								`zone_id` = '$zone_id';";
									$sql = mysql_query($update_query);
									if($sql)
									echo "Data modified successfully";
									else
									echo "Error";
?>