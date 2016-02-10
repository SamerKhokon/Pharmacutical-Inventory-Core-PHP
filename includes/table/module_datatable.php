<?php	session_start();
	   	include("../../db.php");  
       	/**************************************
	     DB Connection check
	   	**************************************
	   	if($con) echo 1;else echo 0;
	   	***************************************/
	   	$company_id = $_SESSION["COMPANY_ID"];
	   	$str = "SELECT * FROM st_module_info WHERE active_flag='Y'";
		echo "<br />";

	   	$sql = mysql_query($str);
	   
?>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#example').dataTable( {
			"sPaginationType": "full_numbers",
			"fnDrawCallback": function () {
				// New Trade window:                      
				$(".various1").fancybox({
					'titlePosition'		: 'inside',
					'transitionIn'		: 'none',
					'transitionOut'		: 'none'
				});
				
				// Trade Edit window:
				$(".various2").fancybox({
					'titlePosition'		: 'inside',
					'transitionIn'		: 'none',
					'transitionOut'		: 'none'
				});
			}
		});
	});
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
<h1>Module</h1>
		<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
			<thead class="tab_head">
				<tr>
					<th>Module Name</th>
					<th>Folder</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>		
			 <?php  while($res = mysql_fetch_array($sql) ) {			 
                              $module_id = $res[0];
                              $module_name = $res[1];
                              $module_folder = $res[2];
             ?>
				 <tr class="gradeA">
				   <td align="center"><?php echo $module_name;?></td>
				   <td align="center"><?php echo $module_folder;?></td>
				  <td align="center">
                  <a class="various1" href="#inline1" title="" onclick="view_data('<?php echo $module_id;?>');"><img src="./media/images/view-icone-6308-128.png" width="20" height="20" alt="View" title="View"></a>
                 <a class="various2" href="#inline2" title="" onclick="edit_data('<?php echo $module_id;?>');"><img src="./media/images/edit-notes.png" width="20" height="20" alt="Edit" title="Edit"></a>
                  <a href="javascript:void(0);" id="<?php echo $module_id; ?>" class="module_delete"><img src="./media/images/Delete_Icon.png" width="20" height="20" alt="Delete" title="Delete"></a></td>
				 </tr>		 
				 <?php } ?>				 
			</tbody>
			<tfoot class="tab_fot">				
				<tr>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>					
				</tr>
			</tfoot>
		</table>
</div>