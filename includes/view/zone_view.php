<?php   include("../../db.php");
	
	$zone_id = $_REQUEST['id'];              
	$str = "select * from inv_customer_zone where zone_id=$zone_id";
	$sql = mysql_query($str);
	$data = "";
	if($row = mysql_fetch_array($sql))
	{
		$data = $row['depot_id']."|".$row['zone_name'].",".$row['mio_id']."|".$row['sv_id'];
		
	?>
	<h1 class="pop_head"> Zone Information </h1>

    <table class="pop_table">
        <tr>
            <td valign="top">Depot Name </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo get_depot_name($row['depot_id']);?></td>
        </tr>
        <tr>
            <td valign="top">Zone Name </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['zone_name'];?></td>
        </tr>
        <tr>
            <td valign="top">MIO Name </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo get_mio_dropdown($row['mio_id']);?></td>
        </tr>
        <tr>
            <td valign="top">S.V  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo get_mio_dropdown($row['sv_id']);?></td>
        </tr>
        
        <!--<tr>
        	<td></td>
            <td></td>
            <td><input type="button" id="btn_close" value="OK" onclick="close_popup();" /></td>
        </tr> -->
    </table> 
    <?php
	}
	function get_depot_name($depot_id)
	{
		$sql_md = "select depot_flag from inv_depot_info where active_flag='Y' and depot_id=$depot_id";
		$res_md = mysql_query($sql_md);
		if($row_md = mysql_fetch_array($res_md))
			echo $row_md[0];
		else
			echo '-';	
	}
	

	
	function get_mio_dropdown($employee_id)
	{
		
			$sql_mm = "select emp_name from hr_employee_info where active_flag='Y' and employee_id=$employee_id";
			$res_mm = mysql_query($sql_mm);
			if($row_mm = mysql_fetch_array($res_mm))
				echo $row_mm[0];
			else
				echo '-';		
	}
		
?>                                                                                                