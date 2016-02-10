<div id="content"> <?php //session_start();?>
	<input type="hidden" id="company_id" value="<?php echo $_SESSION['COMPANY_ID'];?>"/>
	<input type="hidden" id="entry_by" value="<?php echo $_SESSION["LOGIN_USERID"]   ;?>"/>		
    <div>
        <span action="javascript:void(0);" class="register">
            <!-- <h1>Form Design</h1>			-->		
            <fieldset class="row1">
                <legend>Department Setting	</legend>
                <p>
                    <label>Department Name <font color="#FF0000">*</font>
                    </label>
                    <input type="text" id="department_name" class="long"/>						   
                </p>
                <p>
                    <label>Department Code <font color="#FF0000">*</font>
                    </label>
                    <input type="text" id="department_code" class="long"/>
                </p>
                <p>
                    <label>Address 
                    </label>
                    <!--<input type="text" id="department_address" maxlength="10"/> -->
                    <textarea id="department_address" class="long"></textarea>
                </p>						
                <p>
                    <label>Mobile No <font color="#FF0000">*</font>
                    </label>
                    <input type="text" id="department_contact_no" class="long" onkeypress="return ret_valid_digit(event,'int',this.value.indexOf('.'));"/>
                </p>	
                <p>
                    <label>Email 
                    </label>
                    <input type="text" id="department_email" class="long"/>
                </p>						
                <p class="btm_save_reset">
                    
                    <input type="button" style="width:70px;" class="btn_save"  id="department_save"  value="Save"/>
                    &nbsp;<input type="button" style="width:70px;" class="btn_reset"  id="department_reset"  value="Reset"/>
                </p>						
            </fieldset>					
        </span>
    </div>
	<script type="text/javascript">
	$(document).ready(function(){
		$("#department_name").focus();
		var data_load = function(){
			$("#dept_table").load("includes/table/department_datatable.php" , function(){}).fadeIn('slow');
		}	
		data_load();
		$(".department_delete").live("click" , function(){
			var dep_id = $(this).attr("id");
            var c = confirm("Are you sure want to delete data");
			if(c == true)
			{
				$.ajax({
					type:"post",
					url:"includes/remove/dept_delete.php",
					data:"rid="+dep_id,
					cache:false,
					success:function(st){
						alert(st);
						data_load();
					}
				});
			}else{
			  return false;
			}			
		});
							
							
		$("#department_name").keypress(function(ex){
			if(ex.which == 13 ) {
			   	var   department_name  =  $("#department_name").val();
			   	if(department_name=="") {
				   alert("Enter department name");
				   $("#department_name").focus();
				   return false;
				}else{
					$("#department_code").focus();
				}
			}
		});
						   
		$("#department_code").bind('blur keypress',function(ex){
			if(ex.which == 13 ) {
				var   department_code  =  $("#department_code").val();
			   	if(department_code=="") {
					alert("Enter department code");
				   	$("#department_code").focus();
				   	return false;
				}else{
					var code = $("#department_code").val();
					isExistsCode(code);
				}
			}
		});
		/*$("#department_code").blur(function(){
			var code = $("#department_code").val();
			if(!isExistsCode(code)){
				alert('This Department code is already exists!');
				$("#department_code").focus();
				return;
			}
			else
				$("#department_address").focus();
		});*/	
		var isExistsCode = function(code){
			//alert(code);
			if(code!='')
			{
				var dataStr = 'code='+code;
				$.ajax({
					type:"post" ,
					url:"includes/chk_deptcode_existence_by_ajax.php" ,
					data:dataStr ,
					cache:false ,
					success:function(st)
					{
						//alert(st);
						if($.trim(st)=='yes')
						{
							//already exists
							alert('This Department code is already exists!');
							$("#department_code").select();
							return;
						}
						else
						{
							//not exists
							$("#department_address").focus();
							return;
						}
						
					}
				});
			}
			else
				return true;	
		}	
		$("#department_address").keypress(function(ex){
			$("#department_contact_no").focus();
		});			
		$("#department_contact_no").keypress(function(ex){
			if(ex.which == 13 ) {
				var   department_contact_no  =  $("#department_contact_no").val();
			   	if(department_contact_no=="") {
					alert("Enter mobile  no");
				   	$("#department_contact_no").focus();
				   	return false;
				}else{
					$("#department_email").focus();
				}
			}
		});									   						   
		$("#department_email").keypress(function(ex){
			if(ex.which == 13 ) {
				$("#department_save").focus();
			}
		});		

		var reset_fields = function(){
			$("#department_name").val('');
			$("#department_code").val('');
			$("#department_address").val('');
			$("#department_contact_no").val('');					    
			$("#department_email").val('');
			data_load();
			$("#department_name").focus();								
		}
						   						   							
						   
		$("#department_save").click(function(){	
			var   department_name      =  $("#department_name").val();
			var   department_code       =  $("#department_code").val();
			var   department_address  =  $("#department_address").val();
			var   department_contact_no  =  $("#department_contact_no").val();					    
			var   department_email           =  $("#department_email").val();
			var   company_id                     = $("#company_id").val();
			var   entry_by                           = $("#entry_by").val();
			var dataStr                   = "department_name="+department_name+"&department_code="+department_code
												 +"&department_address="+department_address+"&department_contact_no="+department_contact_no+
												 "&department_email="+department_email+"&company_id="+company_id+"&entry_by="+entry_by;
							 
			if(department_name=="") {
				alert("Enter department name");
				$("#department_name").focus();
				return false;
			}else if(department_code=="") {
				alert("Enter department code");
				$("#department_code").focus();
				return false;
			}
			/*else if(department_address=="") {
				alert("Enter address");
				$("#department_address").focus();
				return false;
			}*/
			else if(department_contact_no==""){
				alert("Enter mobile no");
				$("#department_contact_no").focus();
				return false;
			}
			/*else if(department_email=="") {
				alert("Enter email");
				$("#department_email").focus();
				return false;
			}*/
			else{
				//alert(dataStr);
				if(department_email!='')
				{	
					if(isValidEmailAddress(department_email))
					{								     
						$.ajax({
							type:"post" ,
							url:"includes/add_dept_by_ajax.php" ,
							data:dataStr ,
							cache:false ,
							success:function(st)
							{
								alert(st);
								reset_fields();
							}
						});
					}
					else
					{
					alert("Entered Email Address format is not current. Please insert the current form. eg.: yourid@yourdomin.com ");
						$("#department_email").focus();
						return false;
					}
				}
				else
				{
					$.ajax({
						type:"post" ,
						url:"includes/add_dept_by_ajax.php" ,
						data:dataStr ,
						cache:false ,
						success:function(st)
						{
							alert(st);
							reset_fields();
						}
					});
				}	 
			}
		});
		$('#department_reset').click(function(){
			reset_fields();
		});
	});
	var pkey=0;
	function ret_valid_digit(evt, type, cnt)
	{
		pkey= (evt.which) ? evt.which : event.keyCode;
	
		if(pkey==8 || pkey==127)
			return true;
		if(type=='int')
		{
			if(pkey>=48 && pkey <=57)
			return true;
		}
		else if(type=='double')
		{
			if(pkey>=48 && pkey <=57)
				return true;
			if(pkey==46 && cnt==-1)
				return true;
		}
		return false;
	}

	function edit_data(id)
	{
		//alert(id);
		var dataStr = "id="+id;
		//alert(dataStr);
		$.ajax({
			type:"post" ,
			url:"includes/edit/department_edit.php" ,
			data:dataStr ,
			cache:false ,
			success:function(st)
			{
				/*
				$data = $row['menu_name']."|".$row['module_id'].",".$row['module_folder']."|".$row['mother_menu_id']."|".$row['sub_menu_flag']."|".$row['menu_contant']."|".$row['common_for_all']."|".$row['menu_order'];
				*/
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
			url:"includes/view/department_view.php" ,
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
		var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
		return pattern.test(emailAddress);
	};
	</script>
	<div id="dept_table"></div>
    <br /> <br />
</div>
        
		<!-- end content -->
