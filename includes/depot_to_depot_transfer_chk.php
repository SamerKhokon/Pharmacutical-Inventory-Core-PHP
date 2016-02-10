<?php	include("./db.php"); 
		$company_id = $_SESSION["COMPANY_ID"];
		function get_depot_list($company_id, $typ){
			global $depot_from_option;
			$depot_from_option="";
			if($typ=='!SD')
				$str = "SELECT depot_id,depot_name,depot_flag FROM inv_depot_info WHERE company_id=$company_id and depot_flag!='SD'";
			else
				$str = "SELECT depot_id,depot_name,depot_flag FROM inv_depot_info WHERE company_id=$company_id and depot_flag!='FD'";	
			$sql = mysql_query($str);
			while($res = mysql_fetch_array($sql) ) {
				$depot_from_option .=  "<option value='".$res[0]."'>".$res[1]."</option>";
			}
			return $depot_from_option;
		}		

?>
<div id="content"> 
	<input type="hidden" id="company_id" value="<?php echo $_SESSION['COMPANY_ID'];?>"/>
	<input type="hidden" id="entry_by" value="<?php echo $_SESSION["LOGIN_USERID"]   ;?>"/>		
	<div>
		<span action="javascript:void(0);" class="register">
			<fieldset class="row1">
				<legend>Checking Product Transfer	</legend>
                <p>
                	<label>Transfer From</label>
                    <select id="transfer_from_depot_id">
                    	<option value=""></option>
                        <?php echo get_depot_list($company_id,'!SD');?>
                    </select>
                    <label>Transfer To</label>
                    <select id="transfer_to_depot_id">
                    	<option value=""></option>
                        <?php echo get_depot_list($company_id,'SD');?>
                    </select>
                </p>
                <br /><br />
                <div class="product_btm">
					<input type="button" class="btn_save" id="btn_show" value="Show" style="width:70px;"/>
					<input type="reset" class="btn_reset" id="btn_reset" value="Reset" style="width:70px;"/>	 
                </div>
			</fieldset>
		</span>
	</div>
	<div id="dept_table"></div>           
	<br /> <br />
</div>        
<!-- end content -->		
<script   type="text/javascript">
	$(document).ready(function(){
		/*var data_load = function(){
			$("#dept_table").load("includes/table/product_transfer_datatable.php" , function(){}).fadeIn('slow');							
		}
		data_load();*/
		var reset_fields = function(){
			$("#transfer_from_depot_id").val('');
			$("#transfer_to_depot_id").val('');
			$("#dept_table").html('');
		}
		$("#btn_reset").click(function(){
			reset_fields();
		});
		$("#btn_show").click(function(){
			var company_id = $("#company_id").val();
			var transfer_from_depot_id = $("#transfer_from_depot_id").val();
			var transfer_to_depot_id = $("#transfer_to_depot_id").val();
			if(transfer_from_depot_id=="")
			{
				alert("Select depot, from where product transfered from.");
				$("#transfer_from_depot_id").focus();
				return;
			}
			else if(transfer_to_depot_id=="")
			{
				alert("Select depot, where product transfered.");
				$("#transfer_to_depot_id").focus();
				return;
			}
			else if(transfer_from_depot_id==transfer_to_depot_id)
			{
				alert("'Transfer form' and 'Transfer to' depot cannot be same!");
				$("#transfer_from_depot_id").val('');
				$("#transfer_to_depot_id").val('');
				$("#transfer_from_depot_id").focus();
				return;
			}
			else
			{
				var dataStr = 'transfer_from_depot_id='+transfer_from_depot_id+'&transfer_to_depot_id='+transfer_to_depot_id+'&company_id='+company_id;
				//alert(dataStr);
				$.ajax({
					type:"post" ,
					url:"includes/table/product_transfer_datatable_for_chk.php" ,
					data:dataStr ,
					cache:false ,
					success:function(st)
					{
						if($.trim(st))
						{
							$("#dept_table").html($.trim(st));
						}				
					}
				});
			}
		});	
	});  
	function view_data(id)
	{
		var dataStr = "id="+id;
		$.ajax({
			type:"post" ,
			url:"includes/view/report_product_transfer_view.php" ,
			data:dataStr ,
			cache:false ,
			success:function(st)
			{
				if($.trim(st))
				{
					$("#inline1").html($.trim(st));
				}				
			}
		});
	} 
	function close_popup()
	{
		$.fancybox.close();
	}
</script>		