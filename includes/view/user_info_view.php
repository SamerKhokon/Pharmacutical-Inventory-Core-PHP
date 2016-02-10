<?php   include("../../db.php");
	
	$user_id = $_REQUEST['id'];              
	
	function get_user_group($company_id, $user_group_id){
		$sql_ug = "select * from `st_user_group` where user_group_id=$user_group_id and company_id=$company_id";
		$res_ug = mysql_query($sql_ug);
		$row_ug = mysql_fetch_array($res_ug);
		return $row_ug['user_group'];			
	}
	
	$str = "select * from st_user_info where user_id=$user_id";
	$sql = mysql_query($str);
	$data = "";
	if($row = mysql_fetch_array($sql))
	{
		
	?>
	<h1 class="pop_head"> User Info </h1>

    <table class="pop_table">
        <tr>
            <td valign="top">User Type  </td>
            <td valign="top"> &nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo get_user_group($row['company_id'], $row['user_group_id']);?></td>
        </tr>
        <tr>
            <td valign="top">User Full Name </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['user_full_name'];?></td>
        </tr>
        <tr>
            <td valign="top">Login Id </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['user_login_id'];?></td>
        </tr>
        <tr>
            <td valign="top">Contact No</td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['user_contact_no'];?></td>
        </tr>
        <tr>
            <td valign="top">Email Address </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['user_email'];?></td>
        </tr>
        <tr>
            <td valign="top">Address </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['user_address'];?></td>
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