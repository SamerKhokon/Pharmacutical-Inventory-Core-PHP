<?php include("../db.php");
		session_start();
		
	    /*
		var dataStr = "customer_id="+customer_id+
			"&return_date="+return_date+"&inv_id="+
			inv_id+"&invoice_status="+invoice_status+
			"&packs="+packs+"&products="+products+"&units="+units+
			"&uprices="+uprices+"&qtys="+qtys+"&bqtys="+bqtys+"&sales_amnt="+sales_amnt+"&com_amnt_per="+com_amnt_per+"&com_amnt="+com_amnt+"&grand_total="+grand_total;
		*/
		
		$customer_id 				  = trim($_POST["customer_id"]);
		$inv_id 		      = trim($_POST["inv_id"]);
		$return_date 		      = trim($_POST["return_date"]);
		$invoice_status				  = trim($_POST["invoice_status"]);
		$products					  = trim($_POST["products"]);
		$packs							  = trim($_POST["packs"]);		
		$units							  = trim($_POST["units"]);
		$uprices						  = trim($_POST["uprices"]);
		$qtys							  = trim($_POST["qtys"]);
		$bqtys							  = trim($_POST["bqtys"]);
		$total_unitPrice = $sales_amnt							  = trim($_POST["sales_amnt"]);
		$discount = $com_amnt_per							  = trim($_POST["com_amnt_per"]);
		$discount_amount = $com_amnt							  = trim($_POST["com_amnt"]);
		$net_invoice_amount = $grand_total							  = trim($_POST["grand_total"]);
		$company_id 				  = $_SESSION["COMPANY_ID"];
		$entry_by  					  = $_SESSION["LOGIN_USERID"];		
		$chk_data 					  = $entry_by.'_'.date('dmY').'_'.time();			
		$customer_code 			  = get_customer_code($company_id,$customer_id);		
				
		//$return_date   = "STR_TO_DATE( '$return_date', '%m/%d/%Y')";
		
				
				
		$parse_products = explode(",",$products);
		$parse_packs     = explode(",",$packs);
		$parse_units       = explode(",",$units);		
		$parse_uprices   = explode(",",$uprices);				
		$parse_qtys        = explode(",",$qtys);						
		$order_date 		= date("Y-m-d");
		
		$customer_invoice_basic_str = "INSERT INTO `decent_pharma_db`.`inv_customer_invoice_info` 
	(`customer_id`, `customer_code`, `order_nos`, `order_ids`, `mr_id`, `mr_code`, `sr_id`, `sr_code`, 	`invoice_no`, `ref_id`, 	`delivery_date`, 
	`entry_by`, `entry_date`, `company_id`, `active_flag`, `chk_data`, `previous_due`, `discount_percentage`, 
	`discount_amount`, `payed_ammount`, `current_invoice_due`, `net_invoice_amount`,`total_unit_price`)
	VALUES	($customer_id, '$customer_code', '-',	'-',
	0,'-', 0, '-', '$invoice_no','-', str_to_date('$return_date','%d/%m/%Y'),$entry_by, 
	NOW(), $company_id, 'Y', '$chk_data','$prev_due',$discount,$discount_amount,0,
	$net_invoice_amount,  $net_invoice_amount,$total_unitPrice)";
	 
	mysql_query($customer_invoice_basic_str); 
	
	$customer_invoice_info_id  = get_customer_invoice_info_id($customer_id,$invoice_no,$reference_no,$company_id) ;	
	
	for($i=0 ; $i < count($parse_products) ; $i++ ) 		
	{
		    /***************************************
			   multiple product informations
			****************************************/
	        $product_id =  $parse_products[$i];
			 $pack_size = $parse_packs[$i];
			$unit 			= $parse_units[$i];
			$unit_price  = $parse_uprices[$i];
			$qty 			    = $parse_qtys[$i];		
			
			$product_code 				=  get_product_code($product_id,$company_id);
			$product_unit_id  			= get_product_unit_id($unit,$company_id);
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
	echo "Data saved successfully.";
?>
<?php 		
   /*******************************************************************
     Order related functions
   *******************************************************************/   	
	function get_product_orderid($order_taken_by,$customer_id,$company_id) 
	{
	  $str = "SELECT * FROM  `product_order_info` WHERE 
		order_taken_by=$order_taken_by AND customer_id=$customer_id AND company_id=$company_id";
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
	function get_customer_invoice_info_id($customer_id,$invoice_no,$ref_no,$company_id) 
	{
			$str  = "SELECT customer_invoice_info_id FROM `inv_customer_invoice_info`
			WHERE company_id=$company_id AND customer_id=$customer_id AND 
			invoice_no='$invoice_no' AND ref_id='$ref_no'";
			$sql = mysql_query($str);
			$res = mysql_fetch_row($sql);
			return $res[0];
	}
?>