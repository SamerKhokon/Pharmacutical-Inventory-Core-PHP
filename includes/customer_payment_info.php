	<div id="content"> <?php include("db.php");
	
		 $company_id = $_SESSION['COMPANY_ID'];
        function get_customer_dropdown($company_id)
		{
			global $option2;
			$str = "SELECT customer_id,customer_name FROM `inv_customer_info` WHERE company_id=$company_id";
			$sql =mysql_query($str);
			while($res = mysql_fetch_array($sql)) 
			{
				 $option2 .= "<option   value='".$res[0]."'>".$res[1]."</option>";
			}
				 return $option2;
		}		  
	?>
			<input type="hidden" id="company_id" value="<?php echo $_SESSION['COMPANY_ID'];?>"/>
			<input type="hidden" id="entry_by"       value="<?php echo $_SESSION["LOGIN_USERID"]   ;?>"/>		
		<div>
				<span action="javascript:void(0);" class="register">
					<!-- <h1>Form Design</h1>			-->		
					<fieldset class="row1">
						<legend>Customer Payment	</legend>
						<p>
						
							<label>Customer <font color="#FF0000">*</font></label>
							<select id="customer_id" class="middle" >
							  <option value="">select customer</option>
							  <?php echo get_customer_dropdown($company_id); ?>
							</select>
							
							<label>Paid Amount <font color="#FF0000">*</font></label>
							<input type="text" id="paid_amount" class="middle" style="background-color:#FFFFD7;" />
							
							<label>Payment Type <font color="#FF0000">*</font></label>
							<select id="pament_type" class="middle">
							<option value="CASH">CASH</option>
							<option value="CHEQUE">CHEQUE</option>
							</select>						
						</p>
						
                        
						<p id="p_bank_info" style="display:none;">
                        	<label>Bank Name <font color="#FF0000">*</font></label>
							<input type="text" class="middle" id="bank_name" style="background-color:#FFFFD7;" />							
							<label>Cheque No <font color="#FF0000">*</font></label>
							<input type="text" class="middle" id="cheque_no" style="background-color:#FFFFD7;" />
                        </p> 

						<p class="btm_save_reset">							
						<!--
						<input type="button" style="width:70px;" class="btn_save"  id="zone_save"  value="Save"/>
						&nbsp;<input type="button" style="width:70px;" class="btn_reset"  id="btn_reset"  value="Reset"/>
						-->
						</p>	

						<br/><br/>
						<table id="payment_table" class="product_table">                        					
						</table>
                        <table id="payment_table" class="product_table">
                            <tr>
                                <td>Total Adjust<td>
                                <td><input type="text" class="total_adjust" id="total_adjust" style="background-color:#FFFFD7;width:80px;" readonly="readonly" /></td>
                                <td>Rest</td>
                                <td><input type="text" class="total_rest" id="total_rest" style="background-color:#FFFFD7;width:80px;" readonly="readonly" /></td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
						</table>
						<div style="display: none;">
							<div id="inline3" class="pop_div" style="width:850px;"></div>
						</div>
                        <br/>
					</fieldset>					
				</span>
                </div>       
                <br /> <br />
		</div>        
		<!-- end content -->
<script type="text/javascript">
$(document).ready(function()
{				
	$("#customer_id").change(function()
	{
		var customer_id = $("#customer_id").val();
		var company_id = $("#company_id").val();
		var entry_by       = $("#entry_by").val();
		if( customer_id != "" ) 
		{		
			$.ajax({
				type:"post" ,
				url:"includes/customer_payment_list_by_ajax.php" ,
				data:"customer_id="+customer_id+"&company_id="+company_id+"&entry_by="+entry_by ,
				cache:false ,
				success:function(st)
				{			
                    if(st!="")
					{
						$("#payment_table").html(st);
					}
					else
					{
						$("#payment_table").html(st);
					}
				}
			});  
		}
		else
		{		   
			$("#payment_table").html('');
		    $("#payment_table").fadeOut('slow');
		}		
	});
	$('#paid_amount').keypress(function(ex){
		if(ex.which == 13 ){
			if($('#paid_amount').val()!='')
			{
				$('#total_adjust').val(0);
				$('#total_rest').val($('#paid_amount').val());
				adjust_due();
			}
			else{
				alert('Enter Payed Amount');
				$('#paid_amount').focus();
				return;
			}	
		}	
	});
	var calc_amnt = 0;
   	var adjust_due = function(){
		amount = $('#paid_amount').val();
		calc_amnt = amount;
		$('#total_rest').val(calc_amnt); 
				
   		//alert(calc_amnt);
		//var len = $(".amt").length;
		//alert(len);
		//var rest_vals = [];
		//var due_amnt = 0;
		//var i = 0;
	  
		$(".current_due").each(function(){
			var v_id = $(this).attr("id");
			var prs  = v_id.split('_');
			var id    = prs[2];
			//alert(id); 
			
			if(calc_amnt>0)
			{
				
				var cur_due = parseFloat($(this).val());
				//alert(calc_amnt);
				//alert(cur_due);
				if(calc_amnt>=cur_due)
				{
					//alert('calc_amnt>=cur_due');
					var tr= parseFloat(calc_amnt-cur_due);
					$('#adjust_'+id).val(cur_due);
					var cd = 0;
					$('#current_due_'+id).val(cd);
					calc_amnt = tr;
					$('#total_rest').val(calc_amnt);
					$('#total_adjust').val(parseFloat(amount-calc_amnt)); 
					
				}
				else if(calc_amnt<cur_due)
				{
					//alert('calc_amnt<cur_due');
					$('#adjust_'+id).val(calc_amnt);
					var tr= parseFloat(cur_due-calc_amnt);
					$('#current_due_'+id).val(tr);  
					calc_amnt = 0;
					$('#total_rest').val(calc_amnt);
					$('#total_adjust').val(parseFloat(amount-calc_amnt)); 
				}
			}	
		});
		$("#pament_type").focus();
		return;	
   	}
	$("#pament_type").change(function(){
		var typ = $(this).val();
		//alert(typ);
		if(typ=='CHEQUE')
		{
			$("#p_bank_info").show('slow');
			$("#bank_name").focus();
		}	
		else
			$("#p_bank_info").hide('slow');	
	})
});

function view_data(id)
{
	var dataStr = "id="+id;
	$.ajax({
		type:"post" ,
		url:"includes/view/individual_order_list.php" ,
		data:dataStr ,
		cache:false ,
		success:function(st)
		{
			if($.trim(st))
			{
				$("#inline3").html($.trim(st));
			}				
		}
	});	
}
</script>
<?php 
/*
SELECT product_id,(SELECT product_name FROM product_info WHERE product_id=a.product_id) AS product_name,
product_pack_size,product_unit,product_code,SUM(order_quantity),SUM(product_unit_price) FROM 
`ordered_product_info` AS a WHERE order_id IN(1,2)  
GROUP BY product_code
*/
?>