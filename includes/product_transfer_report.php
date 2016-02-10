<?php //session_start();?>
<div id="content">
	<input type="hidden" id="company_id" value="<?php echo $_SESSION['COMPANY_ID'];?>"/>
	<input type="hidden" id="entry_by" value="<?php echo $_SESSION["LOGIN_USERID"]   ;?>"/>		
	<div>
		<span action="javascript:void(0);" class="register">
			<fieldset class="row1">
				<legend>Product Transfer Repot	</legend>
				<p class="btm_save_reset">					
					<input type="button" style="width:70px;" class="btn_save"  id="report_product_transfer_save"  value="Show"/>
					&nbsp;<input type="button" style="width:70px;" class="btn_reset"  id="report_product_transfer_reset"  value="Reset"/>
				</p>						
			</fieldset>			
		</span>
	</div>
	<script   type="text/javascript">
	$(document).ready(function(){
        $("#report_product_transfer_save").click(function(){
				   var uurl	="../decent_tem/html2pdf/product_transfer_report.php";
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
