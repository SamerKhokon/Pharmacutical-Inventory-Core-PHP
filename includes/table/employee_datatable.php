<?php include("../../db.php");  
       /**************************************
	     DB Connection check
	   **************************************
	   if($con) echo 1;else echo 0;
	   ***************************************/
	  
	   session_start();
	   $company_id = $_SESSION["COMPANY_ID"];
	  $str = "SELECT `employee_id`,`employee_code`, dept_id,
 (SELECT designation_code FROM hr_emp_designation WHERE `designation_id`=a.designation_id) AS designation, 
 `emp_name`, `emp_father`, `emp_mother`, `emp_pre_address`, `emp_par_address`,
  `emp_contact_no`, `emp_dob`, `emp_national_id`, `emp_passport_no`, `emp_dl_no`,
   `emp_maritual_status`, `prev_experience`, `emp_bank_acc_no`, `emp_edu_qualification`,
    `joining_date`, `leaving_date`, `emp_type`, `last_promotion_date`, `entry_by`,
     `entry_date`, `last_update_by`, `last_update_date`, `company_id`, `active_flag`
  FROM `decent_pharma_db`.`hr_employee_info` AS a WHERE company_id=$company_id";
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
					<th>Employee Name</th>
					<th>Department</th>
					<th>Designation</th>
					<th>Address</th>
					<th>Contact No</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>		
			
			     <?php  while($res = mysql_fetch_assoc($sql) ) {			 
				                  $employee_id = $res['employee_id'];
								  $employee_code = $res['employee_code'];
								  $employee_name = $res['emp_name'];
								  $dept_id = $res['dept_id'];
								  $department_name = get_dept_name($dept_id,$company_id);								  
								  $designation = $res['designation'];								  
								  $emp_par_address = $res['emp_par_address'];								  
								  $emp_contact_no = $res['emp_contact_no'];
								  
				 ?>
				 <tr class="gradeA">
				   <td align="center"><?php echo $employee_name;?></td>
				   <td align="center"><?php echo $department_name;?></td>
				   <td align="center"><?php echo $designation;?></td>
				   <td align="center"><?php echo $emp_par_address;?></td>
				   <td align="center"><?php echo $emp_contact_no;?></td>				   
				  <td align="center">
                  <a class="various1" href="#inline1" title="" onclick="view_data('<?php echo $employee_id;?>');"><img src="./media/images/view-icone-6308-128.png" width="20" height="20" alt="View" title="View"></a>
                  <a class="various2" href="#inline2" title="" onclick="edit_data('<?php echo $employee_id;?>');"><img src="./media/images/edit-notes.png" width="20" height="20" alt="Edit" title="Edit"></a>
                  <a href="javascript:void(0);" id="<?php echo $employee_id; ?>" class="employee_delete"><img src="./media/images/Delete_Icon.png" width="20" height="20" alt="Delete" title="Delete"></a></td>
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
				</tr>
			</tfoot>
		</table>
</div>
<?php
       function get_dept_name($dept_id,$company_id) {
	        $str = "SELECT dept_code FROM `hr_emp_dept_info` WHERE company_id=$company_id AND dep_id=$dept_id";
		   $sql =  mysql_query($str);
		   $res = mysql_fetch_row($sql);
		   return $res[0];
	   }
?>