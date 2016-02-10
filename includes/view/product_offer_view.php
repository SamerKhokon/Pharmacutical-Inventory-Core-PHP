<?php   include("../../db.php");
	
	$product_offer_id = $_REQUEST['id'];              
	$str = "select * from product_offer_info where product_offer_id=$product_offer_id";
	$sql = mysql_query($str);
	$data = "";
	if($row = mysql_fetch_array($sql))
	{
		//$data = $row['menu_name']."|".$row['module_id'].",".$row['module_folder']."|".$row['mother_menu_id']."|".$row['sub_menu_flag']."|".$row['menu_contant']."|".$row['common_for_all']."|".$row['menu_order'];
		
	?>
	<h1 class="pop_head"> Product Offer </h1>

    <table class="pop_table">
        <tr>
            <td valign="top">Product Offer  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['product_offer'];?></td>
        </tr>
        <tr>
            <td valign="top">Product Batch Id  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo get_product_name($row['product_batch_id']);?></td>
        </tr>
        <tr>
            <td valign="top">Offere Start Date </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['offer_start_date'];?></td>
        </tr>
        <tr>
            <td valign="top">Offer End Date  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['offer_end_date'];?></td>
        </tr>
       
        <!--<tr>
        	<td></td>
            <td></td>
            <td><input type="button" id="btn_close" value="OK" onclick="close_popup();" /></td>
        </tr> -->
    </table> 
    <?php
	}
	function get_product_name($product_id )
	{
		$sql_md = "select product_name from product_info where active_flag='Y' and product_id =$product_id ";
		$res_md = mysql_query($sql_md);
		if($row_md = mysql_fetch_array($res_md))
			echo $row_md[0];
		else
			echo '-';	
	}
	
?>                                                                                                