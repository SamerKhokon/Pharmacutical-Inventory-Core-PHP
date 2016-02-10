		<div id="content">
				<span action="" class="register">
					<!-- <h1>Form Design</h1> -->
					<fieldset class="row1">
						<legend>Customer Details</legend>
						<p>
							<label>Costomer Code *</label>							
							<input type="text"  id="cust_code"/>
							
							<label>Depo *</label>							
							<select  id="cust_depo">
							   <option value="0">HR</option>
							</select>
						</p>
						<p>
							<label>Zone *
							</label>
							<select  id="cust_zone">
							   <option value="0">M.I.O</option>
							</select>
						</p>
							
					</fieldset>
					<fieldset class="row2">
						<legend>Personal Information
						</legend>
						<p>
							<label>Customer Name *	</label>
							<input type="text" id="cust_name"class="long"/>						   
						</p>
						<p>
							<label>Organization Name *
							</label>
							<input type="text" id="cust_org_name"  class="long"/>
						</p>
						<p>
							<label >Owner Name	</label>
							<input type="text" id="cust_owner_name" class="long"/>
						</p>
						<p>
							<label>Customer Address *</label>
							<input type="text"  id ="cust_address" class="long"/>
						</p>
						<p>
							<label >Contact No</label>
							<input class="long" id="cust_contact_no" type="text" />
						</p>
						<p>
							<label >Bank Account no</label>
							<input class="long" id="cust_bank_acct" type="text" />
						</p>							
						<p>
							<label></label>
							<input type="button" class="button"  id="cust_save"  value="Save"/>
						</p>
											
					</fieldset>

				</span>		

				
				<script type="text/javascript">
				$(document).ready(function(){
				    $("#cust_code").focus();
					
					$("#cust_table").load("includes/table/customer_datatable.php" , function() {} ).fadeIn('slow');
					
				    $("#cust_save").click(function(){
						var cust_code = $("#cust_code").val();
						var cust_depo = $("#cust_depo").val();
						var cust_zone =$("#cust_zone").val();
						var cust_name = $("#cust_name").val();
						var cust_org_name = $("#cust_org_name").val();
						var cust_owner_name = $("#cust_owner_name").val();
						var cust_address = $("#cust_address").val();
						var cust_contact_no = $("#cust_contact_no").val();
						var cust_bank_acct = $("#cust_bank_acct").val();						
						
						var  dataStr = "cust_code="+cust_code+"&cust_depo="+cust_depo+"&cust_zone="+cust_zone+"&cust_name="+cust_name+
						"&cust_org_name="+cust_org_name+"&cust_owner_name="+cust_owner_name+"&cust_address="+cust_address
						+"&cust_contact_no="+cust_contact_no+"&cust_bank_acct="+cust_bank_acct;

						$.ajax({
						    type:"post"  ,
							url: "includes/add_customer_by_ajax.php" ,
							data:dataStr ,
							cache:false ,
							success:function(st){ 
							   alert(st);
							   $("#cust_table").load("includes/table/customer_datatable.php" , function() {} ).fadeIn('slow');
							}
						});
				    });
				});
				</script>				
				
				 
				 <?php //include("table/employee_datatable.php"); ?>
				 <div id="cust_table"></div>
                 <br /><br />
		</div>
		<!-- end content -->