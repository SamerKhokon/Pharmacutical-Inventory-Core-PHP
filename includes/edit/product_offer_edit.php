<script>
	$(function() {
		$( "#offer_start_date_e" ).datepicker();
	});
	$(function() {
		$( "#offer_end_date_e" ).datepicker();
	});
</script>
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
<input type="hidden" id="product_offer_id_e" value="<?php echo $product_offer_id;?>"/>
    <table class="pop_table">
        <tr>
            <td valign="top">Product Offer  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <input type="text" class="edit_input" name="product_offer" id="product_offer_e" value="<?php echo $row['product_offer'];?>" /></td>
        </tr>
        <tr>
            <td valign="top">Product Batch Id </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; 
			<select id="product_batch_id_e" class="edit_select" >
            <option><?php echo product_dropdown($row['product_batch_id']);?></option>
            </select>
			</td>
        </tr>
        <tr>
            <td valign="top">Offere Start Date </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <input type="text" class="edit_input" name="offer_start_date" id="offer_start_date_e" value="<?php echo $row['offer_start_date'];?>" /></td>
        </tr>
        <tr>
            <td valign="top">Offer End Date  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <input type="text" class="edit_input" name="offer_end_date" id="offer_end_date_e" value="<?php echo $row['offer_end_date'];?>" /></td>
        </tr>
       
  
    </table> 
    <div  class="edit_btm"> <input type="button" class="btn_save" id="btn_product_offer_update" value="Update" onclick="close_popup();" /></div>
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

  $("#btn_product_offer_update").click(function(){
     	var 	product_offer_id = $("#product_offer_id_e").val();	
		var product_offer = $("#product_offer_e").val();
		var product_batch_id = $("#product_batch_id_e").val();
		var offer_start_date = $("#offer_start_date_e").val();
		var offer_end_date = $("#offer_end_date_e").val();
		
		var dataStr = "product_offer_id="+product_offer_id+"&product_offer="+product_offer+"&product_batch_id="+product_batch_id+"&offer_start_date="+offer_start_date+"&offer_end_date="+offer_end_date;
		$.ajax({
		   type:"post" ,
		   url:"includes/edit/product_offer_edit_by_ajax.php" ,
		   data:dataStr , 
		   cache:false ,
		   success:function(st){
		      alert(st);
		   }
		});
  });
});
</script>                                                                                                   