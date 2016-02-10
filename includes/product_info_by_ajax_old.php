<?php  include("../db.php");
            session_start();
		
		$product_id   = trim($_POST["product_id"]);
		$company_id = $_SESSION["COMPANY_ID"];
			
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
		
        echo $product_pack_size ."#".$product_unit."#".$unit_price;
		
		
?>