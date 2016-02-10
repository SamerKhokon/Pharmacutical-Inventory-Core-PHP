<?php   include("../../db.php");?>
<script>
	$(function() {
		$( "#joining_date_e" ).datepicker();
	});
	$(function() {
		$( "#emp_dob_e" ).datepicker();
	});
</script>
<?php
	
	$employee_id = $_REQUEST['id'];              
	$str = "select *, date_format(`joining_date`,'%m/%d/%Y') as jdt, date_format(`emp_dob`,'%m/%d/%Y') as dobdt  from hr_employee_info where employee_id=$employee_id";
	$sql = mysql_query($str);
	$data = "";
	if($row = mysql_fetch_array($sql))
	{
		//$data = $row['employee_code']."|".$row['dept_id'].",".$row['designation_id']."|".$row['emp_name']."|".$row['emp_father']."|".$row['emp_mother']."|".$row['emp_pre_address']."|".$row['emp_par_address']."|".$row['emp_contact_no']."|".$row['emp_dob']."|".$row['emp_national_id']."|".$row['emp_passport_no']."|".$row['emp_dl_no']."|".$row['emp_maritual_status']."|".$row['prev_experience']."|".$row['emp_bank_acc_no']."|".$row['emp_edu_qualification']."|".$row['joining_date']."|".$row['emp_gender'];
		
	?>
	<h1 class="pop_head"> Employee Information </h1>
     <input type="hidden" id="employee_id_e" value="<?php echo $employee_id;?>"/>

    <table class="pop_table">
        <tr>
            <td valign="top">Employee Code </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <input type="text" class="edit_input" name="employee_code" id="employee_code_e" value="<?php echo $row['employee_code'];?>" /></td>
        </tr>
        <tr>
            <td valign="top">Department  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <select id="dept_id_e" class="edit_select" >
			<option><?php echo get_department_dropdown($row['dept_id']);?></option>
			</select></td>
        </tr>
        <tr>
            <td valign="top">Designation  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;
            <select id="designation_id_e" class="edit_select" >
            <option><?php echo get_designation_dropdown($row['designation_id']);?></option>
           </select></td>
        </tr>
        <tr>
            <td valign="top">Employee Name  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <input type="text" class="edit_input" name="emp_name" id="emp_name_e" value="<?php echo $row['emp_name'];?>" /></td>
        </tr>
        <tr>
            <td valign="top">Employee Father Name </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <input type="text" class="edit_input" name="emp_father" id="emp_father_e" value="<?php echo $row['emp_father'];?>" /></td>
        </tr>
        <tr>
            <td valign="top">Employee Mother Name  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <input type="text" class="edit_input" name="emp_mother" id="emp_mother_e" value="<?php echo $row['emp_mother'];?>" /></td>
        </tr>
        <tr>
            <td valign="top">Employee Permanent Address  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">&nbsp;&nbsp; <textarea class="edit_input" name="emp_pre_address" id="emp_pre_address_e" value="<?php echo $row['emp_pre_address'];?>"><?php echo $row['emp_pre_address'];?></textarea></td>
        </tr>
        <tr>
            <td valign="top">Employee Parmanent Address </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">&nbsp;&nbsp; <textarea class="edit_input" name="emp_par_address" id="emp_par_address_e" value="<?php echo $row['emp_par_address'];?>"><?php echo $row['emp_par_address'];?></textarea></td>
        </tr>
        <tr>
            <td valign="top">Employee Contact No  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <input type="text" class="edit_input" name="emp_contact_no" id="emp_contact_no_e" value="<?php echo $row['emp_contact_no'];?>" /></td>
        </tr>
        <tr>
            <td valign="top">Employee Joining Date </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <input type="text" class="edit_input" name="joining_date" id="joining_date_e" value="<?php echo $row['jdt'];?>" /></td>
        </tr>
        <tr>
            <td valign="top">Gender  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <select id="emp_gender_e" class="edit_select">
            	<option value=""></option>
                <option value="Male" <?php if($row['emp_gender']=='Male'){ echo 'selected';}?>>Male</option>
                <option value="Female" <?php if($row['emp_gender']=='Female'){ echo 'selected';}?>>Female</option>
            </select>
			</td>
        </tr>
        <tr>
            <td valign="top">Birthdate </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <input type="text" class="edit_input" name="emp_dob" id="emp_dob_e" value="<?php echo $row['dobdt'];?>" /></td>
        </tr>
         <tr>
            <td valign="top">Marital Status  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; 
			
            <select id="emp_maritual_status_e" class="edit_select">
								<option value="">Select Marital Status</option>
								<option value="Married" <?php if($row['emp_maritual_status']=='Married'){ echo 'selected';}?>>Married</option>
                                <option value="Bachelor" <?php if($row['emp_maritual_status']=='Bachelor'){ echo 'selected';}?>>Bachelor</option>
                                <option value="Widow" <?php if($row['emp_maritual_status']=='Widow'){ echo 'selected';}?>>Widow</option>
							</select>
			</td>
        </tr>
         <tr>
            <td valign="top">National ID  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <input type="text" class="edit_input" name="emp_national_id" id="emp_national_id_e" value="<?php echo $row['emp_national_id'];?>" /></td>
        </tr>
        <tr>
            <td valign="top">Bank Account No </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <input type="text" class="edit_input" name="emp_bank_acc_no" id="emp_bank_acc_no_e" value="<?php echo $row['emp_bank_acc_no'];?>" /></td>
        </tr>
        <tr>
            <td valign="top">Previous Experience </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">&nbsp;&nbsp; <textarea class="edit_input" name="prev_experience" id="prev_experience_e" value="<?php echo $row['prev_experience'];?>" ><?php echo $row['prev_experience'];?></textarea></td>
        </tr>
        <tr>
            <td valign="top">Educational Qualification </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">&nbsp;&nbsp; <textarea class="edit_input" name="emp_edu_qualification" id="emp_edu_qualification_e" value="<?php echo $row['emp_edu_qualification'];?>" ><?php echo $row['emp_edu_qualification'];?></textarea></td>
        </tr>
         <tr>
            <td valign="top">Driving License No</td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <input type="text" class="edit_input" name="emp_dl_no" id="emp_dl_no_e" value="<?php echo $row['emp_dl_no'];?>" /></td>
        </tr>
       
    </table> 
    <div  class="edit_btm"> <input type="button" class="btn_save" id="btn_employee_update" value="Update" onclick="close_popup();" /></div>
    <?php
	}
	
	function get_department_dropdown($dept_id)
		{
			global $option3;
			 $str = "SELECT dep_id,dept_name,dept_code FROM `hr_emp_dept_info` ";
			$sql =mysql_query($str);
			while($res = mysql_fetch_array($sql)) 
			{
			if($res[0] == $dept_id){
				$option3 .= "<option selected='selected'  value='".$res[0]."'>".$res[2]."</option>";
			}else{
				$option3 .= "<option   value='".$res[0]."'>".$res[2]."</option>";
				}
			}
			return $option3;
		}	
	
	
	
	function get_designation_dropdown($designation_id)
		{
			global $option2;
			$str = "SELECT designation_id,designation,designation_code FROM `hr_emp_designation` ";
			$sql =mysql_query($str);
			while($res = mysql_fetch_array($sql)) 
			{
			if($res[0] == $designation_id){
				$option2 .= "<option selected='selected'  value='".$res[0]."'>".$res[2]."</option>";
				}else{
					$option2 .= "<option   value='".$res[0]."'>".$res[2]."</option>";
					}
			}
			return $option2;
		}
	
	
