	<div id="content"> <?php //session_start();?>
			<input type="hidden" id="company_id" value="<?php echo $_SESSION['COMPANY_ID'];?>"/>
		<input type="hidden" id="entry_by" value="<?php echo $_SESSION["LOGIN_USERID"]   ;?>"/>		
		<div>
				<span action="javascript:void(0);" class="register">
					<!-- <h1>Form Design</h1>			-->		
					<fieldset class="row2">
						<legend>Product Pack Size Setting</legend>
						<p>
							<label>Product Pack Size *
							</label>
							<input type="text" id="product_pack_size" class="long"/>						   
						</p>
						<p>
							<label>Quantity *
							</label>
							<input type="text" id="product_pack_size_qty" class="long"/>						   
						</p>						
						<p>
							<label></label>
							<input type="button" class="button"  id="product_pack_save"  value="Save"/>
						</p>						
					</fieldset>					
				</span>
                </div>
                
						<script   type="text/javascript">
						$(document).ready(function(){
						    $("#product_pack_size").focus();
                            $("#product_unit_table").load("includes/table/product_pack_datatable.php" , function(){});

						    $("#product_pack_size").keypress(function(ex){
						        if(ex.which == 13 ) {
								   var   product_pack_size  =  $("#product_pack_size").val();
								   if(product_pack_size=="") {
								       alert("Enter product pack size");
									   $("#product_pack_size").focus();
									   return false;
								    }else{
									    $("#product_pack_size_qty").focus();
									}
								}
							});
						   
							$("#product_pack_size_qty").keypress(function(ex){
						        if(ex.which == 13 ) {
								   var   product_pack_size_qty  =  $("#product_pack_size_qty").val();
								   if(product_pack_size_qty=="") {
								       alert("Enter product_pack size quantity");
									   $("#product_pack_size_qty").focus();
									   return false;
								    }else{
									    $("#product_pack_save").focus();
									}
								}
							});							
							
							
							var reset_fields = function(){
							$("#product_pack_size").val('');
							$("#product_pack_size_qty").val('');							
							$("#product_pack_size").focus();							
							
							}
							
							
						   
						   $("#product_pack_save").click(function(){	
							var product_pack_size  = $("#product_pack_size").val();
							var product_pack_size_qty = $("#product_pack_size_qty").val();
							var dataStr = "product_pack_size="+product_pack_size+"&product_pack_size_qty="+product_pack_size_qty;
							
								if(product_pack_size=="") {
								       alert("Enter product_pack size");
									   $("#product_pack_size").focus();
									   return false;
								}else if(product_pack_size_qty=="") {
								       alert("Enter product_pack size quantity");
									   $("#product_pack_size_qty").focus();
									   return false;
								}else{
								    //alert(dataStr);								     
								     $.ajax({
									    type:"post" ,
										url:"includes/add_product_pack_size_qty_by_ajax.php" ,
										data:dataStr ,
										cache:false ,
										success:function(st)
										{
										    alert(st);
											$("#product_unit_table").load("includes/table/product_pack_datatable.php" , function(){});
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
