<?php   include("../../db.php");
	
	$product_pack_id = $_REQUEST['id'];              
	$str = "select * from product_pack_size where product_pack_size_id=$product_pack_id";
	$sql = mysql_query($str);
	$data = "";
	if($row = mysql_fetch_array($sql))
	{
		//$data = $row['menu_name']."|".$row['module_id'].",".$row['module_folder']."|".$row['mother_menu_id']."|".$row['sub_menu_flag']."|".$row['menu_contant']."|".$row['common_for_all']."|".$row['menu_order'];
		
	?>
	<h1 class="pop_head"> Product Pack Size </h1>

    <table class="pop_table">
        <tr>
            <td valign="top">Product Pack Size  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['product_pack_size'];?></td>
        </tr>
        <tr>
            <td valign="top">Quantity  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['product_quantity'];?></td>
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