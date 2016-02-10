<?php include("../../db.php");  
       /**************************************
	     DB Connection check
	   **************************************
	   if($con) echo 1;else echo 0;
	   ***************************************/
	   session_start();
	   $company_id = $_SESSION["COMPANY_ID"];
	   $str = "SELECT a.challan_no,a.invoice_no,a.ref_no,a.transfer_from,(SELECT depot_name FROM `inv_depot_info` WHERE depot_id=a.transfer_from) AS transfer_from_depo,
				a.transfer_from_code,a.transfer_to,	(SELECT depot_name FROM `inv_depot_info` WHERE depot_id=a.transfer_to) AS  transfer_to_depo,
				a.transfer_to_code,a.transport_id,(SELECT vehicle_name FROM `vehicle_info` WHERE vehicle_id=a.transport_id) AS  transport_name,
				a.transport_type,a.load_supervised_by,(SELECT emp_name FROM `hr_employee_info` WHERE employee_id=a.load_supervised_by) AS supervisor_name,
				a.in_charge_emp_id,(SELECT emp_name FROM `hr_employee_info` WHERE employee_id=a.in_charge_emp_id) AS in_charge_name,
				a.delivery_date,a.process_status,b.ddpt_id,b.product_id,
				(SELECT product_name FROM product_info WHERE product_id=b.product_id) AS product_name,
				b.product_code,b.pac_size_id,b.pack_size,b.product_unit_id,b.product_unit,b.product_unit_id,
				b.product_unit,b.product_quantity,b.product_bonus_quantity,b.unit_price,b.total_unit_price
				FROM `product_transfer_info` AS  a,`transfering_product_info` AS b WHERE a.company_id=$company_id";
				
	
	   $sql = mysql_query($str);
	   
?>
			<script type="text/javascript" charset="utf-8">
                $(document).ready(function() {
                    $('#example').dataTable( {
                        "sPaginationType": "full_numbers"
                    } );
					$(".various1").fancybox({
				'titlePosition'		: 'inside',
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});
		$(".various2").fancybox({
				'titlePosition'		: 'inside',
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});
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
					<th>Challan No</th>
					<th>Invoice No</th>
					<th>Ref No</th>
					<th>From Depot</th>
					<th>To Depot</th>					
					<th>Transport</th>
					<th>Supervisor</th>
					<th>In Charge</th>
					<th>Product</th>
					<th>Pack Size</th>	
					<th>Unit</th>	
					<th>Unit Price</th>						
					<th>Quantity</th>																
					<th>Action</th>																					
				</tr>
			</thead>
			<tbody>						   
<?php  
				while($res = mysql_fetch_assoc($sql) ) 
				{			 
					$challan_no = $res['challan_no'];
					$invoice_no = $res['invoice_no'];
					$ref_no = $res['ref_no'];
					$transfer_from_depo = $res['transfer_from_depo'];
					$transfer_from_code	= $res['transfer_from_code'];
					$transfer_to_depo = $res['transfer_to_depo'];
					$transfer_to_code = $res['transfer_to_code'];
					$transport_name = $res['transport_name'];
					$transport_type = $res['transport_type'];
					$supervisor_name = $res['supervisor_name'];
					$in_charge_name = $res['in_charge_name'];
					$delivery_date = $res['delivery_date'];
					$process_status	= $res['process_status'];
					$product_name = $res['product_name'];
					$product_code = $res['product_code'];
					$pack_size = $res['pack_size'];
					$product_unit = $res['product_unit'];
					$product_quantity = number_format($res['product_quantity']);
					$product_bonus_quantity = number_format($res['product_bonus_quantity']);
					$unit_price = $res['unit_price'];
					$total_unit_price = $res['total_unit_price'];		
	 
				 ?>
				 <tr class="gradeA">
				   <td align="center"><?php echo $challan_no;?></td>
				   <td align="center"><?php echo $invoice_no;?></td>
				   <td align="center"><?php echo $ref_no;?></td>
				   <td align="center"><?php echo $transfer_from_depo;?></td>
				   <td align="center"><?php echo $transfer_to_depo;?></td>				   
				   <td align="center"><?php echo $transport_name;?></td>				   				   
				   <td align="center"><?php echo $supervisor_name;?></td>				   				   
				   <td align="center"><?php echo $in_charge_name;?></td>
				   <td align="center"><?php echo $product_name;?></td>
				   <td align="center"><?php echo $pack_size;?></td>				   
				   <td align="center"><?php echo $product_unit;?></td>				
   				   <td align="center"><?php echo $unit_price;?></td>				   				   							   				   
				   <td align="center"><?php echo $product_quantity;		?></td>				   				   
				  <td align="center">
                  <a class="various1" href="#inline1" title="" onclick="view_data('<?php echo $company_id;?>');"><img src="./media/images/view-icone-6308-128.png" width="20" height="20" alt="View" title="View"></a></td>
				 </tr>		 
	<?php  } ?>				 
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
		function  get_zone($zone_id , $company_id ) 
		{
			  $str = "SELECT zone_name FROM `inv_customer_zone` WHERE company_id=$company_id AND `zone_id`=$zone_id";
			  $sql = mysql_query($str);
			  $res = mysql_fetch_row($sql);
			  return $res[0];
		}
		
		function get_depo($depo_id , $company_id) 
		{
			  $str = "SELECT depot_name FROM `inv_depot_info` WHERE company_id=$company_id AND depot_id=$depo_id";
			  $sql = mysql_query($str);
			  $res = mysql_fetch_row($sql);
			  return $res[0];		
		}
?>