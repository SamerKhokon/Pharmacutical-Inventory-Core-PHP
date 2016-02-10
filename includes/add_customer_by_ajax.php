<?php  include("../db.php");
            session_start();			 
			$cust_code 				= trim($_POST["cust_code"]);
			$cust_depo 				= trim($_POST["cust_depo"]);
			$cust_zone 				= trim($_POST["cust_zone"]);
			$cust_name 			= trim($_POST["cust_name"]);
			$cust_org_name 		= trim($_POST["cust_org_name"]);
			$cust_owner_name = trim($_POST["cust_owner_name"]);
			$cust_address 		= trim($_POST["cust_address"]);
			$cust_contact_no 	= trim($_POST["cust_contact_no"]);
			$cust_bank_acct 	= trim($_POST["cust_bank_acct"]);
            $entry_by 				= $_SESSION['LOGIN_USERID'];	
			$company_id			= $_SESSION['COMPANY_ID'];
			$entry_date 				= date('Y-d-m');			
			
			
			$str = "INSERT INTO `decent_pharma_db`.`inv_customer_info` (`customer_code`, `depot_id`, `zone_id`, 
				`customer_name`, `org_name`, `owner_name`, `customer_address`, `customer_contact_no`, `customer_bank_acc_no`, 
				`entry_by`, `entry_date`, `company_id`, 	`active_flag`	)	VALUES('$cust_code', $cust_depo, $cust_zone, '$cust_name', '$cust_org_name', '$cust_owner_name','$cust_address', 
				'$cust_contact_no', '$cust_bank_acct', $entry_by, '$entry_date', $company_id , 'Y');";
            $sql = mysql_query($str);    
			
			
           
			$customer_id = get_customer_id($cust_code,$cust_depo);
			$add_cust_str = "INSERT INTO `decent_pharma_db`.`inv_customer_due_info` (`customer_id`, `customer_code`, `depot_id`, `due_limit`, 
					`current_due`, `entry_by`, `entry_date`, `company_id`, `active_flag`)
					VALUES	($customer_id, '$cust_code', '$cust_depo', 0, 0, $entry_by, NOW(), $company_id, 'Y')";
			mysql_query($add_cust_str);		
			
			if($sql)
				echo "Data saved successfully";
			else
				echo "Error";	
				
			function get_customer_id($customer_code,$depot_id) {
			  $st = "SELECT customer_id FROM `inv_customer_info` WHERE 
			  customer_code='$customer_code' AND depot_id=$depot_id";
			  $sq = mysql_query($st);
			  $rs = mysql_fetch_row($sq);
			  return $rs[0];
			}						
?>