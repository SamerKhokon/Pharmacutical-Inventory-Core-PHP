<?php   include("../../db.php");
	
	$generic_id = $_REQUEST['id'];              
	$str = "select * from generic_name_info where generic_name_id=$generic_id";
	$sql = mysql_query($str);
	$data = "";
	if($row = mysql_fetch_array($sql))
	{
		$data = $row['generic_name']."|".$row['generic_name_code'];
		
	?>
	<h1 class="pop_head"> Generic </h1>
 <input type="hidden" id="generic_id_e" value="<?php echo $generic_id;?>"/>
    <table class="pop_table">
        <tr>
            <td valign="top">Generic Name </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <input type="text" class="edit_input" name="generic_name" id="generic_name_e" value="<?php echo $row['generic_name'];?>" /></td>
        </tr>
        <tr>
            <td valign="top">Generic  Code  </td> 
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <input type="text" class="edit_input" name="generic_name_code" id="generic_name_code_e" value="<?php echo $row['generic_name_code'];?>" /></td>
        </tr>
       
      
       
    </table> 
    
    <div  class="edit_btm"> <input type="button" class="btn_save" id="btn_generic_update" value="Update" onclick="close_popup();" /></div>
    <?php
	}
	
?>   
<script type="text/javascript">
$(document).ready(function(){

  $("#btn_generic_update").click(function(){
		var generic_id = $("#generic_id_e").val();
		var generic_name = $("#generic_name_e").val();
		var generic_name_code = $("#generic_name_code_e").val();
		
		var dataStr = "generic_id="+generic_id+"&generic_name_code="+generic_name_code+"&generic_name="+generic_name;
		$.ajax({
		   type:"post" ,
		   url:"includes/edit/generic_name_edit_by_ajax.php" ,
		   data:dataStr , 
		   cache:false ,
		   success:function(st){
		      alert(st);
		   }
		});
  });
});
</script>                                                                                              