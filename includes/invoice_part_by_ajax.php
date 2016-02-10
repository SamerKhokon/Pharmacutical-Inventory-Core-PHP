<?php include("../db.php");  				
		/***********************************************************************************
		   list of product order id = lst varriable
		   list of generated product order id = pnos  varriable
		************************************************************************************/
		$customer_id = trim($_POST["customer_id"]);
		$lst 				  = trim($_POST["lst"]);
		$pnos            = trim($_POST["pnos"]);
		
		echo $str = "SELECT product_id,(SELECT product_name FROM product_info WHERE product_id=a.product_id) 
				AS product_name, product_pack_size,product_unit,product_code,SUM(order_quantity) oqsum,
				(SELECT unit_price FROM product_info WHERE product_id=a.product_id) AS product_unit_price
				FROM `ordered_product_info` AS a WHERE order_id IN(".$pnos.") GROUP BY product_code";
        $sql = mysql_query($str);
		
		
		$mio_str = "SELECT mio_id,(SELECT emp_name FROM 
						hr_employee_info AS b WHERE mio_id=b.employee_id) 
						AS mio_name FROM inv_customer_zone WHERE zone_id 
						IN(SELECT zone_id FROM inv_customer_info WHERE customer_id=$customer_id)";
						
		$mio_sql = mysql_query($mio_str);				
		
 ?>		
		<input type="hidden" id="customer_id" value="<?php echo $customer_id;?>"/> 
		<input type="hidden" id="product_order_ids" value="<?php echo $pnos;?>"/>
		
		<table id="invoice_second_part">	
							<tr>
								 <th style="background-color:#f4f4f4">Order nos</th>
								 <th style="background-color:#f4f4f4">M.R</th>
								 <th style="background-color:#f4f4f4">S.R</th>							
								 <th style="background-color:#f4f4f4">Invoice No</th>							
								 <th style="background-color:#f4f4f4">Ref No</th>															 
								 <th style="background-color:#f4f4f4">Delivery Date</th>
								 <th style="background-color:#f4f4f4"></th>								 
								 <th style="background-color:#f4f4f4"></th>
							</tr>								
							<tr>
								 <td><input type="text" id="order_nos" style="background-color:#FFFFD7;" readonly="readonly" value="<?php echo $lst;?>"/></td>
								 <td><select id="mr_id" >
								 <?php  while($rs = mysql_fetch_assoc($mio_sql) ) { ?>
									<option value="<?php echo $rs['mio_id'];?>"><?php echo $rs['mio_name'];?></option>
								 <?php } ?>	
									</select></td>
									
								 <td>
                                 <?php
                                  $sr_str = "SELECT employee_id,emp_name FROM hr_employee_info WHERE employee_id IN(
										SELECT employee_id FROM hr_employee_depot_rel WHERE depot_id IN(
										SELECT depot_id FROM inv_customer_zone WHERE zone_id 
										IN(SELECT zone_id FROM  inv_customer_info WHERE customer_id=$customer_id)) 
									)";
 ?>
                                <select id="sr_id" >
 <?php                                         
										$sr_sql =  mysql_query($sr_str);
										while($r  = mysql_fetch_assoc($sr_sql) ) {
?>
											<option value="<?php echo $r['employee_id'];?>"><?php echo $r['emp_name'];?></option>
								  <?php } ?>
								 </select></td>							
								 <td><input type="text" id="inv_id" style="background-color:#FFFFD7;" readonly="readonly" value="<?php echo "INV".date('his');?>"/></td>							
								 <td><input type="text" id="ref_no" style="background-color:#FFFFD7;"  readonly="readonly" value="<?php echo 'RF'.mt_rand(1,99999);?>"/></td>															 
								 <td><input type="text" id="delivery_date" style="background-color:#FFFFD7;" readonly="readonly" value=""/></td>															 								 
								 <th></th>								 
								 <th></th>								 
							</tr>
						</table>
						
						
						<?php
						/*************************************************************************
						****  Ordered Product List
						**************************************************************************/
						?>
						<table id="ordered_product_list">
							<tr>
								 <th style="background-color:#f4f4f4">Product</th>
								 <th style="background-color:#f4f4f4">Pack Size</th>
								 <th style="background-color:#f4f4f4">Unit</th>							
								 <th style="background-color:#f4f4f4">Quantity</th>							
								 <th style="background-color:#f4f4f4">Bonus Offer</th>															 
								 <th style="background-color:#f4f4f4">Bonus Qty</th>															 								 
								 <th style="background-color:#f4f4f4">Unit Price</th>															 								 	
								 <th style="background-color:#f4f4f4">Total Price</th>															 								 								 
							</tr>
