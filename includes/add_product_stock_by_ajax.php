<?php	session_start(); include("../db.php");			
		/****************************************************************************************
		var dataStr = "depot_id="+depot_id+"&product_id="+product_id+
                "&product_code="+product_code+"&product_unit_price="+product_unit_price+
                "&total_unit_price="+total_unit_price+
                "&stock_qty="+stock_qty+"&entry_by="+entry_by+"&company_id="+company_id+'&batch_nos='+batch_nos;
		******************************************************************************************/
				
		$company_id 						= $_SESSION["COMPANY_ID"];
		$stock_from_depot_id 		= $depot_id = trim($_POST["depot_id"]);
		$stock_from_depot_type 	= get_depot_type($depot_id);
		$product_id 						= trim($_POST["product_id"]);	
		$product_code 					= trim($_POST["product_code"]);			
		$unit_price 							= trim($_POST["product_unit_price"]);
		$total_unit_price 					= trim($_POST["total_unit_price"]);
		$stock_in 							= $stock_qty = trim($_POST["stock_qty"]);
		$entry_by 							= $_SESSION["LOGIN_USERID"];
		$batch_nos							= trim($_POST['batch_nos']);	
		$minimum_stock		        = trim($_POST["minimum_stock"]);
		$prdct_stock_sale_id 			= get_product_stock_sales_id();
		$opennig_stock 					= product_current_stock($product_id, $depot_id);		
		$current_stock 					= $total_stock = $closing_stock = $opennig_stock+$stock_in;
		$stock_out 							= 0;
		$chk_data 							= $entry_by.'_'.date('dmY').'_'.time();
		
			
		$str = "insert into decent_pharma_db.product_stock_sales 
		(prdct_stock_sale_id, product_id, product_code, opennig_stock, 
		stock_in, 	total_stock, 	stock_out, closing_stock,stock_from_depot_id, 
		stock_from_depot_type,unit_price, total_unit_price, batch_nos, 
		stock_sale_date, entry_by,	entry_date, 	company_id, active_flag, chk_data)
		values('$prdct_stock_sale_id', $product_id, '$product_code', $opennig_stock, 
		$stock_in,$total_stock, $stock_out, $closing_stock, $stock_from_depot_id, 
		'$stock_from_depot_type', $unit_price, $total_unit_price, '$batch_nos', 
		now(), $entry_by, now(), $company_id, 	'Y', 	'$chk_data'	)";				
		//echo "<br>";
		$sql = mysql_query($str);
		if($sql)
		{
			//updating depot's current stock of the product//
			$sql_up = "update inv_depot_product_stock set 
			current_stock=$current_stock,minimum_stock=$minimum_stock
			where depot_id=$depot_id and 
			product_id=$product_id and active_flag='Y'";
			$res_up = mysql_query($sql_up);
			//echo "<br>";
			if($res_up)
				echo "Data saved successfully";
			else
				echo "Error";		
		}
		else
			echo "Error";

?>			
<?php

		/*********************************************************************************
		  Functions
		**********************************************************************************/			
		function get_product_stock_sales_id() 
		{
			$str = "select max(prdct_stock_sale_id) as last_id from 
			product_stock_sales where active_flag = 'Y'";
			$sql = mysql_query($str);
			$row = mysql_fetch_array($sql);
			$last_stock_id=$row['last_id'];
			
			//if last ID got then increase there// 
			if($last_stock_id)
				$last_stock_id++;
				
			//Otherwise start from 001//	
			else
				$last_stock_id='S001';//
			
			return $last_stock_id; 	 
		}
		
		function product_current_stock($product_id, $depot_id)
		{
			$str = "select current_stock as current_stock from 
			inv_depot_product_stock where active_flag='Y' and 
			product_id=$product_id and depot_id=$depot_id";
			$sql = mysql_query($str);
			$row = mysql_fetch_array($sql);
			//get the stock//
			$prev_stock = $row['current_stock'];
			
			//if not then asign to zero(0)//
			if(!$prev_stock)
				$prev_stock = 0;
							
			return $prev_stock;
		}
		
		function get_depot_type($depot_id)
		{
			$str = "select depot_flag from inv_depot_info where 
			active_flag = 'Y' and depot_id=$depot_id";
			$sql = mysql_query($str);
			$row = mysql_fetch_array($sql);
			$depot_type = $row[0];
			if(!$depot_type)
				$depot_type = 'FD';
			return $depot_type;	
		}	
?>