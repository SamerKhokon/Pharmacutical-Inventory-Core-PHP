		<?php include("./db.php");   if($con) 
		$company_id = $_SESSION["COMPANY_ID"];
		    function employee_dropdown($company_id){
		      global $option1;
			   $str = "SELECT employee_id,emp_name,(select designation_code from hr_emp_designation where designation_id=t1.designation_id) FROM `hr_employee_info` t1 WHERE company_id=$company_id";
			  $sql = mysql_query($str);
			  while($res = mysql_fetch_array($sql) ) {
				$option1 .=  "<option value='".$res[0] . "'>".  $res[1]. "( ".$res[2]." )</option>";
			  }
			  return $option1;
		    }
		   
		   
		    function employee_superior_dropdown($company_id){
		      global $option2;
			   $str = "SELECT employee_id,emp_name,(select designation_code from hr_emp_designation where designation_id=t1.designation_id) FROM `hr_employee_info` t1 WHERE company_id=$company_id";
			  $sql = mysql_query($str);
			  while($res = mysql_fetch_array($sql) ) {
				$option2 .=  "<option value='".$res[0] . "'>".  $res[1]. "(".$res[2].")</option>";
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
							<label>Employee <font color="#FF0000">*</font></label>							
						    <select  id="emp_id" class="long" >
							  <?php  echo employee_dropdown($company_id);  ?>
							</select>
							
							<label>Superior Employee <font color="#FF0000">*</font></label>							
						    <select  id="superior_emp_id" class="long" >
							  <?php  echo employee_superior_dropdown($company_id);  ?>
							</select>
						</p>

						<p class="btm_save_reset">
							
							<input type="button" style="width:70px;" class="btn_save"  id="emp_hierachy_save"  value="Save"/>
                            &nbsp;<input type="button" style="width:70px;" class="btn_reset"  id="btn_reset"  value="Reset"/>
						</p>

					</fieldset>
				</span>		

				<script type="text/javascript">
				$(document).ready(function()
				{
					$("#product_offer_table").load("includes/table/employee_hierachy_datatable.php" , function() {} ).fadeIn('slow');
					
					 $(".employee_hierachy_delete").live("click" , function(){
							   var eh_id = $(this).attr("id");
							   var c = confirm("Are you want to sure delete data");
							   if(c == true)
							   {
									$.ajax({
									   type:"post",
									   url:"includes/remove/employee_hierachy_delete.php",
									   data:"rid="+eh_id,
									   cache:false,
									   success:function(st){
										  alert(st);
										   $("#product_offer_table").load("includes/table/employee_hierachy_datatable.php" , function(){}).fadeIn('slow');
									   }
									});
								}else{
								  return false;
								}
							});
					
					
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
							}
						});
						
				    });
				});
				function edit_data(id)
						{
							//alert(id);
							var dataStr = "id="+id;
							//alert(dataStr);
							$.ajax({
								type:"post" ,
								url:"includes/edit/emp_hierachy_edit.php" ,
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
						url:"includes/view/emp_hierachy_view.php" ,
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
				
				 
				 <?php //include("table/employee_datatable.php"); ?>
				 <div id="product_offer_table"></div>
                 <br /><br />
		</div>
		<!-- end content -->