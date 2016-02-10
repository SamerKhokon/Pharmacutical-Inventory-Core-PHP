<?php   include("../../db.php");
	
	$company_id = $_REQUEST['id'];
	//$qry = $_REQUEST['id'];
	//$parse = explode("#" , $qry);
	//$company_id       = $parse[0];
	//$product_order_id =$parse[1];
	//$customer_id       =$parse[2];              
	 /*$str = "SELECT a.customer_id,(SELECT customer_name FROM `inv_customer_info` WHERE customer_id=a.customer_id) AS customer_name,
		customer_code,a.delivery_date,a.order_taken_by, (SELECT emp_name FROM `hr_employee_info` WHERE employee_id=a.order_taken_by) AS emp_name
		,a.order_taker_code,(SELECT product_name FROM product_info WHERE product_id=b.product_id) AS product_name, 
		b.product_code,b.product_pack_size, b.product_unit,b.order_quantity FROM product_order_info AS a,
		ordered_product_info AS b WHERE b.`ordered_product_id`=$product_order_id AND a.company_id=$company_id";*/
		$str = "select * from product_order_info where product_order_id=$company_id";
	$sql = mysql_query($str);
	
	$data = "";
	if($row = mysql_fetch_array($sql))
	{
		 //$data = $row['customer_name']."|".$row['delivery_date'].",".$row['order_taken_by']."|".$row['emp_name']."|".$row['product_code']."|".$row['product_pack_size']."|".$row['product_unit']."|".$row['order_quantity'];
		
		
	?>
	<h1 class="pop_head"> Report Customer Order </h1>

    <table class="pop_table">
        <tr>
            <td>Customer Name : </td>
            <td>&nbsp;&nbsp;</td>
            <td><?php echo get_customer_name($row['customer_id']);?></td>
        </tr>
         <tr>
            <td>Customer Code : </td>
            <td>&nbsp;&nbsp;</td>
            <td><?php echo $row['customer_code'];?></td>
        </tr>
        <tr>
            <td>Order Date : </td>
            <td>&nbsp;&nbsp;</td>
            <td><?php echo $row['order_date'];?></td>
        </tr>
        <tr>
            <td>Delivery Date : </td>
            <td>&nbsp;&nbsp;</td>
            <td><?php echo $row['delivery_date'];?></td>
        </tr>
        <tr>
            <td>Order Taken : </td>
            <td>&nbsp;&nbsp;</td>
            <td><?php echo $row['order_taken_by'];?></td>
        </tr>
        <tr>
            <td>Order status : </td>
            <td>&nbsp;&nbsp;</td>
            <td><?php echo $row['order_status'];?></td>
        </tr>
         <tr>
            <td>Delivery status: </td>
            <td>&nbsp;&nbsp;</td>
            <td><?php echo $row['delivery_status'];?></td>
        </tr>
         <tr>
            <td>Pack Size : </td>
            <td>&nbsp;&nbsp;</td>
            <td><?php //echo $row['product_pack_size'];?></td>
        </tr>
         <tr>
            <td>Unit : </td>
            <td>&nbsp;&nbsp;</td>
            <td><?php //echo $row['product_unit'];?></td>
        </tr>
        <tr>
            <td>Quantity : </td>
            <td>&nbsp;&nbsp;</td>
            <td><?php //echo $row['order_quantity'];?></td>
        </tr>
        <!--<tr>
        	<td></td>
            <td></td>
            <td><input type="button" id="btn_close" value="OK" onclick="close_popup();" /></td>
        </tr> -->
    </table> 
    <?php
	}
	function get_customer_name($company_id)
	{
		$sql_md = "select customer_name from inv_customer_info where active_flag='Y' and customer_id=$company_id";
		$res_md = mysql_query($sql_md);
		if($row_md = mysql_fetch_array($res_md))
			echo $row_md[0];
		else
			echo '-';	
	}

	
	
?>                                                                                                