	<div id="content"> <?php //session_start();?>
			<input type="hidden" id="company_id" value="<?php echo $_SESSION['COMPANY_ID'];?>"/>
		<input type="hidden" id="entry_by" value="<?php echo $_SESSION["LOGIN_USERID"]   ;?>"/>		
		<div>
				<span action="javascript:void(0);" class="register">
					<!-- <h1>Form Design</h1>			-->		
					<fieldset class="row2">
						<legend>Depo Setting	</legend>
						<p>
							<label>Depo Type *
							</label>
							<select id="depo_type" >
							   <option value="FD">FD</option>
							   <option value="CD">CD</option>
							   <option value="SD">SD</option>
							</select>
						</p>						
						<p>
							<label>Depo Name *
							</label>
							<input type="text" id="depo_name" class="long"/>						   
						</p>
						<p>
							<label>Address *
							</label>
							<input type="text" id="depo_address" class="long"/>
						</p>
						<p>
							<label>Contact No *
							</label>
							<input type="text" id="depo_contact_no" class="long"/>
						</p>
						<p>
							<label></label>
							<input type="button" class="button"  id="depo_save"  value="Save"/>
						</p>						
					</fieldset>					
				</span>
                </div>
                
						<script   type="text/javascript">
						$(document).ready(function(){
						    $("#depo_name").focus();
                            $("#depo_table").load("includes/table/depo_datatable.php" , function(){}).fadeIn('slow');
							
							$("#depo_type").change(function(){
							   var  depo_type = $("#depo_type").val();
							   if(depo_type!="") {
							     $("#depo_name").focus();
							   }
							});
							
							
						    $("#depo_name").keypress(function(ex){
						        if(ex.which == 13 ) {
								   var   depo_name  =  $("#depo_name").val();
								   if(depo_name=="") {
								       alert("Enter depot name");
									   $("#depo_name").focus();
									   return false;
								    }else{
									    $("#depo_address").focus();
									}
								}
							});
						   
							$("#depo_address").keypress(function(ex){
						        if(ex.which == 13 ) {
								   var   depo_address  =  $("#depo_address").val();
								   if(depo_address=="") {
								       alert("Enter depo address");
									   $("#depo_address").focus();
									   return false;
								    }else{
									    $("#depo_contact_no").focus();
									}
								}
						    });		
							$("#depo_contact_no").keypress(function(ex){
						        if(ex.which == 13 ) {
								   var   depo_contact_no  =  $("#depo_contact_no").val();
								   if(depo_contact_no=="") {
								       alert("Enter depo contact no");
									   $("#depo_contact_no").focus();
									   return false;
								    }else{
									    $("#depo_save").focus();
									}
								}
						    });			
							
						var reset_fields = function()
						{
								$("#depo_type").val(0);
								$("#depo_name").val('');
								$("#depo_address").val('');
								$("#depo_contact_no").val('');								     
								$("#depo_name").focus();
						   }							
						   
						   $("#depo_save").click(function(){	
						        var depo_type = $("#depo_type").val();
								var depo_name = $("#depo_name").val();
								var depo_address  = $("#depo_address").val();
								var depo_contact_no = $("#depo_contact_no").val();						

								var dataStr = "depo_type="+depo_type+"&depo_name="+depo_name+"&depo_address="+depo_address
							                                         +"&depo_contact_no="+depo_contact_no;
																	 
								if(depo_name=="") {
								       alert("Enter depo name");
									   $("#depo_name").focus();
									   return false;
								}else if(depo_address=="") {
								       alert("Enter depo address");
									   $("#depo_address").focus();
									   return false;
								}else if(depo_contact_no=="") {
								      alert("Enter depo contact no");
								     $("#depo_contact_no").focus();
									 return false;
								}else{
								    //alert(dataStr);								     
								     $.ajax({
									    type:"post" ,
										url:"includes/add_depo_by_ajax.php" ,
										data:dataStr ,
										cache:false ,
										success:function(st)
										{
										    alert(st);
											reset_fields();
											$("#depo_table").load("includes/table/depo_datatable.php" , function(){}).fadeIn('slow');
										}
									 });
							    }
						   });
						   
						  
						   
						});
						</script>
						
				<?php //include("table/department_datatable.php"); ?>
                <div id="depo_table"></div>
           
                <br /> <br />

		</div>
        
		<!-- end content -->
