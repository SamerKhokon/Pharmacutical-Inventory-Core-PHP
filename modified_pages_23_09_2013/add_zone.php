	<div id="content"> <?php include("db.php");
			$company_id = $_SESSION['COMPANY_ID'];
          function get_depo_dropdown($company_id){
				 global $option2;
				 $str = "SELECT depot_id,depot_name,depot_flag FROM `inv_depot_info` WHERE company_id=$company_id";
				 $sql =mysql_query($str);
				 while($res = mysql_fetch_array($sql)) {
				 $option2 .= "<option   value='".$res[0]."'>".$res[2]."</option>";
				 }
				 return $option2;
		  }
		  
          function get_mio_dropdown($company_id){
				 global $option3;
				 $str = "SELECT employee_id,emp_name FROM `hr_employee_info` WHERE company_id=$company_id AND 
					designation_id=(SELECT designation_id FROM `hr_emp_designation` WHERE designation_code='M.I.O')";
				 $sql =mysql_query($str);
				 while($res = mysql_fetch_array($sql)) {
				 $option3 .= "<option   value='".$res[0]."'>".$res[1]."</option>";
				 }
				 return $option3;
		  }		  
		  
          function get_sv_dropdown($company_id){
				 global $option1;
				 $str = "SELECT employee_id,emp_name FROM `hr_employee_info` WHERE company_id=$company_id AND 
					designation_id=(SELECT designation_id FROM `hr_emp_designation` WHERE designation_code='S.V')";
				 $sql =mysql_query($str);
				 while($res = mysql_fetch_array($sql)) {
				 $option1 .= "<option   value='".$res[0]."'>".$res[1]."</option>";
				 }
				 return $option1;
		  }		  		  
	?>
			<input type="hidden" id="company_id" value="<?php echo $_SESSION['COMPANY_ID'];?>"/>
		<input type="hidden" id="entry_by" value="<?php echo $_SESSION["LOGIN_USERID"]   ;?>"/>		
		<div>
				<span action="javascript:void(0);" class="register">
					<!-- <h1>Form Design</h1>			-->		
					<fieldset class="row2">
						<legend>Zone Setting	</legend>
						<p>
							<label>Depot *
							</label>
							<select id="zone_depo_type" >
							  <?php echo get_depo_dropdown($company_id); ?>
							</select>
						</p>					
						<p>
							<label>Zone Name *
							</label>
							<input type="text" id="zone_name" class="long"/>
						</p>						
						<p>
							<label>M.I.O Name *
							</label>
							<select id="zone_mio" >
							  <?php echo get_mio_dropdown($company_id);?>
							</select>					   
						</p>
						<p>
							<label>S.V *
							</label>
							<select id="zone_sv" >
								<?php echo get_sv_dropdown($company_id);?>
							</select>
						</p>

						<p>
							<label></label>
							<input type="button" class="button"  id="zone_save"  value="Save"/>
						</p>						
					</fieldset>					
				</span>
                </div>
                
						<script   type="text/javascript">
						$(document).ready(function(){
						    $("#depo_name").focus();
                            $("#depo_table").load("includes/table/zone_datatable.php" , function(){}).fadeIn('slow');
							
							
							var reset_fields = function() {
								$("#zone_depo_type").val(0);	
								$("#zone_name").val('');
								$("#zone_mio").val(0);
								$("#zone_sv").val(0);											
							}
							
						   $("#zone_save").click(function(){	
								var zone_depo_type = $("#zone_depo_type").val();	
								var zone_name = $("#zone_name").val();
								var zone_mio = $("#zone_mio").val();
								var zone_sv = $("#zone_sv").val();						

								var dataStr = "zone_depo_type="+zone_depo_type+"&zone_name="+zone_name
								+"&zone_mio="+zone_mio+"&zone_sv="+zone_sv;
																	 
								if(zone_name=="") {
								       alert("Enter zone name");
									   $("#zone_name").focus();
									   return false;
								}else{
								    //alert(dataStr);								     
								     $.ajax({
									    type:"post" ,
										url:"includes/add_zone_by_ajax.php" ,
										data:dataStr ,
										cache:false ,
										success:function(st)
										{
										    alert(st);
											$("#depo_table").load("includes/table/zone_datatable.php" , function(){}).fadeIn('slow');
											reset_fields();
										}
									 });
							    }
						   });
						});
						</script>
						
				<?php //include("table/department_datatable.php"); ?>
                <div id="depo_table"></div>
           
                <br /> <br />

		</div>
        
		<!-- end content -->
