	<div id="content"> <?php  include("db.php"); 
	    $company_id = $_SESSION['COMPANY_ID'];
        function get_managing_person_dropdown($company_id) {
		  global $option1 ;
		  $str = "SELECT employee_id,emp_name FROM `hr_employee_info` WHERE company_id=$company_id";
		  $sql = mysql_query($str);
		  while($res = mysql_fetch_array($sql))
		  {
		  $option1 .= "<option value='".$res[0]."'>".$res[1]."</option>";
		  }
		  return $option1;
		}
	?>
			<input type="hidden" id="company_id" value="<?php echo $_SESSION['COMPANY_ID'];?>"/>
		<input type="hidden" id="entry_by" value="<?php echo $_SESSION["LOGIN_USERID"]   ;?>"/>		
		
				<span action="javascript:void(0);" class="register">
					<!-- <h1>Form Design</h1>			-->		
					<fieldset class="row2">
						<legend>Vehicle Setting	</legend>
						<p>
							<label>Vechicle Type *
							</label>
							<select id="vehicle_type">
							  <option value="1">Truck</option>
							</select>
						</p>
						<p>
							<label>Registration No *
							</label>
							<input type="text" id="regi_no" class="long" />
						</p>						
						<p>
							<label>Vehicle Name *
							</label>
							<input type="text" id="vehicle_name" class="long" />
						</p>												
						<p>
							<label>Managing Person *
							</label>
							<select id="managing_person">
							  <?php echo get_managing_person_dropdown($company_id);?>
							</select>
						</p>						

						
						<script   type="text/javascript">
						$(document).ready(function()
						{
						   $("#designation_name").focus();
						   $("#vechicle_table").load("includes/table/vehicle_datatable.php" , function(){}).fadeIn('slow');						
						   
						   $("#vehicle_save").click(function(){	
							var vehicle_type = $("#vehicle_type").val();					
							var regi_no = $("#regi_no").val();
							var vehicle_name = $("#vehicle_name").val();
							var managing_person = $("#managing_person").val();
							var dataStr = "vehicle_type="+vehicle_type+"&regi_no="+regi_no
												+"&managing_person="+managing_person+
												"&vehicle_name="+vehicle_name;
							 
								     
								     $.ajax({
									    type:"post" ,
										url:"includes/add_own_vehicle_by_ajax.php" ,
										data:dataStr ,
										cache:false ,
										success:function(st)
										{
										    alert(st);
											$("#vechicle_table").load("includes/table/vehicle_datatable.php" , function(){}).fadeIn('slow');
										}
									 });
						   });
						});
						</script>
						
						
						<p>
							<label></label>
							<input type="button" class="button"  id="vehicle_save"  value="Save"/>
						</p>						
					</fieldset>
					
				</span>
        	
				<br /><br />
				<?php //include("table/designation_datatable.php"); ?>
                
				<div id="vechicle_table"></div>
                <br > <br >

		</div>
		<!-- end content -->
