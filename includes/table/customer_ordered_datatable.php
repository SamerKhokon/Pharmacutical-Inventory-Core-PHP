<?php include("../../db.php");  
       /**************************************
	     DB Connection check
	   **************************************
	   if($con) echo 1;else echo 0;
	   ***************************************/
	   session_start();
	    $company_id = $_SESSION["COMPANY_ID"];
	   $str = "SELECT a.`product_order_id`,a.customer_id,(SELECT customer_name FROM `inv_customer_info` WHERE customer_id=a.customer_id) AS customer_name,
		customer_code,a.delivery_date,a.order_taken_by, (SELECT emp_name FROM `hr_employee_info` WHERE employee_id=a.order_taken_by) AS emp_name
		,a.order_taker_code,(SELECT product_name FROM product_info WHERE product_id=b.product_id) AS product_name, 
		b.product_code,b.product_pack_size, b.product_unit,b.order_quantity FROM product_order_info AS a,
		ordered_product_info AS b WHERE b.`ordered_product_id`=a.`product_order_id` AND a.company_id=$company_id";

	 
	 
	   $sql = mysql_query($str);
	   
?>
			<script type="text/javascript" charset="utf-8">
                $(document).ready(function() {
                    $('#example').dataTable( {
                        "sPaginationType": "full_numbers"
                    } );
                } );
            </script>
<div style="display: none;">
		<div id="inline1" class="pop_div">
                
		</div>
	</div>
    <div style="display: none;">
		<div id="inline2" class="pop_div">                
		</div>
	</div>			
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
					<th>Action</th>					
				</tr>
			</thead>
			<tbody>					
			     <?php  while($res = mysql_fetch_assoc($sql) ) {
				 					 $customer_id  = $res['customer_id'];			 
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
									 $product_order_id = $res['product_order_id'];	 
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
				  <td align="center">
                  <a class="various1" href="#inline1" title="" onclick="view_data('<?php echo $company_id //$customer_id."#".$product_order_id."#".$company_id;?>');"><img src="./media/images/view-icone-6308-128.png" width="20" height="20" alt="View" title="View"></a></td>
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