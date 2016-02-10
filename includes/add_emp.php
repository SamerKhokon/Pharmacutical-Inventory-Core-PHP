<script>
	$(function() {
	
	    var pickerOption = {
			changeMonth: true,
			changeYear: true,
			dateFormat:"dd-mm-yy"
		};
		$( "#emp_join_date" ).datepicker(pickerOption);
	
		$( "#emp_dob" ).datepicker(pickerOption);
	});
</script>
<?php	include("db.php");
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
						<label>Employee Code <font color="#FF0000">*</font></label>							
						<input type="text"  id="emp_code" class="long" value="<?php echo mt_rand(1,999999);?>"/>
						
						<label>Department <font color="#FF0000">*</font></label>							
						<select  id="emp_dept" class="long">
						   <?php echo get_department_dropdown($company_id); ?>
						</select>
					</p>
					<p>
						<label>Designation <font color="#FF0000">*</font>
						</label>
						<select  id="emp_desig" class="long">
						   <?php echo get_designation_dropdown($company_id);?>
						</select>
					</p>
							
				</fieldset>
				<fieldset class="row2">
					<legend>Personal Information</legend>
					<p>
						<label>Employee Name <font color="#FF0000">*</font>	</label>
						<input type="text" id="emp_name"class="long"/>						   
					</p>
					<p>
						<label>Father 
						</label>
						<input type="text" id="emp_father"  class="long"/>
					</p>
					<p>
						<label >Mother	</label>
						<input type="text" id="emp_mother" class="long"/>
					</p>
					<p>
						<label>Present Address </label>
						<textarea  id ="emp_pre_address" class="long"></textarea>
					</p>
					<p>
						<label>Parmanent Address </label>
						<textarea   id ="emp_par_address" class="long"></textarea>
					</p>
					<p>
						<label >Mobile No</label>
						<input class="long" id="emp_contact_no" type="text" onkeypress="return ret_valid_digit(event,'int',this.value.indexOf('.'));" />
					</p>
					<p>
						<label >Joinig Date <font color="#FF0000">*</font></label>
						<!--<input class="long" id="emp_join_date" type="text" />-->
						<input type="text" id="emp_join_date" class="long" />
					</p>							
				</fieldset>
				<fieldset class="row3">
					<legend>Further Information</legend>
					<p>
						<label>Gender </label>
						<input type="radio"  name="gender" value="Male"/>
						<label class="gender">Male</label>
						<input type="radio"  name="gender" value="Female"/>
						<label class="gender">Female</label>
					</p>
					<p>
						<label>Birthdate <font color="#FF0000">*</font></label>
						<input class="long" id="emp_dob" type="text" />
					</p>
					<p>
						<label>Marital Status 
						</label>
						<select id="emp_marital_status" class="long">
							<option value="">Select Marital Status</option>
							<option value="Married">Married</option>
							<option value="Bachelor">Bachelor</option>
							<option value="Widow">Widow</option>
						</select>
					</p>					
					 <p>
						<label>National ID 
						</label>
					  <input  id="emp_nationalid" type="text"  class="long"/>
					</p>
					 <p>
						<label>Bank Account No 
						</label>
					  <input  id="emp_bankacct" type="text"  class="long"/>
					</p>						
					 <p>
						<label>Previous Experience 
						</label>
					 <textarea id="emp_prev_exp"   class="long"></textarea>
					</p>												
					 <p>
						<label>Educational Qualification 
						</label>
					  <textarea id="emp_edu_qualification"  class="long"></textarea>
					</p>												
					 <p>
						<label>Driving License No 
						</label>
					  <input  id="emp_driving_license" type="text"  class="long"/>
					</p>	
					<p class="btm_save_reset">
						
						<input type="button"style="width:70px;" class="btn_save"  id="emp_save"  value="Save"/>
						&nbsp;<input type="button" style="width:70px;" class="btn_reset"  id="emp_rest"  value="Reset"/>
					</p>
				</fieldset>
			</span>		

				
			<script type="text/javascript">
				$(document).ready(function()
				{
				    $("#emp_code").focus();
					var data_load = function()
					{					
						$("#emp_table").load("includes/table/employee_datatable.php" , function() {} ).fadeIn('slow');
					}
					data_load();
					
					var reset_fields  = function() 
					{
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

					$(".employee_delete").live("click" , function()
					{
						var employee_id = $(this).attr("id");
						var c = confirm("Are you sure want to delete data");
						if( c == true )
						{
							$.ajax({
							    type:"post",
								url:"includes/remove/employee_delete.php",
								data:"rid="+employee_id,
								cache:false,
								success:function(st){
									alert(st);
									$("#emp_table").load("includes/table/employee_datatable.php" , function(){}).fadeIn('slow');
								}
							});
						}
						else
						{
							return false;
						}	
							  
						});
					
					$("#emp_contact_no").keypress(function(ex){
					    if(ex.which == 13)
						{
						   var emp_contact_no = $("#emp_contact_no").val();
						    var pat = /^[0-9]+$/;
							var cno = emp_contact_no.slice(0,3);
							var codes = ["011","015","016","017","018","019"];
							if(emp_contact_no=="") 
							{
							   alert("Enter mobile number");
							   $("#emp_contact_no").focus();
							   return false;
							}							
							else if(!pat.test(emp_contact_no))
							{
							   alert("Mobile number must be digits only");
							   $("#emp_contact_no").focus();
							   return false;
							}							
							else if(emp_contact_no.length>11 || emp_contact_no.length<11)
							{
							    alert("Mobile number must be 11 digits");
								$("#emp_contact_no").focus();
								return false;
							}
							else if($.inArray(cno,codes) == -1) 
							{	
								alert("Enter valid mobile number ex.( 011xxxxxxxx,015xxxxxxxx,016xxxxxxxx,017xxxxxxxx,018xxxxxxxx,019xxxxxxxx )");
								$("#emp_contact_no").focus();
								return false;
							}							
							else{
							   $("#emp_join_date").focus();
							}							 
						}
					});
					
				    $("#emp_save").click(function()
					{
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
						//alert(dataStr);
						
						if(emp_code=="") {
							alert("Enter employee code");
							$("#emp_code").focus();
							return false;
						}else if(emp_dept=="") {
							alert("Select department");
							return false;
						}else if(emp_desig=="") {
							alert("Select designation");
							return false;
						}else if(emp_name=="") {
							alert("Enter employee name");
							$("#emp_name").focus();
							return false;
						}else if(emp_dob==""){
							alert("Enter birth of date");
							$("#emp_dob").focus();
							return false;
						}else if(emp_join_date=="") {
							alert("Enter joining date");
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
									location.reload();
								}
							});
						}		
				    });
					$('#emp_rest').click(function(){
						reset_fields();
					});
				});
				function edit_data(id)
				{
					//alert(id);
					var dataStr = "id="+id;
					//alert(dataStr);
					$.ajax({
						type:"post" ,
						url:"includes/edit/employee_edit.php" ,
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
						url:"includes/view/employee_view.php" ,
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
				var pkey=0;
				function ret_valid_digit(evt, type, cnt)
				{
					pkey= (evt.which) ? evt.which : event.keyCode;
				
					if(pkey==8 || pkey==127)
						return true;
					if(type=='int')
					{
						if(pkey>=48 && pkey <=57)
						return true;
					}
					else if(type=='double')
					{
						if(pkey>=48 && pkey <=57)
							return true;
						if(pkey==46 && cnt==-1)
							return true;
					}
					return false;
				}
				</script>				
				
				 
				 <?php //include("table/employee_datatable.php"); ?>
				 <div id="emp_table"></div>
                 <br /><br />
		</div>
		<!-- end content -->
	<?php
			
	
	?>	