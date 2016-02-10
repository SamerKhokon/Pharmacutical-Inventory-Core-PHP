<?php session_start();  include("../../db.php");
	
	$company_id = $_SESSION["COMPANY_ID"];
	$user_id = $_REQUEST['id'];              
	$str = "select * from st_user_info where user_id=$user_id";
	$sql = mysql_query($str);
	$data = "";
	function get_user_group_dropdown($user_group_id, $company_id){
		global $option2;
		$str = "SELECT * FROM `st_user_group` WHERE company_id=$company_id and active_flag='Y'";
		$sql =mysql_query($str);
		while($res = mysql_fetch_array($sql)) {
			if($res['user_group_id']==$user_group_id)
				$option2 .= "<option value='".$res['user_group_id']."' selected='selected'>".$res['user_group']."</option>";
			else
				$option2 .= "<option   value='".$res['user_group_id']."'>".$res['user_group']."</option>";
		}
		return $option2;
	}	
	if($row = mysql_fetch_array($sql))
	{
		//$data = $row['menu_name']."|".$row['module_id'].",".$row['module_folder']."|".$row['mother_menu_id']."|".$row['sub_menu_flag']."|".$row['menu_contant']."|".$row['common_for_all']."|".$row['menu_order'];
		
	?>
	<h1 class="pop_head"> User Info Edit </h1>
     <input type="hidden" id="user_id" value="<?php echo $user_id;?>"/>
    <table class="pop_table">
        <tr>
        	<td>&nbsp;</td>
            <td colspan="2"><span id="sp_msg" style="color:#FF0000;"></span></td>
        </tr>
        <tr>
            <td valign="top">User Type  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; 
			<select id="user_group_id_e" class="edit_select" >
			<?php 							  
				  echo get_user_group_dropdown($user_group_id, $company_id);
		   ?>	
			</select>
			</td>
        </tr>
        <tr>
            <td valign="top">User Name </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <input type="text" class="edit_input" name="user_full_name_e" id="user_full_name_e" value="<?php echo $row['user_full_name'];?>" /></td>
        </tr>
        <tr>
            <td valign="top">Login Id</td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <input type="text" class="edit_input" name="user_login_id_e" id="user_login_id_e" value="<?php echo $row['user_login_id'];?>" /></td>
        </tr>
        <tr>
            <td valign="top">Password </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <input type="password" class="edit_input" name="user_password_e" id="user_password_e" value="<?php echo $row['user_password'];?>" /></td>
        </tr>
        <tr>
            <td valign="top">Re-type Password </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <input type="password" class="edit_input" name="retype_user_password_e" id="retype_user_password_e" value="<?php echo $row['user_password'];?>" /></td>
        </tr>
        <tr>
            <td valign="top">Contact No </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <input type="text" class="edit_input" name="user_contact_no_e" id="user_contact_no_e" value="<?php echo $row['user_contact_no'];?>" /></td>
        </tr>
        <tr>
            <td valign="top">Email  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <input type="text" class="edit_input" name="user_email_e" id="user_email_e" value="<?php echo $row['user_email'];?>" /></td>
        </tr>
        <tr>
            <td valign="top">Address  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top"> &nbsp;&nbsp; <textarea class="edit_input" name="user_address_e" id="user_address_e"><?php echo $row['user_address'];?></textarea></td>
        </tr>
    </table> 
     <div  class="edit_btm"> <input type="button" class="btn_save" id="btn_update" value="Update" /></div>
    <?php
	}
?> 
<script type="text/javascript">
$(document).ready(function(){

  $("#btn_update").click(function(){
		var user_group_id = $("#user_group_id_e").val();
		var user_full_name = $("#user_full_name_e").val();
		var user_login_id  = $("#user_login_id_e").val();
		var user_password = $("#user_password_e").val();
		var retype_user_password = $("#retype_user_password_e").val();
		var user_contact_no = $("#user_contact_no_e").val();
		var user_email_no = $("#user_email_e").val();
		var user_address = $("#user_address_e").val();
		var user_id = $('#user_id').val();						

		var dataStr = "user_group_id="+user_group_id+"&user_full_name="+user_full_name+"&user_login_id="+user_login_id
						+"&user_password="+user_password+"&user_contact_no="+user_contact_no+"&user_email_no="+user_email_no+"&user_address="+user_address+"&user_id="+user_id;
											 
		//alert(dataStr);
		//alert(retype_user_password);
		if(user_group_id=="") {
			//alert("Select User Group");
			$("#sp_msg").html("Select User Group");
			$("#user_group_id_e").focus();
			return false;
		}else if(user_full_name=="") {
			//alert("Enter user full name");
			$("#sp_msg").html("Enter user full name");
			$("#user_full_name_e").focus();
			return false;
		}else if(user_login_id=="") {
			//alert("Enter user login id");
			$("#sp_msg").html("Enter user login id");
			$("#user_login_id_e").focus();
			return false;
		}else if(user_password=="") {
			//alert("Enter user password");
			$("#sp_msg").html("Enter user password");
			$("#user_password_e").focus();
			return false;
		}else if(retype_user_password=="") {
			//alert("Enter retype user password");
			$("#sp_msg").html("Enter retype user password");
			$("#retype_user_password_e").focus();
			return false;
		}else if(retype_user_password!=user_password) {
			//alert("Enter retype user password currectle");
			$("#sp_msg").html("Re-type user password currectle!");
			$("#retype_user_password_e").focus();
			return false;
		}else if(user_email_no!="") {
			if(!isValidEmailAddress(user_email_no))
			{
				//alert("Wrong email pattern! Enter user email address currectly");
				$("#sp_msg").html("Wrong email pattern! Enter user email address currectly1");
				$("#user_email_no_e").focus();
				return false;
			}
		}else{
			//alert(dataStr);								     
			$.ajax({
				type:"post" ,
				url:"includes/edit/edit_new_user_by_ajax.php" ,
				data:dataStr ,
				cache:false ,
				success:function(st)
				{
					alert(st);
					$("#depo_table").load("includes/table/user_info_datatable.php" , function(){}).fadeIn('slow');
					close_popup();
					reset_fields();
				}
			 });
		}

		
  });
});
</script>                                                                                               