<?php	session_start(); include("../db.php");
	$customer_id = trim($_POST["customer_id"]);
	$company_id = trim($_POST["company_id"]);	
	$entry_by 	   = trim($_POST["entry_by"]);

	
	function get_customer_prev_due($customer_id){
		$st = "SELECT current_due FROM `inv_customer_due_info` WHERE customer_id=$customer_id";
		$sq = mysql_query($st);
		$rs = mysql_fetch_row($sq);
		return $rs[0];
	}
	
	
	$prev_due =  get_customer_prev_due($customer_id);
	$str = "SELECT customer_invoice_info_id,invoice_no,previous_due,discount_percentage,discount_amount,
	net_invoice_amount,current_invoice_due,total_unit_price,payed_ammount FROM `inv_customer_invoice_info`
	WHERE customer_id=$customer_id";
	
	
	$sql = mysql_query($str);
	if(mysql_num_rows($sql)>0) {
?>
<tr>
    <th>Invoice No</th>
    <th>Previous Due</th>
    <th>Net Invoice Amount</th>
    <th>Paid Amount</th>
    <th>Adjust</th>
    <th>Current Invoice Due</th>
    <!--<th>Total Unit Price</th>
    <th>Total </th> -->
</tr>	
<?php	
	while($res = mysql_fetch_assoc($sql))
	{
		$customer_invoice_info_id = $res["customer_invoice_info_id"];	
		$invoice_no = $res['invoice_no'];
		$previous_due = $res['previous_due'];
		$discount_percentage = $res['discount_percentage'];
		$net_invoice_amount = $res['net_invoice_amount'];
		$payed_amount = $res['payed_ammount'];
		$current_invoice_due = $res['current_invoice_due'];
		$total_unit_price = $res['total_unit_price'];
		?>
		<tr>
			<td><input type="text" class="invoice_number" id="invoice_number_<?php echo $customer_invoice_info_id;?>" readonly="readonly" value="<?php echo $invoice_no;?>"  style="background-color:#FFFFD7;" /></td>
			<td><input type="text" class="previous_due" id="previous_due_<?php echo $customer_invoice_info_id;?>" readonly="readonly" value="<?php echo $prev_due;?>" style="background-color:#FFFFD7;width:80px;" /></td>
			<td><input type="text" class="net_invoice_amount" id="net_invoice_amount_<?php echo $customer_invoice_info_id;?>" readonly="readonly" value="<?php echo $net_invoice_amount;?>" style="background-color:#FFFFD7;" /></td>
			<td><input type="text" class="payed_amount" id="payed_amount_<?php echo $customer_invoice_info_id;?>" readonly="readonly"  value="<?php echo $payed_amount;?>" style="background-color:#FFFFD7;width:80px;" /></td>
			<td><input type="text" class="adjust" id="adjust_<?php echo $customer_invoice_info_id;?>" style="background-color:#FFFFD7;width:80px;" value="0" /></td>
			<td><input type="text" class="current_due" id="current_due_<?php echo $customer_invoice_info_id;?>" readonly="readonly"  value="<?php echo $current_invoice_due;?>" style="background-color:#FFFFD7;width:80px;" /></td>
			<!--<td><input type="text" class="total_unit_price" id="total_unit_price_<?php echo $customer_invoice_info_id;?>" readonly="readonly" value="<?php echo $total_unit_price;?>" style="background-color:#FFFFD7;" /></td>
			<td><input type="text" class="grand_total" id="grand_total_<?php echo $customer_invoice_info_id;?>" readonly="readonly" value="" style="background-color:#FFFFD7;" /></td> -->
		</tr>
		<?php 
	} 
?>
<tr>
    <td>&nbsp;<td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <!--<td>&nbsp;</td> -->
</tr>
<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="button" class="btn_save" value="Save" id="payment_save_btn" style="width:70px;"/><td>
    <!--<td>&nbsp;</td> -->
</tr>
<?php
}?>

