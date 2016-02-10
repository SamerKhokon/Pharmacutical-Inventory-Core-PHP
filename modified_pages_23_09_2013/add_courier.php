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
						$.ajax({
						    type:"post" ,
							url:"includes/remove/courier_delete.php" , 
							data:"rid=" + csc_id , 
							cache: false , 
							success:function(st) 
							{ 
								$("#emp_table").load("includes/table/courier_datatable.php" , function(){}).fadeIn('slow');							    
							}
						});
					});					
					
					
					var reset_fields = function() 
					{
						$("#csc_code").val('');
						$("#csc_name").val('');							
						$("#csc_address").val('');
						$("#csc_contact_person").val('');
						$("#csc_contact_no").val('');					
						$("#csc_code").focus();
					}
					
					$("#csc_code").keypress(function(ex){
					  if(ex.which == 13) {
					     var csc_code =  $("#csc_code").val(); 
						 if(csc_code=="") 
						 {
								alert("Courier service code");
							  $("#csc_code").focus();
							  return false;
						 }else{
						   $("#csc_name").focus();	
						 }
					  }
					});
					
					$("#csc_name").keypress(function(ex){
					  if(ex.which == 13) {
					     var csc_name =  $("#csc_name").val(); 
						 if(csc_name=="") 
						 {
								alert("Courier service name");
							  $("#csc_name").focus();
							  return false;
						 }else{
						   $("#csc_address").focus();	
						 }
					  }
					});					
					
					$("#csc_address").keypress(function(ex){
					  if(ex.which == 13) {
					     var csc_address =  $("#csc_address").val(); 
						 if(csc_address=="") 
						 {
								alert("Courier service address");
							  $("#csc_address").focus();
							  return false;
						 }else{
						   $("#csc_contact_person").focus();	
						 }
					  }
					});						
					
					$("#csc_contact_person").keypress(function(ex){
					  if(ex.which == 13) {
					     var csc_contact_person =  $("#csc_contact_person").val(); 
						 if(csc_contact_person=="") 
						 {
								alert("Courier service contact person");
							  $("#csc_contact_person").focus();
							  return false;
						 }else{
						   $("#csc_contact_no").focus();	
						 }
					  }
					});		

					$("#csc_contact_no").keypress(function(ex){
					  if(ex.which == 13) {
					     var csc_contact_no =  $("#csc_contact_no").val(); 
						 if(csc_contact_person=="") 
						 {
								alert("Courier service contact no");
							  $("#csc_contact_no").focus();
							  return false;
						 }else{
						   $("#csc_save").focus();	
						 }
					  }
					});							
					
				    $("#csc_save").click(function()
					{
						var csc_code 				= $("#csc_code").val();
						var csc_name 				= $("#csc_name").val();							
						var csc_address            = $("#csc_address").val();
						var csc_contact_person = $("#csc_contact_person").val();
						var csc_contact_no        = $("#csc_contact_no").val();
						
						var  dataStr = "csc_code="+csc_code+"&csc_name="+csc_name+
						"&csc_address="+csc_address+"&csc_contact_person="+csc_contact_person+
						"&csc_contact_no="+csc_contact_no;
						
						if(csc_code==""){
							  alert("Courier service code");
							  $("#csc_code").focus();
							  return false;
						}else if(csc_name=="") {
							  alert("Enter courier service name");
							  $("#csc_name").focus();
							  return false;
						}else if(csc_address=="") {
							  alert("Enter courier service address");
							  $("#csc_address").focus();
							  return false;
						}else if(csc_contact_person=="") {
							  alert("Enter courier service contact person");
							  $("#csc_contact_person").focus();
							  return false;
						}
						else 
						{			
							$.ajax({
								type:"post"  ,
								url: "includes/add_courier_by_ajax.php" ,
								data:dataStr ,
								cache:false ,
								success:function(st){ 
								   alert(st);
								   $("#emp_table").load("includes/table/courier_datatable.php" , function() {} );
								   reset_fields();
								}
							});
						}	
				    });
				});
				</script>				
				
				 
				 <?php //include("table/employee_datatable.php"); ?>
				 <div id="emp_table"></div>
                 <br /><br />
		</div>
		<!-- end content -->