<?php                          $total_amount = 0 ;
								while($rs = mysql_fetch_assoc($sql) ) 
								{
										$product_id 			 = $rs['product_id'];
										$product_name   	 = $rs['product_name'];
										$product_pack_size  = $rs['product_pack_size'];
										$product_unit 			  = $rs['product_unit'];
										$oqsum 					  = $rs['oqsum'];
										$product_unit_price  = $rs['product_unit_price'];
										$product_unit_price = number_format((float)$product_unit_price, 2, '.', '');
										$unit_total_price 		  = $oqsum*$product_unit_price;
										$total_amount  		  += $unit_total_price; 								
?>	
									<tr>
										
										 <td><input type="hidden" id="product_id_<?php echo $product_id;?>"  class="product_id_class"  value="<?php echo $product_id;?>"/>
										 <input type="text" id="product_name_<?php echo $product_id;?>" class="product_name_class" style="background-color:#FFFFD7;" value="<?php echo $product_name;?>" readonly="readonly" /></td>
										 <td><select id="pack_size_<?php echo $product_id;?>" class="pack_size_class" ><option><?php echo $product_pack_size;?></option></select></td>
										 <td><select id="unit_<?php echo $product_id;?>" class="unit_class"><option><?php echo $product_unit;?></option></select></td>							
										 <td><input type="text" id="quantity_<?php echo $product_id;?>" class="qty_class" style="background-color:#FFFFD7;width:70px;" value="<?php echo $oqsum;?>" readonly="readonly" /></td>							
										 <td><input type="text" id="bonus_offer_<?php echo $product_id;?>" class="bonus_offer_class" style="background-color:#FFFFD7;" value="" readonly="readonly" /></td>															 
										 <td><input type="text" id="bonus_qty_<?php echo $product_id;?>" class="bonus_qty_class" style="background-color:#FFFFD7;" readonly="readonly" /></td>															 								 
										 <td><input type="text" id="unit_price_<?php echo $product_id;?>" class="unit_price_class" value="<?php echo $product_unit_price;?>" style="background-color:#FFFFD7;" readonly="readonly" /></td>															 
										 <td><input type="text" id="total_price_<?php echo $product_id;?>" class="total_price_class" style="background-color:#FFFFD7;width:100px;" value="<?php echo $unit_total_price;?>" readonly="readonly" /></td>															 								 								 
									</tr>
<?php							} 
?>														
						</table>						
						<br/>
<?php 						
						   $customer_due_str = "SELECT current_due FROM `inv_customer_due_info` 
						   WHERE customer_id=$customer_id";
						   $customer_due_sql = mysql_query($customer_due_str);
						   $customer_due_res = mysql_fetch_row($customer_due_sql);
						   $customer_due = $customer_due_res[0];
						   if($customer_due==""){
								$customer_due = 0;
						   }else{
								$customer_due  = $customer_due;
						   }
