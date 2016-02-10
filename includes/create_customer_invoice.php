<?php	include("db.php");
	$company_id = $_SESSION['COMPANY_ID'];
	function get_customer_dropdown($company_id){
		global $option2;
		$option2="";
		$str = "SELECT customer_id,customer_name FROM `inv_customer_info` WHERE company_id=$company_id";
		$sql =mysql_query($str);
		while($res = mysql_fetch_array($sql)) {
		$option2 .= "<option   value='".$res[0]."'>".$res[1]."</option>";
		}
		return $option2;
	}

?>
<div id="content"> 
	<input type="hidden" id="company_id" value="<?php echo $_SESSION['COMPANY_ID'];    ?>"/>
	<input type="hidden" id="entry_by" 	  value="<?php echo $_SESSION["LOGIN_USERID"]; ?>"/>
	
	<div>
		<span action="javascript:void(0);" class="register">
			<!-- <h1>Form Design</h1>			-->		
			<fieldset class="row1">
				<legend>Customer Invoice	</legend>
				<p>
					<label>Customer <font color="#FF0000">*</font></label>
					<select id="customer_id" class="long" >
						<option value="">select customer</option>
						<?php echo get_customer_dropdown($company_id); ?>
					</select>
				</p>					

				<p class="btm_save_reset">							
				<!--	
				<input type="button" style="width:70px;" class="btn_save"  id="zone_save"  value="Save"/>
				&nbsp;
				<input type="button" style="width:70px;" class="btn_reset"  id="btn_reset"  value="Reset"/>
				-->
				</p>	

				<table id="order_table"></table>						
				<div style="display: none;">
					<div id="inline3" class="pop_div" style="width:850px;"></div>
				</div>
				<br/>						
				<div  id="ivoice_part"></div>						
			</fieldset>					
		</span>
	</div>                
			
	<div id="depo_table"></div>           
	<br /> <br />
</div>        
<!-- end content -->
<script type="text/javascript">
$(document).ready(function()
{			
	$("#customer_id").change(function()
	{
		var customer_id = $("#customer_id").val();
		if(customer_id != "") 
		{
			$.ajax(
			{
				type:"post" ,
				url:"includes/customer_invoice_list_by_ajax.php" ,
				data:"customer_id="+customer_id ,
				cache:false ,
				success:function(st)
				{				   
					if( st != "" )
					{
						$("#order_table").html('');
						$("#order_table").fadeIn('slow').append(st);
					}
					else
					{
						$("#order_table").html('');
						$("#ivoice_part").fadeOut('slow');
					}	
				}
			});
		}
		else
		{		   
		   $("#order_table").html('');
		   $("#ivoice_part").fadeOut('slow');
		}		
	});
	
	$("#ok_btn").live("click" , function()
	{
		var lst = [];
		var pnos = [];
		$(".invoice_product_id_class").each(function()
		{
			var pid = $(this).attr("id");
			if($('#'+pid).is(':checked')==true)  
			{
				var chk_val = $('#'+pid).val();
				lst.push(chk_val);
				var pr = chk_val.split('-');
				var pnosid = pr[1];
				pnos.push(pnosid);
			}	
		});
			
		$("#order_nos").val('');
		if(lst!="") 
		{
			var customer_id = $("#customer_id").val();
			$.ajax({
				type:"post" ,
				url:"includes/invoice_part_by_ajax.php" ,
				data:"customer_id="+customer_id+"&pnos="+pnos+"&lst="+lst ,
				cache:false,
				success:function(st){
					$("#ivoice_part").html("");
					$("#ivoice_part").html(st).fadeIn('slow');
				}
			});
		}
		else
		{
		    alert("Please select product order");
			$("#ivoice_part").html("");
		}
	});		
});
function view_data(id)  {
	var dataStr = "id="+id;
	$.ajax({
		type:"post" ,
		url:"includes/view/individual_order_list.php" ,
		data:dataStr ,
		cache:false ,
		success:function(st)
		{
			if($.trim(st)){
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