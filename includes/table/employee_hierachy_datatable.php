<?php include("../../db.php");  
       /**************************************
	     DB Connection check
	   **************************************
	   if($con) echo 1;else echo 0;
	   ***************************************/
	   session_start();
	   $company_id = $_SESSION["COMPANY_ID"];
	   $str = "SELECT 	`eh_id`,`employee_id`,
(SELECT emp_name FROM `hr_employee_info` WHERE employee_id=a.employee_id) AS emp_name,	
 `superior_emp_id`, 
 (SELECT emp_name FROM `hr_employee_info` WHERE employee_id=a.superior_emp_id) AS superior_emp_name,
 `company_id`, `entry_by`, `entry_date`, `last_update_by`, `last_update_date`, `active_flag`	 
	FROM `decent_pharma_db`.`hr_employee_hierarchy` AS a
WHERE company_id=$company_id";

	   $sql = mysql_query($str);
	   
?>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
    	$('#example').dataTable( {
        	"sPaginationType": "full_numbers"
        });
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
    <div id="inline1" class="pop_div"></div>
</div>
<div style="display: none;">
	<div id="inline2" class="pop_div"></div>
</div>

<div id="demo">
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
        <thead class="tab_head">
            <tr>
                <th>Employee</th>
                <th>Superior Employee</th>
                <th>Action</th>
            </tr>
        </thead>
		<tbody>		
		<?php  
		while($res = mysql_fetch_assoc($sql) ) 
		{			 
			$eh_id 			  = $res['eh_id'];
			$emp_name = $res['emp_name'];
			$superior_emp_name 					      = $res['superior_emp_name'];
			$employee_id            = $res['employee_id'];								  
			$superior_emp_id = $res['superior_emp_id'];								  
		?>
            <tr class="gradeA">
                <td align="center"><?php echo $emp_name;?></td>
                <td align="center"><?php echo $superior_emp_name;?></td>
                <td align="center">
                <a class="various1" href="#inline1" title="" onclick="view_data('<?php echo $eh_id;?>');"><img src="./media/images/view-icone-6308-128.png" width="20" height="20" alt="View" title="View"></a>
                <a class="various2" href="#inline2" title="" onclick="edit_data('<?php echo $eh_id;?>');"><img src="./media/images/edit-notes.png" width="20" height="20" alt="Edit" title="Edit"></a>
                <a href="javascript:void(0);" id="<?php echo $eh_id; ?>" class="employee_hierachy_delete"><img src="./media/images/Delete_Icon.png" width="20" height="20" alt="Delete" title="Delete"></a></td>
            </tr>		 
		<?php 
		} ?>				 
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