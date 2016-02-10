		<div id="content">
				<span action="" class="register">
					<!-- <h1>Form Design</h1> -->
					<fieldset class="row1">
						<legend>Courier Service Name</legend>
						<p>
							<label>CSC Code *</label>							
							<input type="text"  id="csc_code"/>
							
							<label>Courier Name *</label>							
						    <input type="text"  id="csc_name"/>
						</p>
						<p>
							<label>Address *
							</label>
							<input type="text"  id="csc_address"/>
						</p>
					</fieldset>
					<fieldset class="row2">
						<legend>Personal Information
						</legend>
						<p>
							<label>Contact Person *	</label>
							<input type="text" id="csc_contact_person"class="long"/>						   
						</p>
						<p>
							<label>Contact No *
							</label>
							<input type="text" id="csc_contact_no"  class="long"/>
						</p>
						<p>
							<label></label>
							<input type="button" class="button"  id="csc_save"  value="Save"/>
						</p>
											
					</fieldset>
				</span>
				<script type="text/javascript">
				$(document).ready(function(){
				    $("#csc_code").focus();					
					$("#emp_table").load("includes/table/courier_datatable.php" , function() {} ).fadeIn('slow');
					
					$(".courier_delete").live("click" , function() 
					{
					    var csc_id = $(this).attr("id");
						var c = confirm("Are you sure want to delete data");
						if(c == true)
						{
							$.ajax({
								type:"post" ,
								url:"includes/remove/courier_delete.php" , 
								data:"rid=" + csc_id , 
								cache: false , 
								success:function(st) 
								{ 
									$("#emp_table").load("includes/table/courier_datatable.php" , function() {}).fadeIn('slow');							    
								}
							});
						}else{
						  return false;
						}	
					});					
					
				    $("#csc_save").click(function(){
						var csc_code 				= $("#csc_code").val();
						var csc_name 				= $("#csc_name").val();							
						var csc_address            = $("#csc_address").val();
						var csc_contact_person = $("#csc_contact_person").val();
						var csc_contact_no        = $("#csc_contact_no").val();
						
						var  dataStr = "csc_code="+csc_code+"&csc_name="+csc_name+
						"&csc_address="+csc_address+"&csc_contact_person="+csc_contact_person+
						"&csc_contact_no="+csc_contact_no;

						$.ajax({
						    type:"post"  ,
							url: "includes/add_courier_by_ajax.php" ,
							data:dataStr ,
							cache:false ,
							success:function(st){ 
							   alert(st);
							   $("#emp_table").load("includes/table/courier_datatable.php" , function() {} );
							}
						});
				    });
				});
				</script>				
				
				 
				 <?php //include("table/employee_datatable.php"); ?>
				 <div id="emp_table"></div>
                 <br /><br />
		</div>
		<!-- end content -->