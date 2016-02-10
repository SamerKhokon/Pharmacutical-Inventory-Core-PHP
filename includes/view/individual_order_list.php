<?php include("../../db.php");  
       	/**************************************
	     DB Connection check
	   	**************************************
	   	if($con) echo 1;else echo 0;
	   	***************************************/
	   	$id = $_REQUEST["id"];
	   
		$par = explode("#",$id);
	   
		$product_orderid  = $par[0];
		//session_start();
		$company_id = $par[1];
		$str = "SELECT 
			a.`product_id` as product_id,
			(select `product_name` from `product_info` where `product_id`=a.`product_id`) as product_name,
			a.`product_code` as product_code,
			a.`product_pack_size` as product_pack_size,
			a.`product_unit` as product_unit,
			a.`order_quantity` as order_quantity,
			(select `customer_name` from `inv_customer_info` where `customer_id`=(select `customer_id` from `product_order_info` where `product_order_id`=a.`order_id`)) as customer_name,
			(select date_format(`order_delivery_date`,'%d %b, %Y') from `product_order_info` where `product_order_id`=a.`order_id`) as delivery_date,
			(select `emp_name` from `hr_employee_info` where `employee_id`=(select `order_taken_by` from `product_order_info` where `product_order_id`=a.`order_id`)) as emp_name,
			(select `order_taker_code` from `product_order_info` where `product_order_id`=a.`order_id`) as order_taker_code,
			 (select `customer_code` from `product_order_info` where `product_order_id`=a.`order_id`) as customer_code
		FROM `ordered_product_info` a 
		WHERE 
			a.`order_id`=$product_orderid 
			AND a.company_id=$company_id
		";	 
	 
	   $sql = mysql_query($str);	   
?>
			<script type="text/javascript" charset="utf-8">
                $(document).ready(function() {
                    $('#example').dataTable( {
                        "sPaginationType": "full_numbers"
                    } );
                } );
            </script>
               <h1 class="pop_head">Ordered List</h1>    
<div id="demo">
		<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
			<thead class="tab_head">
				<tr>
					<th>Customer</th>
					<th>Delivery Date</th>
					<th>Order Taken</th>
					<th>Product Name</th>
					<th>Product Code</th>
					<th>Pack Size</th>
					<th>Unit</th>
					<th>Quantity</th>
				</tr>
			</thead>
			<tbody>					
			     <?php  while($res = mysql_fetch_assoc($sql) ) {
				 					 //$customer_id  = $res['customer_id'];			 
									 $customer_name = $res['customer_name'];
									 $customer_code = $res['customer_code'];
									 $delivery_date = $res['delivery_date'];
									 $order_taken_by = $res['emp_name'];	 
									 $order_taker_code = $res['order_taker_code'];	 
									 $product_name = $res['product_name'];
									 $product_code = $res['product_code'];	 
									 $product_pack_size = $res['product_pack_size'];	 
									 $product_unit = $res['product_unit'];	 
									 $order_quantity = $res['order_quantity'];
									 //$product_order_id = $res['product_order_id'];	 
				 ?>
				 <tr class="gradeA">
				   <td align="center"><?php echo $customer_name;?></td>
				   <td align="center"><?php echo $delivery_date;?></td>
				   <td align="center"><?php echo $order_taken_by;?></td>
				   <td align="center"><?php echo $product_name;?></td>
				   <td align="center"><?php echo $product_code;?></td>				   
				   <td align="center"><?php echo $product_pack_size;?></td>				   				   
				   <td align="center"><?php echo $product_unit;?></td>				   				   
				   <td align="center"><?php echo $order_quantity;?></td>				   				   
				 </tr>		 
				 <?php } ?>				 
			</tbody>
			<tfoot class="tab_fot">				
				<tr>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>					
					<th>&nbsp;</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>					
				</tr>
			</tfoot>
		</table>
</div>
<?php
	function  get_zone($zone_id , $company_id ) {
		$str = "SELECT zone_name FROM `inv_customer_zone` WHERE company_id=$company_id AND `zone_id`=$zone_id";
		$sql = mysql_query($str);
		$res = mysql_fetch_row($sql);
		return $res[0];
	}
	function get_depo($depo_id , $company_id) {
		$str = "SELECT depot_name FROM `inv_depot_info` WHERE company_id=$company_id AND depot_id=$depo_id";
		$sql = mysql_query($str);
		$res = mysql_fetch_row($sql);
		return $res[0];		
	}
?>