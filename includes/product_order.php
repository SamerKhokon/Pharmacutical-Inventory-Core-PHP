<?php   include("./db.php"); 
$company_id = $_SESSION["COMPANY_ID"];

		function get_products($company_id){
			global $product_option;
			$product_option = "";
			$str = "SELECT product_id,product_name FROM `product_info` WHERE company_id=$company_id";
			$sql = mysql_query($str);
			while($res = mysql_fetch_array($sql) ) {
				$product_option .=  "<option value='".$res[0]."'>".$res[1]."</option>";
			}
			return $product_option;
		}
			
		function get_depot_from($company_id){
			global $depot_from_option;
			$str = "SELECT depot_id,depot_name,depot_flag FROM inv_depot_info WHERE company_id=$company_id";
			$sql = mysql_query($str);
			while($res = mysql_fetch_array($sql) ) {
				$depot_from_option .=  "<option value='".$res[0]."'>".$res[1]."</option>";
			}
			return $depot_from_option;
		}
			
		function get_depot_to($company_id){
			global $depot_to_option;
			$str = "SELECT depot_id,depot_name,depot_flag FROM inv_depot_info WHERE company_id=$company_id";
			$sql = mysql_query($str);
			while($res = mysql_fetch_array($sql) ) {
			    $depot_to_option .=  "<option value='".$res[0]."'>".$res[1]."</option>";
			}
			return $depot_to_option;
		}			
		function get_sv_list($company_id){
			global $sv_option;
			$str = "SELECT employee_id,emp_name,designation_id FROM hr_employee_info WHERE  
				designation_id IN(SELECT designation_id FROM hr_emp_designation WHERE designation_code='S.V') AND
				company_id=$company_id";
			$sql = mysql_query($str);
			while($res = mysql_fetch_array($sql) ) {
			    $sv_option .=  "<option value='".$res[0]."'>".$res[1]."</option>";
			}
			return $sv_option;
		}		

		function get_vehicle_list($company_id){
			global $vehicle_option;
			$str = "SELECT vehicle_id,vehicle_name FROM `vehicle_info` WHERE company_id=$company_id";
			$sql = mysql_query($str);
			while($res = mysql_fetch_array($sql) ) {
			    $vehicle_option .=  "<option value='".$res[0]."'>".$res[1]."</option>";
			}
			return $vehicle_option;
		}		

		function get_in_charge_list($company_id){
			global $in_charge_option;
			$str = "SELECT employee_id,emp_name FROM hr_employee_info WHERE company_id=$company_id";
			$sql = mysql_query($str);
			while($res = mysql_fetch_array($sql) ) {
			    $in_charge_option .=  "<option value='".$res[0]."'>".$res[1]."</option>";
			}
			return $in_charge_option;
		}

		function get_customer_names($company_id) {
			global $custmer_option; 
			$str = "SELECT customer_id,customer_name FROM inv_customer_info WHERE company_id=$company_id";
			$sql = mysql_query($str);
			$custmer_option="";
			while($res = mysql_fetch_array($sql)){
				$custmer_option .= "<option value='".$res[0]."'>".$res[1]."</option>";
			}
			return $custmer_option;
		}	
			
		function get_order_taken_by($company_id) {
			global $order_taken_by_option; 
			$str = "SELECT  employee_id,emp_name FROM `hr_employee_info` WHERE company_id=$company_id and  designation_id IN(SELECT designation_id FROM hr_emp_designation WHERE designation_code='M.I.O')";
			$sql = mysql_query($str);
			while($res = mysql_fetch_array($sql)){
				$order_taken_by_option .= "<option value='".$res[0]."'>".$res[1]."</option>";
			}
			return $order_taken_by_option;
		}				
  ?>