?> 
<script type="text/javascript">
$(document).ready(function(){

  $("#btn_employee_update").click(function(){
     	var 	employee_id = $("#employee_id_e").val();	
		var employee_code = $("#employee_code_e").val();
		var dept_id = $("#dept_id_e").val();
		var designation_id = $("#designation_id_e").val();
		var emp_name = $("#emp_name_e").val();
		var emp_father = $("#emp_father_e").val();
		var emp_mother = $("#emp_mother_e").val();
		var emp_pre_address = $("#emp_pre_address_e").val();
		var emp_par_address = $("#emp_par_address_e").val();
		var emp_contact_no = $("#emp_contact_no_e").val();
		var emp_gender = $("#emp_gender_e").val();
		var emp_dob = $("#emp_dob_e").val();
		var emp_national_id = $("#emp_national_id_e").val();
		var emp_bank_acc_no = $("#emp_bank_acc_no_e").val();
		var emp_maritual_status = $("#emp_maritual_status_e").val();
		var prev_experience = $("#prev_experience_e").val();
		var emp_edu_qualification = $("#emp_edu_qualification_e").val();
		var emp_dl_no = $("#emp_dl_no_e").val();
		var joining_date = $("#joining_date_e").val();
		
		var dataStr = "employee_id="+employee_id+"&employee_code="+employee_code+"&dept_id="+dept_id+"&designation_id="+designation_id+"&emp_name="+emp_name+"&emp_father="+emp_father+"&emp_mother="+emp_mother+"&emp_pre_address="+emp_pre_address+"&emp_par_address="+emp_par_address+"&emp_contact_no="+emp_contact_no+"&emp_gender="+emp_gender+"&emp_dob="+emp_dob+"&emp_national_id="+emp_national_id+"&emp_bank_acc_no="+emp_bank_acc_no+"&emp_maritual_status="+emp_maritual_status+"&prev_experience="+prev_experience+"&emp_edu_qualification="+emp_edu_qualification+"&emp_dl_no="+emp_dl_no+"&joining_date="+joining_date;
		$.ajax({
		   type:"post" ,
		   url:"includes/edit/employee_edit_by_ajax.php" ,
		   data:dataStr , 
		   cache:false ,
		   success:function(st){
		      alert(st);
		   }
		});
  });
});
</script>                                                                                                      