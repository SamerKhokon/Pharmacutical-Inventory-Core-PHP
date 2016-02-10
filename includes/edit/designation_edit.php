<?php   include("../../db.php");
	
	$designation_id = $_REQUEST['id'];              
	$str = "select * from hr_emp_designation where designation_id=$designation_id";
	$sql = mysql_query($str);
	$data = "";
	if($row = mysql_fetch_array($sql))
	{
		$data = $row['designation']."|".$row['designation_code'];
		
	?>
	<h1 class="pop_head"> Designation </h1>
    <input type="hidden" id="designation_id" value="<?php echo $designation_id;?>"/>

    <table class="pop_table">
        <tr>
            <td valign="top">Designation Name  </td>
            <td valign="top">&nbsp;&nbsp;</td >
            <td valign="top">:&nbsp; <input type="text" class="edit_input" name="designation" id="designation_e" value="<?php echo $row['designation'];?>" /></td>
        </tr>
        <tr>
            <td valign="top">Designation Code  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <input type="text" class="edit_input" name="designation_code" id="designation_code_e" value="<?php echo $row['designation_code'];?>" /></td>
        </tr>
        
        <!--<tr>
        	<td></td>
            <td></td>
            <td><input type="button" id="btn_close" value="OK" onclick="close_popup();" /></td>
        </tr> -->
    </table> 
    <div  class="edit_btm"> <input type="button" class="btn_save" id="btn_designation_update" value="Update" onclick="close_popup();" /></div>
    <?php
	}
	
?> 
<script type="text/javascript">
$(document).ready(function(){

  $("#btn_designation_update").click(function(){
     	var 	designation_id = $("#designation_id").val();	
		var designation = $("#designation_e").val();
		var designation_code = $("#designation_code_e").val();
		
		var dataStr = "designation_id="+designation_id+"&designation="+designation+"&designation_code="+designation_code;
		$.ajax({
		   type:"post" ,
		   url:"includes/edit/designation_edit_by_ajax.php" ,
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