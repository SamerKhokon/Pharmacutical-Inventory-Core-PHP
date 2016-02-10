	<div id="content"> <?php //session_start();?>
			<input type="hidden" id="company_id" value="<?php echo $_SESSION['COMPANY_ID'];?>"/>
		<input type="hidden" id="entry_by" value="<?php echo $_SESSION["LOGIN_USERID"]   ;?>"/>		
		<div>
				<span action="javascript:void(0);" class="register">
					<!-- <h1>Form Design</h1>			-->		
					<fieldset class="row2">
						<legend>Generic Name Setting</legend>
						<p>
							<label>Generic Name *
							</label>
							<input type="text" id="generic_name" class="long"/>						   
						</p>
						<p>
							<label>Generic Code *
							</label>
							<input type="text" id="generic_code" class="long"/>						   
						</p>						
						<p>
							<label></label>
							<input type="button" class="button"  id="generic_save"  value="Save"/>
						</p>						
					</fieldset>					
				</span>
                </div>
                
						<script   type="text/javascript">
						$(document).ready(function(){
						    $("#generic_name").focus();
                            $("#generic_name_table").load("includes/table/generic_name_datatable.php" , function(){});

						    $("#generic_name").keypress(function(ex){
						        if(ex.which == 13 ) {
								   var   generic_name  =  $("#generic_name").val();
								   if(generic_name=="") {
								       alert("Enter generic name");
									   $("#generic_name").focus();
									   return false;
								    }else{
									    $("#generic_code").focus();
									}
								}
							});
						   
							$("#generic_code").keypress(function(ex){
						        if(ex.which == 13 ) {
								   var   generic_code  =  $("#generic_code").val();
								   if(generic_code=="") {
								       alert("Enter generic code");
									   $("#generic_code").focus();
									   return false;
								    }else{
									    $("#generic_save").focus();
									}
								}
							});							
						   
						   var reset_fields = function(){
							$("#generic_name").val('');
							$("#generic_code").val('');						   
							$("#generic_name").focus();
						   }
						   
						   
						   $("#generic_save").click(function(){	
							var generic_name  = $("#generic_name").val();
							var generic_code = $("#generic_code").val();
							var dataStr = "generic_name="+generic_name+"&generic_code="+generic_code;
							
								if(generic_name=="") {
								       alert("Enter generic name");
									   $("#generic_name").focus();
									   return false;
								}else if(generic_code=="") {
								       alert("Enter generic code");
									   $("#generic_code").focus();
									   return false;
								}else{
								    //alert(dataStr);								     
								     $.ajax({
									    type:"post" ,
										url:"includes/add_generic_name_by_ajax.php" ,
										data:dataStr ,
										cache:false ,
										success:function(st)
										{
										    alert(st);
											$("#generic_name_table").load("includes/table/generic_name_datatable.php" , function(){});
											reset_fields();
										}
									 });
							    }
						   });
						});
						</script>
						
				<?php //include("table/department_datatable.php"); ?>
                <div id="generic_name_table"></div>
           
                <br /> <br />

		</div>
        
		<!-- end content -->
