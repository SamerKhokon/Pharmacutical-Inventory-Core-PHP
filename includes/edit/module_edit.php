<?php   include("../../db.php");
	
	$module_id = $_REQUEST['id'];              
	$str = "select * from st_module_info where module_id=$module_id";
	$sql = mysql_query($str);
	$data = "";
	if($row = mysql_fetch_array($sql))
	{
		$data = $row['module_name']."|".$row['module_folder'];
		
	?>
	<h1 class="pop_head"> Module </h1>
    <input type="hidden" id="module_id_e" value="<?php echo $module_id;?>"/>

    <table class="pop_table">
        <tr>
            <td valign="top">Module Name  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<input type="text" class="edit_input" name="module_name" id="module_name_e" value="<?php echo $row['module_name'];?>" /></td>
        </tr>
        <tr>
            <td valign="top">Module Floder Name  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<input type="text" class="edit_input" name="module_folder" id="module_folder_e" value="<?php echo $row['module_folder'];?>" /></td>
        </tr>
        
        <!--<tr>
        	<td></td>
            <td></td>
            <td><input type="button" id="btn_close" value="OK" onclick="close_popup();" /></td>
        </tr> -->
    </table> 
    <div  class="edit_btm"> <input type="button" class="btn_save" id="btn_module_update" value="Update" onclick="close_popup();" /></div>
    <?php }?>
    
<script type="text/javascript">
$(document).ready(function(){

  $("#btn_module_update").click(function(){
     	var module_id = $("#module_id_e").val();	
		var module_name = $("#module_name_e").val();
		var module_folder = $("#module_folder_e").val();
		
		var dataStr = "module_id="+module_id+"&module_name="+module_name+
		"&module_folder="+module_folder;
		$.ajax({
		   type:"post" ,
		   url:"includes/edit/module_edit_by_ajax.php" ,
		   data:dataStr , 
		   cache:false ,
		   success:function(st){
		      alert(st);
			  //data_load();
		   }
		});
  });
});
</script>  
    
	                                                                                       