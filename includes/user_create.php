	<div id="content"> <?php include("./db.php"); //session_start();
			$company_id = $_SESSION['COMPANY_ID'];
		function get_user_group_dropdown($company_id){
			global $option2;
			$str = "SELECT * FROM `st_user_group` WHERE company_id=$company_id and active_flag='Y'";
			$sql =mysql_query($str);
			while($res = mysql_fetch_array($sql)) {
				$option2 .= "<option   value='".$res['user_group_id']."'>".$res['user_group']."</option>";
			}
			return $option2;
		}	
	?>
			<input type="hidden" id="company_id" value="<?php echo $_SESSION['COMPANY_ID'];?>"/>
		<input type="hidden" id="entry_by" value="<?php echo $_SESSION["LOGIN_USERID"]   ;?>"/>		
		<div>
				<span action="javascript:void(0);" class="register">
					<!-- <h1>Form Design</h1>			-->		
					<fieldset class="row1">
						<legend>Create User	</legend>
						<p>
							<label>User Group <font color="#FF0000">*</font>
							</label>
							<select id="user_group_id" class="long" >
							   <option value="">Select User Group</option>
							  <?php echo get_user_group_dropdown($company_id);?>
							</select>
						</p>						
						<p>
							<label>User Name <font color="#FF0000">*</font>
							</label>
							<input type="text" id="user_full_name" class="long"/>						   
						</p>
						<p>
							<label>Login Id <font color="#FF0000">*</font>
							</label>
							<input type="text" id="user_login_id" class="long"/>						   
						</p>
						<p>
							<label>Password <font color="#FF0000">*</font>
							</label>
							<input type="password" id="user_password" class="long" style="border:1px solid #356AA0;"/>						   
						</p>
						<p>
							<label>Re-type Password <font color="#FF0000">*</font>
							</label>
							<input type="password" id="retype_user_password" class="long" style="border:1px solid #356AA0;"/>						   
						</p>
						<p>
							<label>Contact No 
							</label>
							<input type="text" id="user_contact_no" class="long"/>						   
						</p>
						<p>
							<label>Email </label>
							<input type="text" id="user_email_no" class="long"/>
						</p>
						<p>
							<label>Address 
							</label>
                             <textarea id="user_address"  class="long"></textarea>
						</p>
						<p class="btm_save_reset">							
							<input type="button"style="width:70px;" class="btn_save"  id="btn_save"  value="Save"/>
                            &nbsp;
							<input type="button" style="width:70px;" class="btn_reset"  id="btn_reset"  value="Reset"/>
						</p>						
					</fieldset>					
				</span>
        </div>
                
