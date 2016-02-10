<?php   include("../../db.php");
	
	$menu_id = $_REQUEST['id'];              
	$str = "select * from st_menu_info where menu_id=$menu_id";
	$sql = mysql_query($str);
	$data = "";
	if($row = mysql_fetch_array($sql))
	{
		$data = $row['menu_name']."|".$row['module_id'].",".$row['module_folder']."|".$row['mother_menu_id']."|".$row['sub_menu_flag']."|".$row['menu_contant']."|".$row['common_for_all']."|".$row['menu_order'];
		
	?>
	<h1 class="pop_head"> Menu </h1>

    <table class="pop_table">
        <tr>
            <td valign="top">Menu Name </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['menu_name'];?></td>
        </tr>
        <tr>
            <td valign="top">Menu Content  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['menu_contant'];?></td>
        </tr>
        <tr>
            <td valign="top">Module </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo get_module_name($row['module_id']);?></td>
        </tr>
        <tr>
            <td valign="top">Child Of </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo get_mother_menu($row['mother_menu_id']);?></td>
        </tr>
         <tr>
            <td valign="top">Sub Menu  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php if($row['sub_menu_flag']==0){ echo 'No';}else{ echo 'Yes';}?></td>
        </tr>
         <tr>
            <td valign="top">Common For All </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php if($row['common_for_all']==0){ echo 'No';}else{ echo 'Yes';}?></td>
        </tr>
         <tr>
            <td valign="top">Menu Order </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['menu_order'];?></td>
        </tr>
        <!--<tr>
        	<td></td>
            <td></td>
            <td><input type="button" id="btn_close" value="OK" onclick="close_popup();" /></td>
        </tr> -->
    </table> 
    <?php
	}
	function get_module_name($md_id)
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
	}
?>                                                                                                