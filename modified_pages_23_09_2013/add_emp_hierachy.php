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
		   
		   
		    function employee_superior_dropdown($company_id){
		      global $option2;
			   $str = "SELECT employee_id,emp_name FROM `hr_employee_info` WHERE company_id=$company_id";
			  $sql = mysql_query($str);
			  while($res = mysql_fetch_array($sql) ) {
				$option2 .=  "<option value='".$res[0] . "'>".  $res[1]. "</option>";
			  }
			  return $option2;
		    }		   
		   
		?>
		<div id="content">
				<span action="" class="register">
					<!-- <h1>Form Design</h1> -->
					<fieldset class="row1">
						<legend>Employee Hierachy</legend>
						<p>
							<label>Employee *</label>							
						    <select  id="emp_id" >
							  <?php  echo employee_dropdown($company_id);  ?>
							</select>
							
							<label>Superior Employee *</label>							
						    <select  id="superior_emp_id" >
							  <?php  echo employee_superior_dropdown($company_id);  ?>
							</select>
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
					$("#product_offer_table").load("includes/table/employee_hierachy_datatable.php" , function() {} ).fadeIn('slow');
					
					var reset_fields = function(){
						$("#emp_id").val(0); 
						$("#superior_emp_id").val(0);					
					}
					
					
				    $("#emp_hierachy_save").click(function()
					{
						var emp_id		         = $("#emp_id").val(); 
						var superior_emp_id = $("#superior_emp_id").val();
						var  dataStr = "emp_id="+emp_id+"&superior_emp_id="+superior_emp_id;
						
						$.ajax({
							type:"post"  ,
							url: "includes/add_emp_hierachy_by_ajax.php" ,
							data:dataStr ,
							cache:false ,
							success:function(st)
							{ 
							   alert(st);
							   $("#product_offer_table").load("includes/table/employee_hierachy_datatable.php" , function() {} ).fadeIn('slow');
							   reset_fields();
							}
						});
						
				    });
				});
				</script>				
				
				 
				 <?php //include("table/employee_datatable.php"); ?>
				 <div id="product_offer_table"></div>
                 <br /><br />
		</div>
		<!-- end content -->