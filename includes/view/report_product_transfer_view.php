<?php   include("../../db.php");
	
    $transfering_product_id = $_REQUEST['id'];              
	$str = "select * from transfering_product_info where transfering_product_id=$transfering_product_id";
	$sql = mysql_query($str);
	$data = "";
	if($row = mysql_fetch_array($sql))
	{
		//$data = $row['menu_name']."|".$row['module_id'].",".$row['module_folder']."|".$row['mother_menu_id']."|".$row['sub_menu_flag']."|".$row['menu_contant']."|".$row['common_for_all']."|".$row['menu_order'];
		
	?>
	<h1 class="pop_head"> Report Product Transfer </h1>

    <table class="pop_table">
        <tr>
            <td>Challan No : </td>
            <td>&nbsp;&nbsp;</td>
            <td><?php echo $row['challan_no'];?></td>
        </tr>
        <tr>
            <td>Invoice No : </td>
            <td>&nbsp;&nbsp;</td>
            <td><?php echo $row['invoice_no'];?></td>
        </tr>
        <tr>
            <td>Ref No : </td>
            <td>&nbsp;&nbsp;</td>
            <td><?php echo $row['ref_no'];?></td>
        </tr>
        <tr>
            <td>Product Name : </td>
            <td>&nbsp;&nbsp;</td>
            <td><?php echo get_product_name($row['product_id']);?></td>
        </tr>
        <tr>
            <td>Product Code : </td>
            <td>&nbsp;&nbsp;</td>
            <td><?php echo $row['product_code'];?></td>
        </tr>
        <tr>
            <td>Pack_size : </td>
            <td>&nbsp;&nbsp;</td>
            <td><?php echo $row['pack_size'];?></td>
        </tr>
        <tr>
            <td>Product Unit : </td>
            <td>&nbsp;&nbsp;</td>
            <td><?php echo $row['product_unit'];?></td>
        </tr>
        <tr>
            <td>Unit Price: </td>
            <td>&nbsp;&nbsp;</td>
            <td><?php echo $row['unit_price'];?></td>
        </tr>
         <tr>
            <td>Product Quantity : </td>
            <td>&nbsp;&nbsp;</td>
            <td><?php echo $row['product_quantity'];?></td>
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
		$sql = "select product_name from product_info where product_id=$product_id";
		$res = mysql_query($sql);
		$row = mysql_fetch_array($res);
		return $row[0];
	}
	
?>                                                                                                