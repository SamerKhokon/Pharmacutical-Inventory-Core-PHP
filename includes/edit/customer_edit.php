<?php   include("../../db.php");
	
	$customer_id = $_REQUEST['id'];              
	$str = "select * from inv_customer_info where customer_id=$customer_id";
	$sql = mysql_query($str);
	$data = "";
	if($row = mysql_fetch_array($sql))
	{
		//$data = $row['menu_name']."|".$row['module_id'].",".$row['module_folder']."|".$row['mother_menu_id']."|".$row['sub_menu_flag']."|".$row['menu_contant']."|".$row['common_for_all']."|".$row['menu_order'];
		
	?>
	<h1 class="pop_head"> Customer Info </h1>
	<input type="hidden" id="customer_id_e" value="<?php echo $customer_id;?>"/>
    <table class="pop_table">
        <tr>
            <td valign="top">Customer Code </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <input type="text" class="edit_input" name="customer_code" id="customer_code_e" value="<?php echo $row['customer_code'];?>" /></td>
        </tr>
        <tr>
            <td valign="top">Depo  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <select id="depot_id_e" class="edit_select" >
			<option><?php echo get_depot_dropdown($row['depot_id']);?></option>
			</select></td>
        </tr>
        <tr>
            <td valign="top">Zone </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; 
			<select id="zone_id_e" class="edit_select" >
			<option><?php echo get_zone_dropdown($row['zone_id']);?></option>
			</select></td>
        </tr>
        <tr>
            <td valign="top">Customer Name  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <input type="text" class="edit_input" name="customer_name" id="customer_name_e" value="<?php echo $row['customer_name'];?>" /></td>
        </tr>
        <tr>
            <td valign="top">Organization Name  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <input type="text" class="edit_input" name="org_name" id="org_name_e" value="<?php echo $row['org_name'];?>" /></td>
        </tr>
        <tr>
            <td valign="top">Owner Name  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <input type="text" class="edit_input" name="owner_name" id="owner_name_e" value="<?php echo $row['owner_name'];?>" /></td>
        </tr>
         <tr>
            <td valign="top">Customer Address </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">&nbsp;&nbsp; <textarea class="edit_input" name="customer_address" id="customer_address_e" value="<?php echo $row['customer_address'];?>" ><?php echo $row['customer_address'];?></textarea></td>
        </tr>
        <tr>
            <td valign="top">Contact No  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <input type="text" class="edit_input" name="customer_contact_no" id="customer_contact_no_e" value="<?php echo $row['customer_contact_no'];?>" /></td>
        </tr>
         <tr>
            <td valign="top">Bank Account no </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <input type="text" class="edit_input" name="customer_bank_acc_no" id="customer_bank_acc_no_e" value="<?php echo $row['customer_bank_acc_no'];?>" /></td>
        </tr>
        
        
        <!--<tr>
        	<td></td>
            <td></td>
            <td><input type="button" id="btn_close" value="OK" onclick="close_popup();" /></td>
        </tr> -->
    </table> 
    <div  class="edit_btm"> <input type="button" class="btn_save" id="btn_customer_update" value="Update" onclick="close_popup();" /></div>
    <?php
	}

	function  get_depot_dropdown($depot_id) {
			  global $option2;
			   $str = "SELECT depot_id,depot_name,depot_flag FROM `inv_depot_info` ";
			  $sql = mysql_query($str);
			  while($res = mysql_fetch_array($sql)) {
			  if($res[0] == $depot_id){
			    	$option2 .= "<option selected='selected' value='".$res[0]."'>".$res[2]."(".$res[1].")</option>";
				}else{
						$option2 .= "<option value='".$res[0]."'>".$res[2]."(".$res[1].")</option>";
				}
			  }
			  return $option2;
			}		
	

	 function  get_zone_dropdown($zone_id) {
			  global $option1;
			  $str = "SELECT zone_id,zone_name FROM `inv_customer_zone` " ;
			  $sql = mysql_query($str);
			  while($res = mysql_fetch_array($sql)) {
			  if($res[0] == $zone_id){
			    $option1 .= "<option selected='selected' value='".$res[0]."'>".$res[1]."</option>";
				}else{
					$option1 .= "<option value='".$res[0]."'>".$res[1]."</option>";
				}
			  }
			  return $option1;			  
			}
	
?>  
<script type="text/javascript">
$(document).ready(function(){

  $("#btn_customer_update").click(function(){
     	var 	customer_id = $("#customer_id_e").val();	
		var customer_code = $("#customer_code_e").val();
		var depot_id = $("#depot_id_e").val();
		var zone_id = $("#zone_id_e").val();
		var customer_name = $("#customer_name_e").val();
		var org_name = $("#org_name_e").val();
		var owner_name = $("#owner_name_e").val();
		var customer_address = $("#customer_address_e").val();
		var customer_contact_no = $("#customer_contact_no_e").val();
		var customer_bank_acc_no = $("#customer_bank_acc_no_e").val();
		
		
		var dataStr = "customer_id="+customer_id+"&customer_code="+customer_code+"&depot_id="+depot_id+"&zone_id="+zone_id+"&customer_name="+customer_name+"&org_name="+org_name+"&owner_name="+owner_name+"&customer_address="+customer_address+"&customer_contact_no="+customer_contact_no+"&customer_bank_acc_no="+customer_bank_acc_no;
		$.ajax({
		   type:"post" ,
		   url:"includes/edit/customer_edit_by_ajax.php" ,
		   data:dataStr , 
		   cache:false ,
		   success:function(st){
		      alert(st);
		   }
		});
  });
});
</script>                                                                                                      