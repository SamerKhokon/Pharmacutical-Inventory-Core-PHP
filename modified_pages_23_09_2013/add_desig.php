	<div id="content"> <?php //session_start();?>
			<input type="hidden" id="company_id" value="<?php echo $_SESSION['COMPANY_ID'];?>"/>
		<input type="hidden" id="entry_by" value="<?php echo $_SESSION["LOGIN_USERID"]   ;?>"/>		
		
				<span action="javascript:void(0);" class="register">
					<!-- <h1>Form Design</h1>			-->		
					<fieldset class="row2">
						<legend>Designation Stting	</legend>
						<p>
							<label>Designation Name *
							</label>
							<input type="text" id="designation_name" class="long"/>
						   
						</p>
						<script   type="text/javascript">
						$(document).ready(function(){
						   $("#designation_name").focus();
						   $("#desig_table").load("includes/table/designation_datatable.php" , function(){}).fadeIn('slow');
						
						   $("#designation_name").keypress(function(ex){
						        if(ex.which == 13 ) {
								   var   designation_name  =  $("#designation_name").val();
								   if(designation_name=="") {
								       alert("Enter designation name");
									   $("#designation_name").focus();
									   return false;
								    }else{
									    $("#designation_code").focus();
									}
								}
						   });
						   
						$("#designation_code").keypress(function(ex){
						        if(ex.which == 13 ) {
								   var   designation_code  =  $("#designation_code").val();
								   if(designation_code=="") {
								       alert("Enter designation code");
									   $("#designation_code").focus();
									   return false;
								    }else{
									    $("#desgination_save").focus();
									}
								}
						   });						   
						   
						   var reset_fields = function() {
								$("#designation_name").val('');						   
								$("#designation_code").val('');
								$("#designation_name").focus();						   							 
						   }						   
						   
						   $("#desgination_save").click(function(){	
							 var designation_name = $("#designation_name").val();						   
						     var designation_code = $("#designation_code").val();
							 var company_id           = $("#company_id").val();
							 var entry_by                 = $("#entry_by").val();
                             var dataStr                   = "designation_name="+designation_name+"&designation_code="+designation_code
							                                         +"&company_id="+company_id+"&entry_by="+entry_by;
							 
								if(designation_name=="") {
								       alert("Enter designation name");
									   $("#designation_name").focus();
									   return false;
								}else if(designation_code=="") {
								       alert("Enter designation code");
									   $("#designation_code").focus();
									   return false;
								}else{
								    //alert(dataStr);
								     
								     $.ajax({
									    type:"post" ,
										url:"includes/add_desig_by_ajax.php" ,
										data:dataStr ,
										cache:false ,
										success:function(st)
										{
										    alert(st);
											$("#desig_table").load("includes/table/designation_datatable.php" , function(){}).fadeIn('slow');
											reset_fields();
										}
									 });
							    }
						   });
						});
						</script>
						
						<p>
							<label>Designation Code *
							</label>
							<input type="text" id="designation_code" maxlength="10"/>
						</p>
						<p>
							<label></label>
							<input type="button" class="button"  id="desgination_save"  value="Save"/>
						</p>						
					</fieldset>
					
				</span>
        	
				<h1>Data Table</h1>        								
				<br /><br />
				<?php //include("table/designation_datatable.php"); ?>
                
				<div id="desig_table"></div>
                <br > <br >

		</div>
		<!-- end content -->
