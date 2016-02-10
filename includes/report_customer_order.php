	<div id="content"> <?php //session_start();?>
			<input type="hidden" id="company_id" value="<?php echo $_SESSION['COMPANY_ID'];?>"/>
		<input type="hidden" id="entry_by" value="<?php echo $_SESSION["LOGIN_USERID"]   ;?>"/>		
		<div>
				<span action="javascript:void(0);" class="register">
					<!-- <h1>Form Design</h1>			-->		
					<fieldset class="row1">
						<legend>Report Customer Order	</legend>
					</fieldset>					
				</span>
                </div>
				<?php //include("table/department_datatable.php"); ?>
                <div id="dept_table"></div>           
                <br /> <br />
		</div>        
		<!-- end content -->
<script   type="text/javascript">
$(document).ready(function(){
	$("#dept_table").load("includes/table/customer_ordered_datatable.php" , function(){}).fadeIn('slow');							
});   
function view_data(id)
		{
			//alert(id);
			var dataStr = "id="+id;
			//alert(dataStr);
			$.ajax({
				type:"post" ,
				url:"includes/view/customer_ordered_view.php" ,
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
