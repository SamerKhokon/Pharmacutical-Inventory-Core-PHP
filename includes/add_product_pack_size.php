	<div id="content"> <?php //session_start();?>
			<input type="hidden" id="company_id" value="<?php echo $_SESSION['COMPANY_ID'];?>"/>
		<input type="hidden" id="entry_by" value="<?php echo $_SESSION["LOGIN_USERID"]   ;?>"/>		
		<div>
				<span action="javascript:void(0);" class="register">
					<!-- <h1>Form Design</h1>			-->		
					<fieldset class="row1">
						<legend>Product Pack Size Setting</legend>
						<p>
							<label>Product Pack Size <font color="#FF0000">*</font>
							</label>
							<input type="text" id="product_pack_size" class="long"/>						   
						</p>
						<p>
							<label>Quantity <font color="#FF0000">*</font>
							</label>
							<input type="text" id="product_pack_size_qty" class="long"/>						   
						</p>						
						<p class="btm_save_reset">
							
							<input type="button" style="width:70px;" class="btn_save"  id="product_pack_save"  value="Save"/>
                            &nbsp;<input type="button" style="width:70px;" class="btn_reset"  id="btn_reset"  value="Reset"/>
						</p>						
					</fieldset>					
				</span>
                </div>
                
						<script   type="text/javascript">
						$(document).ready(function(){
						    $("#product_pack_size").focus();
                            $("#product_unit_table").load("includes/table/product_pack_datatable.php" , function(){});
							
							 $(".product_pack_delete").live("click" , function(){
							   var product_pack_size_id = $(this).attr("id");
								var c = confirm("Are you sure want to delete data");
								if(c==true)
								{
								$.ajax({
							       type:"post",
								   url:"includes/remove/product_pack_delete.php",
								   data:"rid="+product_pack_size_id,
								   cache:false,
								   success:function(st){
								      alert(st);
									   $("#product_unit_table").load("includes/table/product_pack_datatable.php" , function(){}).fadeIn('slow');
								   }
								});
								}else
								{
								  return false;
								}
							  
							});

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
						function edit_data(id)
						{
							//alert(id);
							var dataStr = "id="+id;
							//alert(dataStr);
							$.ajax({
								type:"post" ,
								url:"includes/edit/product_pack_size_edit.php" ,
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
								url:"includes/view/product_pack_size_view.php" ,
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
                <div id="product_unit_table"></div>
           
                <br /> <br />

		</div>
        
		<!-- end content -->