?>					
						<table width="100%" border="1">
						<tr>
						 <td>Adjustment Amount</td>
						 <td><input type="text" id="adjustment_amount" style="background-color:#FFFFD7;" readonly="readonly"/></td>
						 <td>Total</td>
						 <td><input type="text" id="total" value="<?php echo $total_amount;?>" readonly="readonly" style="background-color:#FFFFD7;"/></td>						 
						</tr>						
						<tr>
						<td>Prev Outstanding Amount</td>
						<td><input type="text" id="prev_outstanding_amount"  readonly="readonly" style="background-color:#FFFFD7;" value="<?php echo $customer_due;?>"/></td>
						<td>Discount  </td>  
						
						<td>
						<input type="text" id="discount" style="caption-side:left; width:30px;background-color:#FFFFD7;"/><input type="text" id="total_discount" style="width:102px;background-color:#FFFFD7;" readonly="readonly"/>
						</td>
						<!--
			
						<table>
						<tr>
						<td><input type="radio" id="percentage" name="discount_type" value="%" />%</td>
						<td ><input type="radio" id="taka" style="background-color:#999988;" name="discount_type"  value="<?php echo '&#2547;';?>"/>&#2547;</td>
						<td>
						<input type="text" id="discount" style="caption-side:left; width:30px;background-color:#FFFFD7;"/><input type="text" id="total_discount" style="width:102px;background-color:#FFFFD7;" readonly="readonly"/>
						</td>			
						</tr>
						</table>
							</td>-->

						</tr>						
						<tr>
						 <td>Total Outstanding Amount</td>
						 <td><input type="text" id="total_outstanding_amount" readonly="readonly" style="background-color:#FFFFD7;"/></td>
						 <td>Net Invoice Amount</td>
						 <td><input type="text" id="net_invoice_amount" readonly="readonly" value="<?php echo $total_amount;?>" style="background-color:#FFFFD7;"/></td>						 
						</tr>
						<tr>
						 <td>&nbsp;</td>
						 <td>&nbsp;</td>
						 <td>&nbsp;</td>
						 <td><input type="button" id="invoice_save" class="btn_save" value="Save" style="width:70px;"/></td>						 
						</tr>						
						</table>
						
