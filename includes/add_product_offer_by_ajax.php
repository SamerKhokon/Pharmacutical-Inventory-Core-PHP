<?php    include("../db.php");
             session_start();	
			 error_reporting(0);
			/*******************************************************************************************************************
				"buy_qty_amount_PP="+buy_qty_amount_PP+"&b_pack_size_PP="+b_pack_size_PP
				+"&get_product_qty_PP="+get_product_qty_PP+"&get_pack_size_PP="+get_pack_size_PP+							
				"&b_product_qty_PD="+b_product_qty_PD+"&b_pack_size_PD="+b_pack_size_PD+
				"&get_discount_of_PD="+get_discount_of_PD+"&buy_product_of_AP="+buy_product_of_AP+
				"&product_batch_id_AP="+product_batch_id_AP+"&product_offer="+product_offer+"&product_batch_id="+product_batch_id+
				&product_start_date="+product_start_date+"&product_end_date="+product_end_date	
			**********************************************************************************************************************/	
	
	       $offer_flag = trim($_POST["offer_flag"]);
			$buy_qty_amount_PP   = trim($_POST["buy_qty_amount_PP"]);
			$b_pack_size_PP     	= trim($_POST["b_pack_size_PP"]);
			$get_product_qty_PP  	= trim($_POST["get_product_qty_PP"]);
			$get_pack_size_PP      = trim($_POST["get_pack_size_PP"]);
			$b_pack_size_PD   		= trim($_POST["b_pack_size_PD"]);					
			
			
			
            $get_discount_of_PD 	= trim($_POST['get_discount_of_PD']);	
			$buy_product_of_AP	= trim($_POST['buy_product_of_AP']);
			$product_offer 				= trim($_POST['product_offer']);
			$product_batch_id 		= trim($_POST['product_batch_id']);
			$product_start_date 		= trim($_POST['product_start_date']);
			$product_end_date 		= trim($_POST['product_end_date']);	
			$company_id			= $_SESSION["COMPANY_ID"];
			$entry_by 				    = $_SESSION["LOGIN_USERID"];

			/*************************************************************************
			  Batch values parsing
			**************************************************************************/
			/*$parse  = explode("#" , $product_batch_id);
			$productBatchId = $parse[0];
			$productCode     = $parse[1];		*/
			
			$buy_pack_size = get_pack_size($b_pack_size_PP);
			$get_pack_size = get_pack_size($b_pack_size_PD);
			
			$product_code = get_product_code($product_batch_id);
			/**************************************************************************************************************************************
			  old query
			***************************************************************************************************************************************
			$str  = "INSERT INTO `decent_pharma_db`.`product_offer_info` 	(`product_offer`, `product_batch_id`, `offer_start_date`,
			`offer_end_date`, `entry_by`, `entry_date`, 	`company_id`, 	`active_flag`	)	VALUES('$product_offer', '$productBatchId', 
			'$product_start_date', '$product_end_date', 	entry_by, 	'$entry_date', $company_id, 	'Y'	);";						
			***************************************************************************************************************************************/

		echo	$str =  "INSERT INTO `decent_pharma_db`.`product_offer_info` (`product_id`, `product_code`, `product_offer`, 
	`product_batch_id`, `offer_flag`, `offer_flag_title`, `buy_qty_or_amount`, `buy_pack_size_id`, `buy_pack_size`, 
	`get_qty_or_amount`, `get_pack_size_id`, `get_pack_size`, `offer_start_date`, `offer_end_date`, `entry_by`, 
	`entry_date`, `company_id`, `active_flag` 	)	VALUES	('$product_batch_id', '$product_code', '$product_offer', $product_batch_id, 
	'$offer_flag', '$product_offer', '$buy_qty_amount_PP', '$b_pack_size_PP', 
	'$buy_pack_size', '$get_product_qty_PP', '$get_pack_size_PP', 	'$get_pack_size', str_to_date('$product_start_date','%d-%m-%Y'), 
	str_to_date('$product_end_date','%d-%m-%Y'), $entry_by, 	NOW(), 	$company_id, 'Y')";
				
			$sql = mysql_query($str);
			
			if($sql)
			echo "Data saved successfully";
			else
			echo "Error";
			
			function get_product_code($product_id)  {
					 $str = "select product_code from product_info where product_id=$product_id";
					 $sql = mysql_query($str);
					 $res = mysql_fetch_row($sql);
					 return $res[0];
			}
			
			function get_pack_size($pack_size_id) {
					  $str  = "SELECT product_pack_size FROM `product_pack_size` WHERE product_pack_size_id=$pack_size_id";
					  $sql = mysql_query($str);
					  $res = mysql_fetch_row($sql);
					  return $res[0];
			}
?>