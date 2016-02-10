		<?php include("db.php");   if($con) 
		$company_id = $_SESSION["COMPANY_ID"];
		    function employee_dropdown($company_id){
		      global $option1;
			   $str = "SELECT employee_id,emp_name FROM `hr_employee_info` WHERE company_id=$company_id";
			  $sql = mysql_query($str);
			  while($res = mysql_fetch_array($sql) ) {
				$option1 .=  "<option value='".$res[0] . "'>".  $res[1]. "</option>";
			  }
			  return $option1;
		    }
		   
		   
		    function depot_dropdown($company_id){
		      global $option2;
			   $str = "SELECT depot_id,depot_name FROM `inv_depot_info` WHERE company_id=$company_id";
			  $sql = mysql_query($str);
			  while($res = mysql_fetch_array($sql) ) {
				$option2 .=  "<option value='".$res[0] . "'>".  $res[1]. "</option>";
			  }
			  return $option2;
		    }		   
		   
		    function designation_dropdown($company_id){
		      global $option3;
			   $str = "SELECT designation_id,designation,designation_code FROM `hr_emp_designation` WHERE company_id=$company_id";
			  $sql = mysql_query($str);
			  while($res = mysql_fetch_array($sql) ) {
				$option3 .=  "<option value='".$res[0] . "'>".  $res[2]. "</option>";
			  }
			  return $option3;
		    }		   		   
		?>
		<div id="content">
				<span action="" class="register">
					<!-- <h1>Form Design</h1> -->
					<fieldset class="row1">
						<legend>Employee Depo Relation</legend>
						<p>
							<label>Employee *</label>							
						    <select  id="emp_id" >
							  <?php  echo employee_dropdown($company_id);  ?>
							</select>

							<label>Depot  *</label>							
						    <select  id="depot_id" >
							  <?php  echo depot_dropdown($company_id);  ?>
							</select>
						</p>
						<p>
							<label>Designation *</label>							
						    <select  id="desig_id" >
							  <?php  echo designation_dropdown($company_id);  ?>
							</select>
							
							<label>&nbsp;</label>							

						</p>
						<p>
							<label></label>
							<input type="button" class="button"  id="emp_hierachy_save"  value="Save"/>
						</p>

					</fieldset>
				</span>		

				<script type="text/javascript">
				$(document).ready(function()
				{
					$("#emp_depo_table").load("includes/table/employee_depo_rel_datatable.php" , function() {} ).fadeIn('slow');
					
					
					var reset_fields = function(){
						$("#emp_id").val(0);
						$("#depot_id").val(0);
						$("#desig_id").val(0);										
					}
					
					
				    $("#emp_hierachy_save").click(function()
					{
						var emp_id = $("#emp_id").val();
						var depot_id =$("#depot_id").val();
						var desig_id = $("#desig_id").val();
						
						var  dataStr = "emp_id="+emp_id+"&depot_id="+depot_id+"&desig_id="+desig_id;
						
						$.ajax({
							type:"post"  ,
							url: "includes/add_emp_depo_rel_by_ajax.php" ,
							data:dataStr ,
							cache:false ,
							success:function(st)
							{ 
							   alert(st);
							   $("#emp_depo_table").load("includes/table/employee_depo_rel_datatable.php" , function() {} ).fadeIn('slow');
							   reset_fields();
							}
						});
						
				    });
				});
				</script>				
				
				 
				 <?php //include("table/employee_datatable.php"); ?>
				 <div id="emp_depo_table"></div>
                 <br /><br />
		</div>
		<!-- end content -->