<script type="text/javascript">
$(document).ready(function(){
    var d = new Date();
	
	var  pickerOptions = {
	    changeYear:false,
		changeMonth:false ,
		changeDate:false ,
	    dateFormat:"dd-mm-yy",
		minDate: new Date(),
		maxDate: '+4'
	};
	$("#delivery_date").datepicker(pickerOptions);
	
	$("#adjustment_amount").val(0);
	
	var prev_outstanding_amount = parseFloat($("#prev_outstanding_amount").val());
	var tot_outstanding_amount    = prev_outstanding_amount+parseFloat($("#net_invoice_amount").val());
	
	$("#total_outstanding_amount").val(tot_outstanding_amount);							
	
	$("#discount").keyup(function(ex)
	{	
	    //var discount_type = $("input[name='discount_type']:checked").val();
		//if(discount_type=="") 	{
			
		    //alert(discount_type);
			var discount = $("#discount").val();
			var total       = $("#total").val();							
			var net_invoice_amount = $("#net_invoice_amount").val();
			var valid = (discount.match(/^\d+(?:\.\d+)?$/));
			var total_discount   = 0;
			var tot_adj_amount = 0;

			if(discount!="")	
			{
				total_discount = parseFloat(((total*discount)/100));
				$("#total_discount").val(parseFloat(total_discount*-1))
				total = parseFloat(total - total_discount);
				$("#net_invoice_amount").val(total);		
				tot_adj_amount = parseFloat($("#prev_outstanding_amount").val())+parseFloat($("#net_invoice_amount").val());
				tot_adj_amount = tot_adj_amount.toFixed(2);										
				$("#total_outstanding_amount").val(tot_adj_amount);
			}
			else
			{
				$("#total").val(total);
				$("#total_discount").val("");
				$("#net_invoice_amount").val(total);
				tot_adj_amount = parseFloat($("#prev_outstanding_amount").val())+parseFloat($("#total").val());	
				$("#total_outstanding_amount").val(tot_adj_amount);									  
			}
		//}else{  alert("Please select discount type");		}	
	});							
	
	$("#invoice_save").click(function()
	{
		var invoice_no 			      = $("#inv_id").val();
		var ref_no 				      = $("#ref_no").val()
		var delivery_date 			  = $("#delivery_date").val();
		var product_order_ids   = $("#product_order_ids").val();
		var order_nos 				  = $("#order_nos").val();	
		var mr_id 					  = $("#mr_id").val(); 
		var  sr_id 						  = $("#sr_id").val();															
		var customer_id 			  = $("#customer_id").val();
		var prev_due 				  = $("#prev_outstanding_amount").val();
		var total_due 				  = $("#total_outstanding_amount").val();
		var total_discount 		  = $("#total_discount").val();
		var net_invoice_amount = $("#net_invoice_amount").val();
		var discount_percentage = $("#discount_percentage").val();
		var discount_amount 	   = $("#total_discount").val();
		var discount = $("#discount").val();
		var total       = $("#total").val();
		var adjust_amount = $("#adjustment_amount").val();
		
		var productId = [];
		$(".product_id_class").each(function()
		{
			var pid = $(this).attr("id");
			productId.push($('#'+pid).val());
		});							
		
		var pname = [];
		$(".product_name_class").each(function()
		{
		  var pnid = $(this).attr("id");
		  pname.push($('#'+pnid).val());
		});
		
		var pszid = [];
		$(".pack_size_class").each(function()
		{
		  var psid = $(this).attr("id");
		  pszid.push(psid);
		});
		
		var pszid = [];
		$(".pack_size_class").each(function()
		{
		  var psid = $(this).attr("id");
		  pszid.push($('#'+psid).val());
		});								
		
		var unitclass  = [];
		$(".unit_class").each(function()
		{
		  var unid = $(this).attr("id");
		  unitclass.push($('#'+unid).val());
		});									

		var unit_price_class = [];
		$(".unit_price_class").each(function()
		{
		  var upcid = $(this).attr("id");
		  unit_price_class.push(upcid);
		});
		
		var qty_class = [];
		$(".qty_class").each(function()
		{
		  var qtid = $(this).attr("id");
		  qty_class.push($('#'+qtid).val());
		});			

		var bonus_offer_class = [];
		$(".bonus_offer_class").each(function()
		{
		  var bfoid = $(this).attr("id");
		  bonus_offer_class.push($('#'+bfoid).val());
		});	

		var bonus_qty_class = [];
		$(".bonus_qty_class").each(function()
		{
		  var bqtid = $(this).attr("id");
		  bonus_qty_class.push($('#'+bqtid).val());
		});		
		
		var total_price_class = [];
		$(".total_price_class").each(function()
		{
		  var tpid = $(this).attr("id");
		  total_price_class.push($('#'+tpid).val());
		});										
		
		var unit_price_class = [];
		$(".unit_price_class").each(function()
		{
		   var upcid = $(this).attr("id");
		   unit_price_class.push($('#'+upcid).val());
		});
		
	var dataStr = "customer_id="+customer_id+"&order_nos="+order_nos+"&mr_id="+mr_id+"&sr_id="+sr_id+"&invoice_no="+invoice_no+
		"&ref_no="+ref_no+"&delivery_date="+delivery_date+"&product_order_ids="+product_order_ids+"&prev_due="+prev_due
		+"&total_due="+total_due+"&net_invoice_amount="+net_invoice_amount+"&discount_percentage="+discount_percentage+
		"&discount_amount="+discount_amount+"&total_outstanding_amount="+total_due+"&product_id_list="+productId+"&product_name_list="+pname+
		"&pack_size_list="+pszid+"&unit_list="+unitclass+"&quantity_list="+qty_class+"&bonus_offer_list="+bonus_offer_class+"&bonus_qty_list="+bonus_qty_class+
		"&total_price_list="+total_price_class+"&unit_price_list="+unit_price_class+"&discount="+discount+"&total_unit_price="+total;		

		if(ref_no=="")
		{	
			alert("Enter reference number");
			$("#ref_no").focus();
			return false;
		}
		else if(delivery_date=="")
		{
		   alert("Enter delivery date");
		   $("#delivery_date").focus();
		   return false;
		}
		else
		{								
			$.ajax({
			   type:"post" ,
			   url:"includes/customer_invoice_add_by_ajax.php",
			   data:dataStr ,
			   cache:false ,
			   success:function(st)
			    {
					alert(st);
			    }
			});
			
			
				var uurl	="../decent_tem/html2pdf/customer_invoice_view.php?customer_id="+customer_id
				+"&invoice_no="+invoice_no+"&prev_outstanding_amount="+prev_due+
				"&total_outstanding_amount="+total_due+"&adjustment_amount="+adjust_amount+
				"&discount="+total_discount+"&net_invoice_amount="+net_invoice_amount+"&total_price="+total;		 
				if (window.showModalDialog)
				{
							window.showModalDialog(uurl,"mywindow",
							"dialogWidth:1024px;dialogHeight:768px");
							
				} 
				else 
				{
						mywindow= window.open ("popup.html", "mywindow","menubar=0,toolbar=0,location=0,resizable=1,status=1,scrollbars=1,width=1024px,height=768px");
						mywindow.moveTo(300,300);
						if (window.focus)
							mywindow.focus();
				}			
			    location.reload();
		
		}	
	});							
});
</script>