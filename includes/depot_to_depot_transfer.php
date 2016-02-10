<?php   include("./db.php"); $company_id = $_SESSION["COMPANY_ID"];

			function get_products($company_id){
			  global $product_option;
			  $product_option="";
			   $str = "SELECT product_id,product_name FROM `product_info` WHERE company_id=$company_id";
			   $sql = mysql_query($str);
			   while($res = mysql_fetch_array($sql) ) {
			     $product_option .=  "<option value='".$res[0]."'>".$res[1]."</option>";
			   }
			   return $product_option;
			}
			
			function get_depot_from($company_id){
			  global $depot_from_option;
			  $depot_from_option="";
			   $str = "SELECT depot_id,depot_name,depot_flag FROM inv_depot_info WHERE company_id=$company_id";
			   $sql = mysql_query($str);
			   while($res = mysql_fetch_array($sql) ) {
			     $depot_from_option .=  "<option value='".$res[0]."'>".$res[1]."</option>";
			   }
			   return $depot_from_option;
			}
			
			function get_depot_to($company_id){
			  global $depot_to_option;
			  $depot_to_option="";
			   $str = "SELECT depot_id,depot_name,depot_flag FROM inv_depot_info WHERE company_id=$company_id";
			   $sql = mysql_query($str);
			   while($res = mysql_fetch_array($sql) ) {
			     $depot_to_option .=  "<option value='".$res[0]."'>".$res[1]."</option>";
			   }
			   return $depot_to_option;
			}			
			function get_sv_list($company_id){
			  global $sv_option;
			  $sv_option="";
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
			  $vehicle_option="";
			   $str = "SELECT vehicle_id,vehicle_name FROM `vehicle_info` WHERE company_id=$company_id";
			   $sql = mysql_query($str);
			   while($res = mysql_fetch_array($sql) ) {
			     $vehicle_option .=  "<option value='".$res[0]."'>".$res[1]."</option>";
			   }
			   return $vehicle_option;
			}		

			function get_in_charge_list($company_id){
			  global $in_charge_option;
			  $in_charge_option="";
			   $str = "SELECT employee_id,emp_name FROM hr_employee_info WHERE company_id=$company_id and designation_id IN(SELECT designation_id FROM hr_emp_designation WHERE designation_code='INC')";
			   $sql = mysql_query($str);
			   while($res = mysql_fetch_array($sql) ) {
			     $in_charge_option .=  "<option value='".$res[0]."'>".$res[1]."</option>";
			   }
			   return $in_charge_option;
			}
          
            function get_drivers_list($company_id) {
			   global $driver_option;
			   $driver_option="";
			  $str = "SELECT driver_name FROM `vehicle_info` WHERE company_id=$company_id";
			  $sql = mysql_query($str);
			  while($res = mysql_fetch_array($sql)){
			      $driver_option .= "<option value='".$res[0]."'>".$res[0]."</option>";
			  } 
			  return $driver_option;
			}		  
  ?>
		<div id="content">
				<span action="" class="register">		<!-- <h1>Form Design</h1> -->
					<fieldset class="row1">
						<legend>Depot to Depot Product Transfer</legend>
						<p>
							<label>Chalan No <font color="#FF0000">*</font></label>							
							<input type="text"  id="chalan_no" class="middle" style="background-color:#FFFFD7;" value="<?php echo mt_rand(1,999999);?>"/>
							
							<label>Invoice No <font color="#FF0000">*</font></label>							
						    <input type="text"  id="invoice_no" class="middle" readonly="readonly" value="<?php echo 'INV-'.date('his');?>" style="background-color:#FFFFD7;"/>
							
							<label>Ref No <font color="#FF0000">*</font></label>							
						    <input type="text"  id="ref_no" class="middle"   style="background-color:#FFFFD7;" value="<?php echo mt_rand(1,999999);?>"/>														
						</p>
						<p>
							<label>Transfer From <font color="#FF0000">*</font></label>
							<select  id="transfer_from" class="middle">												
								 <?php echo get_depot_from($company_id);   ?>					 
							</select>															
							
							<label>Transfer To <font color="#FF0000">*</font></label>							
							<select  id="transfer_to" class="middle">												
								 <?php echo get_depot_to($company_id);?>							 
							</select>
							
							<label>Delivery Date <font color="#FF0000">*</font></label>
							<input type="text"  id="delivery_date" class="middle" readonly="readonly"  style="background-color:#FFFFD7;"/>
						</p>						
						<p>
							<label>Load S.V <font color="#FF0000">*</font></label>							
							<select  id="laod_supervisor" class="middle">												
								<?php echo get_sv_list($company_id);?>
							</select>
							
							<label>In Charge <font color="#FF0000">*</font></label>							
						    <select  id="in_charge" class="middle">												
							 <?php echo get_in_charge_list($company_id);?>
							</select>									
                            
                            <label>Transport Type <font color="#FF0000">*</font></label>							
						    <select  id="transport_type" class="middle">												
								 <option value="own">own</option>
								 <option value="rent">Rent</option>
                                 <option value="courier">Courier</option>							 
							</select>															
							
						</p>						
						<p id="p_own">
							<label>Transport <font color="#FF0000">*</font></label>
							<select  id="transport_id" class="middle">												
								 <?php echo get_vehicle_list($company_id);?>
							</select>															
							
							<label>Driver </label>							
							<select  id="driver" class="middle">												
								 <option value="">select driver</option>							 
								 <?php echo get_drivers_list($company_id);?>
							</select>						
							
							<label>Driver Contact No </label>							
							<input type="text"  id="driver_contact_no" class="middle"/>	
						</p>																	
                        <p id="p_rent" style="display:none;">
							<label>Driver Name <font color="#FF0000">*</font></label>
							<input type="text"  id="rent_driver_name" class="middle"  style="background-color:#FFFFD7;"/>															
							
							<label>Vehical Regi. No </label>							
							<input type="text"  id="rent_vehichel_regi_no" class="middle"  style="background-color:#FFFFD7;"/>
							
							<label>Driver Contact No </label>							
							<input type="text"  id="rent_driver_contact_no" class="middle"/>	
						</p>
						<p id="p_courier" style="display:none;">
							<label>Courier Company <font color="#FF0000">*</font></label>
							<input type="text"  id="courier_company_name" class=""  style="background-color:#FFFFD7;"/>															
							
							<label style="width:80px;">Booking No </label>							
							<input type="text"  id="courier_booking_no" class=""  style="background-color:#FFFFD7;"/>
           
                            <label style="width:130px;">Given Person Name </label>							
							<input type="text"  id="courier_given_person_name" class=""  style="background-color:#FFFFD7;"/>
                            <label>Given Mobile No </label>							
							<input type="text"  id="courier_given_mobile_no" class=""  style="background-color:#FFFFD7;"/>
							
								
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
                                 <th><label>Current Stock</label></th>		
								 <th><label>Quantity</label></th>		
							</tr>
							<tr>						
								<td><select id="product_id_0" class="product_id"><option value="">select product</option><?php echo get_products($company_id);?></select></td>						    							
								<td><input type="text" id="pack_size_0" class="pack_size" readonly="readonly"  style="background-color:#FFFFD7;" /></td>								   
								<td><input type="text"  id="unit_id_0" class="unit_id" value="" style="background-color:#FFFFD7;" readonly="readonly"/></td>		
								<td><input type="text"  id="unit_price_0" class="unit_price" readonly="readonly"  style="background-color:#FFFFD7;"/></td>
                                <td><input type="text"  id="current_stock_0" class="current_stock" readonly="readonly"  style="background-color:#FFFFD7;"/></td>							
								<td><input type="text"  id="quantity_0" class="qty"  style="background-color:#FFFFD7;"/></td>
								<td><input type="button" class="btn_save"  id="links" value="Add More" style="width:70px;"/>		</td>		
							</tr>	
						</table>	
						
					<!--	</p>	</fieldset> -->
					<div class="product_btm">
					<input type="button" class="btn_save" id="depot_to_depot_transfer_save" value="Save" style="width:70px;"/>
					<!--<input type="reset" class="btn_reset" id="depot_to_depot_transfer_reset" value="Reset" style="width:70px;"/>	 -->
                    </div>
                    </fieldset>				
				</span>		

			


			
				<script type="text/javascript">
				$(document).ready(function(){
				
				
				    var pickerOptions = {
					   changeMonth:false , 
					   changeYear:false ,
					   changeDate:false,
					   dateFormat:"dd-mm-yy",
					   minDate:new Date(),
					   maxDate:'+4'
					};
				    $("#delivery_date").datepicker(pickerOptions);					
					//$("#emp_table").load("includes/table/courier_datatable.php" , function() {} ).fadeIn('slow');					
					$("#transport_type").change(function(){
						var typ = $(this).val();
						if(typ=='rent')
						{
							$('#p_own').hide();
							$('#p_courier').hide();
							$('#p_rent').show('slow');
						}
						else if(typ=='courier')
						{
							$('#p_own').hide();
							$('#p_courier').show('slow');
							$('#p_rent').hide();
						}
						else
						{
							$('#p_own').show('slow');
							$('#p_courier').hide();
							$('#p_rent').hide();
						}
					});
					
					var sel_product = function(pr_id , x, depot_id){
							
							//alert(depot_id);
							$.ajax({
								 type:"post" ,
								 url:"includes/product_info_by_ajax.php" ,
								 data:"product_id="+pr_id+"&depot_id="+depot_id , 
								 cache:false ,
								 success:function(st){
								    var parse = st.split('#');
									//alert(st+" "+x);
									$("#pack_size_"+x).val(parse[0]);
									$("#unit_id_"+x).val(parse[1]);
									$("#unit_price_"+x).val(parse[2]);
									$("#current_stock_"+x).val(parse[3]);	
									$("#quantity_"+x).focus();									
									 //alert(st);
								 }
							});	 
					}
					
					
					$("#product_id_0").change(function(){
					   var  vl = $(this).val();
					   var depot_id = $('#transfer_from').val();
					   //alert(vl);					   
					   if(vl!="") 
					   {
							var dataS = "product_id="+vl+"&depot_id="+depot_id;
							//alert(dataS);
							$.ajax({
								 type:"post" ,
								 url:"includes/product_info_by_ajax.php" ,
								 data:dataS , 
								 cache:false ,
								 success:function(st){
								 	//alert(st);
								    var parse = st.split('#');
									$("#pack_size_0").val(parse[0]);
									$("#unit_id_0").val(parse[1]);
									$("#unit_price_0").val(parse[2]);
									$("#current_stock_0").val(parse[3]);									
									$("#quantity_0").focus();
									 //alert(st);
								 }
							});
					    }
					});
					
					
					var c = 0;
						$("#links").click(function()
						{
								
									var depot_id = $('#transfer_from').val();
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
										 $(st+" option").remove();						  
										$("#product_dynamic_table").append("<tr><td><select class=\"product_id\" id='product_id_"+c+"'><option value=''>select product</option><?php echo  get_products($company_id);?></select></td><td><input type='text' id='pack_size_"+c+"' class='pack_size'  style='background-color:#FFFFD7;'/></td><td><input type='text' id='unit_id_"+c+"' class='unit_id' value='' readonly='readonly' style=\"background-color:#FFFFD7;\"/></td><td><input type='text'  id='unit_price_"+c+"' class='unit_price' style=\"background-color:#FFFFD7;\"/></td><td><input type='text'  id='current_stock_"+c+"' class='current_stock' style=\"background-color:#FFFFD7;\"/></td><td><input type='text'  id='quantity_"+c+"' class='qty'  style=\"background-color:#FFFFD7;\"/></td><td>&nbsp;</td>");					   										
										var pro_id = "#product_id_"+c;
										 //alert(pro_id);
										$(pro_id).change(function()
										{
												var id = $(this).val();
												sel_product(id, c, depot_id);																
										});
									}					
					});	
			
			
					$("#driver_contact_no").keypress(function(ex)
					{						
						if(ex.which == 13) 
						{						   
						    var driverContact = $("#driver_contact_no").val();
							var cno = driverContact.slice(0,3);
							var pat = /^[0-9]+$/;
							var codes = ["011","015","016","017","018","019"];	
							if(driverContact=="") 
							{
							   alert("Enter mobile number");
							   $("#driver_contact_no").focus();
							   return false;
							}
							
							else if(!pat.test(driverContact))
							{
							   alert("Mobile number must be digits only");
							   $("#driver_contact_no").focus();
							   return false;
							}
							
							else if(driverContact.length>11 || driverContact.length<11)
							{
							    alert("Mobile number must be 11 digits");
								$("#driver_contact_no").focus();
								return false;
							}
							else if($.inArray(cno,codes) == -1) 
							{	
								alert("Enter valid mobile number ex.( 011xxxxxxxx,015xxxxxxxx,016xxxxxxxx,017xxxxxxxx,018xxxxxxxx,019xxxxxxxx )");
								$("#driver_contact_no").focus();
								return false;
							}							
						}
					});	
			
					$(".qty").live('blur',function(){
						var v_id = $(this).attr("id");
						var given_qty = parseFloat($(this).val());
						//alert(given_qty);
						var prs  = v_id.split('_');
						var id    = prs[1];
						var c_id = '#current_stock_'+id;
						var current_stock = parseFloat($(c_id).val());
						//alert(current_stock);
						if(current_stock<given_qty){
							alert('Quantity cannot be over current stock');
							$('#quantity_'+id).val('');
							return;
						}
					});
					$("#depot_to_depot_transfer_save").click(function()
					{
					   var  chalan_no = $("#chalan_no").val(); 
						var invoice_no = $("#invoice_no").val();
						var ref_no = $("#ref_no").val();
						var transfer_from = $("#transfer_from").val();
						var transfer_to  = $("#transfer_to").val();
						var transport_type = $("#transport_type").val();
						var  transport_id = $("#transport_id").val();
						var  laod_supervisor = $("#laod_supervisor").val();	
						var  in_charge = $("#in_charge").val();	
						var  delivery_date = $("#delivery_date").val();
						var  driver = $("#driver").val();
						var driver_contact_no = $("#driver_contact_no").val();
					
						var products = [];
						var packs = [];
						var units = [];
						var uprices = [];
						var qtys  = []; 
						var c_stock = [];
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
						$(".current_stock").each(function(){
							var csid = $(this).attr('id');
							var cs = $('#'+csid).val();
							c_stock.push(cs);							
						});	

						var dataStr  = "chalan_no="+chalan_no+"&invoice_no="+invoice_no+
						"&ref_no="+ref_no+"&transfer_from="+transfer_from+
						"&transfer_to="+transfer_to+"&transport_type="+transport_type
						+"&transport_id="+transport_id+"&laod_supervisor="+laod_supervisor
						+"&in_charge="+in_charge+"&delivery_date="+delivery_date
						+"&driver="+driver+"&driver_contact_no="+driver_contact_no+
						"&products="+products+"&packs="+packs+"&units="+units
						+"&uprices="+uprices+"&qtys="+qtys+"&c_stock="+c_stock;

						if(chalan_no=="") {
						  alert("Enter chalan number");
						  $("#chalan_no").focus();
						  return false;
						}else if(ref_no=="") {
						  alert("Enter reference number");
						  $("#ref_no").focus();
						  return false;
						}else if(transfer_from=="") {
						  alert("Select Source Depot");
						  return false;
						}else if(transfer_to==""){
						  alert("Select Destination Depot");
						  return false;
						}else if(laod_supervisor=="") {
						  alert("Select supervisor");
						  return false;
						}else if(in_charge=="") {
						  alert("Select in charge");
						  return false;
						}else if(delivery_date=="") {
						   alert("Enter delivery date");
						   $("#delivery_date").focus();
						   return false;
						}else{
							//alert(dataStr);
							$.ajax({
							  type:"post" ,
							  url:"includes/depot_to_depot_transfer_by_ajax.php" ,
							  data:dataStr,
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
				 
				 <?php //include("table/employee_datatable.php"); ?>
				 <div id="emp_table"></div>
                 <br /><br />
		</div>
		<!-- end content -->


