
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
	<input type="hidden" id="product_id_e" value="<?php echo $product_id;?>"/>
    <table class="pop_table">
        <tr>
            <td>Generic Name : </td>
            <td>&nbsp;&nbsp;</td>
            <td>
			<select id="generic_name_id_e" class="edit_select" >
            <option><?php echo generic_name_dropdown($row['generic_name_id']);?></option>
            </select>
			</td>
           
        </tr>
        <tr>
            <td>Product Unit : </td>
            <td>&nbsp;&nbsp;</td>
            <td>
			<select id="product_unit_id_e" class="edit_select" >
            <option><?php echo product_unit_dropdown($row['product_unit_id']);?></option>
            </select>
			</td>
           
        </tr>
        <tr>
            <td>Product Code : </td>
            <td>&nbsp;&nbsp;</td>
             <td><input type="text" class="edit_input" name="product_code" id="product_code_e" value="<?php echo $row['product_code'];?>" /></td>
        </tr>
        <tr>
            <td>Unit Price : </td>
            <td>&nbsp;&nbsp;</td>
             <td><input type="text" class="edit_input" name="unit_price" id="unit_price_e" value="<?php echo $row['unit_price'];?>" /></td>
        </tr>
         <tr>
            <td>Product Name : </td>
            <td>&nbsp;&nbsp;</td>
            <td><input type="text" class="edit_input" name="product_name" id="product_name_e" value="<?php echo $row['product_name'];?>" /></td>
        </tr>
         <tr>
            <td>Description : </td>
            <td>&nbsp;&nbsp;</td>
            <td><textarea class="edit_input" name="description" id="description_e" value="<?php echo $row['description'];?>"><?php echo $row['description'];?></textarea></td>
        </tr>
         <tr>
            <td>Product Pack Size : </td>
            <td>&nbsp;&nbsp;</td>
             <td>
			 <select id="product_pack_size_id_e" class="edit_select" >
			 <option value=""></option>
             <?php echo product_pack_size_dropdown($row['product_pack_size_id']);?>
             </select>
			</td>
        </tr>
        <!--<tr>
        	<td></td>
            <td></td>
            <td><input type="button" id="btn_close" value="OK" onclick="close_popup();" /></td>
        </tr> -->
    </table> 
     <div  class="edit_btm"> <input type="button" class="btn_save" id="btn_product_update" value="Update" onclick="close_popup();" /></div>
    <?php
	}
	
	function generic_name_dropdown($generic_name_id) {	
						    global $option1;
							$str = "SELECT generic_name_id,generic_name FROM generic_name_info ";
							$sql = mysql_query($str);
							
							while( $res = mysql_fetch_array($sql) ){
							if($res[0] == $generic_name_id){
							 $option1 .= "<option selected ='selected' value='".$res[0]."'>".$res[1]."</option>";
							 }else{
							 	$option1 .= "<option value='".$res[0]."'>".$res[1]."</option>";
							 }
							}
									return $option1;
						}
	
					function product_pack_size_dropdown($product_pack_size_id) {	
							global $option2;
							$str = "SELECT product_pack_size_id,product_pack_size FROM product_pack_size ";
							$sql = mysql_query($str);
							
							while( $res = mysql_fetch_array($sql) ){
								if($res[0] == $row['product_pack_size_id']){
								 $option2 .= "<option selected ='selected' value='".$res[0]."'>".$res[1]."</option>";
								 }else{
									$option2 .= "<option value='".$res[0]."'>".$res[1]."</option>";
								 }
							}
							return $option2;
						}	
	

	function product_unit_dropdown($product_unit_id) {	
							global $option3;
							$str = "SELECT  product_unit_id,product_unit FROM product_unit_info ";
							$sql = mysql_query($str);
							
							while( $res = mysql_fetch_array($sql) ){
							if($res[0] == $product_unit_id){
							 $option3 .= "<option selected ='selected' value='".$res[0]."'>".$res[1]."</option>";
							 }else{
							 	$option3 .= "<option value='".$res[0]."'>".$res[1]."</option>";
							 }
							}
									return $option3;
						}		
?>   
<script type="text/javascript">
$(document).ready(function(){

  $("#btn_product_update").click(function(){
     	var 	product_id = $("#product_id_e").val();	
		var generic_name_id = $("#generic_name_id_e").val();
		var product_code = $("#product_code_e").val();
		var product_name = $("#product_name_e").val();
		var product_pack_size_id = $("#product_pack_size_id_e").val();
		var product_unit_id = $("#product_unit_id_e").val();
		var unit_price = $("#unit_price_e").val();
		var description = $("#description_e").val();
		
		
		var dataStr = "product_id="+product_id+"&generic_name_id="+generic_name_id+
		"&product_code="+product_code+"&product_name="+product_name+
		"&product_pack_size_id="+product_pack_size_id+"&product_unit_id_e="+product_unit_id+
		"&unit_price="+unit_price+"&description="+description;
		//alert(dataStr);
		$.ajax({
		   type:"post" ,
		   url:"includes/edit/product_edit_by_ajax.php" ,
		   data:dataStr , 
		   cache:false ,
		   success:function(st){
		      alert(st);
		   }
		});
  });
});
</script>                                                                                                         