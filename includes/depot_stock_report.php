<?php //session_start();?>
<div id="content">
	<input type="hidden" id="company_id" value="<?php echo $_SESSION['COMPANY_ID'];?>"/>
	<input type="hidden" id="entry_by" value="<?php echo $_SESSION["LOGIN_USERID"]   ;?>"/>		
	<div>
		<span action="javascript:void(0);" class="register">
			<fieldset class="row1">
				<legend>Depot Stock Repot	</legend>
				<p>
					<label>Product Wise Report<font color="#FF0000">*</font></label>
					<input type="radio" name="product_wise" id="product_wise" value="product_wise" class="long"/>
					<label>Depot Wise Report<font color="#FF0000">*</font></label>
					<input type="radio" name="product_wise" id="depot_wise" value="depot_wise" class="long"/>					
				</p>				
				<p id="depot">
					<label>Depot  <font color="#FF0000">*</font></label>
					<select id="depot_id">
					 <option value="">All Depot</option>
					 <?php echo get_depot_dropdown();?>
					</select>
				</p>
				<p id="product">
					<label>Product  <font color="#FF0000">*</font></label>
					<select id="product_id">
					 <option value="">All Product</option>
					 <?php echo get_product_dropdown();?>
					</select>
				</p>				
				<p class="btm_save_reset">					
					<input type="button" style="width:70px;" class="btn_save"  id="depot_stock_save"  value="Show"/>
					&nbsp;<input type="button" style="width:70px;" class="btn_reset"  id="depot_stock_reset"  value="Reset"/>
				</p>						
			</fieldset>			
		</span>
	</div>
	<script   type="text/javascript">
	$(document).ready(function(){
        $("#depot_stock_save").click(function(){
           var report_type = $("input[name='product_wise']:checked").val();
		   var product_id  = $("#product_id").val();
		   var depot_id     = $("#depot_id").val();
		    //alert(report_type);
		    if(report_type=="product_wise")
			{
				   var uurl	="../decent_tem/html2pdf/product_wise_depot_stock.php?product_id="+product_id
					+"&depot_id="+depot_id+"&report_type="+report_type;		 
					if (window.showModalDialog)
					{						
						window.showModalDialog(uurl,"mywindow","dialogWidth:1024px;dialogHeight:768px");								
					} 
					else 
					{
							mywindow= window.open ("popup.html", "mywindow","menubar=0,toolbar=0,location=0,resizable=1,status=1,scrollbars=1,width=1024px,height=768px");
							mywindow.moveTo(300,300);
							if (window.focus)
								mywindow.focus();
					}
			}
			else if(report_type == "depot_wise")
			{
			     
					var uurl	="../decent_tem/html2pdf/depot_stock_report.php?product_id="+product_id
					+"&depot_id="+depot_id+"&report_type="+report_type;		 
					if (window.showModalDialog)
					{						
						window.showModalDialog(uurl,"mywindow","dialogWidth:1024px;dialogHeight:768px");								
					} 
					else 
					{
							mywindow= window.open ("popup.html", "mywindow","menubar=0,toolbar=0,location=0,resizable=1,status=1,scrollbars=1,width=1024px,height=768px");
							mywindow.moveTo(300,300);
							if (window.focus)
								mywindow.focus();
					}			 
			}else {
			  alert("please select report type");
			}		
			location.reload();		   
		});   
	});
	</script>
						
	<div id="desig_table"></div>
    <br /> <br />
<?php 
         function get_product_dropdown(){
		  global $option_01;
		  $str = "select product_id,product_name from product_info";
		  $sql = mysql_query($str);
		  $option_01 = "";
		  while($res = mysql_fetch_array($sql)) 
		  {
		    $option_01 .= "<option value='"  .$res[0]."'>".$res[1]."</option>";
		  }
		  return $option_01;
		 }
         function get_depot_dropdown(){
		  global $option_01;
		  $str = "SELECT depot_id,depot_name FROM inv_depot_info";
		  $sql = mysql_query($str);
		  $option_02 = "";
		  while($res = mysql_fetch_array($sql)) {
		    $option_02 .= "<option value='"  .$res[0]."'>".$res[1]."</option>";
		  }
		  return $option_02;
		 }

?>
</div>
<!-- end content -->
