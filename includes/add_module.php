<?php //session_start();?>
<div id="content">
	<input type="hidden" id="company_id" value="<?php echo $_SESSION['COMPANY_ID'];?>"/>
	<input type="hidden" id="entry_by" value="<?php echo $_SESSION["LOGIN_USERID"]   ;?>"/>		
	<div>
        <span action="javascript:void(0);" class="register">
           
            <fieldset class="row1">
                <legend>Module Entry	</legend>
                <p>
                    <label>Module Name <font color="#FF0000">*</font></label>
                    <input type="text" id="module_name" class="long"/>						   
                </p>
                <p>
                    <label>Module Folder <font color="#FF0000">*</font></label>
                    <input type="text" id="module_folder" class="long"/>
                </p>
                <p class="btm_save_reset">
                    <input type="button" style="width:70px;" class="btn_save"  id="btn_save"  value="Save"/>&nbsp;<input type="button" style="width:70px;" class="btn_reset"  id="btn_reset"  value="Reset"/>
                </p>						
            </fieldset>					
        </span>
    </div>
	<script type="text/javascript">
	$(document).ready(function(){
		//$("#div_datatable").load("includes/table/module_datatable.php" , function(){});
		
		
		 $(".module_delete").live("click" , function(){
							   var module_id = $(this).attr("id");
							   //alert(module_id);
							   $.ajax({
							       type:"post",
								   url:"includes/remove/module_delete.php",
								   data:"rid="+module_id,
								   cache:false,
								   success:function(st){
								      alert(st);
									   $("#div_datatable").load("includes/table/module_datatable.php" , function(){}).fadeIn('slow');
								   }
							   });
							  
							});
		
		
		data_load();
		$("#module_name").keypress(function(ex){
			if(ex.which == 13 ) {
			   var   module_name  =  $("#module_name").val();
			   if(module_name=="") {
				   alert("Enter module name");
				   $("#module_name").focus();
				   return false;
				}else{
					$("#module_folder").focus();
				}
			}
		});
	   
		$("#module_folder").keypress(function(ex){
			if(ex.which == 13 ) {
			   var   module_folder  =  $("#module_folder").val();
			   if(module_folder=="") {
				   alert("Enter module folder");
				   $("#module_folder").focus();
				   return false;
				}else{
					$("#btn_save").focus();
				}
			}
		});		
	   
	   	$("#btn_save").click(function(){	
			var module_name = $("#module_name").val();
			var module_folder = $("#module_folder").val();
			var company_id = $("#company_id").val();
			var entry_by = $("#entry_by").val();
			
		 
			if(module_name=="") {
				alert("Enter module name");
				$("#module_name").focus();
				return false;
			}else if(module_folder=="") {
				alert("Enter module folder");
				$("#module_folder").focus();
				return false;
			}else{
				module_name = module_name.replace("&", "~and~");
				var dataStr = "module_name="+module_name+"&module_folder="+module_folder+"&company_id="+company_id+"&entry_by="+entry_by;
				//alert(dataStr);								     
				$.ajax({
					type:"post" ,
					url:"includes/add_module_by_ajax.php" ,
					data:dataStr ,
					cache:false ,
					success:function(st)
					{
						data_load();			
					}
				});
			}
			
	   	});
	   	$("#btn_reset").click(function(){
	   		clear_fields();
		});
	});
	function data_load()
	{
		$("#div_datatable").load("includes/table/module_datatable.php" , function(){});
	}
	function clear_fields(){
		$("#module_name").val('');
		$("#module_folder").val('');
		data_load();
		$("#module_name").focus();
	}
	function edit_data(id)
	{
		//alert(id);
		var dataStr = "id="+id;
		//alert(dataStr);
		$.ajax({
			type:"post" ,
			url:"includes/edit/module_edit.php" ,
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
		url:"includes/view/module_view.php" ,
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

	<div id="div_datatable"></div>
	<br /> <br />
</div>
        
		<!-- end content -->
