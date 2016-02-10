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
	 <input type="hidden" id="product_pack_id_e" value="<?php echo $product_pack_id;?>"/>
    <table class="pop_table">
        <tr>
            <td valign="top">Product Pack Size  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <input type="text" class="edit_input" name="product_pack_size" id="product_pack_size_e" value="<?php echo $row['product_pack_size'];?>" /></td>
        </tr>
        <tr>
            <td valign="top">Quantity  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <input type="text" class="edit_input" name="product_quantity" id="product_quantity_e" value="<?php echo $row['product_quantity'];?>" /></td>
        </tr>
        
        <!--<tr>
        	<td></td>
            <td></td>
            <td><input type="button" id="btn_close" value="OK" onclick="close_popup();" /></td>
        </tr> -->
    </table> 
     <div  class="edit_btm"> <input type="button" class="btn_save" id="btn_product_pack_size_update" value="Update" onclick="close_popup();" /></div>
    <?php
	}
	
?>     
<script type="text/javascript">
$(document).ready(function(){

  $("#btn_product_pack_size_update").click(function(){
     	var 	product_pack_id = $("#product_pack_id_e").val();	
		var product_pack_size = $("#product_pack_size_e").val();
		var product_quantity = $("#product_quantity_e").val();
		
		var dataStr = "product_pack_id="+product_pack_id+"&product_pack_size="+product_pack_size+"&product_quantity="+product_quantity;
		$.ajax({
		   type:"post" ,
		   url:"includes/edit/product_pack_size_edit_by_ajax.php" ,
		   data:dataStr , 
		   cache:false ,
		   success:function(st){
		      alert(st);
		   }
		});
  });
});
</script>                                                                                                               