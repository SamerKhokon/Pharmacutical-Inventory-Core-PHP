<?php   include("../../db.php");
	
	$department_id = $_REQUEST['id'];              
	$str = "select * from hr_emp_dept_info where dep_id=$department_id";
	$sql = mysql_query($str);
	$data = "";
	if($row = mysql_fetch_array($sql))
	{
		$data = $row['dept_name']."|".$row['dept_code'].",".$row['dept_address']."|".$row['dept_contact_no']."|".$row['dept_email'];
		
	?>
	<h1 class="pop_head"> Deparment Information </h1>

    <table class="pop_table">
        <tr>
            <td valign="top">Deparment Name </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['dept_name'];?></td>
        </tr>
        <tr>
            <td valign="top">Deparment Code  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['dept_code'];?></td>
        </tr>
        <tr>
            <td valign="top">Department Address </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['dept_address'];?></td>
        </tr>
        <tr>
            <td valign="top">Department Contect No </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['dept_contact_no'];?></td>
        </tr>
         <tr>
            <td valign="top">Department Email</td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['dept_email'];?></td>
        </tr>
        
        <!--<tr>
        	<td></td>
            <td></td>
            <td><input type="button" id="btn_close" value="OK" onclick="close_popup();" /></td>
        </tr> -->
    </table> 
    <?php
	}
	
?>                                                                                                