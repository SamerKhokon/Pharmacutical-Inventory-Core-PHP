<?php   include("../../db.php");
	
	$product_batch_id = $_REQUEST['id'];              
	$str = "select * from product_batch_info where product_batch_id=$product_batch_id";
	$sql = mysql_query($str);
	$data = "";
	if($row = mysql_fetch_array($sql))
	{
		//$data = $row['menu_name']."|".$row['module_id'].",".$row['module_folder']."|".$row['mother_menu_id']."|".$row['sub_menu_flag']."|".$row['menu_contant']."|".$row['common_for_all']."|".$row['menu_order'];
		
	?>
	<h1 class="pop_head"> Product Batch </h1>

    <table class="pop_table">
        <tr>
            <td valign="top">Batch Code </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['product_batch_code'];?></td>
        </tr>
        <tr>
            <td valign="top">Product Name  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo get_product_name($row['product_id']);?></td>
        </tr>
        <tr>
            <td valign="top">Product Quantity  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['product_quantity'];?></td>
        </tr>
        <tr>
            <td valign="top">Mng Date  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['mfg_date'];?></td>
        </tr>
         <tr>
            <td valign="top">Exp Date  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['exp_date'];?></td>
        </tr>
       
        <!--<tr>
        	<td></td>
            <td></td>
            <td><input type="button" id="btn_close" value="OK" onclick="close_popup();" /></td>
        </tr> -->
    </table> 
    <?php
	}
	function get_product_name($product_id)
	{
		$sql_md = "select product_name from product_info where active_flag='Y' and product_id=$product_id";
		$res_md = mysql_query($sql_md);
		if($row_md = mysql_fetch_array($res_md))
			echo $row_md[0];
		else
			echo '-';	
	}
	
?>                                                                                                