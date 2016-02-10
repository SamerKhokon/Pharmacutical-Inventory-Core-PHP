<?php include("db.php");   if($con) 
	$company_id = $_SESSION["COMPANY_ID"];
	
	function employee_dropdown($company_id){
		global $option1;
		$str = "SELECT employee_id,emp_name,(SELECT designation_code FROM hr_emp_designation WHERE designation_id=a.designation_id) AS designation
		FROM `hr_employee_info` as a WHERE company_id=$company_id";
		$sql = mysql_query($str);
		while($res = mysql_fetch_array($sql) ) {
			$option1 .=  "<option value='".$res[0] . "'>".  $res[1]."(".$res[2]. ")</option>";
		}
		return $option1;
	}
		   
		   
	function depot_dropdown($company_id){
		global $option2;
		$str = "SELECT depot_id,depot_name,depot_flag FROM `inv_depot_info` WHERE company_id=$company_id";
		$sql = mysql_query($str);
		while($res = mysql_fetch_array($sql) ) {
			$option2 .=  "<option value='".$res[0] . "'>".  $res[1]."(". $res[2].")</option>";
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
				<legend>Employee-Depot Relation</legend>
                <p>
                    <label>Employee <font color="#FF0000">*</font></label>							
                    <select  id="emp_id" class="long" >
                      <?php  echo employee_dropdown($company_id);  ?>
                    </select>

                    <label>Depot  <font color="#FF0000">*</font></label>							
                    <select  id="depot_id" class="long" >
                      <?php  echo depot_dropdown($company_id);  ?>
                    </select>
                </p>
                <p>
                    <label>Designation <font color="#FF0000">*</font></label>							
                    <select  id="desig_id" class="long" >
                      <?php  echo designation_dropdown($company_id);  ?>
                    </select>
                    
                    <label>&nbsp;</label>							

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
			$("#emp_depo_table").load("includes/table/employee_depo_rel_datatable.php" , function() {} ).fadeIn('slow');
					
			$(".epm_depo_rel_delete").live("click" , function(){
			   var edr_id = $(this).attr("id");
			   var c = confirm("Are you sure want to delete data");
			   if(c==true)
			   {
				   $.ajax({
					   type:"post",
					   url:"includes/remove/employee_depo_rel_delete.php",
					   data:"rid="+edr_id,
					   cache:false,
					   success:function(st){
						  alert(st);
						   $("#emp_depo_table").load("includes/table/employee_depo_rel_datatable.php" , function(){}).fadeIn('slow');
					   }
				   });
				}else   {
				   return false;
				}							  
			});
					
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
		function edit_data(id)
		{
			//alert(id);
			var dataStr = "id="+id;
			//alert(dataStr);
			$.ajax({
				type:"post" ,
				url:"includes/edit/depot_rel_edit.php" ,
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
				url:"includes/view/depot_rel_view.php" ,
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
        <div id="emp_depo_table"></div>
        <br /><br />
    </div>
    <!-- end content -->