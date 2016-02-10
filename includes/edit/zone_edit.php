<?php   include("../../db.php");
	
	$zone_id = $_REQUEST['id'];              
	$str = "select * from inv_customer_zone where zone_id=$zone_id";
	$sql = mysql_query($str);
	$data = "";
	if($row = mysql_fetch_array($sql))
	{
		$data = $row['depot_id']."|".$row['zone_name'].",".$row['mio_id']."|".$row['sv_id'];
		
	?>
	<h1 class="pop_head"> Zone </h1>
  <input type="hidden" id="zone_id_e" value="<?php echo $zone_id;?>"/>
    <table class="pop_table">
        <tr>
            <td valign="top">Depot Name </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; 
			<select id="depot_id_e" class="edit_select" >
            <option><?php echo get_depo_dropdown($row['depot_id']);?></option>
            </select>
			</td>
        </tr>
        <tr>
            <td valign="top">Zone Name  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <input type="text" class="edit_input" name="zone_name" id="zone_name_e" value="<?php echo $row['zone_name'];?>" /></td>
        </tr>
        <tr>
            <td valign="top">MIO Name  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; 
			<select id="mio_id_e" class="edit_select" >
			<option><?php echo get_mio_dropdown($row['mio_id']);?></option>
			</select>
			</td>
        </tr>
        <tr>
            <td valign="top">S.V </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; 
			<select id="sv_id_e" class="edit_select" >
			<option><?php echo get_sv_dropdown($row['sv_id']);?></option>
			</select></td>
        </tr>
        
        <!--<tr>
        	<td></td>
            <td></td>
            <td><input type="button" id="btn_close" value="OK" onclick="close_popup();" /></td>
        </tr> -->
    </table> 
    <div  class="edit_btm"> <input type="button" class="btn_save" id="btn_zone_update" value="Update" onclick="close_popup();" /></div>
    <?php
	}
	
	 function get_depo_dropdown($depot_id){
				 global $option2;
				 $str = "SELECT depot_id,depot_name,depot_flag FROM `inv_depot_info`";
				 $sql =mysql_query($str);
				 while($res = mysql_fetch_array($sql)) {
				 if($res[0] == $depot_id){
					 $option2 .= "<option selected='selected'  value='".$res[0]."'>".$res[2]."(".$res[1].")</option>";
					 }else{
					 	$option2 .= "<option   value='".$res[0]."'>".$res[2]."(".$res[1].")</option>";
					 }
				 }
				 return $option2;
		  }

	

	function get_mio_dropdown($employee_id){
				 global $option3;
				 $str = "SELECT employee_id,emp_name FROM `hr_employee_info`  WHERE employee_id=$employee_id AND
					designation_id=(SELECT designation_id FROM `hr_emp_designation` WHERE designation_code='M.I.O')";
				 $sql =mysql_query($str);
				 while($res = mysql_fetch_array($sql)) {
				 if($res[0] == $employee_id){
				 	$option3 .= "<option selected='selected'  value='".$res[0]."'>".$res[1]."</option>";
					}else{
						$option3 .= "<option   value='".$res[0]."'>".$res[1]."</option>";
					}
				 }
				 return $option3;
		  }	
	function get_sv_dropdown($employee_id){
				 global $option1;
				 $str = "SELECT employee_id,emp_name FROM `hr_employee_info` WHERE employee_id=$employee_id AND 
					designation_id=(SELECT designation_id FROM `hr_emp_designation` WHERE designation_code='S.V')";
				 $sql =mysql_query($str);
				 while($res = mysql_fetch_array($sql)) {
				 if($res[0] == $employee_id){
				 	$option1 .= "<option selected='selected'  value='".$res[0]."'>".$res[1]."</option>";
					}else{
						$option1 .= "<option   value='".$res[0]."'>".$res[1]."</option>";
					}
				 }
				 return $option1;
		  }		  	  
		
?>   
<script type="text/javascript">
$(document).ready(function(){

  $("#btn_zone_update").click(function(){
     	var 	zone_id = $("#zone_id_e").val();	
		var depot_id = $("#depot_id_e").val();
		var zone_name = $("#zone_name_e").val();
		var mio_id = $("#mio_id_e").val();
		var sv_id = $("#sv_id_e").val();
		
		var dataStr = "zone_id="+zone_id+"&depot_id="+depot_id+"&zone_name="+zone_name+"&mio_id="+mio_id+"&sv_id="+sv_id;
		$.ajax({
		   type:"post" ,
		   url:"includes/edit/zone_edit_by_ajax.php" ,
		   data:dataStr , 
		   cache:false ,
		   success:function(st){
		      alert(st);
		   }
		});
  });
});
</script>                                                                                                     