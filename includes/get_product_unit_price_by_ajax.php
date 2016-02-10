<?php session_start(); include("../db.php");
	
	$company_id   = $_SESSION["COMPANY_ID"];
	$product_id 	= trim($_POST["product_id"]);	
	$unit_price 	 = 0;
	$sql_uprice  = "select unit_price from decent_pharma_db.product_info where company_id=$company_id and active_flag='Y' and product_id=$product_id";
	$res_uprice  = mysql_query($sql_uprice);
	
	if($row_uprice = mysql_fetch_array($res_uprice))
		$unit_price  = $row_uprice[0];
	echo $unit_price;	
?>