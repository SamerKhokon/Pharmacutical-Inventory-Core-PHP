	<div id="content"> <?php include("./db.php"); //session_start();
			$company_id = $_SESSION['COMPANY_ID'];
          function get_depo_dropdown($company_id){
				 global $option2;
				 $str = "SELECT depot_type_id,depot_type,depot_type_code FROM `inv_depot_type` WHERE company_id=$company_id";
				 $sql =mysql_query($str);
				 while($res = mysql_fetch_array($sql)) {
				 $option2 .= "<option   value='".$res[2]."'>".$res[1]."(".$res[2].")</option>";
				 }
				 return $option2;
		  }	
	?>
			<input type="hidden" id="company_id" value="<?php echo $_SESSION['COMPANY_ID'];?>"/>
		<input type="hidden" id="entry_by" value="<?php echo $_SESSION["LOGIN_USERID"]   ;?>"/>		
		<div>
				<span action="javascript:void(0);" class="register">
					<!-- <h1>Form Design</h1>			-->		
					<fieldset class="row1">
						<legend>Depo Setting	</legend>
						<p>
							<label>Depo Type <font color="#FF0000">*</font> </label>
							<select id="depo_type" class="long" >
							   <option value="">Select Depot Type</option>
							  <?php echo get_depo_dropdown($company_id);?>
							</select>
						</p>						
						<p>
							<label>Depo Name <font color="#FF0000">*</font> </label>
							<input type="text" id="depo_name" class="long" />						   
						</p>
						<p>
							<label>Mobile No <font color="#FF0000">*</font> </label>
							<input type="text" id="depo_contact_no" class="long" onkeypress="return ret_valid_digit(event,'int',this.value.indexOf('.'));" />
						</p>
						<p>
							<label>Address&nbsp;&nbsp;</label>
                             <textarea id="depo_address" class="long"></textarea>
						</p>
						<p class="btm_save_reset">							
							<input type="button"style="width:70px;" class="btn_save"  id="depo_save"  value="Save"/>
                            &nbsp;
							<input type="button" style="width:70px;" class="btn_reset"  id="btn_reset"  value="Reset"/>
						</p>						
					</fieldset>					
				</span>
        </div>
                
<script type="text/javascript">
$(document).ready(function(){
	$("#depo_type").focus();
	$("#depo_table").load("includes/table/depo_datatable.php" , function(){}).fadeIn('slow');
	 
	$(".depo_delete").live("click" , function(){
		var depot_id = $(this).attr("id");
	   	//alert(depot_id);
	   	$.ajax({
			type:"post",
		   	url:"includes/remove/depot_delete.php",
		   	data:"rid="+depot_id,
		   	cache:false,
		   	success:function(st){
				alert(st);
			   	$("#depo_table").load("includes/table/depo_datatable.php" , function(){}).fadeIn('slow');
		   	}
	   	});
	  
	});
	
	
	$("#depo_type").keypress(function(ex){
		if(ex.which == 13 ) {
			var   depo_type  =  $("#depo_type").val();
			if(depo_type=="") {
				alert("Select Depot Type");
			   	$("#depo_type").focus();
			   	return false;
			}else{
				$("#depo_name").focus();
			}
		}
	});
   
	$("#depo_name").keypress(function(ex){
		if(ex.which == 13 ) {
			var   depo_name  =  $("#depo_name").val();
		   	if(depo_name=="") {
				alert("Enter depot name");
			   	$("#depo_name").focus();
			   	return false;
			}else{
				$("#depo_contact_no").focus();
			}
		}
	});
			
	$("#depo_contact_no").keypress(function(ex){
		if(ex.which == 13 ) {
			var   depo_contact_no  =  $("#depo_contact_no").val();
		   	if(depo_contact_no=="") {
				alert("Enter mobile no of Depot");
			   	$("#depo_contact_no").focus();
			   	return false;
			}else{
				$("#depo_address").focus();
			}
		}
	});			
	$("#depo_address").keypress(function(ex){
		if(ex.which == 13 ) {
			$("#depo_save").focus();
		}
	});									   						   

	var reset_fields = function()
	{
		$("#depo_type").val(0);
		$("#depo_name").val('');
		$("#depo_address").val('');
		$("#depo_contact_no").val('');								     
		$("#depo_name").focus();
	}									
   
   	$("#depo_save").click(function(){	
		var depo_type = $("#depo_type").val();
		var depo_name = $("#depo_name").val();
		var depo_address  = $("#depo_address").val();
		var depo_contact_no = $("#depo_contact_no").val();	
		
		
		var pat = /^[0-9]+$/;
		var cno = emp_contact_no.slice(0,3);
		var codes = ["011","015","016","017","018","019"];					

		var dataStr = "depo_type="+depo_type+"&depo_name="+depo_name+"&depo_address="+depo_address
											 +"&depo_contact_no="+depo_contact_no;
											 
		if(depo_name=="") {
			   alert("Enter depo name");
			   $("#depo_name").focus();
			   return false;
		}else if(depo_address=="") {
			   alert("Enter depo address");
			   $("#depo_address").focus();
			   return false;
		}else if(depo_contact_no=="") {
			  alert("Enter depo contact no");
			 $("#depo_contact_no").focus();
			 return false;
		}
		else if(!pat.test(depo_contact_no))
		{
		   alert("Mobile number must be digits only");
		   $("#depo_contact_no").focus();
		   return false;
		}
		else if(emp_contact_no.length>11 || emp_contact_no.length<11)
		{
			alert("Mobile number must be 11 digits");
			$("#depo_contact_no").focus();
			return false;
		}else if($.inArray(cno,codes) == -1) 
		{	
			alert("Enter valid mobile number ex.( 011xxxxxxxx,015xxxxxxxx,016xxxxxxxx,017xxxxxxxx,018xxxxxxxx,019xxxxxxxx )");
			$("#depo_contact_no").focus();
			return false;
		}
		else{
			//alert(dataStr);								     
			 $.ajax({
				type:"post" ,
				url:"includes/add_depo_by_ajax.php" ,
				data:dataStr ,
				cache:false ,
				success:function(st)
				{
					alert(st);
					$("#depo_table").load("includes/table/depo_datatable.php" , function(){}).fadeIn('slow');
					reset_fields();
				}
			 });
		}
	});
	$("#btn_reset").click(function(){
		reset_fields();
	});
});
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
		url:"includes/edit/depot_edit.php" ,
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
		url:"includes/view/depot_view.php" ,
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
						
   <div id="depo_table"></div>
           
                <br /> <br />

		</div>
        
		<!-- end content -->
