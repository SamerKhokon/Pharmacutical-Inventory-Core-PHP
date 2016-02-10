<?php   include("../../db.php");
	
	$generic_id = $_REQUEST['id'];              
	$str   = "select * from generic_name_info where generic_name_id=$generic_id";
	$sql   = mysql_query($str);
	$data = "";
	if($row = mysql_fetch_array($sql))
	{
		$data = $row['generic_name']."|".$row['generic_name_code'];
		
	?>
	<h1 class="pop_head"> Generic </h1>

    <table class="pop_table">
        <tr>
            <td valign="top">Generic Name </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['generic_name'];?></td>
        </tr>
        <tr>
            <td valign="top">Generic  Code  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['generic_name_code'];?></td>
        </tr>
       
        <!--<tr>
        	<td></td>
            <td></td>
            <td><input type="button" id="btn_close" value="OK" onclick="close_popup();" /></td>
        </tr> -->
    </table> 
    <?php
	}
	/*function get_module_name($md_id)
	{
		$sql_md = "select module_name from st_module_info where active_flag='Y' and module_id=$md_id";
		$res_md = mysql_query($sql_md);
		if($row_md = mysql_fetch_array($res_md))
			echo $row_md[0];
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
	}*/
?>                                                                                                