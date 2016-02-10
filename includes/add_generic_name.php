	<div id="content"> <?php //session_start();?>
			<input type="hidden" id="company_id" value="<?php echo $_SESSION['COMPANY_ID'];?>"/>
		<input type="hidden" id="entry_by" value="<?php echo $_SESSION["LOGIN_USERID"]   ;?>"/>		
		<div>
				<span action="javascript:void(0);" class="register">
					<!-- <h1>Form Design</h1>			-->		
					<fieldset class="row1">
						<legend>Generic Name Setting</legend>
						<p>
							<label>Generic Name <font color="#FF0000">*</font>
							</label>
							<input type="text" id="generic_name" class="long"/>						   
						</p>
						<p>
							<label>Generic Code <font color="#FF0000">*</font>
							</label>
							<input type="text" id="generic_code" class="long"/>						   
						</p>						
						<p class="btm_save_reset">
							
							<input type="button" style="width:70px;" class="btn_save"  id="generic_save"  value="Save"/>
                            &nbsp;<input type="button" style="width:70px;" class="btn_reset"  id="btn_reset"  value="Reset"/>
						</p>						
					</fieldset>					
				</span>
                </div>
                
						<script   type="text/javascript">
						$(document).ready(function(){
						    $("#generic_name").focus();
                            $("#generic_name_table").load("includes/table/generic_name_datatable.php" , function(){});
							
							 $(".generic_name_delete").live("click" , function(){
							   var generic_name_id = $(this).attr("id");
							   var c = confirm("Are you sure want to delete data");
							   if(c==true)
							   {
								   $.ajax({
									   type:"post",
									   url:"includes/remove/generic_name_delete.php",
									   data:"rid="+generic_name_id,
									   cache:false,
									   success:function(st){
										  alert(st);
										   $("#generic_name_table").load("includes/table/generic_name_datatable.php" , function(){}).fadeIn('slow');
									   }
									});
								}else{
								  return false;
								}
							  
							});
							   var reset_fields = function(){
							$("#generic_name").val('');
							$("#generic_code").val('');						   
							$("#generic_name").focus();
						   }
						   

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
						function edit_data(id)
						{
							var dataStr = "id="+id;
							$.ajax({
								type:"post" ,
								url:"includes/edit/generic_name_edit.php" ,
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
								url:"includes/view/generic_view.php" ,
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
						</script>
						
				<?php //include("table/department_datatable.php"); ?>
                <div id="generic_name_table"></div>
           
                

		</div>
        
		<!-- end content -->
