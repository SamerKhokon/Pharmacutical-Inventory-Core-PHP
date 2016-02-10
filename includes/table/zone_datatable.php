<?php include("../../db.php");  
       /**************************************
	     DB Connection check
	   **************************************
	   if($con) echo 1;else echo 0;
	   ***************************************/
	   session_start();
	   $company_id = $_SESSION["COMPANY_ID"];
	   $str = "SELECT 	`zone_id`, `depot_id`, 
	(SELECT depot_name FROM `inv_depot_info` WHERE depot_id=a.depot_id) AS depot_name,
	`zone_name`, `mio_id`,(SELECT emp_name FROM `hr_employee_info` WHERE employee_id=a.mio_id) AS  mio_name, 
	`sv_id`, (SELECT emp_name FROM `hr_employee_info` WHERE employee_id=a.sv_id) AS sv_name,
	`entry_by`, `entry_date`, `last_update_by`, `last_update_date`, `company_id`, `active_flag`	 
	FROM 	`decent_pharma_db`.`inv_customer_zone` AS a	WHERE company_id=$company_id";
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
					<th>Zone</th>
					<th>Depo</th>
					<th>M.I.O</th>
					<th>S.V</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>		
			
			     <?php  while($res = mysql_fetch_assoc($sql) ) {			 
				                  $zone_id 			  = $res['zone_id'];
								  $zone_name     = $res['zone_name'];
								  $depot_name = $res['depot_name'];
								  $mio_name            = $res['mio_name'];								  
								  $sv_name              = $res['sv_name'];								  
				 ?>
				 <tr class="gradeA">
				   <td align="center"><?php echo $zone_name;?></td>
				   <td align="center"><?php echo $depot_name;?></td>
				   <td align="center"><?php echo $mio_name;?></td>
				   <td align="center"><?php echo $sv_name;?></td>				   
				  <td align="center">
                  <a class="various1" href="#inline1" title="" onclick="view_data('<?php echo $zone_id;?>');"><img src="./media/images/view-icone-6308-128.png" width="20" height="20" alt="View" title="View"></a>
                  <a class="various2" href="#inline2" title="" onclick="edit_data('<?php echo $zone_id;?>');"><img src="./media/images/edit-notes.png" width="20" height="20" alt="Edit" title="Edit"></a>
                  <a href="javascript:void(0);" id="<?php echo $zone_id; ?>" class="zone_delete"><img src="./media/images/Delete_Icon.png" width="20" height="20" alt="Delete" title="Delete"></a></td>
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
				</tr>
			</tfoot>
		</table>
</div>
