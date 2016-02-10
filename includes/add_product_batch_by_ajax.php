<?php   include("../db.php");
             session_start();
			 			 
			$product_batch_code = trim($_POST["product_batch_code"]);
			$product_id 			    = trim($_POST["product_id"]);
			$product_qty			    = trim($_POST["product_qty"]);
			$product_mng_date     = trim($_POST["product_mng_date"]);
			$product_exp_date   	 = trim($_POST["product_exp_date"]);
			$entry_by 					 = $_SESSION['LOGIN_USERID'];	
			$company_id			      = $_SESSION['COMPANY_ID'];
			$entry_date 					  = date('Y-d-m');						
			
			/*************************************************************************
			   multiple value parsing
			****************************************************************************/
			$parse				= explode("#" , $product_id );			
			$productId 		=  $parse[0];
			$productCode 	= $parse[1];
			
			$str = "INSERT INTO `decent_pharma_db`.`product_batch_info`(`product_batch_code`, `product_id`, 
			`product_code`, `product_quantity`, 	`mfg_date`, 	`exp_date`, 	`entry_by`, 	`entry_date`, 	`company_id`, 	`active_flag`	)
			VALUES	('$product_batch_code', 	$productId, 	'$productCode', 	$product_qty, 	'$product_mng_date', 	'$product_exp_date', 
			$entry_by, 	'$entry_date', 	$company_id, 	'Y')";	
	
	        $sql = mysql_query($str);
			if($sql)
			echo "Data saved successfully";
			else
			echo "Error";
?>