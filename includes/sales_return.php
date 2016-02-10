<?php   include("./db.php"); $company_id = $_SESSION["COMPANY_ID"];

	function get_products($company_id){
		global $product_option;
	   	$str = "SELECT product_id,product_name FROM `product_info` WHERE company_id=$company_id";
	   	$sql = mysql_query($str);
	   	while($res = mysql_fetch_array($sql) ) {
			$product_option .=  "<option value='".$res[0]."'>".$res[1]."</option>";
	   	}
	   	return $product_option;
	}
			
	function get_customer_names($company_id) {
		global $custmer_option; 
		$str = "SELECT customer_id,customer_name FROM inv_customer_info WHERE company_id=$company_id";
		$sql = mysql_query($str);
		while($res = mysql_fetch_array($sql)){
			$custmer_option .= "<option value='".$res[0]."'>".$res[1]."</option>";
		}
		return $custmer_option;
	}	
?>
<div id="content">
    <span action="" class="register">		<!-- <h1>Form Design</h1> -->
        <fieldset class="row1">
            <legend>Sales Return</legend>
            <p>
                <label>Customer <font color="#FF0000">*</font></label>							
                <select id="customer_id" class="middle">
                   <option value="">select customer</option>
                   <?php echo get_customer_names($company_id);?>
                </option>
                </select>
                <label>Return Date <font color="#FF0000">*</font></label>							
                <input type="text"  id="return_date" class="middle"   style="background-color:#FFFFD7;"/>														
                <label>Invoice No <font color="#FF0000">*</font></label>							
                <input type="text"  id="inv_id" class="middle"   style="background-color:#FFFFD7;" value="<?php echo "INV".date('Ymdhis');?>" readonly="readonly"/>
            </p>
        </fieldset>
        <fieldset class="row1">
            <legend>Product Details</legend>	
            <table  id="product_dynamic_table" class="product_table" cellpadding="0" cellspacing="1">
                <tr>
                     <th>Product <font color="#FF0000">*</font></th>
                     <th>Pack <font color="#FF0000">*</font></th>		
                     <th>Unit <font color="#FF0000">*</font>	</th>
                     <th>Unit Price</th>		
                     <th>Return Qty</th>
                     <th>Bonus Qty</th>
                     <th>Total Unit Price</th>
                     <th></th>		
                </tr>
                <tr>						
                    <td><select id="product_id_0" class="product_id"><option value="">select product</option><?php echo get_products($company_id);?></select></td>						    							
                    <td><input type="text" class="pack_size" id="pack_size_0" readonly="readonly"  style="background-color:#FFFFD7; width:100px;" /></td>								   
                    <td><select  id="unit_id_0" class="unit_id" style="width:100px;"><option value="">select unit</option></select></td>		
                    <td><input type="text"  id="unit_price_0" class="unit_price" readonly="readonly"  style="background-color:#FFFFD7; width:100px;" onkeypress="return ret_valid_digit(event,'double',this.value.indexOf('.'));"/></td>							
                    <td><input type="text"  id="quantity_0" class="qty"  style="background-color:#FFFFD7; width:100px;" onkeypress="return ret_valid_digit(event,'double',this.value.indexOf('.'));"/></td>
                    <td><input type="text"  id="b_quantity_0" class="b_qty"  style="background-color:#FFFFD7; width:100px;" onkeypress="return ret_valid_digit(event,'double',this.value.indexOf('.'));" value="0"/></td>
                    <td><input type="text"  id="tu_price_0" class="tu_price"  style="background-color:#FFFFD7; width:100px;" readonly="readonly"/></td>			
                   <td><input type="button" class="btn_save"  id="links" value="Add More" style="width:70px;"/>		
                    </td>	
                </tr>	
            </table>
            <br />
            <table class="product_table" cellpadding="0" cellspacing="1">
            	<tr>
                	<th><label></label></th>
                    <th><label></label></th>
                    <th><label></label></th>
                    <th><label></label></th>
                    <th>Sales Amount </th>
                    <th><input type="text" id="sales_amnt" style="background-color:#FFFFD7; width:100px;" readonly="readonly" value="0" /></th>
                    <th></th>
                </tr>
                <tr>
                	<th><label></label></th>
                    <th><label></label></th>
                    <th>Com Amount(%)</th>
                    <th><input type="text" id="com_amnt_per" style="background-color:#FFFFD7; width:100px;" value="0" /></th>
                    <th><label></label></th>
                    <th><input type="text" id="com_amnt" style="background-color:#FFFFD7; width:100px;" readonly="readonly" value="0" /></th>
                    <th></th>
                </tr>
                <tr>
                	<th><label></label></th>
                    <th><label></label></th>
                    <th><label></label></th>
                    <th><label></label></th>
                    <th>Grand Total </th>
                    <th><input type="text" id="grand_total" style="background-color:#FFFFD7; width:100px;" readonly="readonly" value="0" /></th>
                    <th></th>
                </tr>
            </table>	
            <div class="product_btm">
            <input type="button" class="btn_save" id="btn_save" value="Save" style="width:70px;"/>
            <!--<input type="reset" class="btn_reset" id="btn_reset" value="Reset" style="width:70px;"/> -->
            </div>
        </fieldset>				
    </span>		
	<script type="text/javascript">
	$(document).ready(function(){
	
	    var pickerOption = {
		    changeYear:false,
			changeMonth:false,			
		    dateFormat:"dd-mm-yy",
			minDate:new Date(),
			maxDate:'+4'
		};
	
		$("#return_date").datepicker(pickerOption);	
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
					
					
		$("#product_id_0").change(function(){
			var  vl = $(this).val();
			var customer_id = $("#customer_id").val();
			//alert(vl);					   
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
				 $(st+" option").remove();						  
				$("#product_dynamic_table").append("<tr><td><select class=\"product_id\" id='product_id_"+c+"'><option value=''>select product</option><?php echo  get_products($company_id);?></select></td><td><input type='text' id='pack_size_"+c+"' class='pack_size'  style='background-color:#FFFFD7;width:100px;'/></td><td><select id='unit_id_"+c+"' class='unit_id' style='width:100px;'><option value=''>select unit</option></select></td><td><input type='text'  id='unit_price_"+c+"' class='unit_price' style=\"background-color:#FFFFD7;width:100px;\" onkeypress=\"return ret_valid_digit(event,'double',this.value.indexOf('.'));\"/></td><td><input type='text'  id='quantity_"+c+"' class='qty'  style=\"background-color:#FFFFD7;width:100px;\" onkeypress=\"return ret_valid_digit(event,'double',this.value.indexOf('.'));\"/></td><td><input type='text'  id='b_quantity_"+c+"' class='b_qty'  style=\"background-color:#FFFFD7;width:100px;\" onkeypress=\"return ret_valid_digit(event,'double',this.value.indexOf('.'));\" value=\"0\"/></td><td><input type='text'  id='tu_price_"+c+"' class='tu_price'  style=\"background-color:#FFFFD7;width:100px;\" readonly=\"readonly\"/></td><td>&nbsp;</td>");					   										
				var pro_id = "#product_id_"+c;
				 //alert(pro_id);
				$(pro_id).change(function()
				{
						var id = $(this).val();
						sel_product(id,c);																
				});
			}					
		});	
		var calc_grand_total = function(){
			var total_price = 0;
			var com_amnt = $("#com_amnt").val();
			$('.tu_price').each(function(){
				total_price = parseFloat(total_price)+parseFloat($(this).val());
			});
			total_price = parseFloat(total_price)+parseFloat(com_amnt);
			$('#sales_amnt').val(total_price);
			
			$('#grand_total').val(total_price);
			clac_com_amnt_per();
		}
		$('.qty').live('blur',function(){
			var qty = $(this).val();
			var qty_id = $(this).attr('id');
			var pos = qty_id.replace("quantity_", "");
			var tup = 0;
			//alert(pos);
			if(qty!='')
			{
				if($('#product_id_'+pos).val()=='')
				{
					alert('Select Product');
					$('#product_id_'+pos).focus();
				}
				else
				{
					tup = parseFloat($('#unit_price_'+pos).val()*qty);
					$('#tu_price_'+pos).val(tup);
					//clac_com_amnt_per();
					calc_grand_total();
					$('#b_quantity_'+pos).focus();
					return;				
				}	
			}
			else
			{
				alert('Enter Return Quantity');
				$('#quantity_'+pos).focus();
				return;
			}		
		});					
		var clac_com_amnt_per = function(){
			var com_amnt = 0;
			var sales_amnt = $('#sales_amnt').val();
			var total_price = 0;
			var com_amnt_per = $('#com_amnt_per').val();
			if(com_amnt_per=='')
			{
				alert('Commision Amount can be Zero(0) but cannot be empty!');
				$('#com_amnt_per').focus();
			}
			else
			{
				com_amnt = parseFloat((sales_amnt*com_amnt_per)/100);
				$('#com_amnt').val(com_amnt*-1);
				total_price = parseFloat(sales_amnt-com_amnt);
				$('#grand_total').val(total_price);
			}
		}
		$('#com_amnt_per').blur(function(){
			clac_com_amnt_per();
		});
					
		$("#btn_save").click(function()
		{
			//alert(1);
			var customer_id = $("#customer_id").val();
			var return_date = $("#return_date").val();
			var inv_id = $("#inv_id").val();							
			var invoice_status = 'sales return';
			var sales_amnt = $('#sales_amnt').val();
			var com_amnt_per = $('#com_amnt_per').val();
			var com_amnt = $('#com_amnt').val();
			var grand_total = $('#grand_total').val();
				
			
			var products = [];
			var packs     = [];
			var units       = [];
			var uprices   = [];
			var qtys        = [];
			var bqtys        = []; 
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
			$(".b_qty").each(function(){
				var qid = $(this).attr('id');
				var qp = $('#'+qid).val();
				bqtys.push(qp);							
			});
			
			var dataStr = "customer_id="+customer_id+
			"&return_date="+return_date+"&inv_id="+
			inv_id+"&invoice_status="+invoice_status+
			"&packs="+packs+"&products="+products+"&units="+units+
			"&uprices="+uprices+"&qtys="+qtys+"&bqtys="+bqtys+"&sales_amnt="+sales_amnt+"&com_amnt_per="+com_amnt_per+"&com_amnt="+com_amnt+"&grand_total="+grand_total;						
			
			if(customer_id=="") {
				alert("Select customer");
			  	return false;
			}else if(return_date=="") {
				alert("Enter delivery date");
			  	$("#return_date").focus();
			  	return false;
			}else{						
				//alert(dataStr);
				$.ajax({
				   type:"post" ,
				   url:"includes/sales_return_by_ajax.php" ,
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
    </script>					 
    <div id="emp_table"></div>
    <br /><br />
</div>
<!-- end content -->