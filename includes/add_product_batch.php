	<script>
		$(function() {
		    var product_mng_datePickerOption = {
			   dateFormat:"dd-mm-yy" ,
			   changeMonth:true ,
			   changeYear:true			   
			};
			$( "#product_mng_date" ).datepicker(product_mng_datePickerOption);
		
			$( "#product_exp_date" ).datepicker(product_mng_datePickerOption);
		});
		</script>
    	<?php include("db.php");   if($con) 
		$company_id = $_SESSION["COMPANY_ID"];
		   function product_dropdown($company_id){
		      global $option1;
			   $str = "SELECT product_id,product_code,product_name FROM `product_info` WHERE company_id=$company_id";
			  $sql = mysql_query($str);
			  while($res = mysql_fetch_array($sql) ) {
				$option1 .=  "<option value='".$res[0] ."#".$res[1] . "'>".$res[2] ."(".  $res[1]. ")</option>";
			  }
			  return $option1;
		   }
		?>
		<div id="content">
				<span action="" class="register">
					<!-- <h1>Form Design</h1> -->
					<fieldset class="row1">
						<legend>Product Batch Setting</legend>
						<p>
							<label>Batch Code <font color="#FF0000">*</font></label>							
							<input type="text"  class="long" id="product_batch_code"/>
							
							<label>Product <font color="#FF0000">*</font></label>							
						    <select  id="product_id" class="long" >
							  <?php  echo product_dropdown($company_id);  ?>
							</select>
						</p>
					</fieldset>
					<fieldset class="row1">
						<legend>Personal Information
						</legend>
						<p>
							<label>Product Quantity <font color="#FF0000">*</font>	</label>
							<input type="text" id="product_qty"class="long"/>						   
						</p>
						<p>
							<label>Mng Date <font color="#FF0000">*</font>
							</label>
							<input type="text" id="product_mng_date"  class="long"/>
						</p>
						<p>
							<label>Exp Date <font color="#FF0000">*</font>
							</label>
							<input type="text" id="product_exp_date"  class="long"/>
						</p>						
						<p class="btm_save_reset">
							
							<input type="button" style="width:70px;" class="btn_save"  id="product_batch_save"  value="Save"/>
                             &nbsp;<input type="button" style="width:70px;" class="btn_reset"  id="btn_reset"  value="Reset"/>
						</p>

					</fieldset>
				</span>		

				
				<script type="text/javascript">
				$(document).ready(function(){
				    $("#product_batch_code").focus();
					
					$("#product_batch_table").load("includes/table/product_batch_datatable.php" , function() {} ).fadeIn('slow');
					
					 $(".product_batch_delete").live("click" , function(){
							   var product_batch_id = $(this).attr("id");
							var c = confirm("Are you sure want to delete data");   //alert(product_batch_id);
							if(c==true)
							{
							   $.ajax({
							       type:"post",
								   url:"includes/remove/product_batch_delete.php",
								   data:"rid="+product_batch_id,
								   cache:false,
								   success:function(st){
								      alert(st);
									   $("#product_batch_table").load("includes/table/product_batch_datatable.php" , function(){}).fadeIn('slow');
								   }
							   });
							}else{
							  return false;
							}  
							});
					
					
					var reset_fields = function() {
						$("#product_batch_code").val();	
						$("#product_id").val(0);			
						$("#product_qty").val();	
						$("#product_mng_date").val();
						$("#product_exp_date").val();								
						$("#product_batch_code").focus();	
					}					
					
				    $("#product_batch_save").click(function(){
						var product_batch_code = $("#product_batch_code").val();	
						var product_id = $("#product_id").val();			
						var product_qty = $("#product_qty").val();	
						var product_mng_date = $("#product_mng_date").val();
						var product_exp_date =$("#product_exp_date").val();															
						
						var  dataStr = "product_batch_code="+product_batch_code+"&product_id="+product_id+"&product_qty="+product_qty+
						"&product_mng_date="+product_mng_date+"&product_exp_date="+product_exp_date;
                        if(product_batch_code==""){
						  alert("Enter product batch code");
						  $("#product_batch_code").focus();
						  return false;
						}else if(product_id==""){ 
						   alert("Select product");
						   $("#product_id").focus();
						   return false;
						}else if(product_qty==""){
						  alert("Enter product quantity");
						  $("#product_qty").focus();
						  return false;
						}else if(product_mng_date=="") {
						  alert("Enter product manufacture date");
						  $("#product_mng_date").focus();
						  return false;
						}else if(product_exp_date=="") {
						  alert("Enter product expire date");
						  $("#product_exp_date").focus();
						  return false;
						}else if(product_mng_date==product_exp_date){
						  alert("Product manufacture date and expire date cannot be same");
						  return false;
						}else {						
							$.ajax({
								type:"post"  ,
								url: "includes/add_product_batch_by_ajax.php" ,
								data:dataStr ,
								cache:false ,
								success:function(st){ 
								   alert(st);
								   $("#product_batch_table").load("includes/table/product_batch_datatable.php" , function() {} ).fadeIn('slow');
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
								url:"includes/edit/product_batch_edit.php" ,
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
						url:"includes/view/product_batch_view.php" ,
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
				
				 
				 <?php //include("table/employee_datatable.php"); ?>
				 <div id="product_batch_table"></div>
                 <br /><br />
		</div>
		<!-- end content -->