<?php   include("../../db.php");
	
	$customer_id = $_REQUEST['id'];              
	$str = "select * from inv_customer_info where customer_id=$customer_id";
	$sql = mysql_query($str);
	$data = "";
	if($row = mysql_fetch_array($sql))
	{
		//$data = $row['menu_name']."|".$row['module_id'].",".$row['module_folder']."|".$row['mother_menu_id']."|".$row['sub_menu_flag']."|".$row['menu_contant']."|".$row['common_for_all']."|".$row['menu_order'];
		
	?>
	<h1 class="pop_head"> Customer Info </h1>

    <table class="pop_table">
        <tr>
            <td valign="top">Customer Code </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['customer_code'];?></td>
        </tr>
        <tr>
            <td valign="top">Depo </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo get_depot_name($row['depot_id']);?></td>
        </tr>
        <tr>
            <td valign="top">Zone </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo get_zone_name($row['zone_id']);?></td>
        </tr>
        <tr>
            <td valign="top">Customer Name  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['customer_name'];?></td>
        </tr>
        <tr>
            <td valign="top">Organization Name  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['org_name'];?></td>
        </tr>
        <tr>
            <td valign="top">Owner Name  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['owner_name'];?></td>
        </tr> 
         <tr>
            <td valign="top">Customer Address  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['customer_address'];?></td>
        </tr>
        <tr>
            <td valign="top">Contact No  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['customer_contact_no'];?></td>
        </tr>
         <tr>
            <td valign="top">Bank Account no  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['customer_bank_acc_no'];?></td>
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
	function get_zone_name($zone_id)
	{
		$sql_md = "select zone_name from inv_customer_zone where active_flag='Y' and zone_id=$zone_id";
		$res_md = mysql_query($sql_md);
		if($row_md = mysql_fetch_array($res_md))
			echo $row_md[0];
		else
			echo '-';	
	}
	
?>                                                                                                