<?php   include("../../db.php");
	
	$edr_id = $_REQUEST['id'];              
	$str = "select * from hr_employee_depot_rel where edr_id=$edr_id";
	$sql = mysql_query($str);
	$data = "";
	if($row = mysql_fetch_array($sql))
	{
		//$data = $row['menu_name']."|".$row['module_id'].",".$row['module_folder']."|".$row['mother_menu_id']."|".$row['sub_menu_flag']."|".$row['menu_contant']."|".$row['common_for_all']."|".$row['menu_order'];
		
	?>
	<h1 class="pop_head"> Employee Depot Rel </h1>
	<input type="hidden" id="edr_id_e" value="<?php echo $edr_id;?>"/>
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
            <td valign="top">Depot  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; 
			<select id="depot_id_e" class="edit_select" >
            <option><?php echo depot_dropdown($row['depot_id']);?></option>
			</td>
        </tr>
        <tr>
            <td valign="top">Designation  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; 
			<select id="designation_id" class="edit_select">
            <option><?php echo designation_dropdown($row['designation_id']);?></option>
			</td>
        </tr>
       
        <!--<tr>
        	<td></td>
            <td></td>
            <td><input type="button" id="btn_close" value="OK" onclick="close_popup();" /></td>
        </tr> -->
    </table> 
     <div  class="edit_btm"> <input type="button" class="btn_save" id="btn_depot_rel_update" value="Update" onclick="close_popup();" /></div>
    <?php
	}

	 function employee_dropdown($employee_id){
		      global $option1;
			   $str = "SELECT employee_id,emp_name FROM `hr_employee_info` ";
			  $sql = mysql_query($str);
			  while($res = mysql_fetch_array($sql) ) {
			  if($res[0] == $employee_id){
				$option1 .=  "<option selected ='selected' value='".$res[0] . "'>".  $res[1]. "</option>";
				}else{
					$option1 .=  "<option value='".$res[0] . "'>".  $res[1]. "</option>";
				}
			  }
			  return $option1;
		    }
	
	 function depot_dropdown($depot_id){
		      global $option2;
			   $str = "SELECT depot_id,depot_name,depot_flag FROM `inv_depot_info` ";
			  $sql = mysql_query($str);
			  while($res = mysql_fetch_array($sql) ) {
			  if($res[0] == $depot_id){
				$option2 .=  "<option selected ='selected' value='".$res[0] . "'>".  $res[2]."(". $res[1].")</option>";
				}else{
					$option2 .=  "<option value='".$res[0] . "'>".  $res[2]."(". $res[1].")</option>";
				}
			  }
			  return $option2;
		    }
	function designation_dropdown($designation_id){
		      global $option3;
			   $str = "SELECT designation_id,designation,designation_code FROM `hr_emp_designation` ";
			  $sql = mysql_query($str);
			  while($res = mysql_fetch_array($sql) ) {
			  if($res[0] == $designation_id){
				$option3 .=  "<option selected ='selected' value='".$res[0] . "'>".  $res[2]. "</option>";
				}else{
					$option3 .=  "<option value='".$res[0] . "'>".  $res[2]. "</option>";
				}
			  }
			  return $option3;
		    }	
	
?> 
<script type="text/javascript">
$(document).ready(function(){

  $("#btn_depot_rel_update").click(function(){
     	var 	edr_id = $("#edr_id_e").val();	
		var employee_id = $("#employee_id_e").val();
		var depot_id = $("#depot_id_e").val();
		var designation_id = $("#designation_id_e").val();
		
		var dataStr = "edr_id="+edr_id+"&employee_id="+employee_id+"&depot_id="+depot_id+"&designation_id="+designation_id;
		$.ajax({
		   type:"post" ,
		   url:"includes/edit/depot_rel_edit_by_ajax.php" ,
		   data:dataStr , 
		   cache:false ,
		   success:function(st){
		      alert(st);
		   }
		});
  });
});
</script>                                                                                                     