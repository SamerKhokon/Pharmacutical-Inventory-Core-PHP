<?php   include("../../db.php");
	
	$eh_id = $_REQUEST['id'];              
	$str = "select * from hr_employee_hierarchy where eh_id=$eh_id";
	$sql = mysql_query($str);
	$data = "";
	if($row = mysql_fetch_array($sql))
	{
		$data = $row['employee_id']."|".$row['superior_emp_id'];
		
	?>
	<h1 class="pop_head"> Employee Hierachy </h1>
	  <input type="hidden" id="eh_id" value="<?php echo $eh_id;?>"/>
    <table class="pop_table">
       
        <tr>
            <td valign="top">Employee Name  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; 
			<select id="employee_id_e" class="edit_select" >
            <option><?php echo employee_dropdown($row['employee_id']);?></option>
            </select>
			</td>
        </tr>
        <tr>
            <td valign="top">Superior Employee  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;
			<select id="superior_emp_id_e" class="edit_select" >
            <option><?php echo employee_superior_dropdown($row['superior_emp_id']);?></option>
            </select>
			</td>
        </tr>
        
        <!--<tr>
        	<td></td>
            <td></td>
            <td><input type="button" id="btn_close" value="OK" onclick="close_popup();" /></td>
        </tr> -->
    </table> 
    <div  class="edit_btm"> <input type="button" class="btn_save" id="btn_emp_hierachy_update" value="Update" onclick="close_popup();" /></div>
    <?php
	}
	
	function employee_dropdown($employee_id){
		      global $option1;
			   $str = "SELECT employee_id,emp_name FROM `hr_employee_info` ";
			  $sql = mysql_query($str);
			  while($res = mysql_fetch_array($sql) ) {
			  if($res[0]== $employee_id){
				$option1 .=  "<option selected='selected' value='".$res[0] . "'>".  $res[1]. "</option>";
				}else{
					$option1 .=  "<option value='".$res[0] . "'>".  $res[1]. "</option>";
				}
			  }
			  return $option1;
		    }
	 function employee_superior_dropdown($employee_id){
		      global $option2;
			   $str = "SELECT employee_id,emp_name FROM `hr_employee_info` ";
			  $sql = mysql_query($str);
			  while($res = mysql_fetch_array($sql) ) {
			  if($res[0] == $employee_id)
			 	 {
				$option2 .=  "<option selected='selected' value='".$res[0] . "'>".  $res[1]. "</option>";
				}else{
					$option2 .=  "<option value='".$res[0] . "'>".  $res[1]. "</option>";
				}
			  }
			  return $option2;
		    }		   
	
	
?>   
<script type="text/javascript">
$(document).ready(function(){

  $("#btn_emp_hierachy_update").click(function(){
     	var 	eh_id = $("#eh_id").val();	
		var employee_id = $("#employee_id_e").val();
		var superior_emp_id = $("#superior_emp_id_e").val();
		
		var dataStr = "eh_id="+eh_id+"&employee_id="+employee_id+"&superior_emp_id="+superior_emp_id;
		$.ajax({
		   type:"post" ,
		   url:"includes/edit/emp_hierachy_edit_by_ajax.php" ,
		   data:dataStr , 
		   cache:false ,
		   success:function(st){
		      alert(st);
		   }
		});
  });
});
</script>                                                                                                     