<script   type="text/javascript">
$(document).ready(function(){
	$("#user_group_id").focus();
	$("#depo_table").load("includes/table/user_info_datatable.php" , function(){}).fadeIn('slow');
	 
	/*$(".depo_delete").live("click" , function(){
	   var depot_id = $(this).attr("id");
	   //alert(depot_id);
	   $.ajax({
		   type:"post",
		   url:"includes/remove/depot_delete.php",
		   data:"rid="+depot_id,
		   cache:false,
		   success:function(st){
			  alert(st);
			   $("#depo_table").load("includes/table/depo_datatable.php" , function(){}).fadeIn('slow');
		   }
	   });
	  
	});*/
	
	$("#user_group_id").keypress(function(ex){
		if(ex.which == 13 ) {
		   $("#user_full_name").focus();
		}
	});
	$("#user_full_name").keypress(function(ex){
		if(ex.which == 13 ) {
		   $("#user_login_id").focus();
		}
	});
   
	$("#user_login_id").keypress(function(ex){
		if(ex.which == 13 ) {
			$("#user_password").focus();
		}
	});		
	$("#user_password").keypress(function(ex){
		if(ex.which == 13 ) {
		   $("#retype_user_password").focus();
		}
	});			
	$("#retype_user_password").keypress(function(ex){
		if(ex.which == 13 ) {
		   $("#user_contact_no").focus();
		}
	});									   						   
	$("#user_contact_no").keypress(function(ex){
		if(ex.which == 13 ) {
		   $("#user_email_no").focus();
		}
	});
	$("#user_email_no").keypress(function(ex){
		if(ex.which == 13 ) {
		   $("#user_address").focus();
		}
	});
	$("#user_address").keypress(function(ex){
		if(ex.which == 13 ) {
		   $("#btn_save").focus();
		}
	});
	var reset_fields = function()
	{
		$("#user_group_id").val('');
		$("#user_full_name").val('');
		$("#user_login_id").val('');
		$("#user_password").val('');								     
		$("#retype_user_password").val('');								     
		$("#user_contact_no").val('');								     
		$("#user_email_no").val('');								     
		$("#user_address").val('');								     
		$("#user_group_id").focus();
	}									
   $("#btn_reset").click(function(){
   		reset_fields();	
   });
   $("#btn_save").click(function(){	
		var user_group_id = $("#user_group_id").val();
		var user_full_name = $("#user_full_name").val();
		var user_login_id  = $("#user_login_id").val();
		var user_password = $("#user_password").val();
		var retype_user_password = $("#retype_user_password").val();
		var user_contact_no = $("#user_contact_no").val();
		var user_email_no = $("#user_email_no").val();
		var user_address = $("#user_address").val();						

		var dataStr = "user_group_id="+user_group_id+"&user_full_name="+user_full_name+"&user_login_id="+user_login_id
						+"&user_password="+user_password+"&user_contact_no="+user_contact_no+"&user_email_no="+user_email_no+"&user_address="+user_address;
											 
		if(user_group_id=="") {
			   alert("Select User Group");
			   $("#user_group_id").focus();
			   return false;
		}else if(user_full_name=="") {
			   alert("Enter user full name");
			   $("#user_full_name").focus();
			   return false;
		}else if(user_login_id=="") {
			  alert("Enter user login id");
			 $("#user_login_id").focus();
			 return false;
		}else if(user_password=="") {
			  alert("Enter user password");
			 $("#user_password").focus();
			 return false;
		}else if(retype_user_password=="") {
			  alert("Enter retype user password");
			 $("#retype_user_password").focus();
			 return false;
		}else if(retype_user_password!=user_password) {
			  alert("Enter retype user password currectle");
			 $("#retype_user_password").focus();
			 return false;
		}else if(!isValidEmailAddress(user_email_no)) {
			  alert("Wrong email pattern! Enter user email address currectly");
			 $("#user_email_no").focus();
			 return false;
		}else{
			alert(dataStr);								     
			 $.ajax({
				type:"post" ,
				url:"includes/add_new_user_by_ajax.php" ,
				data:dataStr ,
				cache:false ,
				success:function(st)
				{
					alert(st);
					$("#depo_table").load("includes/table/user_info_datatable.php" , function(){}).fadeIn('slow');
					reset_fields();
				}
			 });
		}
   });
});
function edit_data(id)
{
	//alert(id);
	var dataStr = "id="+id;
	//alert(dataStr);
	$.ajax({
		type:"post" ,
		url:"includes/edit/user_info_edit.php" ,
		data:dataStr ,
		cache:false ,
		success:function(st)
		{
			if($.trim(st))
			{
				$("#inline2").html($.trim(st));
			}				
		}
	});
}
function view_data(id)
{
	//alert(id);
	var dataStr = "id="+id;
	//alert(dataStr);
	$.ajax({
		type:"post" ,
		url:"includes/view/user_info_view.php" ,
		data:dataStr ,
		cache:false ,
		success:function(st)
		{
			if($.trim(st))
			{
				$("#inline1").html($.trim(st));
			}				
		}
	});
	
}
function close_popup()
{
	$.fancybox.close();
}
function isValidEmailAddress(emailAddress) {
	if(emailAddress!='')
	{
		var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
		return pattern.test(emailAddress);
	}
	else
		return true;	
};
</script>
						
   <div id="depo_table"></div>
           
                <br /> <br />

		</div>
        
		<!-- end content -->
