<script>
	$(function() {
		$( "#mfg_date_e" ).datepicker();
	});
	$(function() {
		$( "#exp_date_e" ).datepicker();
	});
</script>
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
<input type="hidden" id="product_batch_id_e" value="<?php echo $product_batch_id;?>"/>
    <table class="pop_table">
        <tr>
            <td valign="top">Batch Code  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <input type="text" class="edit_input" name="product_batch_code" id="product_batch_code_e" value="<?php echo $row['product_batch_code'];?>" /></td>
        </tr>
        <tr>
            <td valign="top">Product Name  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; 
			<select id="product_id_e" class="edit_select" >
            <option><?php echo product_dropdown($row['product_id']);?></option>
            </select>
			</td>
        </tr>
        <tr>
            <td valign="top">Product Quantity </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <input type="text" class="edit_input" name="product_quantity" id="product_quantity_e" value="<?php echo $row['product_quantity'];?>" /></td>
        </tr>
        <tr>
            <td valign="top">Mng Date  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <input type="text" class="edit_input" name="mfg_date" id="mfg_date_e" value="<?php echo $row['mfg_date'];?>" /></td>
        </tr>
         <tr>
            <td valign="top">Exp Date  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <input type="text" class="edit_input" name="exp_date" id="exp_date_e" value="<?php echo $row['exp_date'];?>" /></td>
        </tr>
       
        <!--<tr>
        	<td></td>
            <td></td>
            <td><input type="button" id="btn_close" value="OK" onclick="close_popup();" /></td>
        </tr> -->
    </table> 
     <div  class="edit_btm"> <input type="button" class="btn_save" id="btn_product_batch_update" value="Update" onclick="close_popup();" /></div>
    <?php
	}
	
	 function product_dropdown($product_id){
		      global $option1;
			   $str = "SELECT product_id,product_code,product_name FROM `product_info`";
			  $sql = mysql_query($str);
			  while($res = mysql_fetch_array($sql) ) {
			  if($res[0] == $product_id){
				$option1 .=  "<option selected ='selected' value='".$res[0]  . "'>".$res[2] ."(".  $res[1]. ")</option>";
				}else{
					$option1 .=  "<option value='".$res[0] . "'>".$res[2] ."(".  $res[1]. ")</option>";
				}
			  }
			  return $option1;
		   }
	
?>  
<script type="text/javascript">
$(document).ready(function(){

  $("#btn_product_batch_update").click(function(){
     	var 	product_batch_id = $("#product_batch_id_e").val();	
		var product_batch_code = $("#product_batch_code_e").val();
		var product_id = $("#product_id_e").val();
		var product_code = $("#product_code_e").val();
		var product_quantity = $("#product_quantity_e").val();
		var mfg_date = $("#mfg_date_e").val();
		var exp_date = $("#exp_date_e").val();
		
		
		var dataStr = "product_batch_id="+product_batch_id+"&product_batch_code="+product_batch_code+"&product_id="+product_id+"&product_code="+product_code+"&product_quantity="+product_quantity+"&mfg_date="+mfg_date+"&exp_date="+exp_date;
		$.ajax({
		   type:"post" ,
		   url:"includes/edit/product_batch_edit_by_ajax.php" ,
		   data:dataStr , 
		   cache:false ,
		   success:function(st){
		      alert(st);
		   }
		});
  });
});
</script>                                                                                                    