<div id="content">
	<span action="" class="register">		<!-- <h1>Form Design</h1> -->
		<fieldset class="row1">
			<legend>Product Order</legend>
			<p>
				<label>Order Taken By <font color="#FF0000">*</font></label>							
				<select  id="order_taken_by" class="middle" >
					<option value="">select order taker</option>
					<?php echo get_order_taken_by($company_id);?>
				</select>
				<label>Customer <font color="#FF0000">*</font></label>							
				<select id="customer_id" class="middle">
					<option value="">select customer</option>
					<?php echo get_customer_names($company_id);?>
				</option>
				</select>
				<label>Delivery Date <font color="#FF0000">*</font></label>							
				<input type="text"  id="delivery_dates"  class="middle"  style="background-color:#FFFFD7;"/>														
			</p>
			<p>
				<label>Product Delivery Date <font color="#FF0000">*</font></label>
				<input type="text"  id="product_delivery_date"  class="middle"  style="background-color:#FFFFD7;"/>														
											
				<label>Order Status <font color="#FF0000">*</font></label>							
				<select id="order_status" class="middle"  >
					<option value="REGULAR">REGULAR</option>
					<option value="EMERGENCY">EMERGENCY</option>							
				</select>						   
				
				<label></label>							
			</p>						
			
		</fieldset>
			
		<!--
		<fieldset id="dyn_table" class="row1">
			<legend>Product Information	</legend>						
			<p>-->
			
			
		<fieldset class="row1">
			<legend>Product Details</legend>	
			<table  id="product_dynamic_table" class="product_table" cellpadding="0" cellspacing="1">
				<tr>
					 <th><label>Product *</label></th>
					 <th><label>Pack *</label></th>		
					 <th><label>Unit *	</label></th>
					 <th><label>Unit Price</label></th>		
					 <th><label>Quantity</label></th>		
				</tr>
				<tr>						
					<td><select id="product_id_0" class="product_id"><option value="">select product</option><?php echo get_products($company_id);?></select></td>						    							
					<td><input type="text" class="pack_size" id="pack_size_0" readonly="readonly"  style="background-color:#FFFFD7;" /></td>								   
					<td><select  id="unit_id_0" class="unit_id"><option value="">select unit</option></select></td>		
					<td><input type="text"  id="unit_price_0" class="unit_price" readonly="readonly"  style="background-color:#FFFFD7;"/></td>							
					<td><input type="text"  id="quantity_0" class="qty"  class="quantity"  style="background-color:#FFFFD7;"/></td>			
				   <td><input type="button" class="btn_save"  id="links" value="Add More" style="width:70px;"/>		
					</td>	
				</tr>	
			</table>	
			
			<!--	</p>	</fieldset> -->
			<div class="product_btm">
				<input type="button" class="btn_save" id="order_to_depot_transfer_save" value="Save" style="width:70px;"/>
				<input type="reset" class="btn_reset" id="depot_to_depot_transfer_reset" value="Reset" style="width:70px;"/>
			</div>
		</fieldset>				
	</span>		

	<script type="text/javascript">
	$(document).ready(function(){
	
		var deliveryPickerOptions = {
			changeYear:false ,
			changeMonth:false ,
			changeDate:false ,
			dateFormat:"dd-mm-yy",
			minDate:new Date() ,
			maxDate:'+4'
		};
	
		$("#delivery_dates").datepicker(deliveryPickerOptions);	
		$("#product_delivery_date").datepicker(deliveryPickerOptions);	
		
		//$("#emp_table").load("includes/table/courier_datatable.php" , function() {} ).fadeIn('slow');					
		
		
		var sel_product = function(pr_id , x)
		{
			$.ajax(
			{
				type:"post" ,
				url:"includes/product_info_by_ajax_old.php" ,
				data:"product_id="+pr_id , 
				cache:false ,
				success:function(st)
				{
					var parse = st.split('#');
					//alert(st+" "+x);
					$("#pack_size_"+x).val(parse[0]);
					$("#unit_id_"+x).html("<option >"+parse[1]+"</option>");
					$("#unit_price_"+x).val(parse[2]);	
					$("#quantity_"+x).focus();									
					//alert(st);
				}
			});									
		}
		
		
		$("#product_id_0").change(function()
		{
			var  vl = $(this).val();
			var customer_id = $("#customer_id").val();					   
			if(vl!="") 
			{
				$.ajax({
					type:"post" ,
					url:"includes/product_info_by_ajax_old.php" ,
					data:"product_id="+vl , 
					cache:false ,
					success:function(st){
					   //alert(st);
						var parse = st.split('#');
						$("#pack_size_0").val(parse[0]);
						$("#unit_id_0").html("<option >"+parse[1]+"</option>");
						$("#unit_price_0").val(parse[2]);									
						$("#quantity_0").focus();
						 //alert(st);
					}
				});
			}
		});
		
		
		var c = 0;
		$("#links").click(function()
		{
			var customer_id = $("#customer_id").val();
			var product_id_0 = $("#product_id_0").val();
			var pack_size_0 = $("#pack_size_0").val();
			var unit_id_0 = $("#unit_id_0").val();
			var unit_price_0 = $("#unit_price_0").val();
			var quantity_0 = $("#quantity_0").val();
			
			if(product_id_0=="") {
				alert("Select product");
				$('#product_id_0').focus();
				return false;
			}else if(pack_size_0=="") {
				alert("Enter pack size");
				$('#pack_size_0').focus();
				return false;
			}else if(unit_id_0=="") {
				alert("Select unit");
				$('#unit_id_0').focus();
				return false;
			}else if(unit_price_0=="") {
				alert("Enter unit price");
				$('#unit_price_0').focus();
				return false;
			}else if(quantity_0=="") {
				alert("Enter product quantity");
				$('#quantity_0').focus();
				return false;
			}else{
				c++;
				var st = "#product_id_"+c;
				//$(st+" option").remove();	
				$("#product_id_"+c+" option").remove();							 
				$("#product_dynamic_table").append("<tr><td><select class=\"product_id\" id='product_id_"+c+"'><option value=''>select product</option><?php echo  get_products($company_id);?></select></td><td><input type='text' id='pack_size_"+c+"' class='pack_size'  style='background-color:#FFFFD7;'/></td><td><select id='unit_id_"+c+"' class='unit_id'><option value=''>select unit</option></select></td><td><input type='text'  id='unit_price_"+c+"' class='unit_price' style=\"background-color:#FFFFD7;\"/></td><td><input type='text'  id='quantity_"+c+"' class='qty'  style=\"background-color:#FFFFD7;\"/></td><td>&nbsp;</td>");					   										
				var pro_id = "#product_id_"+c;
				 //alert(pro_id);
				$(pro_id).change(function()
				{
					var id = $(this).val();
					sel_product(id,c);																
				});
			}					
		});	
				
		
		$("#order_to_depot_transfer_save").click(function()
		{
			var order_taken_by = $("#order_taken_by").val();
			var customer_id = $("#customer_id").val();
			var delivery_dates = $("#delivery_dates").val();
			var product_delivery_date = $("#product_delivery_date").val();							
			var order_status = $("#order_status").val();	
			
			var products = [];
			var packs     = [];
			var units       = [];
			var uprices   = [];
			var qtys        = []; 
			$(".product_id").each(function(){
				var pid = $(this).attr('id');
				var v = $('#'+pid).val();
				products.push(v);							
			});
			
			$(".pack_size").each(function(){
				var pcid = $(this).attr('id');
				var t = $('#'+pcid).val();
				packs.push(t);							
			});
			$(".unit_id").each(function(){
				var uid = $(this).attr('id');
				var u = $('#'+uid).val();
				units.push(u);							
			});
			$(".unit_price").each(function(){
				var upid = $(this).attr('id');
				var up = $('#'+upid).val();
				uprices.push(up);							
			});
			
			$(".qty").each(function(){
				var qid = $(this).attr('id');
				var qp = $('#'+qid).val();
				qtys.push(qp);							
			});
			
			var dataStr = "order_taken_by="+order_taken_by+"&customer_id="+customer_id+
			"&delivery_dates="+delivery_dates+"&product_delivery_date="+
			product_delivery_date+"&order_status="+order_status+
			"&packs="+packs+"&products="+products+"&units="+units+
			"&uprices="+uprices+"&qtys="+qtys;						
			
			if(order_taken_by=="") {
				alert("Select order taker name");
				return false;
			}else if(customer_id=="") {
				alert("Select customer");
				return false;
			}else if(delivery_dates=="") {
				alert("Enter delivery date");
				$("#delivery_dates").focus();
				return false;
			}else if(order_status=="") {
				alert("Select order status");
				return false;
			}else{						
				//alert(dataStr);
				$.ajax({
					type:"post" ,
					url:"includes/product_order_by_ajax.php" ,
					data:dataStr ,
					cache:false ,
					success:function(st){
						alert(st);
						location.reload();
					}						   
				});
			}	
		});
	});
	</script>
	<script type="text/javascript" charset="utf-8">
		$(document).ready(function() {
			$(".various1").fancybox({
				'titlePosition'		: 'inside',
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});
		} );
	</script>
	<div style="display: none;">
		<div id="inline1" class="pop_div"></div>
	</div>					 
	<div id="emp_table"></div>
	<br /><br />
</div>
<!-- end content -->