<?php   include("../../db.php");
	
	$department_id = $_REQUEST['id'];              
	$str = "select * from hr_emp_dept_info where dep_id=$department_id";
	$sql = mysql_query($str);
	$data = "";
	if($row = mysql_fetch_array($sql))
	{
		$data = $row['dept_name']."|".$row['dept_code'].",".$row['dept_address']."|".$row['dept_contact_no']."|".$row['dept_email'];
		
	?>
	<h1 class="pop_head"> Department </h1>
	 <input type="hidden" id="department_id" value="<?php echo $department_id;?>"/>
    <table class="pop_table">
        <tr>
            <td valign="top">Deparment Name  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <input type="text" class="edit_input" name="dept_name" id="dept_name" value="<?php echo $row['dept_name'];?>" /></td>
        </tr>
        <tr>
            <td valign="top">Deparment Code </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <input type="text" class="edit_input" name="dept_code" id="dept_code" value="<?php echo $row['dept_code'];?>" /></td>
        </tr>
        <tr>
            <td valign="top">Department Address </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">&nbsp;&nbsp; <textarea class="edit_input" name="dept_address" id="dept_address" value="<?php echo $row['dept_address'];?>"><?php echo $row['dept_address'];?></textarea></td>
        </tr>
        <tr>
            <td valign="top">Department Contect No  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <input type="text" class="edit_input" name="dept_contact_no" id="dept_contact_no" value="<?php echo $row['dept_contact_no'];?>" /></td>
        </tr>
         <tr>
            <td valign="top">Department Email </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <input type="text" class="edit_input" name="dept_email" id="dept_email" value="<?php echo $row['dept_email'];?>" /></td>
        </tr>
        
        <!--<tr>
        	<td></td>
            <td></td>
            <td><input type="button" id="btn_close" value="OK" onclick="close_popup();" /></td>
        </tr> -->
    </table> 
    <div  class="edit_btm"> <input type="button" class="btn_save" id="btn_deparment_update" value="Update" onclick="close_popup();" /></div>
    <?php
	}
	
?> 
<script type="text/javascript">
$(document).ready(function(){

  $("#btn_deparment_update").click(function(){
     	var 	department_id = $("#department_id").val();	
		var dept_name = $("#dept_name").val();
		var dept_code = $("#dept_code").val();
		var dept_address = $("#dept_address").val();
		var dept_contact_no = $("#dept_contact_no").val();
		var dept_email = $("#dept_email").val();
		var dataStr = "department_id="+department_id+"&dept_name="+dept_name+
		"&dept_code="+dept_code+"&dept_contact_no="+dept_contact_no+"&dept_email="+dept_email+"&dept_address="+dept_address;
		$.ajax({
		   type:"post" ,
		   url:"includes/edit/department_edit_by_ajax.php" ,
		   data:dataStr , 
		   cache:false ,
		   success:function(st){
		      alert(st);
		   }
		});
  });
});
</script>                                                                                                                                                                                              