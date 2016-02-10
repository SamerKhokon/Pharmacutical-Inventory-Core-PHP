<?php include("../../db.php");  
	/**************************************
	 DB Connection check
	**************************************
	if($con) echo 1;else echo 0;
	***************************************/
	session_start();
	$company_id = $_SESSION["COMPANY_ID"];
	function get_user_group($company_id, $user_group_id){
		$sql_ug = "select * from `st_user_group` where user_group_id=$user_group_id and company_id=$company_id";
		$res_ug = mysql_query($sql_ug);
		$row_ug = mysql_fetch_array($res_ug);
		return $row_ug['user_group'];			
	}
	
	$str = "SELECT t1.*, (select user_group from st_user_group where user_group_id=t1.user_group_id and company_id=$company_id) as user_group FROM `st_user_info` t1 WHERE t1.company_id=$company_id";
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
					<th>Name</th>
					<th>Login Id</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>		
			     <?php  while($res = mysql_fetch_assoc($sql) ) {			 
				                  $user_id 			  = $res['user_id'];
								  $user_group_id = $res['user_group_id'];
								  $user_full_name            = $res['user_full_name'];								  
								  $user_login_id              = $res['user_login_id'];								  
								  $user_contact_no        = $res['user_contact_no'];
								  $user_email_no        = $res['user_email'];
								  $user_address        = $res['user_address'];
								  //$user_group = $res['user_group'];
								  $user_group = get_user_group($company_id, $user_group_id);
								  								  

				 ?>
				 <tr class="gradeA">
				   <td align="center"><?php echo $user_full_name;?></td>
				   <td align="center"><?php echo $user_login_id;?></td>
				   <td align="center"><?php echo $user_group;?></td>
				  <td align="center">
                  <a class="various1" href="#inline1" title="" onclick="view_data('<?php echo $user_id;?>');"><img src="./media/images/view-icone-6308-128.png" width="20" height="20" alt="View" title="View"></a>
                  <a class="various2" href="#inline2" title="" onclick="edit_data('<?php echo $user_id;?>');"><img src="./media/images/edit-notes.png" width="20" height="20" alt="Edit" title="Edit"></a>
                  <a href="javascript:void(0);" id="<?php echo $user_id ;?>" class="depo_delete"><img src="./media/images/Delete_Icon.png" width="20" height="20" alt="Delete" title="Delete"></a></td>
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