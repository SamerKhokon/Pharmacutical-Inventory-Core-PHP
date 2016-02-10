<?php //session_start();?>
<script type="text/javascript">
$(document).ready(function(){
	//$("#div_datatable").load("includes/table/module_datatable.php" , function(){});
	$(".menu_delete").live("click" , function(){
		var menu_id = $(this).attr("id");
	   	//alert(menu_id);
	   	$.ajax({
			type:"post",
		   	url:"includes/remove/menu_delete.php",
		   	data:"rid="+menu_id,
		   	cache:false,
		   	success:function(st){
				alert(st);
			   	$("#div_datatable").load("includes/table/menu_datatable.php" , function(){}).fadeIn('slow');
		   	}
	   });
	  
	});
	data_load();
	$("#menu_name").keypress(function(ex){
		if(ex.which == 13 ) {
			var menu_name  =  $("#menu_name").val();
		   	if(menu_name=="") {
			   alert("Enter menu name");
			   $("#menu_name").focus();
			   return false;
			}else{
				$("#menu_contant").focus();
			}
		}
	});
   
	$("#menu_contant").keypress(function(ex){
		if(ex.which == 13 ) {
			$("#module_id").focus();
		}
	});		
	$("#module_id").keypress(function(ex){
		if(ex.which == 13 ) {
		   var   module_id  =  $("#module_id").val();
		   if(module_id=="") {
			   alert("Select module");
			   $("#module_id").focus();
			   return false;
			}else{
				$("#mother_menu_id").focus();
			}
		}
	});		
    $("#mother_menu_id").keypress(function(ex){
		if(ex.which == 13 ) {
			var mother_menu_id  =  $("#mother_menu_id").val();
		   	if(mother_menu_id=="") {
			   	alert("Select Mother Menu");
			   	$("#mother_menu_id").focus();
			   	return false;
			}else{
				$("#sub_menu_flag").focus();
			}
		}
	});  
	$("#sub_menu_flag").keypress(function(ex){
		if(ex.which == 13 ) {
			$("#common_for_all").focus();
		}
	});  
	$("#common_for_all").keypress(function(ex){
		if(ex.which == 13 ) {
			$("#menu_order").focus();
		}
	});  
	$("#menu_order").keypress(function(ex){
		if(ex.which == 13 ) {
			var menu_order  =  $("#menu_order").val();
		   	if(menu_order=="") {
			   	alert("Enter Menu Order");
			   	$("#menu_order").focus();
			   	return false;
			}else{
				$("#btn_save").focus();
			}
			
		}
	});  
	$("#btn_save").click(function(){	
		var menu_name = $("#menu_name").val();
		var menu_contant = $("#menu_contant").val();
		var module_info = $("#module_id").val();
		var myArray = module_info.split(',');
		var module_id = myArray[0];
		var module_folder = myArray[1];
		var mother_menu_id = $("#mother_menu_id").val();
		var sub_menu_flag = $("#sub_menu_flag").val();
		var common_for_all = $("#common_for_all").val();
		var menu_order = $("#menu_order").val();
		var entry_by = $("#entry_by").val();
		
	 
		if(menu_name=="") {
			alert("Enter Menu name");
			$("#module_name").focus();
			return false;
		}else if(module_info=="") {
			alert("Select module");
			$("#module_id").focus();
			return false;
		}else if(menu_order=="") {
			alert("Enter menu order");
			$("#menu_order").focus();
			return false;
		}else{
			
			menu_name = menu_name.replace("&", "~and~");
			var dataStr = "menu_name="+menu_name+"&menu_contant="+menu_contant+"&module_id="+module_id+"&module_folder="+module_folder+"&mother_menu_id="+mother_menu_id+"&sub_menu_flag="+sub_menu_flag+"&common_for_all="+common_for_all+"&menu_order="+menu_order+"&entry_by="+entry_by;								     		//alert(dataStr);
			$.ajax({
				type:"post" ,
				url:"includes/add_menu_by_ajax.php" ,
				data:dataStr ,
				cache:false ,
				success:function(st)
				{
					alert(st);
					clear_fields();
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
	$("#div_datatable").load("includes/table/menu_datatable.php" , function(){});
}
function clear_fields(){
	$("#menu_name").val('');
	$("#menu_contant").val('');
	$("#module_id").val('');
	$("#mother_menu_id").val('');
	$("#sub_menu_flag").val('');
	$("#common_for_all").val('');
	$("#menu_order").val('');
	data_load();
	$("#menu_name").focus();
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
function edit_data(id)
{
	//alert(id);
	var dataStr = "id="+id;
	//alert(dataStr);
	$.ajax({
		type:"post" ,
		url:"includes/edit/menu_info_for_edit.php" ,
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
		url:"includes/view/menu_info_for_view.php" ,
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
<div id="content">
	<input type="hidden" id="company_id" value="<?php echo $_SESSION['COMPANY_ID'];?>"/>
	<input type="hidden" id="entry_by" value="<?php echo $_SESSION["LOGIN_USERID"]   ;?>"/>		
	<div>
        <span action="javascript:void(0);" class="register">
            <!-- <h1>Form Design</h1>			-->		
            <fieldset class="row1">
                <legend>Add Menu </legend>
                <p>
                    <label>Menu Name <font color="#FF0000">*</font></label>
                    <input type="text" id="menu_name" class="long"/>						   
                </p>
                <p>
                    <label>Menu Contant </label>
                    <input type="text" id="menu_contant" class="long"/>						   
                </p>
                <p>
                    <label>Module <font color="#FF0000">*</font></label>
                    <select id="module_id" class="long">
                    	<option value=""></option>
                        <?php
                        $sql_module = "select module_id, module_name, module_folder from st_module_info where active_flag='Y'";
						$res_module = mysql_query($sql_module);
						while($row_module = mysql_fetch_array($res_module))
						{
							echo '<option value="'.$row_module['module_id'].','.$row_module['module_folder'].'">'.$row_module['module_name'].'</option>';
						}
						?>
                    </select>
                </p>
                <p>
                    <label>Child of <font color="#FF0000">*</font></label>
                    <select id="mother_menu_id" class="long">
                    	<option value="0">None</option>
                        <?php
                        $sql_mother_menu = "select menu_id, menu_name from st_menu_info where active_flag='Y' and mother_menu_id=0";
						$res_mother_menu = mysql_query($sql_mother_menu);
						while($row_mother_menu = mysql_fetch_array($res_mother_menu))
						{
							echo '<option value="'.$row_mother_menu['menu_id'].'">'.$row_mother_menu['menu_name'].'</option>';
						}
						?>
                    </select>
                </p>
                <p>
                    <label>Sub Menu </label>
                    <select id="sub_menu_flag" class="long">
                    	<option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </p>
                <p>
                    <label>Common For All </label>
                    <select id="common_for_all" class="long">
                    	<option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </p>
                <p>
                    <label>Menu Order <font color="#FF0000">*</font></label>
                    <input type="text" class="long" id="menu_order" onkeypress="return ret_valid_digit(event,'int',this.value.indexOf('.'));"/>						   
                </p>
                <p class="btm_save_reset">
                	
                    <input type="button" style="width:70px;" class="btn_save"  id="btn_save"  value="Save"/>&nbsp;<input type="button" style="width:70px;" class="btn_reset"  id="btn_reset"  value="Reset"/>
                </p>
            </fieldset>
        </span>
    </div>
    <div style="display: none;">
		<div id="inline1" class="pop_div"></div>
	</div>
    <div style="display: none;">
		<div id="inline2" class="pop_div"></div>
	</div>
	<!-- data table-->
    <div id="div_datatable"></div>
	<br /> <br />
</div>
<!-- end content -->