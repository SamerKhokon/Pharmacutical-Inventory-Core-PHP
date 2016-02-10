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
						<legend>Product Offer Setting</legend>
						<p>
							<label>Product Offer *</label>							
							<input type="text"  id="product_offer"/>
							
							<label>Product Batch Id *</label>							
						    <select  id="product_batch_id" >
							  <?php  echo product_dropdown($company_id);  ?>
							</select>
						</p>
					</fieldset>
					<fieldset class="row2">
						<legend>Personal Information
						</legend>
						<p>
							<label>Offere Start Date *	</label>
							<input type="text" id="product_start_date"class="long"/>						   
						</p>
						<p>
							<label>Offer End Date *
							</label>
							<input type="text" id="product_end_date"  class="long"/>
						</p>
						<p>
							<label></label>
							<input type="button" class="button"  id="product_offer_save"  value="Save"/>
						</p>

					</fieldset>
				</span>		

				<script type="text/javascript">
				$(document).ready(function(){
				    $("#product_offer").focus();					
					$("#product_offer_table").load("includes/table/product_offer_datatable.php" , function() {} ).fadeIn('slow');
					
					
					var reset_fields = function(){
						$("#product_offer").val(''); 
						$("#product_batch_id").val('');
						$("#product_start_date").val('');
						$("#product_end_date").val('');					
						$("#product_offer").focus(); 
					}
					
					
				    $("#product_offer_save").click(function(){
						var product_offer = $("#product_offer").val(); 
						var  product_batch_id=$("#product_batch_id").val();
						var product_start_date =$("#product_start_date").val();
						var product_end_date =$("#product_end_date").val();
						
						var  dataStr = "product_offer="+product_offer+"&product_batch_id="+product_batch_id+"&product_start_date="+product_start_date+
						"&product_end_date="+product_end_date;
						//alert(dataStr);
						if(product_offer=="") {
						    alert("Enter product offer");
							$("#product_offer").focus(); 
							return false;
						}else{
							$.ajax({
								type:"post"  ,
								url: "includes/add_product_offer_by_ajax.php" ,
								data:dataStr ,
								cache:false ,
								success:function(st){ 
								   alert(st);
								   $("#product_offer_table").load("includes/table/product_offer_datatable.php" , function() {} ).fadeIn('slow');
								   reset_fields();
								}
							});
						}
				    });
				});
				</script>				
				
				 
				 <?php //include("table/employee_datatable.php"); ?>
				 <div id="product_offer_table"></div>
                 <br /><br />
		</div>
		<!-- end content -->