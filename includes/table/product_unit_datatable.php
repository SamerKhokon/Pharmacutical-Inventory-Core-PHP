<?php include("../../db.php");  
       /**************************************
	     DB Connection check
	   **************************************
	   if($con) echo 1;else echo 0;
	   ***************************************/
	   session_start();
	   $company_id = $_SESSION["COMPANY_ID"];
	   $str = "SELECT * FROM `product_unit_info` WHERE company_id=$company_id";
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
					<th>Product Unit</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>		
			
			     <?php  while($res = mysql_fetch_array($sql) ) {			 
				                  $product_unit_id = $res[0];
								  $product_unit_name = $res[1];
				 ?>
				 <tr class="gradeA">
				   <td align="center"><?php echo $product_unit_name;?></td>
				  <td align="center">
                  <a class="various1" href="#inline1" title="" onclick="view_data('<?php echo $product_unit_id;?>');"><img src="./media/images/view-icone-6308-128.png" width="20" height="20" alt="View" title="View"></a>
                   <a class="various2" href="#inline2" title="" onclick="edit_data('<?php echo $product_unit_id;?>');"><img src="./media/images/edit-notes.png" width="20" height="20" alt="Edit" title="Edit"></a>
                  <a href="javascript:void(0);" id="<?php echo $product_unit_id; ?>" class="product_unit_delete"><img src="./media/images/Delete_Icon.png" width="20" height="20" alt="Delete" title="Delete"></a></td>
				 </tr>		 
				 <?php } ?>				 
			</tbody>
			<tfoot class="tab_fot">				
				<tr>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
									
				</tr>
			</tfoot>
		</table>
</div>