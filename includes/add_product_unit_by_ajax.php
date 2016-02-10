<?php  include("../db.php");
          session_start();
				$product_unit_name =  trim($_POST["product_unit_name"]);
				$entry_by 				  = $_SESSION["LOGIN_USERID"];
				$entry_date 				  = date("Y-m-d");
				$company_id 			  = $_SESSION["COMPANY_ID"];
				
				if(is_exist($product_unit_name) == 0 ) 
				{
					 $str = "INSERT INTO `decent_pharma_db`.`product_unit_info` (`product_unit`, `entry_by`, `entry_date`, `company_id`, `active_flag`)
					VALUES('$product_unit_name', $entry_by, now(), $company_id, 'Y');";
					
					$sql = mysql_query($str);
					if($sql) 
					echo "Data saved successfully!";
					else
					echo "Error";
				}else{
				  echo "Data already exist";
				}
				
				function is_exist($product_unit_name) 
				{
					 $str = "select count(*) from product_unit_info where  
					 product_unit='$product_unit_name'";
					 $sql = mysql_query($str);
					 $res = mysql_fetch_row($sql);
					 return $res[0];
				}
?>