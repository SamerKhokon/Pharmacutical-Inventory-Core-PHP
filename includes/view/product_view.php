<?php   include("../../db.php");
	
	$product_id = $_REQUEST['id'];              
	$str = "select * from product_info where product_id=$product_id";
	$sql = mysql_query($str);
	$data = "";
	if($row = mysql_fetch_array($sql))
	{
		//$data = $row['menu_name']."|".$row['module_id'].",".$row['module_folder']."|".$row['mother_menu_id']."|".$row['sub_menu_flag']."|".$row['menu_contant']."|".$row['common_for_all']."|".$row['menu_order'];
		
	?>
	<h1 class="pop_head"> Product </h1>

    <table class="pop_table">
        <tr>
            <td valign="top">Generic Name  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo get_generic_name($row['generic_name_id']);?></td>
           
        </tr>
        <tr>
            <td valign="top">Product Unit  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo get_product_unit($row['product_unit_id']);?></td>
           
        </tr>
        <tr>
            <td valign="top">Product Code  </td>
            <td valign="top">&nbsp;&nbsp;</td>
             <td valign="top">:&nbsp;<?php echo $row['product_code'];?></td>
        </tr>
        <tr>
            <td valign="top">Unit Price </td>
            <td valign="top">&nbsp;&nbsp;</td>
             <td valign="top">:&nbsp;<?php echo $row['unit_price'];?></td>
        </tr>
         <tr>
            <td valign="top">Product Name  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['product_name'];?></td>
        </tr>
         <tr>
            <td valign="top">Description </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['description'];?></td>
        </tr>
         <tr>
            <td valign="top">Product Pack Size  </td>
            <td valign="top">&nbsp;&nbsp;</td>
             <td valign="top">:&nbsp;<?php echo get_pack_size($row['product_pack_size_id']);?></td>
        </tr>
        <!--<tr>
        	<td></td>
            <td></td>
            <td><input type="button" id="btn_close" value="OK" onclick="close_popup();" /></td>
        </tr> -->
    </table> 
    <?php
	}
	function get_generic_name($generic_name_id)
	{
		$sql_md = "select generic_name from generic_name_info where active_flag='Y' and generic_name_id=$generic_name_id";
		$res_md = mysql_query($sql_md);
		if($row_md = mysql_fetch_array($res_md))
			echo $row_md[0];
		else
			echo '-';	
	}
	function get_pack_size($product_pack_size_id)
	{
		$sql_md = "select product_pack_size from product_pack_size where active_flag='Y' and product_pack_size_id=$product_pack_size_id";
		$res_md = mysql_query($sql_md);
		if($row_md = mysql_fetch_array($res_md))
			echo $row_md[0];
		else
			echo '-';	
	}
	
	function get_product_unit($product_unit_id)
	{
		if($product_unit_id!=0)
		{
			$sql_mm = "select product_unit from product_unit_info where active_flag='Y' and product_unit_id=$product_unit_id";
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