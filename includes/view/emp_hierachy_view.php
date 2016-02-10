<?php   include("../../db.php");
	
	$eh_id = $_REQUEST['id'];              
	$str = "select * from hr_employee_hierarchy where eh_id=$eh_id";
	$sql = mysql_query($str);
	$data = "";
	if($row = mysql_fetch_array($sql))
	{
		$data = $row['employee_id']."|".$row['superior_emp_id'];
		
	?>
	<h1 class="pop_head"> Employee Hierachy Information </h1>

    <table class="pop_table">
       
        <tr>
            <td valign="top">Employee Name </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo get_employee_name($row['employee_id']);?></td>
        </tr>
        <tr>
            <td valign="top">Superior Employee</td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo get_employee_name($row['superior_emp_id']);?></td>
        </tr>
        
        <!--<tr>
        	<td></td>
            <td></td>
            <td><input type="button" id="btn_close" value="OK" onclick="close_popup();" /></td>
        </tr> -->
    </table> 
    <?php
	}
	function get_employee_name($employee_id)
	{
		$sql_md = "select emp_name from hr_employee_info where active_flag='Y' and employee_id=$employee_id";
		$res_md = mysql_query($sql_md);
		if($row_md = mysql_fetch_array($res_md))
			echo $row_md[0];
		else
			echo '-';	
	}
	
	
?>                                                                                                