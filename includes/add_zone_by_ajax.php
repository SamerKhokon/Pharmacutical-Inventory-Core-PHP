<?php    include("../db.php");
             session_start();
			 
			$zone_depo_type = trim($_POST["zone_depo_type"]);
			$zone_name 	    = trim($_POST["zone_name"]);
			$zone_mio 		    = trim($_POST["zone_mio"]);
			$zone_sv             = trim($_POST["zone_sv"]);			 			 
			$entry_by				= $_SESSION['LOGIN_USERID'];	
			$company_id		= $_SESSION['COMPANY_ID'];
			$entry_date 			= date('Y-d-m');
			
			$str = "INSERT INTO `decent_pharma_db`.`inv_customer_zone` (`depot_id`, `zone_name`, `mio_id`, 
			`sv_id`, `entry_by`, `entry_date`, `company_id`, `active_flag`)	VALUES($zone_depo_type, '$zone_name', '$zone_mio', 
			$zone_sv, 	$entry_by , 	NOW(), 	$company_id, 	'Y'	);";
			
			$sql = mysql_query($str);
			if($sql) 
			echo "Data saved successfully";
			else
			echo "Error";
?>