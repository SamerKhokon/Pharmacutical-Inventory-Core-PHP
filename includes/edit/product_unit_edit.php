<?php   include("../../db.php");
	
	$product_unit_id = $_REQUEST['id'];              
	$str = "select * from product_unit_info where product_unit_id=$product_unit_id";
	$sql = mysql_query($str);
	$data = "";
	if($row = mysql_fetch_array($sql))
	{
		//$data = $row['menu_name']."|".$row['module_id'].",".$row['module_folder']."|".$row['mother_menu_id']."|".$row['sub_menu_flag']."|".$row['menu_contant']."|".$row['common_for_all']."|".$row['menu_order'];
		
	?>
	<h1 class="pop_head"> Product Unit </h1>
	 <input type="hidden" id="product_unit_id" value="<?php echo $product_unit_id;?>"/>
    <table class="pop_table">
        <tr>
            <td>Product Unit : </td>
            <td>&nbsp;&nbsp;</td>
            <td><input type="text" class="edit_input" name="product_unit" id="product_unit" value="<?php echo $row['product_unit'];?>" /></td>
        </tr>
       
        <!--<tr>
        	<td></td>
            <td></td>
            <td><input type="button" id="btn_close" value="OK" onclick="close_popup();" /></td>
        </tr> -->
    </table>
     <div  class="edit_btm"> <input type="button" class="btn_save" id="btn_product_unit_update" value="Update" onclick="close_popup();" /></div> 
    <?php
	}
	
?>    
<script type="text/javascript">
$(document).ready(function(){

  $("#btn_product_unit_update").click(function(){
     	var 	product_unit_id = $("#product_unit_id").val();	
		var product_unit = $("#product_unit").val();
		
		var dataStr = "product_unit_id="+product_unit_id+"&product_unit="+product_unit;
		$.ajax({
		   type:"post" ,
		   url:"includes/edit/product_unit_edit_by_ajax.php" ,
		   data:dataStr , 
		   cache:false ,
		   success:function(st){
		      alert(st);
		   }
		});
  });
});
</script>                                                                                            