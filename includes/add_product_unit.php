	<div id="content"> <?php //session_start();?>
			<input type="hidden" id="company_id" value="<?php echo $_SESSION['COMPANY_ID'];?>"/>
		<input type="hidden" id="entry_by" value="<?php echo $_SESSION["LOGIN_USERID"]   ;?>"/>		
		<div>
				<span action="javascript:void(0);" class="register">
					<!-- <h1>Form Design</h1>			-->		
					<fieldset class="row1">
						<legend>Product Unit	 Setting</legend>
						<p>
							<label>Product Unit <font color="#FF0000">*</font>
							</label>
							<input type="text" id="product_unit_name" class="long"/>						   
						</p>
						<p class="btm_save_reset">
							
							<input type="button" style="width:70px;" class="btn_save"  id="product_unit_save"  value="Save"/>
                            &nbsp;<input type="button" style="width:70px;" class="btn_reset"  id="btn_reset"  value="Reset"/>
						</p>						
					</fieldset>					
				</span>
                </div>
                
						<script   type="text/javascript">
						$(document).ready(function(){
						    $("#product_unit_name").focus();
                            $("#product_unit_table").load("includes/table/product_unit_datatable.php" , function(){});
							
							 $(".product_unit_delete").live("click" , function(){
							   var product_unit_id = $(this).attr("id");
							   var c = confirm("Are you sure want to delete data");
							   if(c==true)
							   {
							   $.ajax({
							       type:"post",
								   url:"includes/remove/product_unit_delete.php",
								   data:"rid="+product_unit_id,
								   cache:false,
								   success:function(st){
								      alert(st);
									   $("#product_unit_table").load("includes/table/product_unit_datatable.php" , function(){}).fadeIn('slow');
								   }
								});
								}else{
								  return false;
								}							  
							});
							
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
						function edit_data(id)
						{
							//alert(id);
							var dataStr = "id="+id;
							//alert(dataStr);
							$.ajax({
								type:"post" ,
								url:"includes/edit/product_unit_edit.php" ,
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
								url:"includes/view/product_unit_view.php" ,
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
						
				
                <div id="product_unit_table"></div>
           
                <br /> <br />

		</div>
        
		<!-- end content -->
