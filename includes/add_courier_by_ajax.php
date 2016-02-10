<?php   include("../db.php");
            session_start();			
			$csc_code 				   = trim($_POST["csc_code"]);
			$csc_name 				   = trim($_POST["csc_name"]);
			$csc_address 			   = trim($_POST["csc_address"]);
			$csc_contact_person = trim($_POST["csc_contact_person"]);
			$csc_contact_no 	   = trim($_POST["csc_contact_no"]);			
            $entry_by 				   = $_SESSION['LOGIN_USERID'];	
			$company_id			   = $_SESSION['COMPANY_ID'];
			$entry_date 				   = date('Y-d-m');			
			
			if( is_exist($csc_name,$company_id) == 0 )  
			{
				 $str = "INSERT INTO `decent_pharma_db`.`courier_service_info` (`courier_service_company`, 
				`csc_code`, `csc_address`, `csc_contact_person`, `csc_contact_no`, `entry_by`, `entry_date`, 
				`company_id`, `active_flag`)	VALUES('$csc_name', '$csc_code', '$csc_address',
				'$csc_contact_person','$csc_contact_no','$entry_by', 	'$entry_date', $company_id,'Y');";
				mysql_query($str);
			}
			else
			{
			   echo  "Data already exist!";
			}
			
			function is_exist($csc_name,$company_id) 
			{
			   $str = "select count(*) from courier_service_info where 
			   courier_service_company='$csc_name' and company_id=$company_id";
			   $sql  = mysql_query($str);
			   $res = mysql_fetch_row($sql);
			   return $res[0];
			}	
?>