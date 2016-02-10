<?php  include("../db.php");
	 session_start();
	 $company_id 						 = $_SESSION["COMPANY_ID"];
	 $entry_by      						 = $_SESSION["LOGIN_USERID"];	 
	 $customer_id 						 = trim($_POST["customer_id"]);
	 $order_nos 						 = trim($_POST["order_nos"]);
	 $mr_id 								 = trim($_POST["mr_id"]);
	 $sr_id 								 = trim($_POST["sr_id"]);
	 $invoice_no 						 = trim($_POST["invoice_no"]);
	 $reference_no 					 = trim($_POST["ref_no"]);
	 $delivery_date 					 = trim($_POST["delivery_date"]);
	 $order_ids 							 = trim($_POST["product_order_ids"]);
	 $prev_due 						     = trim($_POST["prev_due"]);
	 
	 $total_due 							 = trim($_POST["total_due"]);
	 $net_invoice_amount 			 = trim($_POST["net_invoice_amount"]);
	 $discount_percentage            = trim($_POST['discount_percentage']);
	 $discount = trim($_POST['discount']);
	 
	 
	 $total_unitPrice  = trim($_POST["total_unit_price"]);
	 
	 if($discount_percentage=='')
	 	$discount_percentage = 0;
	 $discount_amount 				 = trim($_POST["discount_amount"]);
	 if($discount_amount=='')
	 	$discount_amount = 0;
	 $total_outstanding_amount = trim($_POST["total_outstanding_amount"]);	 
	 
	 /*************************************************************************************
	   List arrays
	 **************************************************************************************/
	 $product_id_list 					= trim($_POST["product_id_list"]);
	 $product_name_list 			= trim($_POST["product_name_list"]);
	 $pack_size_list 					= trim($_POST["pack_size_list"]);
	 $unit_list 							= trim($_POST["unit_list"]);
	 $quantity_list 						= trim($_POST["quantity_list"]);
	 $bonus_offer_list 				= trim($_POST["bonus_offer_list"]);
	 $bonus_qty_list 					= trim($_POST["bonus_qty_list"]);
	 $total_price_list 					= trim($_POST["total_price_list"]);
	 $unit_price_list 					= trim($_POST["unit_price_list"]);
	 $chk_data 							= $entry_by.'_'.date('dmY').'_'.time();		 
	
	  /********************************************************************************
	    List array parsing with a seperator
	  ***********************************************************************************/	
	 $order_nos_list_parse 		= explode(",",$order_nos);
	 $product_id_list_parse 		= explode(",",$product_id_list);
	 $product_name_list_parse =explode(",",$product_name_list); 
	 $pack_size_list_parse 		= explode(",",$pack_size_list);
	 $unit_list_parse 					= explode(",",$unit_list);
	 $quantity_list_parse 			= explode(",",$quantity_list);
	 $bonus_offer_list_parse 	= explode(",",$bonus_offer_list);
	 $bonus_qty_list_parse 		= explode(",",$bonus_qty_list);
	 $total_price_list_parse 		= explode(",",$total_price_list);
	 $unit_price_list_parse 		=explode(",",$unit_price_list);
	 
     function get_customer_code($customer_id , $company_id) 
	 {
	   $str = "SELECT customer_code FROM inv_customer_info WHERE 
	   customer_id=$customer_id AND company_id=$company_id";
	   $sql = mysql_query($str);
	   $res = mysql_fetch_row($sql);
	   return $res[0];
	 }
	 
	 function get_pack_size_id($pack_size , $company_id ) 
	 {
	   $str = "SELECT product_pack_size_id FROM product_pack_size WHERE 
	   company_id=$company_id AND product_pack_size='$pack_size'";
	   $sql = mysql_query($str);
	   $res = mysql_fetch_row($sql);
	   return $res[0];
	 }
	 
	 function get_prdouct_unit_id($unit , $company_id) 
	 {
	   $str = "SELECT product_unit_id FROM `product_unit_info` WHERE 
	   company_id=$company_id AND product_unit='$unit'";
	   $sql = mysql_query($str);
	   $res = mysql_fetch_row($sql);
	   return $res[0];
	 }
	 
	 function get_emp_code($emp_id ,$company_id) 
	 {
	    $str = "SELECT employee_code,emp_name FROM hr_employee_info WHERE 
		company_id=$company_id AND employee_id=$emp_id";
		$sql = mysql_query($str);
		$res = mysql_fetch_row($sql);
		return $res[0];
	 }
	 
	function get_customer_invoice_info_id($customer_id,$invoice_no,$ref_no,$company_id) 
	{
			$str  = "SELECT customer_invoice_info_id FROM `inv_customer_invoice_info`
			WHERE company_id=$company_id AND customer_id=$customer_id AND 
			invoice_no='$invoice_no' AND ref_id='$ref_no'";
			$sql = mysql_query($str);
			$res = mysql_fetch_row($sql);
			return $res[0];
	}	 

	function get_product_code($product_id ) 
	{
	  $str = "SELECT product_code FROM product_info WHERE product_id=$product_id";
	  $sql = mysql_query($str);
	  $res = mysql_fetch_row($sql);
	  return $res[0];
	}
	
	function get_customer_depot_id($customer_id) 
	{
	 $str = "SELECT depot_id FROM inv_customer_info WHERE customer_id=$customer_id";
	 $sql = mysql_query($str);
	 $res = mysql_fetch_row($sql);
	 return $res[0];	
	}
	
	function get_depot_current_stock($depot_id,$product_id) 
	{
	    $str = "SELECT current_stock FROM `inv_depot_product_stock` WHERE 
		depot_id=$depot_id AND product_id=$product_id";
		$sql = mysql_query($str);
		$res = mysql_fetch_row($sql);
		return $res[0];
	}	
	
	function get_customer_current_due($customer_id,$depot_id) 
	{
	  $str = "SELECT current_due FROM `inv_customer_due_info`
	  WHERE customer_id=$customer_id AND depot_id=$depot_id";
	  $sql = mysql_query($str);
	  $res = mysql_fetch_row($sql);
	  return $res[0];
	}
	
	function get_depot_type($depot_id) 
	{
	  $str = "SELECT depot_flag FROM inv_depot_info WHERE depot_id=$depot_id";
	  $sql = mysql_query($str);
	  $res = mysql_fetch_row($sql);
	  return $res[0];
	}
	
	function customer_is_due($customer_id, $depot_id) 
	{
	  $str = "select count(*) from `inv_customer_due_info` 
		WHERE customer_id=$customer_id AND depot_id=$depot_id";
		$sql  = mysql_query($str);
		$res = mysql_fetch_row($sql);
		return $res[0];
	}
	
	 $customer_code = get_customer_code($customer_id , $company_id);
     $mr_code 			=  get_emp_code($mr_id ,$company_id);
	 $sr_code   			= get_emp_code($sr_id ,$company_id);

	 /*******************************************************************************************
	   Customer Invoice Basic Information
	 *******************************************************************************************/
	  $customer_invoice_basic_str = "INSERT INTO `decent_pharma_db`.`inv_customer_invoice_info` 
	(`customer_id`, `customer_code`, `order_nos`, `order_ids`, `mr_id`, `mr_code`, `sr_id`, `sr_code`, 	`invoice_no`, `ref_id`, 	`delivery_date`, 
	`entry_by`, `entry_date`, `company_id`, `active_flag`, `chk_data`, `previous_due`, `discount_percentage`, 
	`discount_amount`, `payed_ammount`, `current_invoice_due`, `net_invoice_amount`,`total_unit_price`)
	VALUES	($customer_id, '$customer_code', '$order_nos',	'$order_ids',
	$mr_id,'$mr_code', $sr_id, '$sr_code', '$invoice_no','$reference_no', str_to_date('$delivery_date','%d-%m-%Y'),$entry_by, 
	NOW(), $company_id, 'Y', '$chk_data','$prev_due',$discount,$discount_amount,0,
	$net_invoice_amount,  $net_invoice_amount,$total_unitPrice)";
	 
	mysql_query($customer_invoice_basic_str); 
    $customer_invoice_info_id  = get_customer_invoice_info_id($customer_id,$invoice_no,$reference_no,$company_id) ;	
	
	/********************************************************************************************
	  Productwise invoice info
	*********************************************************************************************/
	
	$depot_id = get_customer_depot_id($customer_id);	
	for( $i=0 ; $i < count($product_id_list_parse) ; $i++) 
	{
				 $product_id 			    = $product_id_list_parse[$i];
				 $prdct_stock_sale_id = "PO-".$product_id;
				 $product_code 			= get_product_code($product_id );
				 $product_name 			= $product_name_list_parse[$i];
				 $pack_size 				= $pack_size_list_parse[$i];
				 $unit_name 				= $unit_list_parse[$i];
				 $quantity 					= $quantity_list_parse[$i];
				 $pack_size_id 			= get_pack_size_id($pack_size , $company_id );
				 $unit_id 						= get_prdouct_unit_id($unit_name , $company_id);
				 $bonus_offer 				= $bonus_offer_list_parse[$i];
				 $bonus_quantity 		= $bonus_qty_list_parse[$i];
				 $unit_price 					= $unit_price_list_parse[$i];
				 $total_price 				= $quantity*$unit_price;
				 
				 
			if($quantity!="")
			{	 
	 
					if($bonus_quantity=="") 
					{
					   $bonus_quantity = 0;
					}
					else
					{
					  $bonus_quantity = $bonus_quantity;
					}
	 
					$customer_invoice_product_str = "INSERT INTO `decent_pharma_db`.`inv_customer_invoice_product` 
							(`customer_invoice_info_id`, 	`invoice_no`, 
					`ref_no`, `product_id`, 	`product_code`, `pack_size_id`, 	`pack_size`, 
					`unit_id`, `unit`, `product_quantity`, `bonus_quantity`,  
					`unit_price`, 	`total_unit_price`, `entry_by`, `entry_date`, 	`company_id`, 
					`active_flag`, `chk_data`) 	VALUES($customer_invoice_info_id, '$invoice_no', '$reference_no', $product_id, 	'$product_code', 
					$pack_size_id, '$pack_size',$unit_id, '$unit_name', 	$quantity, $bonus_quantity, 
					 '$unit_price', '$total_price', $entry_by, NOW(), $company_id, 'Y', '$chk_data');";
					 mysql_query($customer_invoice_product_str);	 

							 /*******************************************************************************************
							   Customer due update
							 ********************************************************************************************/
							if( customer_is_due($customer_id, $depot_id) !="" || customer_is_due($customer_id, $depot_id)!=0) 
							{
								$current_due_amount   = get_customer_current_due($customer_id,$depot_id);	
								$update_current_due    = $current_due_amount+ $total_price;
								$update_customer_due = "UPDATE `inv_customer_due_info` SET 
									current_due=$update_current_due	WHERE 
									customer_id=$customer_id AND depot_id=$depot_id";
								
								mysql_query($update_customer_due);
							}
							else
							{
								$new_str = "INSERT INTO `decent_pharma_db`.`inv_customer_due_info` 
										(`customer_id`, `customer_code`, `depot_id`, `current_due`, 	`entry_by`, `entry_date`, 
										`company_id`, `active_flag`, `chk_data`)  VALUES	($customer_id, 
										'$customer_code',$depot_id, $total_price, $entry_by, NOW(), $company_id, 'Y', '$chk_data')";
								mysql_query($new_str);
							} 
							 
							 /******************************************************************************************
							  Depo Stock update
							 *******************************************************************************************/
							 $depot_current_stock 			  = get_depot_current_stock($depot_id,$product_id);
							 $update_current_stock   		  = $depot_current_stock-$quantity;
							 $update_depot_product_stock = "update inv_depot_product_stock
							 set current_stock=$update_current_stock where 
							 product_id=$product_id and depot_id=$depot_id";
							 mysql_query($update_depot_product_stock);
	 
					 /******************************************************************************************
					   Product Stock add productwise	 
					 *******************************************************************************************/
						
						$depot_type 	  = get_depot_type($depot_id);
						$opening_stock = get_depot_current_stock($depot_id,$product_id);
						$stock_in 		  = 0;
						$total_stock 	  = $stock_in + $opening_stock;
						$stock_out 		  = $quantity;
						$closing_stock  =  $total_stock - $stock_out;
						
						$product_stock_add = "INSERT INTO `decent_pharma_db`.`product_stock_sales` 
						(`prdct_stock_sale_id`, `invoice_id`, `product_id`, `product_code`, `opennig_stock`, `stock_in`, 
						`total_stock`, `stock_out`, `closing_stock`, `stock_from_depot_id`,	`stock_from_depot_type`, `unit_price`, `total_unit_price`, 
						`customer_id`, `customer_code`, `stock_sale_date`, `entry_by`, `entry_date`,`company_id`, `active_flag`, `chk_data`	)
						VALUES( '$prdct_stock_sale_id', '$invoice_no',$product_id,'$product_code', 	$opening_stock,$stock_in,$total_stock, 	$stock_out, $closing_stock, 
						$depot_id, 	'$depot_type',$unit_price, $total_price, $customer_id,'$customer_code',		NOW(),$entry_by, NOW(), $company_id,'Y', '$chk_data');";	 
						mysql_query($product_stock_add);
					 /******************************************************************************************
					   Update Order status to DELIVERED	 
					 *******************************************************************************************/
						$order_status = "DELIVERED";
						$sql_up_ord = "update `product_order_info` set delivery_status='$order_status' where product_order_id in($order_ids)";
					mysql_query($sql_up_ord);		
			}		
	} 
	echo "Data saved successfully.";
?>