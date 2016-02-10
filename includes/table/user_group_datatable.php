<?php	session_start(); include("../../db.php");  
       /**************************************
	     DB Connection check
	   **************************************
	   if($con) echo 1;else echo 0;
	   ***************************************/
	   
	   $company_id = $_SESSION["COMPANY_ID"];
	   $str = "SELECT * FROM st_user_group WHERE company_id=$company_id and active_flag='Y'";
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
		<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
			<thead class="tab_head">
				<tr>
					<th>User Group</th>
					<th>Modules</th>
					<th>Menus</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>		
			
			<?php  
			while($res = mysql_fetch_array($sql) ) {			 
				$user_group_id = $res['user_group_id'];
				$user_group = $res['user_group'];
				$module_ids = $res['module_ids'];
				$menu_ids = $res['menu_ids'];
				$module_names = '';
				$sql_mdl = "select * from st_module_info where module_id in ($module_ids) and active_flag='Y'";
				$res_mdl = mysql_query($sql_mdl);
				$i=0;
				while($row_mdl = mysql_fetch_array($res_mdl))
				{
					if($i<4)
					{
						if($i==0)
							$module_names.=$row_mdl['module_name'];
						else
							$module_names.=', '.$row_mdl['module_name'];	
					}
					else
					{
					 	$module_names.=',<br />'.$row_mdl['module_name'];	 		
						$i=0;
					}	
					$i++;	
				}
				$menu_names = '';
				$sql_mm = "select * from st_menu_info where active_flag='Y' and menu_id in($menu_ids)";
				$res_mm = mysql_query($sql_mm);
				$j=0;
				while($row_mm = mysql_fetch_array($res_mm))
				{
					if($menu_names=='')
						$menu_names.=$row_mm['menu_name'];
					else
						$menu_names.=', '.$row_mm['menu_name'];	
				}
				?>
				<tr class="gradeA">
					<td align="center"><?php echo $user_group;?></td>
				   	<td align="center"><?php echo $module_names;?></td>
				   	<td align="center"><?php echo $menu_names;?></td>
				  	<td align="center">
                  <a class="various1" href="#inline1" title="View Data" onclick="view_data('<?php echo $user_group_id;?>');"><img src="media/images/view-icone-6308-128.png" width="20" height="20" alt="View" title="View"></a>
                  <a href="javascript:void(0);" title="Edit Data" onclick="edit_data('<?php echo $user_group_id;?>');"><img src="media/images/edit-notes.png" width="20" height="20" alt="Edit" title="Edit"></a>
                  <a href="javascript:void(0);" title="Delete Data" id="<?php echo $user_group_id;?>" class="department_delete"><img src="media/images/Delete_Icon.png" width="20" height="20" alt="Delete" title="Delete"></a></td>
				</tr>		 
			<?php } ?>				 
			</tbody>
			<tfoot class="tab_fot">				
				<tr>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>					
				</tr>
			</tfoot>
		</table>
</div>