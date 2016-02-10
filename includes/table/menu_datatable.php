

<?php	session_start();
	   	include("../../db.php");  
       	/**************************************
	     DB Connection check
	   	**************************************
	   	if($con) echo 1;else echo 0;
	   	***************************************/
	   	$company_id = $_SESSION["COMPANY_ID"];
	   	$str = "SELECT * FROM st_menu_info WHERE active_flag='Y'";
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
		/*$(".various1").fancybox({
			'titlePosition'		: 'inside',
			'transitionIn'		: 'none',
			'transitionOut'		: 'none'
		});
		$(".various2").fancybox({
			'titlePosition'		: 'inside',
			'transitionIn'		: 'none',
			'transitionOut'		: 'none'
		});*/

	} );
</script>
<div id="demo">
	<h1>Menu</h1>
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
        <thead class="tab_head">
        	<tr>
                <th>Menu Name</th>
                <th>Menu Contant</th>
                <th>Module</th>
                <th>Child Of</th>
                <th>Submenu</th>
                <th>Menu Order</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>		
		<?php  
		while($res = mysql_fetch_array($sql) ) {			 
			$menu_id = $res['menu_id'];
			$menu_name = $res['menu_name'];
			$menu_contant = $res['menu_contant'];
			$module_id = $res['module_id'];
			$module_name = '-';
			$sql_module = "select module_name from st_module_info where active_flag='Y' and module_id=$module_id";
			$res_module = mysql_query($sql_module);
			if($row_module = mysql_fetch_array($res_module))
				$module_name = $row_module['module_name'];				
			$sub_menu_flag = $res['sub_menu_flag'];
			$sub_menu = 'Yes';
			if($sub_menu_flag==0)
				$sub_menu = 'No';
				
			$mother_menu_id   = $res['mother_menu_id'];
			$mother_menu = '';
			$sql_mother_menu = "select menu_name from st_menu_info where active_flag='Y' and menu_id=$mother_menu_id";
			$res_mother_menu = mysql_query($sql_mother_menu);
			if($row_mother_menu = mysql_fetch_array($res_mother_menu))
			{
				$mother_menu = $row_mother_menu['menu_name'];
			}
			$menu_order = $res['menu_order'];
         ?>
             <tr class="gradeA">
               <td align="center"><?php echo $menu_name;?></td>
               <td align="center"><?php echo $menu_contant;?></td>
               <td align="center"><?php echo $module_name;?></td>
               <td align="center"><?php echo $mother_menu;?></td>
               <td align="center"><?php echo $sub_menu;?></td>
               <td align="center"><?php echo $menu_order;?></td>
              <td align="center">
                   <a class="various1" id="various1" href="#inline1" title="" onclick="view_data('<?php echo $menu_id;?>');"><img src="./media/images/view-icone-6308-128.png" width="20" height="20" alt="View" title="View"></a>
                  <a class="various2" href="#inline2" title="" onclick="edit_data('<?php echo $menu_id;?>');"><img src="./media/images/edit-notes.png" width="20" height="20" alt="Edit" title="Edit" onclick="edit_data('<?php echo $menu_id;?>');"></a>
                  <a href="javascript:void(0);" id="<?php echo $menu_id;?>" class="menu_delete"><img src="./media/images/Delete_Icon.png" width="20" height="20" alt="Delete" title="Delete"></a>
              </td>
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




      