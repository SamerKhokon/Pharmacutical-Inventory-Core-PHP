	<div id="content"> <?php include("db.php");
			$company_id = $_SESSION['COMPANY_ID'];
          function get_depo_dropdown($company_id){
				 global $option2;
				 $str = "SELECT depot_id,depot_name,depot_flag FROM `inv_depot_info` WHERE company_id=$company_id";
				 $sql =mysql_query($str);
				 while($res = mysql_fetch_array($sql)) {
				 $option2 .= "<option   value='".$res[0]."'>".$res[1]."(".$res[2].")</option>";
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
					<fieldset class="row1">
						<legend>Zone Setting	</legend>
						<p>
							<label>Depot <font color="#FF0000">*</font>
							</label>
							<select id="zone_depo_type" class="long">
							  <?php echo get_depo_dropdown($company_id); ?>
							</select>
						</p>					
						<p>
							<label>Zone Name <font color="#FF0000">*</font>
							</label>
							<input type="text" id="zone_name" class="long" />
						</p>						
						<p>
							<label>M.I.O Name <font color="#FF0000">*</font>
							</label>
							<select id="zone_mio" class="long" >
							  <?php echo get_mio_dropdown($company_id);?>
							</select>					   
						</p>
						<p>
							<label>S.V <font color="#FF0000">*</font>
							</label>
							<select id="zone_sv" class="long" >
								<?php echo get_sv_dropdown($company_id);?>
							</select>
						</p>

						<p class="btm_save_reset">
							
							<input type="button" style="width:70px;" class="btn_save"  id="zone_save"  value="Save"/>
                            &nbsp;<input type="button" style="width:70px;" class="btn_reset"  id="btn_reset"  value="Reset"/>
						</p>						
					</fieldset>					
				</span>
                </div>
                
						<script   type="text/javascript">
						$(document).ready(function(){
						    $("#depo_name").focus();
                            $("#depo_table").load("includes/table/zone_datatable.php" , function(){}).fadeIn('slow');
							
							 $(".zone_delete").live("click" , function(){
							   var zone_id = $(this).attr("id");
							     var c = confirm("Are you sure want to delete data");
								if(c==true) 
								{
							   $.ajax({
							       type:"post",
								   url:"includes/remove/customer_zone_delete.php",
								   data:"rid="+zone_id,
								   cache:false,
								   success:function(st){
								      alert(st);
									   $("#div_datatable").load("includes/table/zone_datatable.php" , function(){}).fadeIn('slow');
								   }
							   });
							   }else{
							     return false;
							   }
							  
							});
							
							
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
						function edit_data(id)
						{
							//alert(id);
							var dataStr = "id="+id;
							//alert(dataStr);
							$.ajax({
								type:"post" ,
								url:"includes/edit/zone_edit.php" ,
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
								url:"includes/view/zone_view.php" ,
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
						</script>
						
				<?php //include("table/department_datatable.php"); ?>
                <div id="depo_table"></div>
           
                <br /> <br />

		</div>
        
		<!-- end content -->
