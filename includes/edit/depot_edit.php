<?php session_start();  include("../../db.php");
	
	$company_id = $_SESSION["COMPANY_ID"];
	 $depot_id = $_REQUEST['id'];              
	$str = "select * from inv_depot_info where depot_id=$depot_id";
	$sql = mysql_query($str);
	$data = "";
	 function get_depo_dropdown($depot_id, $company_id){
				 global $option2;
				 $str1 = "SELECT depot_type_id,depot_type,depot_type_code FROM `inv_depot_type` WHERE company_id=$company_id";
				 $sql1 =mysql_query($str1);
				 while($res = mysql_fetch_array($sql1)) {
					 if($res[0] == $depot_id){
					   $option2.= "<option  selected='selected' value='".$res[2]."'>".$res[1]."(".$res[2].")</option>";
					 }else{
					   $option2.= "<option  value='".$res[2]."'>".$res[1]."(".$res[2].")</option>";
					 }				 
				 }
				 return $option2;
		  }	
	if($row = mysql_fetch_array($sql))
	{
		//$data = $row['menu_name']."|".$row['module_id'].",".$row['module_folder']."|".$row['mother_menu_id']."|".$row['sub_menu_flag']."|".$row['menu_contant']."|".$row['common_for_all']."|".$row['menu_order'];
		
	?>
	<h1 class="pop_head"> Depot </h1>
     <input type="hidden" id="depot_id" value="<?php echo $depot_id;?>"/>
    <table class="pop_table">
        <tr>
            <td valign="top">Depo Type  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; 
			<select id="depot_flag_e" class="edit_select" >
			<?php 							  
				  echo get_depo_dropdown($row['depot_id'], $company_id);
		   ?>	
			</select>
			</td>
        </tr>
        <tr>
            <td valign="top">Depo Name  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <input type="text" class="edit_input" name="depot_name" id="depot_name" value="<?php echo $row['depot_name'];?>" /></td>
        </tr>
        <tr>
            <td valign="top">Address  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">&nbsp;&nbsp; <textarea class="edit_input" name="depot_address" id="depot_address" value="<?php echo $row['depot_address'];?>" ><?php echo $row['depot_address'];?></textarea></td>
        </tr>
        <tr>
            <td valign="top">Contact No </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <input type="text" class="edit_input" name="depot_contact_no" id="depot_contact_no" value="<?php echo $row['depot_contact_no'];?>" /></td>
        </tr>
        

    </table> 
     <div  class="edit_btm"> <input type="button" class="btn_save" id="btn_depot_update" value="Update" onclick="close_popup();"  /></div>
    <?php
	}
?> 
<script type="text/javascript">
$(document).ready(function(){

  $("#btn_depot_update").click(function(){
     	var 	depot_id = $("#depot_id").val();	
		var depot_name = $("#depot_name").val();
		var depot_address = $("#depot_address").val();
		var depot_contact_no = $("#depot_contact_no").val();
		var depot_flag = $("#depot_flag_e").val();
		var dataStr = "depot_id="+depot_id+"&depot_name="+depot_name+
		"&depot_address="+depot_address+"&depot_contact_no="+depot_contact_no+"&depot_flag="+depot_flag;
		//alert(dataStr);
		$.ajax({
		   type:"post" ,
		   url:"includes/edit/depot_edit_by_ajax.php" ,
		   data:dataStr , 
		   cache:false ,
		   success:function(st){
		      alert(st);
		   }
		});
  });
});
</script>                                                                                               