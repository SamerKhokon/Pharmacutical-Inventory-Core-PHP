<?php  include("../db.php");
            session_start();
		
		$product_id   = trim($_POST["product_id"]);
		$company_id = $_SESSION["COMPANY_ID"];
		//$customer_id = trim($_POST['customer_id']);
		$depot_id 	  = trim($_POST["depot_id"]);//get_depot_id($customer_id) ;
			
		$str = "SELECT  product_pack_size,product_unit,unit_price FROM product_info 
		WHERE product_id=$product_id AND company_id=$company_id";
		$sql = mysql_query($str);
		$res = mysql_fetch_row($sql);
		
		
		/************************************************************************
		  Only for fetch values for using ajax
		*************************************************************************/
		$product_pack_size = $res[0];
		$product_unit 			 = $res[1];
		$unit_price 				 = $res[2];
		
		//$current_stock = get_current_stock($product_id, $depot_id);
		$sql = "select current_stock from inv_depot_product_stock where product_id=$product_id and depot_id=$depot_id";
		$res = mysql_query($sql);
		$row = mysql_fetch_array($res);
		$current_stock =  $row[0];
		
        echo $product_pack_size ."#".$product_unit."#".$unit_price."#".$current_stock ;
		
		
		
		
		function get_depot_id($customer_id) {
		  $str = "SELECT depot_id FROM inv_customer_info WHERE customer_id=$customer_id";
		  $sql = mysql_query($str);
		  $res = mysql_fetch_row($sql);
		  return $res[0];
		}			
		
		function get_current_stock($product_id , $depot_id)
		{
			$sql = "select current_stock from inv_depot_product_stock where product_id=$product_id and depot_id=$depot_id";
			$res = mysql_query($sql);
			$row = mysql_fetch_array($res);
			return $row[0];
		}
?>