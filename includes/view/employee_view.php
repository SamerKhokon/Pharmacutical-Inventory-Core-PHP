<?php   include("../../db.php");
	
	$employee_id = $_REQUEST['id'];              
	$str = "select * from hr_employee_info where employee_id=$employee_id";
	$sql = mysql_query($str);
	$data = "";
	if($row = mysql_fetch_array($sql))
	{
		$data = $row['employee_code']."|".$row['dept_id'].",".$row['designation_id']."|".$row['emp_name']."|".$row['emp_father']."|".$row['emp_mother']."|".$row['emp_pre_address']."|".$row['emp_par_address']."|".$row['emp_contact_no']."|".$row['emp_dob']."|".$row['emp_national_id']."|".$row['emp_passport_no']."|".$row['emp_dl_no']."|".$row['emp_maritual_status']."|".$row['prev_experience']."|".$row['emp_bank_acc_no']."|".$row['emp_edu_qualification']."|".$row['joining_date']."|".$row['emp_gender'];
		
	?>
	<h1 class="pop_head"> Employee Information </h1>

    <table class="pop_table">
        <tr>
            <td valign="top">Employee Code </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['employee_code'];?></td>
        </tr>
        <tr>
            <td valign="top">Department  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo get_department_name($row['dept_id']);?></td>
        </tr>
        <tr>
            <td valign="top">Designation  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo get_designation_name($row['designation_id']);?></td>
        </tr>
        <tr>
            <td valign="top">Employee Name </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['emp_name'];?></td>
        </tr>
        <tr>
            <td valign="top">Employee Father Name  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['emp_father'];?></td>
        </tr>
        <tr>
            <td valign="top">Employee Mother Name</td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['emp_mother'];?></td>
        </tr>
        <tr>
            <td valign="top">Employee Permanent Address </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['emp_pre_address'];?></td>
        </tr>
        <tr>
            <td valign="top">Employee Parmanent Address </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['emp_par_address'];?></td>
        </tr>
        <tr>
            <td valign="top">Employee Contact No  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['emp_contact_no'];?></td>
        </tr>
        <tr>
            <td valign="top">Employee Joining Date  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['joining_date'];?></td>
        </tr>
        <tr>
            <td valign="top">Gender  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['emp_gender'];?></td>
        </tr>
        <tr>
            <td valign="top">Birthdate  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['emp_dob'];?></td>
        </tr>
         <tr>
            <td valign="top">Marital Status </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['emp_maritual_status'];?></td>
        </tr>
         <tr>
            <td valign="top">National ID  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['emp_national_id'];?></td>
        </tr>
        <tr>
            <td valign="top">Bank Account No </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['emp_bank_acc_no'];?></td>
        </tr>
        <tr>
            <td valign="top">Previous Experience </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['prev_experience'];?></td>
        </tr>
        <tr>
            <td valign="top">Educational Qualification </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['emp_edu_qualification'];?></td>
        </tr>
         <tr>
            <td valign="top">Driving License No </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['emp_dl_no'];?></td>
        </tr>
        <!--
		<tr>
        	<td></td>
            <td></td>
            <td><input type="button" id="btn_close" value="OK" onclick="close_popup();" /></td>
        </tr>
		-->
    </table> 
    <?php
	}
	function get_department_name($dept_id)
	{
		$sql_dept = "select dept_name from hr_emp_dept_info where active_flag='Y' and dep_id=$dept_id";
		$res_dept = mysql_query($sql_dept);
		if($row_dept = mysql_fetch_array($res_dept))
			echo $row_dept[0];
		else
			echo '-';	
	}
	function get_designation_name($designation_id)
	{
		$sql_desi = "select designation from hr_emp_designation where active_flag='Y' and designation_id=$designation_id";
		$res_desi = mysql_query($sql_desi);
		if($row_desi = mysql_fetch_array($res_desi))
			echo $row_desi[0];
		else
			echo '-';	
	}
	function get_mother_menu($mmid)
	{
		if($mmid!=0)
		{
			$sql_mm = "select menu_name from st_menu_info where active_flag='Y' and menu_id=$mmid";
			$res_mm = mysql_query($sql_mm);
			if($row_mm = mysql_fetch_array($res_mm))
				echo $row_mm[0];
			else
				echo '-';		
		}
		else
		{
			echo 'None';
		}	
	}
?>                                                                                                