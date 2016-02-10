<?php include("../../db.php");  
       /**************************************
	     DB Connection check
	   **************************************
	   if($con) echo 1;else echo 0;
	   ***************************************/
	   session_start();
	   $company_id = $_SESSION["COMPANY_ID"];
	   $str = "SELECT * FROM `inv_customer_info` WHERE company_id=$company_id";
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
					<th>Code</th>
					<th>Name</th>
					<th>Address</th>
					<th>Contact No</th>
					<th>Depo</th>
					<th>Zone</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>		
			
			     <?php  while($res = mysql_fetch_assoc($sql) ) {			 
				                  $customer_id 			  = $res['customer_id'];
								  $customer_code = $res['customer_code'];
								  $customer_name            = $res['customer_name'];								  
								  $customer_addres              = $res['customer_address'];								  
								  $customer_contact_no        = $res['customer_contact_no'];								  
								  $depot_id        = $res['depot_id'];	
								  $zone_id        = $res['zone_id'];	
								  $owner_name        = $res['owner_name'];								  
								  $customer_contact_no        = $res['customer_contact_no'];	
                                   $depo = get_depo($depot_id , $company_id);								  
								   $zone = get_zone($zone_id , $company_id);
				 ?>
				 <tr class="gradeA">
				   <td align="center"><?php echo $customer_code;?></td>
				   <td align="center"><?php echo $customer_name;?></td>
				   <td align="center"><?php echo $customer_addres;?></td>
				   <td align="center"><?php echo $customer_contact_no;?></td>
				   <td align="center"><?php echo $depo;?></td>				   
				   <td align="center"><?php echo $zone;?></td>				   				   
				  <td align="center">
				 <a class="various1" href="#inline1" title="" onclick="view_data('<?php echo $customer_id;?>');"><img src="./media/images/view-icone-6308-128.png" width="20" height="20" alt="View" title="View"></a>
				  <a class="various2" href="#inline2" title="" onclick="edit_data('<?php echo $customer_id;?>');"><img src="./media/images/edit-notes.png" width="20" height="20" alt="Edit" title="Edit"></a>
				  <a href="javascrpt:void(0);" id="<?php echo $customer_id;?>" class="customer_delete"><img src="./media/images/Delete_Icon.png" width="20" height="20" alt="Delete" title="Delete"></a></td>
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