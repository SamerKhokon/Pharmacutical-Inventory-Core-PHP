	<div id="content"> <?php //session_start();?>
			<input type="hidden" id="company_id" value="<?php echo $_SESSION['COMPANY_ID'];?>"/>
		<input type="hidden" id="entry_by" value="<?php echo $_SESSION["LOGIN_USERID"]   ;?>"/>		
		<div>
				<span action="javascript:void(0);" class="register">
					<!-- <h1>Form Design</h1>			-->		
					<fieldset class="row2">
						<legend>Department Setting	</legend>
						<p>
							<label>Department Name *
							</label>
							<input type="text" id="department_name" class="long"/>						   
						</p>
						<p>
							<label>Department Code *
							</label>
							<input type="text" id="department_code" maxlength="10"/>
						</p>
						<p>
							<label>Address *
							</label>
							<!--<input type="text" id="department_address" maxlength="10"/> -->
                            <textarea id="department_address" style="border:1px solid #E1E1E1; resize:none;"></textarea>
						</p>						
						<p>
							<label>Contact No *
							</label>
							<input type="text" id="department_contact_no" maxlength="15"/>
						</p>	
						<p>
							<label>Email *
							</label>
							<input type="text" id="department_email" maxlength="50"/>
						</p>						
						<p>
							<label></label>
							<input type="button" class="button"  id="department_save"  value="Save"/>
						</p>						
					</fieldset>					
				</span>
                </div>
                
						<script   type="text/javascript">
						$(document).ready(function(){
						    $("#department_name").focus();
                            $("#dept_table").load("includes/table/department_datatable.php" , function(){}).fadeIn('slow');
							
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
						   
							$("#department_code").keypress(function(ex){
						        if(ex.which == 13 ) {
								   var   department_code  =  $("#department_code").val();
								   if(department_code=="") {
								       alert("Enter department code");
									   $("#department_code").focus();
									   return false;
								    }else{
									    $("#department_address").focus();
									}
								}
						    });		
							$("#department_address").keypress(function(ex){
						        if(ex.which == 13 ) {
								   var   department_address  =  $("#department_address").val();
								   if(department_address=="") {
								       alert("Enter department address");
									   $("#department_address").focus();
									   return false;
								    }else{
									    $("#department_contact_no").focus();
									}
								}
						    });			
							$("#department_contact_no").keypress(function(ex){
						        if(ex.which == 13 ) {
								   var   department_contact_no  =  $("#department_contact_no").val();
								   if(department_contact_no=="") {
								       alert("Enter department contact  no");
									   $("#department_contact_no").focus();
									   return false;
								    }else{
									    $("#department_email").focus();
									}
								}
						    });									   						   
							$("#department_email").keypress(function(ex){
						        if(ex.which == 13 ) {
								   var   department_email  =  $("#department_email").val();
								   if(department_email=="") {
								       alert("Enter department email");
									   $("#department_email").focus();
									   return false;
								    }else{
									    $("#department_save").focus();
									}
								}
							});									   						   
						   
						   var reset_fields = function(){
								$("#department_name").val('');
								$("#department_code").val('');
								$("#department_address").val('');
								$("#department_contact_no").val('');					    
								$("#department_email").val('');
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
								}else if(department_address=="") {
								      alert("Enter department address");
								     $("#department_address").focus();
									 return false;
								}else if(department_contact_no==""){
								    alert("Enter department contact no");
									$("#department_contact_no").focus();
								    return false;
								}else if(department_email=="") {
								    alert("Enter department email");
									$("#department_email").focus();
								    return false;
								}else{
								    //alert(dataStr);								     
								     $.ajax({
									    type:"post" ,
										url:"includes/add_dept_by_ajax.php" ,
										data:dataStr ,
										cache:false ,
										success:function(st)
										{
										    alert(st);
											$("#dept_table").load("includes/table/department_datatable.php" , function(){}).fadeIn('slow');
											reset_fields();
										}
									 });
							    }
						   });
						   
						});
						</script>
						
				<?php //include("table/department_datatable.php"); ?>
                <div id="dept_table"></div>
           
                <br /> <br />

		</div>
        
		<!-- end content -->
