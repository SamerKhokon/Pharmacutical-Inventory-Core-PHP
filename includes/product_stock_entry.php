<?php include("db.php");  $company_id = $_SESSION["COMPANY_ID"];?>
<div id="content">
<input type="hidden" id="company_id" value="<?php echo $_SESSION['COMPANY_ID'];?>"/>
<input type="hidden" id="entry_by" value="<?php echo $_SESSION["LOGIN_USERID"]   ;?>"/>
<?php
function depot_dropdown($company_id) {	
	global $option1;
	$option1="";
	$str = "SELECT depot_id, depot_name, depot_flag FROM inv_depot_info WHERE company_id=$company_id and active_flag='Y'";
	$sql = mysql_query($str);
	
	while( $res = mysql_fetch_array($sql) ){
	 $option1 .= "<option value='".$res[0]."'>".$res[2]."(".$res[1].")</option>";
	}
			return $option1;
}
function product_pack_size_dropdown($company_id) {	
	global $option2;
	$option2="";
	$str = "SELECT product_pack_size_id,product_pack_size FROM product_pack_size WHERE company_id=$company_id";
	$sql = mysql_query($str);
	
	while( $res = mysql_fetch_array($sql) ){
	 $option2 .= "<option value='".$res[0]."'>".$res[1]."</option>";
	}
	return $option2;
}				
function product_dropdown($company_id) {	
	global $option3;
	$option3="";
	$str = "SELECT  product_id, product_name, product_code FROM product_info WHERE company_id=$company_id and active_flag='Y'";
	$sql = mysql_query($str);
	
	while( $res = mysql_fetch_array($sql) ){
	 $option3 .= "<option value='".$res[0].",".$res[2]."'>".$res[1]." ( ".$res[2]." )</option>";
	}
			return $option3;
}									
?>
    <div>
        <span action="javascript:void(0);" class="register">
            <!-- <h1>Form Design</h1>			-->		
            <fieldset class="row1">
                <legend>Product Stock Entry</legend>
                <p>
                    <label>Depot <font color="#FF0000">*</font> </label>
                    <select id="depot_id"  class="middle">
                        <option value=""></option>
                        <?php echo depot_dropdown($company_id);?>
                    </select>
                    <label>Product <font color="#FF0000">*</font> </label>
                    <select id="product_id" class="middle">
                        <option value=""></option>
                        <?php echo product_dropdown($company_id);?>
                    </select>
                    <label>Unit Price  </label>
                    <input type="text" id="product_unit_price" class="middle" style="background-color:#FFFFD7;" onkeypress="return ret_valid_digit(event,'double',this.value.indexOf('.'));" readonly="readonly"/>
                </p>
                <p> 
                    <label>Stock Quantity <font color="#FF0000">*</font> </label>
                    <input type="text" id="stock_qty" class="middle" onkeypress="return ret_valid_digit(event,'double',this.value.indexOf('.'));"/>		
                    <label>Total Price  </label>
                    <input type="text" id="total_unit_price" class="middle" onkeypress="return ret_valid_digit(event,'double',this.value.indexOf('.'));" readonly="readonly" style="background-color:#FFFFD7;"/>
					
                    <label>Minimum Stock <font color="#FF0000">*</font></label>
                    <input type="text" id="minimum_stock" class="middle" onkeypress="return ret_valid_digit(event,'double',this.value.indexOf('.'));" style="background-color:#FFFFD7;"/>					
                </p>
                <p>
                    <label>Batch No.  </label>
                    <input type="text" id="batch_nos" name="batch_nos" class="middle"/>
                </p>	
                <p class="btm_save_reset">
							
							<input type="button" style="width:70px;" class="btn_save"  id="btn_save"  value="Save"/>
                             &nbsp;<input type="button" style="width:70px;" class="btn_reset"  id="btn_reset"  value="Reset"/>
						</p>					
                <!--<p>
                    <label>&nbsp;</label>
                    <input type="button" class="button"  id="btn_save"  value="Save"/>							
                </p>-->	
            </fieldset>													
        </span>
    </div>
	<script   type="text/javascript">
    $(document).ready(function(){
        $("#depot_id").focus();
        $("#data_table").load("includes/table/product_stock_datatable.php" , function(){});

        $("#depot_id").keypress(function(ex){
            if(ex.which == 13 ) {
               var   depot_id  =  $("#depot_id").val();
               if(depot_id=="") {
                   alert("Please Select Depot");
                   $("#depot_id").focus();
                   return false;
                }else{
                    $("#product_id").focus();
                }
            }
        });
       
        $("#product_id").keypress(function(ex){
            if(ex.which == 13 ) {
               var  product_id  =  $("#product_id").val();
               if(product_id=="") {
                   alert("Please Select Product");
                   $("#product_id").focus();
                   return false;
                }else{
                    $("#stock_qty").focus();
                }
            }
        });	
        $("#product_id").change(function(){
            var myString = $(this).val();
            if(myString!='')
            {
                var myArray = myString.split(',');
                var product_id = $.trim(myArray[0]);
                //alert(product_id);
                var dataStr = 'product_id='+product_id;
                $.ajax({
                    type:"post" ,
                    url:"includes/get_product_unit_price_by_ajax.php" ,
                    data:dataStr ,
                    cache:false ,
                    success:function(st)
                    {
                        //alert(st);
                        var unit_price = $.trim(st);
                        $("#product_unit_price").val(unit_price);
                    }
                 });
            }	 
        });
                                
        $("#stock_qty").blur(function(){
            var stock_qty = $("#stock_qty").val();
            var total_unit_price = 0;
            if(stock_qty!=0){
                
                var product_unit_price = $("#product_unit_price").val();
                total_unit_price = parseFloat(stock_qty*product_unit_price);
                $("#total_unit_price").val(total_unit_price);
            }
            else{
                $("#total_unit_price").val('');
            }
        });
        $("#stock_qty").keypress(function(ex){
            if(ex.which == 13 ) {
                var  stock_qty  =  $("#stock_qty").val();
                if((stock_qty=="")||stock_qty==0) {
                   alert("Please Enter Stock Quantity");
                   $("#stock_qty").focus();
                   return false;
                }else{
                    $("#minimum_stock").focus();
                }
            }
        });
        $("#minimum_stock").keypress(function(ex){
            if(ex.which == 13 )
            {
                var  minimum_stock  =  $("#minimum_stock").val();
                if((minimum_stock=="")||minimum_stock==0) {
                   alert("Please enter minimum stock");
                   $("#minimum_stock").focus();
                   return false;
                }else{
                    $("#batch_nos").focus();
                }
            }
        });
		
		var reset_fields = function(){
			$("#depot_id").val('');
			$("#product_id").val('');
			$("#product_unit_price").val('');
			$("#stock_qty").val('');
			$("#total_unit_price").val('');
			$("#minimum_stock").val('');
			$("#batch_nos").val('');
			$("#depot_id").focus();
		}
        $("#btn_save").click(function()
        {	
            var depot_id = $("#depot_id").val();
            var product_id = '';
            var product_code = ''; 
            var productString = $("#product_id").val();
            if(productString!='')
            {
                var productArray = productString.split(',');
                product_id = $.trim(productArray[0]);
                product_code = $.trim(productArray[1]);
            }
            var stock_qty = $("#stock_qty").val();	
            var product_unit_price = $("#product_unit_price").val();
            var total_unit_price = $("#total_unit_price").val();
			var minimum_stock = $("#minimum_stock").val();
            var entry_by = $("#entry_by").val();
            var company_id = $("#company_id").val();
            var batch_nos = $("#batch_nos").val();
        
        
            if(depot_id=="") {
                alert("Please Select Depot");
                $("#depot_id").focus();
                return false;
            }else if(productString=="") {
                alert("Please Select Product");
                $("#product_id").focus();
                return false;
            }else if(stock_qty=="") {
                alert("Enter Stock Quantity");
                $("#stock_qty").focus();
                return false;
            }else if(minimum_stock==""){
			   alert("Enter minimum stock");
			   $("#minimum_stock").focus();
			   return false;
			}else{
            
                var dataStr = "depot_id="+depot_id+"&product_id="+product_id+
                "&product_code="+product_code+"&product_unit_price="+product_unit_price+
                "&total_unit_price="+total_unit_price+
                "&stock_qty="+stock_qty+"&minimum_stock="+minimum_stock+
				"&entry_by="+entry_by+"&company_id="+company_id+"&batch_nos="+batch_nos;
                //alert(dataStr); 								     
               	$.ajax({
                    type:"post" ,
                    url:"includes/add_product_stock_by_ajax.php" ,
                    data:dataStr ,
                    cache:false ,
                    success:function(st)
                    {
                        alert(st);
                        $("#data_table").load("includes/table/product_stock_datatable.php" , function(){});
						reset_fields();
                    }
                });
            }
        });
    });
    var pkey=0;
    function ret_valid_digit(evt, type, cnt)
    {
        pkey = (evt.which) ? evt.which : event.keyCode;
    
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
    <br/>
    <div id="data_table"></div>
    <br /> <br />
</div>
<!-- end content -->