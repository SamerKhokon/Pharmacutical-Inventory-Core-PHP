<div id="content"> 
	<input type="hidden" id="company_id" value="<?php echo $_SESSION['COMPANY_ID'];?>"/>
	<input type="hidden" id="entry_by" value="<?php echo $_SESSION["LOGIN_USERID"]   ;?>"/>		
	<div>
		<span action="javascript:void(0);" class="register">
			<fieldset class="row1">
				<legend>Report Product Transfer	</legend>
			</fieldset>					
		</span>
	</div>
	<div id="dept_table"></div>           
	<br /> <br />
</div>        
<!-- end content -->		
<script   type="text/javascript">
	$(document).ready(function(){
		$("#dept_table").load("includes/table/product_transfer_datatable.php" , function(){}).fadeIn('slow');							
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