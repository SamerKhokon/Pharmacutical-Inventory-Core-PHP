<?php  include("../db.php");
            session_start();		
		    $depo_type          	= trim($_POST["depo_type"]);
			$depo_name         	= trim($_POST["depo_name"]);
			$depo_address     	= trim($_POST["depo_address"]);
			$depo_contact_no   = trim($_POST["depo_contact_no"]);
            $entry_by					= $_SESSION['LOGIN_USERID'];	
			$company_id			= $_SESSION['COMPANY_ID'];
			$entry_date 				= date('Y-d-m');			
						
			$str = "INSERT INTO `decent_pharma_db`.`inv_depot_info`	(`depot_name`, `depot_address`, `depot_contact_no`, `depot_flag`, `entry_by`, `entry_date`, `active_flag`, `company_id`)
			VALUES('$depo_name', '$depo_address', '$depo_contact_no', '$depo_type', $entry_by, now(), 'Y', $company_id)";			

			$sql = mysql_query($str);
			if($sql)
			echo "Data saved successfully!";
			else
			echo "Error";			
?>