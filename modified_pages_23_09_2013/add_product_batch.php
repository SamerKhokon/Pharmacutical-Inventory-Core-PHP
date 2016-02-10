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
							<label>Batch Code *</label>							
							<input type="text"  id="product_batch_code"/>
							
							<label>Product *</label>							
						    <select  id="product_id" >
							  <?php  echo product_dropdown($company_id);  ?>
							</select>
						</p>
					</fieldset>
					<fieldset class="row2">
						<legend>Personal Information
						</legend>
						<p>
							<label>Product Quantity *	</label>
							<input type="text" id="product_qty"class="long"/>						   
						</p>
						<p>
							<label>Mng Date *
							</label>
							<input type="text" id="product_mng_date"  class="long"/>
						</p>
						<p>
							<label>Exp Date *
							</label>
							<input type="text" id="product_exp_date"  class="long"/>
						</p>						
						<p>
							<label></label>
							<input type="button" class="button"  id="product_batch_save"  value="Save"/>
						</p>

					</fieldset>
				</span>		

				
				<script type="text/javascript">
				$(document).ready(function(){
				    $("#product_batch_code").focus();
					
					$("#product_batch_table").load("includes/table/product_batch_datatable.php" , function() {} ).fadeIn('slow');
					
					
					
					
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

						if(product_batch_code=="")	 {
						  alert("Enter product batch code");
						  $("#product_batch_code").focus();
						  return false;
						}else if(product_qty=="") {
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
						}else{						
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
				</script>				
				
				 
				 <?php //include("table/employee_datatable.php"); ?>
				 <div id="product_batch_table"></div>
                 <br /><br />
		</div>
		<!-- end content -->