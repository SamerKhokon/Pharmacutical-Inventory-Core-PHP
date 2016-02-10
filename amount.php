<script type="text/javascript" src="media/js/jquery.js"></script> 
<script type="text/javascript">
$(document).ready(function(){
	$("#amount").focus();
	//alert(1);
	var calc_amnt = 0;
   	var adjust_due = function(){
		amount = $('#amount').val();
		calc_amnt = amount;
		$('#calc_amnt').val(calc_amnt); 
				
   		//alert(calc_amnt);
		//var len = $(".amt").length;
		//alert(len);
		/*var rest_vals = [];
		var due_amnt = 0;
		var i = 0;*/
	  
		$(".amt").each(function(){
			var v_id = $(this).attr("id");
			var prs  = v_id.split('_');
			var id    = prs[1];
			 
			
			if(calc_amnt>0)
			{
				
				var cur_due = parseFloat($(this).val());
				//alert(calc_amnt);
				//alert(cur_due);
				if(calc_amnt>=cur_due)
				{
					//alert('calc_amnt>=cur_due');
					var tr= parseFloat(calc_amnt-cur_due);
					$('#adj_'+id).val(cur_due);
					var cd = 0;
					$('#amnt_'+id).val(cd);
					calc_amnt = tr;
					$('#calc_amnt').val(calc_amnt); 
				}
				else if(calc_amnt<cur_due)
				{
					//alert('calc_amnt<cur_due');
					$('#adj_'+id).val(calc_amnt);
					var tr= parseFloat(cur_due-calc_amnt);
					$('#amnt_'+id).val(tr);  
					calc_amnt = 0;
					$('#calc_amnt').val(calc_amnt);
				}
			}	
			/*due_amnt = amount-parseFloat($('#due_'+id).val());
			rest_vals.push(due_amnt);
			$('#amnt_'+id).val(rest_vals[i]);
			amount = due_amnt;
			i++;*/
		});	
   	}
   	$("#btn_ok").click(function(){
		var amount = $("#net_invoice_amount").val();
		if(amount!="")    {
			adjust_due();
		}
		else
		{
			alert('Enter Payment Amount');
			$("#amount").focus();
		}
   });
});
</script>
<br/>
<table >
<tr><td colspan="3">Amount<input type="text" id="amount"/>Advance<input type="text" id="calc_amnt" value="0" /><input type="button" id="btn_ok" value="OK" /></td></tr>
<tr>
	<td>#SlNo</td>
    <td>Due Amount</td>
    <td>Adjusted Amount</td>
    <td>Rest Amount</td>
</tr>
<tr>
	<td>1</td>
    <td><input type="text" class="due" id="due_1" value="500"/></td>
    <td><input type="text" class="adj" id="adj_1" value="0" /></td>
    <td><input type="text" class="amt" id="amnt_1" value="500"/></td>
</tr>
<tr>
	<td>2</td>
    <td><input type="text" class="due" id="due_2" value="300"/></td>
    <td><input type="text" class="adj" id="adj_2" value="0" /></td>
    <td><input type="text" class="amt" id="amnt_2" value="300"/></td>
</tr>
<tr>
	<td>3</td>
    <td><input type="text" class="due" id="due_3" value="200"/></td>
    <td><input type="text" class="adj" id="adj_3" value="0" /></td>
    <td><input type="text" class="amt" id="amnt_3" value="200"/></td>
</tr>
</table>
<style type="text/css">
input{font-family:Arila;font-size:18px;}
.due,.amt{input:border 1px solid #000;}
</style>