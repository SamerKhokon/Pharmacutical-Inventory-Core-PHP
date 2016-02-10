<?php	include("./db.php");  
        $company_id = $_SESSION["COMPANY_ID"];
		function  get_zone_dropdown($company_id) {
			global $option1;
			$str = "SELECT zone_id,zone_name FROM `inv_customer_zone` WHERE company_id=$company_id";
			$sql = mysql_query($str);
			while($res = mysql_fetch_array($sql)) {
				$option1 .= "<option value='".$res[0]."'>".$res[1]."</option>";
			}
			return $option1;			  
		}
			
		function  get_depot_dropdown($company_id) {
			global $option2;
			$str = "SELECT depot_id,depot_name,depot_flag FROM `inv_depot_info` WHERE active_flag='Y' and company_id=$company_id and depot_flag='SD'";
			$sql = mysql_query($str);
			while($res = mysql_fetch_array($sql)) {
			    $option2 .= "<option value='".$res[0]."'>".$res[1]."(".$res[2].")</option>";
			}
			return $option2;
		}			
			
?>		
<div id="content">
	<span action="" class="register">
		<!-- <h1>Form Design</h1> -->
		<fieldset class="row1">
			<legend>Customer Details</legend>
			<p>
				<label>Costomer Code <font color="#FF0000">*</font></label>							
				<input type="text"  id="cust_code" class="long" readonly="readonly" value="<?php echo mt_rand(1,999999);?>"/>
				
				<label>Depot <font color="#FF0000">*</font></label>							
				<select  id="cust_depo" class="long">
				   <option value="">Select depot</option>
				   <?php echo get_depot_dropdown($company_id);?>
				</select>
			</p>
			<p>
				<label>Zone <font color="#FF0000">*</font>
				</label>
                <select id="cust_zone" class="long">
                </select>
				<!--<select  id="cust_zone" class="long">							
				   <option value="">Select zone</option>
				   <?php echo get_zone_dropdown($company_id);?>
				</select> -->
			</p>
				
		</fieldset>
		<fieldset class="row3">
			<legend>Personal Information</legend>
			<p>
            	<label></label>
                <input type="radio" class="customer_type" name="customer_type" id="customer_type_o" value="org" checked="checked" />&nbsp;
                <label style="width:auto;">Organization&nbsp;</label>
                <input type="radio" class="customer_type" name="customer_type" id="customer_type_p" value="per" />
                <label style="width:auto;">&nbsp;Person</label>
                <input type="hidden" name="h_ctyp" id="h_ctyp" value="org" />
                <input type="hidden" name="cust_org_name" id="cust_org_name" />
            </p>
            <p>
				<label>Customer/Organization Name&nbsp;<font color="#FF0000">*</font></label>
				<input type="text" id="cust_name"class="long"/>						   
			</p>
			<!--<p>
				<label>Organization Name <font color="#FF0000">*</font>
				</label>
				<input type="text" id="cust_org_name"  class="long"/>
			</p> -->
			
			
			<p id="p_owner">
				<label>Owner Name&nbsp;<font color="#FF0000">*</font></label>
				<input type="text" id="cust_owner_name" class="long"/>
			</p>
			
			
			<p>
				<label>Customer Address&nbsp;<font color="#FF0000">*</font></label>
				<!--<input type="text"  id ="cust_address" class="long"/>-->
				<textarea id="cust_address" class="long" style="border:1px solid #356aa0; resize:none;"></textarea>
			</p>
			<p>
				<label >Mobile No&nbsp;<font color="#FF0000">*</font></label>
				<input class="long" id="cust_contact_no" type="text" />
			</p>
			<!-- <p>
				<label >Bank Account no</label>
				<input class="long" id="cust_bank_acct" type="text" />
			</p>	 -->						
			<p class="btm_save_reset">
				
				<input type="button" style="width:70px;" class="btn_save"  id="cust_save"  value="Save"/>
				&nbsp;<input type="button" style="width:70px;" class="btn_reset"  id="btn_reset"  value="Reset"/>
			</p>
								
		</fieldset>

	</span>		

				
	<script type="text/javascript">
	$(document).ready(function(){
	    $("#cust_depo").focus();
		$("#cust_table").load("includes/table/customer_datatable.php" , function() {} ).fadeIn('slow');
					
		$(".customer_delete").live("click" , function(){
			var customer_id = $(this).attr("id");
			var c = confirm("Are you sure want to delete data");
			if(c==true)
			{ 
				$.ajax({
					type:"post",
					url:"includes/remove/customer_delete.php",
					data:"rid="+customer_id,
					cache:false,
					success:function(st){
						alert(st);
						$("#cust_table").load("includes/table/customer_datatable.php" , function(){}).fadeIn('slow');
					}
				});
			}else{
				return false;
			}  
		});
							
							
		var reset_fields = function(){
			$("#cust_code").val('');
			$("#cust_depo").val(0);
			$("#cust_zone").val(0);
			$("#cust_name").val('');
			//$("#cust_org_name").val('');
			$("#cust_owner_name").val('');
			$("#cust_address").val('');
			$("#cust_contact_no").val('');
			$("#cust_bank_acct").val('');									
			$("#cust_code").focus();
		}		
		$('#cust_depo').change(function(){
			var depot_id = $(this).val();
			//alert(depot_id);
			var dataStr = 'depot_id='+depot_id;
			$.ajax({
				type:"post"  ,
				url: "includes/get_custzone_for_depot_by_ajax.php" ,
				data:dataStr ,
				cache:false ,
				success:function(st){ 
					$("#cust_zone").html($.trim(st));
				}
			});
			
		});
		/*$('#cust_zone').change(function(){
			alert($(this).val());
		});*/
		$('.customer_type').click(function(){
			var ctyp = $(this).val();
			$('#h_ctyp').val(ctyp);
			if(ctyp=='per'){
				$('#p_owner').hide('slow');
			}
			else{
				$('#p_owner').show('slow');
			}	
		});
					
		$("#cust_contact_no").keypress(function(ex){
			var cust_contact_no = $("#cust_contact_no").val();
			var pat = /^[0-9]+$/;
			var cno = cust_contact_no.slice(0,3);
			
			var codes = ["011","015","016","017","018","019"];
					
			if(ex.which == 13){
				
				if(cust_contact_no=="") 
				{
				   alert("Enter mobile number");
				   $("#cust_save").focus();
				   return false;
				}
				else if(!pat.test(cust_contact_no))
				{
				   alert("Mobile number must be digits only");
				   $("#cust_contact_no").focus();
				   return false;
				}
				else if(cust_contact_no.length>11 || cust_contact_no.length<11)
				{
					alert("Mobile number must be 11 digits");
					$("#cust_contact_no").focus();
					return false;
				}
				 else if($.inArray(cno,codes) == -1) 
				{							 
				
					alert("Enter valid mobile number ex.( 011xxxxxxxx,015xxxxxxxx,016xxxxxxxx,017xxxxxxxx,018xxxxxxxx,019xxxxxxxx )");
					$("#cust_contact_no").focus();
					return false;
				}else{
					//alert(cust_contact_no);
					$("#cust_save").focus();
				}
			}
		});					
					
		$("#cust_save").click(function(){
			customer_save_1();
		});
		var customer_save_1 = function(){
			var cust_depo = $("#cust_depo").val();
			var cust_zone = $("#cust_zone").val();
			var cust_typ = $("#h_ctyp").val();
			var cust_name = $("#cust_name").val();
			var cust_owner_name = $("#cust_owner_name").val();
			
			if(cust_depo=="") {
				alert("Select depot");
				$("#cust_depo").focus();
				return false;
			}else if(cust_zone=="") {
				alert("Select zone");
				$("#cust_zone").focus();
				return false;
			}else if(cust_typ=='org'){
				if(cust_name==""){
					alert("Enter customer name");
					$("#cust_name").focus();
					return false;
				}else if(cust_owner_name==""){
					alert("Enter owner name");
					$("#cust_owner_name").focus();
					return false;
				}
				else
					customer_save_f();
			}
			else
				customer_save_2();
		}
		var customer_save_2 = function(){
			var cust_typ = $("#h_ctyp").val();
			var cust_name = $("#cust_name").val();
			if(cust_typ=='per'){
				if(cust_name==""){
					alert("Enter customer name");
					$("#cust_name").focus();
					return false;
				}
				else
					customer_save_f();
			}
			else
				customer_save_f();
		}
		var customer_save_f = function(){
			var cust_code = $("#cust_code").val();
			var cust_depo = $("#cust_depo").val();
			var cust_zone = $("#cust_zone").val();
			var cust_typ = $("#h_ctyp").val();
			var cust_name = $("#cust_name").val();
			var cust_org_name = $("#cust_name").val();
			var cust_owner_name = $("#cust_owner_name").val();
			var cust_address = $("#cust_address").val();
			var cust_contact_no = $("#cust_contact_no").val();
			var cust_bank_acct = '';//$("#cust_bank_acct").val();	
			var pat = /^[0-9]+$/;
			
			if(cust_address==""){
				alert("Enter customer/shope address");
				$("#cust_address").focus();
				return false;
			}else if(cust_contact_no=="") {
				alert("Enter mobile number");
				$("#cust_contact_no").focus();
				return false;
			}else{						
				
				var dataStr = "cust_code="+cust_code+"&cust_depo="+cust_depo+"&cust_zone="+cust_zone+"&cust_name="+cust_name+
			"&cust_org_name="+cust_name+"&cust_owner_name="+cust_owner_name+"&cust_address="+cust_address
			+"&cust_contact_no="+cust_contact_no+"&cust_bank_acct="+cust_bank_acct;
			
				//alert(dataStr);
				
				$.ajax({
					type:"post"  ,
					url: "includes/add_customer_by_ajax.php" ,
					data:dataStr ,
					cache:false ,
					success:function(st){ 
						alert(st);
						$("#cust_table").load("includes/table/customer_datatable.php" , function() {} ).fadeIn('slow');
						location.reload();
						reset_fields();
					}
				});
			}
		}	
	});
	function edit_data(id)
	{
		//alert(id);
		var dataStr = "id="+id;
		//alert(dataStr);
		$.ajax({
			type:"post" ,
			url:"includes/edit/customer_edit.php" ,
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
			url:"includes/view/customer_view.php" ,
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
	<div id="cust_table"></div>
	<br /><br />
</div>
<!-- end content -->