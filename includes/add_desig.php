<?php //session_start();?>
<div id="content">
	<input type="hidden" id="company_id" value="<?php echo $_SESSION['COMPANY_ID'];?>"/>
	<input type="hidden" id="entry_by" value="<?php echo $_SESSION["LOGIN_USERID"]   ;?>"/>		
	<div>
		<span action="javascript:void(0);" class="register">
			<!-- <h1>Form Design</h1>			-->		
			<fieldset class="row1">
				<legend>Designation Stting	</legend>
				<p>
					<label>Designation Name <font color="#FF0000">*</font>
					</label>
					<input type="text" id="designation_name" class="long"/>
				   
				</p>
				
				<p>
					<label>Designation Code <font color="#FF0000">*</font>
					</label>
					<input type="text" id="designation_code" class="long"/>
				</p>
				<p class="btm_save_reset">
					
					<input type="button" style="width:70px;" class="btn_save"  id="desgination_save"  value="Save"/>
					&nbsp;<input type="button" style="width:70px;" class="btn_reset"  id="desgination_reset"  value="Reset"/>
				</p>						
			</fieldset>
			
		</span>
	</div>
	<script   type="text/javascript">
	$(document).ready(function(){
		$("#designation_name").focus();
		var data_load = function() {
			//alert(1);
			$("#desig_table").load("includes/table/designation_datatable.php" , function(){}).fadeIn('slow');
		}
		data_load();
	   
		$(".designation_delete").live("click" , function(){
		   var designation_id = $(this).attr("id");
		   var c = confirm("Are you sure want to delete data");
		   if(c==true)
			{
			   $.ajax({
				   type:"post",
				   url:"includes/remove/designation_delete.php",
				   data:"rid="+designation_id,
				   cache:false,
				   success:function(st){
					  alert(st);
					  data_load();
				   }
				});
			} else{
			  return false;
			} 							  
		});
						
		$("#designation_name").keypress(function(ex){
			if(ex.which == 13 ) {
			   var   designation_name  =  $("#designation_name").val();
			   if(designation_name=="") {
				   alert("Enter designation name");
				   $("#designation_name").focus();
				   return false;
				}else{
					$("#designation_code").focus();
				}
			}
		});
						   
		var isExixtsDesigCode = function(code){
			alert(code);
			if(code!='')
			{
				var dataStr = 'code='+code;
				$.ajax({
					type:"post" ,
					url:"includes/chk_desigcode_existence_by_ajax.php" ,
					data:dataStr ,
					cache:false ,
					success:function(st)
					{
						//alert(st);
						if($.trim(st)=='yes')
						{
							//already exists
							alert('This code is already exists!');
							$("#designation_code").select();
							return;
						}
						else
						{
							//not exists
							$("#desgination_save").focus();
							return;
						}
						
					}
				});
			}
			else
			{
				return;
			}	

		}
		$("#designation_code").bind('blur keypress', function(ex){
			if(ex.which == 13 ) {
				var   designation_code  =  $("#designation_code").val();
				if(designation_code=="") {
				   alert("Enter designation code");
				   $("#designation_code").focus();
				   return false;
				}else{
					isExixtsDesigCode(designation_code);
				}
			}
		});						   
		
		var reset_fields = function() {
			$("#designation_name").val('');						   
			$("#designation_code").val('');
			$("#designation_name").focus();						   							 
		}						   
						   						   
						   
		$("#desgination_save").click(function(){	
			var designation_name = $("#designation_name").val();						   
			var designation_code = $("#designation_code").val();
			var company_id = $("#company_id").val();
			var entry_by = $("#entry_by").val();
			var dataStr = "designation_name="+designation_name+"&designation_code="+designation_code+"&company_id="+company_id+"&entry_by="+entry_by;
							 
			if(designation_name=="") {
				alert("Enter designation name");
				$("#designation_name").focus();
				return false;
			}else if(designation_code=="") {
				alert("Enter designation code");
				$("#designation_code").focus();
				return false;
			}else{
				//alert(dataStr);
				 
				$.ajax({
					type:"post" ,
					url:"includes/add_desig_by_ajax.php" ,
					data:dataStr ,
					cache:false ,
					success:function(st)
					{
						alert(st);
						$("#desig_table").load("includes/table/designation_datatable.php" , function(){}).fadeIn('slow');
						reset_fields();
					}
				});
			}

		});
		
		$('#desgination_reset').click(function(){
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
			url:"includes/edit/designation_edit.php" ,
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
			url:"includes/view/designation_view.php" ,
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
						
	<div id="desig_table"></div>
    <br /> <br />

</div>
<!-- end content -->
