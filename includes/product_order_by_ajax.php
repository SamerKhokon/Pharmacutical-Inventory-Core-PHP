<?php 	include("../db.php");
		session_start();
		
	    $order_taken_by 		  = trim($_POST["order_taken_by"]);
		$customer_id 				  = trim($_POST["customer_id"]);
		$delivery_dates 		      = trim($_POST["delivery_dates"]);
		$product_delivery_date = trim($_POST["product_delivery_date"]);						
		$order_status				  = trim($_POST["order_status"]);
		$products					  = trim($_POST["products"]);
		$packs							  = trim($_POST["packs"]);		
		$units							  = trim($_POST["units"]);
		$uprices						  = trim($_POST["uprices"]);
		$qtys							  = trim($_POST["qtys"]);
		$company_id 				  = $_SESSION["COMPANY_ID"];
		$entry_by  					  = $_SESSION["LOGIN_USERID"];		
		$chk_data 					  = $entry_by.'_'.date('dmY').'_'.time();			
		$order_taker_code 		  = get_order_taker_code($company_id , $order_taken_by);			
		$customer_code 		  = get_customer_code($company_id , $customer_id);		
				
		$delivery_dates             = "STR_TO_DATE( '$delivery_dates', '%d-%m-%Y')";
		$product_delivery_date = "STR_TO_DATE( '$product_delivery_date', '%d-%m%Y')";; //date("Y-m-d",strtotime($product_delivery_date));								
				
				
		$parse_products = explode(",",$products);
		$parse_packs     = explode(",",$packs);
		$parse_units       = explode(",",$units);		
		$parse_uprices   = explode(",",$uprices);				
		$parse_qtys        = explode(",",$qtys);						
		
		$product_order_str =  "INSERT INTO `decent_pharma_db`.`product_order_info` (`order_date`,`order_taken_by`,`order_taker_code`,`customer_id`,`customer_code`,`order_delivery_date`, `delivery_date`,`entry_by`,`entry_date`,`company_id`,`order_status`,`active_flag`, `chk_data`)
			VALUES(	now(),$order_taken_by,'$order_taker_code',$customer_id,'$customer_code', $delivery_dates,$product_delivery_date,$entry_by,	NOW(),$company_id,'$order_status','Y','$chk_data');";

		mysql_query($product_order_str );
	
		$order_id = get_product_orderid($chk_data);
	
		for($i=0 ; $i < count($parse_products) ; $i++ ) 		
		{
		    /***************************************************************************************
			   multiple product informations
****************************************************************************************/
	        $product_id = $parse_products[$i];
			$pack_size  = $parse_packs[$i];
			$unit 			= $parse_units[$i];
			$unit_price  = $parse_uprices[$i];
			$qty 			    = $parse_qtys[$i];		
			
			if(  $qty  != ""  ) 
			{
				$product_code 				=  get_product_code($product_id , $company_id);
				$product_unit_id  			= get_product_unit_id($unit , $company_id);
				$product_pack_size_id   = get_pack_size_id($pack_size , $company_id);

				$ordered_product_info = "INSERT INTO `decent_pharma_db`.`ordered_product_info` 
					(`order_id`,`product_id`,`product_code`,`product_pack_size`, 
					`product_pack_size_id`,`product_unit`,`product_unit_id`,`order_quantity`, 
					`entry_by`,`entry_date`,`company_id`,`active_flag`,`chk_data`)
					VALUES('$order_id', 	'$product_id', 	'$product_code', 	'$pack_size', 
					$product_pack_size_id, '$unit',$product_unit_id,$qty,$entry_by, 
					NOW(),$company_id,'Y','$chk_data');";
				mysql_query($ordered_product_info);				
			}
	}
	echo "Data saved successfully.";
	

	/**********************************************************************************************************************
			Order related functions
	**********************************************************************************************************************/   	
	function get_product_orderid( $chk_data) 
	{
		$str = "SELECT product_order_id FROM  `product_order_info` WHERE chk_data='$chk_data'";
	  	$sql = mysql_query($str);
	  	$res = mysql_fetch_row($sql);
	  	return $res[0];
	}		
	
	function get_product_code($product_id,$company_id) 
	{
	  	$str = "SELECT product_code FROM product_info WHERE company_id=$company_id AND product_id=$product_id";
	  	$sql = mysql_query($str);
	  	$res = mysql_fetch_row($sql);
	  	return $res[0];
	}	
	
	function get_product_unit_id($unit,$company_id) 
	{
	  	$str = "SELECT product_unit_id FROM product_unit_info WHERE company_id=$company_id AND product_unit='$unit'";
	  	$sql = mysql_query($str);
	  	$res = mysql_fetch_row($sql);
	  	return $res[0];
	}
	
	function get_pack_size_id($pack_size , $company_id) 
	{
	  	$str  = "SELECT product_pack_size_id FROM `product_pack_size` WHERE company_id=$company_id AND product_pack_size='$pack_size'";
	  	$sql = mysql_query($str);
	  	$res = mysql_fetch_row($sql);
	  	return $res[0];
	}

	function get_order_taker_code($company_id,$order_taken_by) 
	{
	 	$str = "SELECT  employee_code FROM `hr_employee_info` WHERE company_id=$company_id AND employee_id=$order_taken_by";
	 	$sql = mysql_query($str);
	 	$res = mysql_fetch_row($sql);
	 	return $res[0];
	}	
	
	function get_customer_code($company_id,$customer_id) 
	{
	 	$str = "SELECT  customer_code FROM `inv_customer_info` WHERE company_id=$company_id AND customer_id=1";
	 	$sql = mysql_query($str);
	 	$res = mysql_fetch_row($sql);
	 	return $res[0];
	}
?>