<script type="text/javascript">
$(document).ready(function(){
/*
    var previous_due = $("#previous_due").val();
	var net_invoice_amount=  $("#net_invoice_amount").val();
	var gtot = parseFloat(net_invoice_amount)+parseFloat(previous_due);
	//alert(previous_due);
    $("#grand_total").val(gtot);*/

    /*$(".adjust").each(function(){	
			   var fieldid = $(this).attr("id");
			   var prs = fieldid.split('_');
			   var lid = prs[prs.length-1];
	   
				//alert(lid+' '+fieldid);
				var gtot = parseFloat($("#previous_due_"+lid).val())+parseFloat($("#net_invoice_amount_"+lid).val()) ;
				$("#grand_total_"+lid).val(gtot);
		
				$("#adjust_"+lid).keyup(function(){
				   var paid_amount = $("#adjust_"+lid).val();
				   var ta = $('#total_adjust').val();
				   //$('#total_adjust').val(parseFloat(paid_amount+ta));
					if(paid_amount!="") {
						var gtot = parseFloat($("#previous_due_"+lid).val())+parseFloat($("#net_invoice_amount_"+lid).val()) ;
						var  adj = gtot - parseFloat(paid_amount);
						$("#grand_total_"+lid).val(adj);
					}else{
						var gtot = parseFloat($("#previous_due_"+lid).val())+parseFloat($("#net_invoice_amount_"+lid).val());
						$("#grand_total_"+lid).val(gtot);
						$("#adjust_"+lid).val('');			
				   }
				});
	});	*/
	
	$("#payment_save_btn").click(function(){
		var customer_id = $("#customer_id").val();
		var payment_type = $("#pament_type").val();
		var paid_amount = $("#paid_amount").val();
		var bank_name = $("#bank_name").val();
		var cheque_no = $("#cheque_no").val();
		if(payment_type=='CASH')
		{
			bank_name = '';
			cheque_no = '';
		}	
		var inv_list = [];
		var prev_list = [];
		var net_inv_list = [];
		var paid_amnt_list = [];
		var adjust_list = [];
		var tot_unit_price_list = [];
		var grand_tot_list = [];
			
		$(".invoice_number").each(function(){
			var fieldid = $(this).attr("id");
			var prs = fieldid.split('_');
			var lid = prs[prs.length-1];
			var invoice_number= $("#invoice_number_"+lid).val();
			var previous_due=  $("#previous_due_"+lid).val();
			var net_invoice_amount =  $("#net_invoice_amount_"+lid).val();
			var payed_amount = $("#payed_amount_"+lid).val();
			var adjust =  $("#adjust_"+lid).val();
			var total_unit_price = $("#total_unit_price_"+lid).val();
			var grand_total =  $("#grand_total_"+lid).val();
			inv_list.push(invoice_number);
			prev_list.push(previous_due);
			net_inv_list.push(net_invoice_amount);
			paid_amnt_list.push(payed_amount);
			adjust_list.push(adjust);
			tot_unit_price_list.push(total_unit_price);
			grand_tot_list.push(grand_total);
		});
			
		var dataStr = "customer_id="+customer_id+"&payment_type="+payment_type+'&bank_name='+bank_name
		+'&cheque_no='+cheque_no+"&invoice_list="+inv_list+"&prev_due_list="+prev_list+"&net_inv_list="+
		net_inv_list+"&paid_amnt_list="+paid_amnt_list+"&adjust_list="+adjust_list+"&tot_unit_price_list="+
		tot_unit_price_list+"&grand_tot_list="+grand_tot_list+"&paid_amount="+paid_amount;
		alert(dataStr);
			
		$.ajax({
			type:"post" ,
		   	url:"includes/customer_payment_info_by_ajax.php" ,
		   	data:dataStr,
		   	cache:false ,
		   	success:function(st){
				alert(st);
		   	}
		});
			
	});
	
	
});
</script>