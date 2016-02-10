<?php    include("../db.php");
              
			 // if($con) echo 88;else echo 99;
             session_start();
		
		    $depo_type          =trim($_POST["depo_type"]);
			$depo_name         =trim($_POST["depo_name"]);
			$depo_address     =trim($_POST["depo_address"]);
			$depo_contact_no =trim($_POST["depo_contact_no"]);
            $entry_by				= $_SESSION['LOGIN_USERID'];	
			$company_id			= $_SESSION['COMPANY_ID'];
			$entry_date 			= date('Y-d-m h:i:s');			
						
			$str = "INSERT INTO `decent_pharma_db`.`inv_depot_info`	(`depot_name`, `depot_address`, `depot_contact_no`,
			`depot_flag`, `entry_by`, `entry_date`, `active_flag`, `company_id`)	VALUES('$depo_name', 
			'$depo_address', '$depo_contact_no', '$depo_type', $entry_by, NOW(), 'Y', $company_id);";					

			$sql = mysql_query($str);			
			
			$depo_parse = get_depo_id($depo_name,$depo_type,$company_id) ;
			$parse = explode("#" , $depo_parse);
			$depot_id = $parse[0];
			

			
			$company_str = "SELECT *  FROM `product_info` WHERE company_id=$company_id";		
			$company_sql = mysql_query($company_str);			
			if(mysql_num_rows($company_sql) > 0 ) {
				while($company_res = mysql_fetch_array($company_sql) ) 
				{
					$product_id = $company_res[0];
					 $depo_stock_str ="INSERT INTO `decent_pharma_db`.`inv_depot_product_stock`(`depot_id`,	`depot_type`,`product_id`,`current_stock`,`entry_by`,`entry_date`,`company_id`,`active_flag`)
						VALUES('$depot_id','$depo_type', $product_id, 0, $entry_by,NOW(),$company_id, 'Y')";
					mysql_query($depo_stock_str);				
				}
			}
			
			if($sql)
			echo "Data saved successfully!";
			else
			echo "Error";
			
			
			
			function get_depo_id($depo_name,$depo_type,$company_id) 
			{
			   $strr = "SELECT depot_id,depot_name FROM `inv_depot_info` WHERE 
			   depot_name='$depo_name' and depot_flag='$depo_type' and 
			   company_id=$company_id";
			   $sql  =mysql_query($strr);
			   $res = mysql_fetch_row($sql);
			   return $res[0];
			}
			
?>