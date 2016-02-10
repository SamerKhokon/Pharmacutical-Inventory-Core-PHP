<?php   include("../../db.php");
	
	$edr_id = $_REQUEST['id'];              
	$str = "select * from hr_employee_depot_rel where edr_id=$edr_id";
	$sql = mysql_query($str);
	$data = "";
	if($row = mysql_fetch_array($sql))
	{
		//$data = $row['menu_name']."|".$row['module_id'].",".$row['module_folder']."|".$row['mother_menu_id']."|".$row['sub_menu_flag']."|".$row['menu_contant']."|".$row['common_for_all']."|".$row['menu_order'];
		
	?>
	<h1 class="pop_head"> Employee Depot Rel Info </h1>

    <table class="pop_table">
        <tr>
            <td valign="top">Employee Name </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo get_employee_name($row['employee_id']);?></td>
        </tr>
        <tr>
            <td valign="top">Depot  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo get_depot_name($row['depot_id']);?></td>
        </tr>
        <tr>
            <td valign="top">Designation</td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['designation'];?></td>
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
	function get_depot_name($depot_id)
	{
		$sql_md = "select depot_name from inv_depot_info where active_flag='Y' and depot_id=$depot_id";
		$res_md = mysql_query($sql_md);
		if($row_md = mysql_fetch_array($res_md))
			echo $row_md[0];
		else
			echo '-';	
	}
	
?>                                                                                                