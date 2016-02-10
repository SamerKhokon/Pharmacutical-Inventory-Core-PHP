	<div id="content"> <?php //session_start();?>
			<input type="hidden" id="company_id" value="<?php echo $_SESSION['COMPANY_ID'];?>"/>
		<input type="hidden" id="entry_by" value="<?php echo $_SESSION["LOGIN_USERID"]   ;?>"/>		
		<div>
				<span action="javascript:void(0);" class="register">
					<!-- <h1>Form Design</h1>			-->		
					<fieldset class="row2">
						<legend>Product Unit	 Setting</legend>
						<p>
							<label>Product Unit *
							</label>
							<input type="text" id="product_unit_name" class="long"/>						   
						</p>
						<p>
							<label></label>
							<input type="button" class="button"  id="product_unit_save"  value="Save"/>
						</p>						
					</fieldset>					
				</span>
                </div>
                
						<script   type="text/javascript">
						$(document).ready(function(){
						    $("#product_unit_name").focus();
                            $("#product_unit_table").load("includes/table/product_unit_datatable.php" , function(){});
						    $("#product_unit_name").keypress(function(ex){
						        if(ex.which == 13 ) {
								   var   product_unit_name  =  $("#product_unit_name").val();
								   if(product_unit_name=="") {
								       alert("Enter product_unit name");
									   $("#product_unit_name").focus();
									   return false;
								    }else{
									    $("#product_unit_save").focus();
									}
								}
							});
						   
							var reset_fields = function(){
							  $("#product_unit_name").val('');						
							  $("#product_unit_name").focus();
							}
						   
						   $("#product_unit_save").click(function(){	
								var   product_unit_name      =  $("#product_unit_name").val();						
								var dataStr                   = "product_unit_name="+product_unit_name;
							 
								if(product_unit_name=="") {
								       alert("Enter product_unit name");
									   $("#product_unit_name").focus();
									   return false;
								}else{
								    //alert(dataStr);								     
								     $.ajax({
									    type:"post" ,
										url:"includes/add_product_unit_by_ajax.php" ,
										data:dataStr ,
										cache:false ,
										success:function(st)
										{
										    alert(st);
											$("#product_unit_table").load("includes/table/product_unit_datatable.php" , function(){});
											reset_fields();
										}
									 });
							    }
						   });
						});
						</script>
						
				<?php //include("table/department_datatable.php"); ?>
                <div id="product_unit_table"></div>
           
                <br /> <br />

		</div>
        
		<!-- end content -->
