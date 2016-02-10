<?php  include("../db.php");
	session_start();	
	$entry_by 				  = $_SESSION["LOGIN_USERID"];
	$company_id 			  = $_SESSION["COMPANY_ID"];
	$chalan_no 				  = trim($_POST["chalan_no"]);
	$invoice_no 			  = trim($_POST["invoice_no"]);
	$ref_no			   		  = trim($_POST["ref_no"]);
	$transfer_from 		  = trim($_POST["transfer_from"]);
	$transfer_from_code = get_depot_code($transfer_from,$company_id);
	$transfer_to               = trim($_POST["transfer_to"]);
	$transfer_to_code     = get_depot_code($transfer_to,$company_id);			
	$transport_type         = trim($_POST["transport_type"]);
	$transport_id             = trim($_POST["transport_id"]);
	$laod_supervisor       = trim($_POST["laod_supervisor"]);
	$in_charge 				  = trim($_POST["in_charge"]);
	$delivery_date 			  = trim($_POST["delivery_date"]);
	$driver_name 			  = trim($_POST["driver"]);
	$driver_contact_no    = trim($_POST["driver_contact_no"]);
	
	$products 				  = trim($_POST["products"]);
	$packs 	  		          = trim($_POST["packs"]);
	$units 	  				      = trim($_POST["units"]);
	$uprices  				      = trim($_POST["uprices"]);
	$qtys     					  = trim($_POST["qtys"]);
	
	$parse_products = explode(",",$products);
	$parse_packs    	= explode(",",$packs);
	$parse_units    	= explode(",",$units);		
	$parse_uprices  	= explode(",",$uprices);				
	$parse_qtys     	= explode(",",$qtys);		
	$entry_date 			= date("Y-m-d h:i:s");	
	$chk_data 			= $entry_by.'_'.date('dmY').'_'.time();
			
	/************************************************************************************
	  Transfer Basic Information
	*************************************************************************************/	
			
	$product_transfer_str = "INSERT INTO `decent_pharma_db`.`product_transfer_info` 
	(`challan_no`,`invoice_no`,`ref_no`,`transfer_from`,`transfer_from_code`, 
	`transfer_to`,`transfer_to_code`,`transport_id`,`transport_type`,`load_supervised_by`, 
	`in_charge_emp_id`,`delivery_date`,`process_status`,`driver_name`,`driver_contact_no`,
 	`unload_supervised_by`,`entry_by`,`entry_date`,`company_id`,`active_flag`, 
	`chk_data`)	VALUES	('$chalan_no','$invoice_no','$ref_no','$transfer_from', 
	'$transfer_from_code','$transfer_to','$transfer_to_code',$transport_id,'$transport_type', 
	$laod_supervisor,'$in_charge','$delivery_date','ON THE WAY','$driver_name','$driver_contact_no', 
	'unload_supervised_by',$entry_by,NOW(),$company_id,'Y','$chk_data');";
	$res_transfer_str = mysql_query($product_transfer_str);
	//if($res_transfer_str)
	
	
	$ddpt_id = get_ddpt_id($chk_data,$ref_no,$invoice_no,$chalan_no,$company_id);
	$count_products = count($parse_products);	
	for( $i = 0 ; $i < count($parse_products) ; $i++ ) 		
	{
					/****************************************************************************************
					   multiple product informations
					*****************************************************************************************/		
					
					$product_id            = $parse_products[$i];
					$pack_size 			   = $parse_packs[$i];
					$unit 				   	   = $parse_units[$i];
					$unit_price  		   	   = $parse_uprices[$i];
					$qty 			       		   = $parse_qtys[$i];		
					$total_unit_price 	   = $unit_price*$qty;
					$product_code 	   = get_product_code($product_id,$company_id);
					$product_unit_id    = get_product_unit_id($unit,$company_id);
					$product_pack_size_id  = get_pack_size_id($pack_size , $company_id);	
			
			
			    if($qty!="")
				{
			
						/***********************************************************************************
						   Product wise transfering Basic Information
						************************************************************************************/			
						
						$tranfering_product_str = "INSERT INTO `decent_pharma_db`.`transfering_product_info` (
								`ddpt_id`,`invoice_no`,`challan_no`,`ref_no`,`product_id`,`product_code`,`pac_size_id`,
								`pack_size`,`product_unit_id`,`product_unit`,`product_quantity`,
								`unit_price`,`total_unit_price`,`entry_by`,`entry_date`,`company_id`,`active_flag`,`chk_data`)
								VALUES('$ddpt_id','$invoice_no','$chalan_no','$ref_no',$product_id, 
								'$product_code',$product_pack_size_id,'$pack_size','$product_unit_id','$unit',$qty, 
								$unit_price,$total_unit_price,$entry_by,NOW(),$company_id,'Y','$chk_data');";
							mysql_query($tranfering_product_str);	

						/**************************************************************************************
							Product Stock of Depot From
						***************************************************************************************/
						
						$prdct_stock_sale_id = "SL".date('Ymdhis');
						$openStock_depot_from = get_product_stock_of_depot($transfer_from,$product_id,$company_id);
						$total_stock_from      =   $openStock_depot_from + 0;
						$closing_stock_from = $total_stock_from - $qty;
						
						 $product_stock_sales_for_depot_from = "INSERT INTO `decent_pharma_db`.`product_stock_sales`( 
								`prdct_stock_sale_id`,`invoice_id`,`product_id`,`product_code`,`opennig_stock`,`stock_in`, 
								`total_stock`,`stock_out`,`closing_stock`,`stock_from_depot_id`,`unit_price`,`total_unit_price`,
								`stock_sale_date`,`entry_by`,`entry_date`,`company_id`,`active_flag`,`chk_data`)
								VALUES	('$prdct_stock_sale_id','$invoice_no','$product_id','$product_code',$openStock_depot_from,
								0,$total_stock_from,$qty,$closing_stock_from,$transfer_from, 
								$unit_price,$total_unit_price,'$entry_date',$entry_by,'$entry_date',$company_id,'Y','$chk_data');";
							mysql_query($product_stock_sales_for_depot_from);
						
						
							/*********************************************************************************
							  Depot From Stock Update
							***********************************************************************************/
							 $inv_depot_product_stock_from	= "UPDATE `decent_pharma_db`.`inv_depot_product_stock` 
							SET	`current_stock` = $closing_stock_from 	WHERE product_id=$product_id and	`depot_id` = $transfer_from";
							mysql_query($inv_depot_product_stock_from);
							
							/****************************************************************************************
							  End Depot From
							****************************************************************************************/
							
		
		
		
		
								/********************************************************************************************
								   Depot To Stock 
								*********************************************************************************************/
								$openStock_depot_to = get_product_stock_of_depot($transfer_to,$product_id,$company_id);
								$total_stock_to =   $openStock_depot_to + $qty;
								$closing_stock_to = $total_stock_to - 0; 
								$product_stock_sales_for_depot_to = "INSERT INTO `decent_pharma_db`.`product_stock_sales`( 
								`prdct_stock_sale_id`,`invoice_id`,`product_id`,`product_code`,`opennig_stock`,`stock_in`, 
								`total_stock`,`stock_out`,`closing_stock`,`stock_from_depot_id`,`unit_price`,`total_unit_price`,
								`stock_sale_date`,`entry_by`,`entry_date`,`company_id`,`active_flag`,`chk_data`)
								VALUES	('$prdct_stock_sale_id','$invoice_no','$product_id','$product_code','$openStock_depot_to',
								$qty,$total_stock_to,0,$closing_stock_to,$transfer_to, 
								$unit_price,$total_unit_price,'$entry_date',$entry_by,'$entry_date',$company_id,'Y','$chk_data');";
								mysql_query($product_stock_sales_for_depot_to);


								/**********************************************************************************************
								   Depot To Stock Update
								***********************************************************************************************/
								 $inv_depot_product_stock_to	= "UPDATE `decent_pharma_db`.`inv_depot_product_stock` 
								SET	`current_stock` = $closing_stock_to 	WHERE  product_id=$product_id and	`depot_id` = $transfer_to";
								mysql_query($inv_depot_product_stock_to);
									
								
								/*****************************************************************************************
								  End Depot To
								*****************************************************************************************/
				}				
	}
	
	if($count_products==$i)
		echo "Data saved successfully";
?>	
	
<?php 	
	
    /********************************************************************************************
	********************   Stock Functions
	*********************************************************************************************/
	
	function get_product_stock_of_depot($depot_id,$product_id,$company_id) 
	{
	   $str = "SELECT current_stock FROM `inv_depot_product_stock` WHERE depot_id=$depot_id AND 
		product_id=$product_id AND company_id=$company_id";
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
	 
	function get_ddpt_id($chk_data,$ref_no,$invoice_no,$chalan_no,$company_id) 
	{
		$str = "select ddpt_id from `decent_pharma_db`.`product_transfer_info` where chk_data='$chk_data' 
		and challan_no='$chalan_no' and invoice_no='$invoice_no' and ref_no='$ref_no' and company_id=$company_id";
		$sql = mysql_query($str);
		$res = mysql_fetch_row($sql);
		return $res[0];
	}	 
	 
	function get_depot_code($depot_id,$company_id) 
	{
	  $str = "SELECT depot_code FROM `inv_depot_info` WHERE company_id=$company_id AND depot_id=$depot_id";
	  $sql = mysql_query($str);
	  $res = mysql_fetch_row($sql);
	  return $res[0];
	}	
?>