<?php include("../../db.php");  
       /**************************************
	     DB Connection check
	   **************************************
	   if($con) echo 1;else echo 0;
	   ***************************************/
	   session_start();
	   $company_id = $_SESSION["COMPANY_ID"];
	   $str = "SELECT 	`product_batch_id`, 	`product_batch_code`, `product_id`,	(SELECT product_name FROM `product_info` WHERE product_id=a.product_id) AS product_name, 
	`product_code`, 	`product_quantity`, 	`mfg_date`, 	`exp_date`, 	`entry_by`, 	`entry_date`, 	`last_update_by`, 	`last_update_date`, 
	`company_id`, 	`active_flag`	 FROM 	`decent_pharma_db`.`product_batch_info`  AS a	WHERE company_id=$company_id";
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
					<th>Batch Code</th>
					<th>Product Name</th>
					<th>Product Code</th>
					<th>Quantity</th>
					<th>Mfg Date</th>
					<th>Exp Date</th>					
					<th>Action</th>
				</tr>
			</thead>
			<tbody>		
			
			     <?php  while($res = mysql_fetch_assoc($sql) ) {			 
				                  $product_batch_id 			  = $res['product_batch_id'];
								  $product_batch_code = $res['product_batch_code'];
								  $product_id 					      = $res['product_id'];
								  $product_name            = $res['product_name'];								  
								  $product_code = $res['product_code'];								  
								  $product_quantity        = $res['product_quantity'];								  
								  $mfg_date        = $res['mfg_date'];	
								  $exp_date        = $res['exp_date'];	
				 ?>
				 <tr class="gradeA">
				   <td align="center"><?php echo $product_batch_code;?></td>
				   <td align="center"><?php echo $product_name;?></td>
				   <td align="center"><?php echo $product_code;?></td>
				   <td align="center"><?php echo $product_quantity;?></td>
				   <td align="center"><?php echo $mfg_date;?></td>				   
				   <td align="center"><?php echo $exp_date;?></td>				   				   
				  <td align="center">
                  <a class="various1" href="#inline1" title="" onclick="view_data('<?php echo $product_batch_id;?>');"><img src="./media/images/view-icone-6308-128.png" width="20" height="20" alt="View" title="View"></a>
                  <a class="various2" href="#inline2" title="" onclick="edit_data('<?php echo $product_batch_id;?>');"><img src="./media/images/edit-notes.png" width="20" height="20" alt="Edit" title="Edit"></a>
                  <a href="javascript:void(0);" id="<?php echo $product_batch_id; ?>" class="product_batch_delete"><img src="./media/images/Delete_Icon.png" width="20" height="20" alt="Delete" title="Delete"></a></td>
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
				</tr>
			</tfoot>
		</table>
</div>