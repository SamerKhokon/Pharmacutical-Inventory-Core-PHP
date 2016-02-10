	<div id="content"> <?php include("db.php");  $company_id = $_SESSION["COMPANY_ID"];  // if($con) echo 1;else echo 0;?>
		<input type="hidden" id="company_id" value="<?php echo $_SESSION['COMPANY_ID'];?>"/>
		<input type="hidden" id="entry_by" value="<?php echo $_SESSION["LOGIN_USERID"]   ;?>"/>
			<?php

						function generic_name_dropdown($company_id) {	
						    global $option1;
							$str = "SELECT generic_name_id,generic_name FROM generic_name_info WHERE company_id=$company_id";
							$sql = mysql_query($str);
							
							while( $res = mysql_fetch_array($sql) ){
							 $option1 .= "<option value='".$res[0]."'>".$res[1]."</option>";
							}
									return $option1;
						}
						function product_pack_size_dropdown($company_id) {	
							global $option2;
							$str = "SELECT product_pack_size_id,product_pack_size FROM product_pack_size WHERE company_id=$company_id";
							$sql = mysql_query($str);
							
							while( $res = mysql_fetch_array($sql) ){
							 $option2 .= "<option value='".$res[0]."'>".$res[1]."</option>";
							}
							return $option2;
						}				
						function product_unit_dropdown($company_id) {	
							global $option3;
							$str = "SELECT  product_unit_id,product_unit FROM product_unit_info WHERE company_id=$company_id";
							$sql = mysql_query($str);
							
							while( $res = mysql_fetch_array($sql) ){
							 $option3 .= "<option value='".$res[0]."'>".$res[1]."</option>";
							}
									return $option3;
						}									

				?>
		
		<div>
				<span action="javascript:void(0);" class="register">
					<!-- <h1>Form Design</h1>			-->		
					<fieldset class="row1">
						<legend>Product Setting</legend>
						<p>
							<label>Generic Name <font color="#FF0000">*</font>
							</label>
							<select id="generic_name" class="long"><?php echo generic_name_dropdown($company_id);?></select>
							
							<label>Product Unit <font color="#FF0000">*</font>
							</label>
							<select id="product_unit" class="long" ><?php echo product_unit_dropdown($company_id);?></select>						  							
						</p>
						<p> 
							<label>Product Code <font color="#FF0000">*</font>
							</label>
							<input type="text" id="product_code" class="long" />
                            
							<label>Unit Price <font color="#FF0000">*</font>
							</label>
							<input type="text" id="product_unit_price" class="long"  />						   							
						</p>						
						<p >
							<label>Product Name <font color="#FF0000">*</font>
							</label>
							<input type="text" id="product_name" class="long" />
                            <label>Product Pack Size <font color="#FF0000">*</font>
							</label>
							<select id="product_pack_size" class="long" ><?php echo product_pack_size_dropdown($company_id) ;?></select>	
															
						</p>
						<p>
							<label>Description <font color="#FF0000">*</font>
							</label>
							<!--<input type="text" id="product_description"  />-->	
                            <textarea id="product_description"  class="long"></textarea>	
                            </p>
                            <p class="btm_save_reset">
							<input type="button" style="width:70px;" class="btn_save"  id="product_save"  value="Save"/>
                             &nbsp;<input type="button" style="width:70px;" class="btn_reset"  id="btn_reset"  value="Reset"/>							
						</p>	
					</fieldset>													
				</span>
        </div>
                
						<script   type="text/javascript">
						$(document).ready(function(){
						    $("#generic_name").focus();
                            $("#product_table").load("includes/table/product_datatable.php" , function(){});
							
							 $(".product_delete").live("click" , function(){
							   var product_id = $(this).attr("id");
							   var c = confirm("Are you sure want to delete data");
							   if(c==true)
							   {
									$.ajax({
									   type:"post",
									   url:"includes/remove/product_delete.php",
									   data:"rid="+product_id,
									   cache:false,
									   success:function(st){
										  alert(st);
										   $("#product_table").load("includes/table/product_datatable.php" , function(){}).fadeIn('slow');
									   }
									});
								}else{
								  return false;
								}							  
							});

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
						   
						   
						var reset_fields = function() {
								$("#generic_name").val(0); 
								$("#product_code").val('');
								$("#product_name").val('');
								$("#product_unit").val(0);
                                $("#product_pack_size").val(0);								
								$("#product_unit_price").val('');					
								$("#product_description").val('');
								$("#product_code").focus();								
						   }						   
						   
						    $("#product_save").click(function()
							{	
								var generic_name = $("#generic_name").val(); 
								var product_code = $("#product_code").val();
								var product_name = $("#product_name").val();
								var product_unit    = $("#product_unit").val();
                                var product_pack_size_id = $("#product_pack_size").val();								
								var product_unit_price =$("#product_unit_price").val();					
								var product_description = $("#product_description").val();
								var dataStr = "generic_name="+generic_name+"&product_code="+product_code+
									"&product_name="+product_name+"&product_unit="+product_unit+
									"&product_pack_size_id="+product_pack_size_id+
									"&product_unit_price="+product_unit_price+"&product_description="+product_description;
							
							
								if(generic_name=="") {
								       alert("Enter generic name");
									   $("#generic_name").focus();
									   return false;
								}else if(product_code=="") {
								       alert("Enter product code");
									   $("#product_code").focus();
									   return false;
								}else if(product_name=="") {
								       alert("Enter product name");
									   $("#product_name").focus();
									   return false;
								}else if(product_unit=="") {
								       alert("Enter product unit");
									   $("#product_unit").focus();
									   return false;
								}else if(product_unit_price=="") {
								       alert("Enter product unit price");
									   $("#product_unit_price").focus();
									   return false;
								}else if(product_description=="") {
								       alert("Enter product description");
									   $("#product_description").focus();
									   return false;
								}else{
								    //alert(dataStr); 								     
								     $.ajax({
									    type:"post" ,
										url:"includes/add_product_by_ajax.php" ,
										data:dataStr ,
										cache:false ,
										success:function(st)
										{
										    alert(st);
											$("#product_table").load("includes/table/product_datatable.php" , function(){});
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
								url:"includes/edit/product_edit.php" ,
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
								url:"includes/view/product_view.php" ,
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
				<br/>
                <div id="product_table"></div>
           
                <br /> <br />
	
		</div>
        
		<!-- end content -->
