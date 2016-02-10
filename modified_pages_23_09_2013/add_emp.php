<?php include("db.php");
		$company_id = $_SESSION['COMPANY_ID'];
		
		function get_designation_dropdown($company_id)
		{
			global $option2;
			$str = "SELECT designation_id,designation,designation_code FROM `hr_emp_designation` WHERE company_id=$company_id";
			$sql =mysql_query($str);
			while($res = mysql_fetch_array($sql)) 
			{
				$option2 .= "<option   value='".$res[0]."'>".$res[2]."</option>";
			}
			return $option2;
		}				
		function get_department_dropdown($company_id)
		{
			global $option3;
			 $str = "SELECT dep_id,dept_name,dept_code FROM `hr_emp_dept_info` WHERE company_id=$company_id";
			$sql =mysql_query($str);
			while($res = mysql_fetch_array($sql)) 
			{
				$option3 .= "<option   value='".$res[0]."'>".$res[2]."</option>";
			}
			return $option3;
		}						
?>			
		<div id="content">
				<span action="" class="register">
					<!-- <h1>Form Design</h1> -->
					<fieldset class="row1">
						<legend>Account Details</legend>
						<p>
							<label>Employee Code *</label>							
							<input type="text"  id="emp_code"/>
							
							<label>Department *</label>							
							<select  id="emp_dept">
							   <?php echo get_department_dropdown($company_id); ?>
							</select>
						</p>
						<p>
							<label>Designation *
							</label>
							<select  id="emp_desig">
							   <?php echo get_designation_dropdown($company_id);?>
							</select>
						</p>
							
					</fieldset>
					<fieldset class="row2">
						<legend>Personal Information
						</legend>
						<p>
							<label>Employee Name *	</label>
							<input type="text" id="emp_name"class="long"/>						   
						</p>
						<p>
							<label>Father *
							</label>
							<input type="text" id="emp_father"  class="long"/>
						</p>
						<p>
							<label >Mother	</label>
							<input type="text" id="emp_mother" class="long"/>
						</p>
						<p>
							<label>Present Address *</label>
							<input type="text"  id ="emp_pre_address" class="long"/>
						</p>
						<p>
							<label>Parmanent Address *</label>
							<input type="text"  id ="emp_par_address" class="long"/>
						</p>
						<p>
							<label >Contact No</label>
							<input class="long" id="emp_contact_no" type="text" />
						</p>
						<p>
							<label >Joinig Date</label>
							<!--<input class="long" id="emp_join_date" type="text" />-->
                             <input type="text" id="emp_join_date" class="long" />
						</p>							
						<p>
							<label></label>
							<input type="button" class="button"  id="emp_save"  value="Save"/>
						</p>
											
					</fieldset>
					<fieldset class="row3">
						<legend>Further Information
						</legend>
						<p>
							<label>Gender *</label>
							<input type="radio" value="radio" name="gender"/>
							<label class="gender">Male</label>
							<input type="radio" value="radio"  name="gender"/>
							<label class="gender">Female</label>
						</p>
						<p>
							<label>Birthdate *</label>
							<input class="long" id="emp_dob" type="text" />
						</p>
						<p>
							<label>Marital Status *
							</label>
							<select>
								<option value="0"></option>
								<option value="Married">Married</option>
								<option value="Bachelor">Bachelor</option>
								<option value="Widow">Widow</option>
							</select>
						</p>					
						 <p>
							<label>National ID *
							</label>
						  <input  id="emp_nationalid" type="text"  class="long"/>
						</p>
						 <p>
							<label>Bank Account No *
							</label>
						  <input  id="emp_bankacct" type="text"  class="long"/>
						</p>						
						 <p>
							<label>Previous Experience *
							</label>
						  <input  id="emp_prev_exp" type="text"  class="long"/>
						</p>												
						 <p>
							<label>Educational Qualification *
							</label>
						  <input  id="emp_edu_qualification" type="text"  class="long"/>
						</p>												
						 <p>
							<label>Driving License No *
							</label>
						  <input  id="emp_driving_license" type="text"  class="long"/>
						</p>	
					</fieldset>
				</span>		

				
				<script type="text/javascript">
				$(document).ready(function(){
				    $("#emp_code").focus();
					
					$("#emp_table").load("includes/table/employee_datatable.php" , function() {} ).fadeIn('slow');
					
					
					var reset_fields  = function() {
						$("#emp_code").val('');
						$("#emp_desig").val(''); 
						$("#emp_dept").val('');
						$("#emp_name").val(''); 
						$("#emp_father").val('');
						$("#emp_mother").val('');
						$("#emp_pre_address").val(''); 
						$("#emp_par_address").val('');
						$("#emp_contact_no").val('');  
						$("input[name='gender']").attr("checked",false);				
						$("#emp_dob").val('');	
						$("#emp_marital_status").val(0); 
						$("#emp_nationalid").val('');
						$("#emp_bankacct").val('');	
						$("#emp_prev_exp").val('');					
                	    $("#emp_edu_qualification").val(''); 
						$("#emp_driving_license").val('');
						$("#emp_join_date").val('');
						$("#emp_code").focus();						
					}
					
					
				    $("#emp_save").click(function(){
						var emp_code = $("#emp_code").val();
						var emp_desig = $("#emp_desig").val(); 
						var emp_dept = $("#emp_dept").val();
						var emp_name = $("#emp_name").val(); 
						var emp_father = $("#emp_father").val();
						var emp_mother=$("#emp_mother").val();
						var emp_pre_addres = $("#emp_pre_address").val(); 
						var emp_par_address = $("#emp_par_address").val();
						var emp_contact_no       = $("#emp_contact_no").val();  
						var 	gender                       = $("input[name='gender']:checked").val();				
						var emp_dob                      = $("#emp_dob").val();	
						var emp_marital_status      = $("#emp_marital_status").val(); 
						var  emp_nationalid             = $("#emp_nationalid").val();
						var emp_bankacct               = $("#emp_bankacct").val();	
						var emp_prev_exp               = $("#emp_prev_exp").val();					
                	    var emp_edu_qualification  = $("#emp_edu_qualification").val(); 
						var emp_driving_license     = $("#emp_driving_license").val();
						var emp_join_date = $("#emp_join_date").val();						
						
						var  dataStr = "emp_code="+emp_code+"&emp_desig="+emp_desig+"&emp_dept="+emp_dept+"&emp_name="+emp_name+
						"&emp_father="+emp_father+"&emp_mother="+emp_mother+"&emp_pre_addres="+emp_pre_addres+"&emp_par_address="+emp_par_address+"&emp_contact_no="+emp_contact_no+"&gender="+gender+
						"&emp_dob="+emp_dob+"&emp_marital_status="+emp_marital_status+"&emp_nationalid="+emp_nationalid+"&emp_bankacct="+emp_bankacct+"&emp_prev_exp="+emp_prev_exp+"&emp_edu_qualification="+emp_edu_qualification
						+"&emp_driving_license="+emp_driving_license+"&emp_join_date="+emp_join_date;

						
						if(emp_code=="") {
						   alert("Enter employee code");
						   $("#emp_code").focus();
						   return false;
						}else if(emp_desig=="") {
						   alert("Enter empployee designation");
						   $("#emp_desig").focus();
						   return false;
						}else if(emp_dept=="")  {
						  alert("Enter employee department");
						  $("#emp_dept").focus();
						  return false;
						}else if(emp_name=="") {						  
						   alert("Enter employee name");
						   $("#emp_name").focus();
						   return false;
						}else if(emp_join_date=="") {
						  alert("Enter employee joining date");
						  $("#emp_join_date").focus();
						  return false;
						}else{										
								$.ajax({
									type:"post"  ,
									url: "includes/add_emp_by_ajax.php" ,
									data:dataStr ,
									cache:false ,
									success:function(st){ 
									   alert(st);
									   $("#emp_table").load("includes/table/employee_datatable.php" , function() {} ).fadeIn('slow');
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
	<?php
			
	
	?>	