<?php   session_start();
		include("../db.php");
		$company_id  = $_SESSION["COMPANY_ID"];
		$customer_id = trim($_POST["customer_id"]);
		
		$string = "SELECT product_order_id,order_taken_by,
		(SELECT emp_name FROM hr_employee_info WHERE employee_id=a.order_taken_by) AS order_taker_name,
		customer_id,(SELECT customer_name FROM inv_customer_info WHERE customer_id=a.customer_id) AS customer_name,
		customer_code,order_date,delivery_status,(SELECT customer_address FROM inv_customer_info WHERE customer_id=a.customer_id) AS customer_address
		FROM 
		product_order_info AS a  WHERE 
		company_id=$company_id AND customer_id=$customer_id and delivery_status='PENDING'";

		$query = mysql_query($string);
		if(mysql_num_rows($query)>0) 
		{
			$i =1;
?>		
			<tr>
				<th style="background-color:#f4f4f4">Order id</th>
				<th style="background-color:#f4f4f4">Order Taken By</th>
				<th style="background-color:#f4f4f4">Customer Name</th>
				<th style="background-color:#f4f4f4">Customer Code</th>			
				<th style="background-color:#f4f4f4">Customer Address</th>							
				<th style="background-color:#f4f4f4">Order Date</th>
				<th style="background-color:#f4f4f4">Order Status</th>			
			</tr>  
<?php		
			while($res =  mysql_fetch_assoc($query) ) 
			{
				$product_order_id  = $res['product_order_id'];
				$emp_name           = $res['order_taker_name'];
				$customer_id 	       = $res['customer_id'];
				$customer_name   = $res['customer_name'];
				$customer_code    = $res['customer_code'];
				$order_date 	   	   = $res['order_date'];
				$delivery_status      = $res['delivery_status'];
				$customer_address = $res['customer_address'];
				
				$popup_id = $product_order_id.'#'.$company_id;
?>
				<tr>
					 <td>&nbsp;
                    <!-- <a class="various2" href="#inline3" title="" onclick="view_data('<?php //echo $product_order_id;?>');">test</a>-->
					 <input type="checkbox" class="invoice_product_id_class" id="product_order_id_<?php echo $product_order_id;?>" value="<?php echo  "PO-".$product_order_id;?>">
					 <a  class="various2" href="#inline3" title="" onclick="view_data('<?php echo $popup_id;?>');" target="_blank"  id="<?php echo $product_order_id;?>" style="text-decoration:underline;color:#009900;"><?php echo "PO-".$product_order_id;?></a>					 
					 &nbsp;
					 </td>
					 <td><input type="text" id="emp_name"  		readonly="readonly" style="background-color:#FFFFD7;" value="<?php echo $emp_name;?>"/></td>
					 <td><input type="text" id="customer_name"  readonly="readonly" style="background-color:#FFFFD7;" value="<?php echo $customer_name; ?>"/></td>
					 <td><input type="text" id="customer_code"   readonly="readonly" style="background-color:#FFFFD7;" value="<?php echo $customer_code; ?>"/></td>			
					 <td><input type="text" id="customer_code"   readonly="readonly" style="background-color:#FFFFD7;" value="<?php echo $customer_address; ?>"/></td>								 
					 <td><input type="text" id="order_date"          readonly="readonly" style="background-color:#FFFFD7;" value="<?php echo $order_date; ?>"/></td>						
					 <td><input type="text" id="delivery_status"    readonly="readonly" style="background-color:#FFFFD7;" value="<?php echo $delivery_status; ?>"/></td>									
				</tr>     
<?php	 		$i++; 
			}  
?>
			<tr>
				 <td colspan="6">&nbsp;</td>								
			</tr>
			<tr>
				<td colspan="6">
				     <input type="button" class="btn_save"  id="ok_btn"   value="Ok"   style="width:70px;"/>
				</td>								
			</tr>          
<?php   } ?>



    
     <script type="text/javascript" charset="utf-8">				
            $(document).ready(function() 
			{			
              /*			
				function product_orders(id)
				{
				   alert(id);
					$.ajax(
					{
						type:"post" ,
						url:"includes/view/product_orders.php" ,
						data:"id="+id ,
						cache:false ,
						success:function(st)
						{
							if($.trim(st))
							{
								$("#inline1").html($.trim(st));
							}				
						}
					}); 
				}*/
				function close_popup()
				{
					$.fancybox.close();
				}	
				$(".various2").fancybox({
					 'titlePosition'		: 'inside',
					 'transitionIn'		: 'none',
					 'transitionOut'		: 'none'
				});		
            });
			
            </script>