<?php   include("../../db.php");
	
	$menu_id = $_REQUEST['id'];              
	$str = "select * from st_menu_info where menu_id=$menu_id";
	$sql = mysql_query($str);
	$data = "";
	if($row = mysql_fetch_array($sql))
	{
		//$data = $row['menu_name']."|".$row['module_id'].",".$row['module_folder']."|".$row['mother_menu_id']."|".$row['sub_menu_flag']."|".$row['menu_contant']."|".$row['common_for_all']."|".$row['menu_order'];
		
	?>
	<h1 class="pop_head"> Menu </h1>

    <table class="pop_table">
        <tr>
            <td valign="top">Menu Name  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <input type="text" class="edit_input" name="menu_name" id="menu_name_e" value="<?php echo $row['menu_name'];?>" /></td>
        </tr>
        <tr>
            <td valign="top">Menu Content  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <input type="text" class="edit_input" name="menu_contants" id="menu_contant_e" value="<?php echo $row['menu_contant'];?>" /></td>
        </tr>
        <tr>
            <td valign="top">Module  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; 
			<select id="module_id_e" class="edit_select" >
				<?php echo get_module_name($row['module_id']);?>
			</select></td>
        </tr>
        <tr>
            <td valign="top">Child Of  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <select id="mother_menu_id_e" class="edit_select" >
				<option value="0"></option>
				<?php echo get_child_name($row['mother_menu_id']);?>
			</select></td>
        </tr>
         <tr>
            <td valign="top">Sub Menu  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <select id="sub_menu_flag_e" class="edit_select" >
                <option value="0" <?php if($row['sub_menu_flag']==0){ echo 'selected="selected"';}else{ echo '';}?>>No</option>
                <option value="1" <?php if($row['sub_menu_flag']==1){ echo 'selected="selected"';}else{ echo '';}?>>Yes</option>
			</select></td>
        </tr>
         <tr>
            <td valign="top">Common For All  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <select id="common_for_all_e" class="edit_select" >
			<option value="0" <?php if($row['common_for_all']==0){ echo 'selected="selected"';}else{ echo '';}?>>No</option>
            <option value="1" <?php if($row['common_for_all']==1){ echo 'selected="selected"';}else{ echo '';}?>>Yes</option>
			</select></td>
        </tr>
         <tr>
            <td valign="top">Menu Order  </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp; <input type="text" class="edit_input" name="menu_order_e" id="menu_order_e" value="<?php echo $row['menu_order'];?>" onkeypress="return ret_valid_digit(event,'int',this.value.indexOf('.'));" /></td>
        </tr>
       
    </table> 
    <div  class="edit_btm"> <input type="button" class="btn_save" id="btn_update" value="Update" /><input type="hidden" id="menu_id_e" value="<?php echo $menu_id;?>" /></div>
    <?php
	}
	function get_module_name($module_id)
	{
		global $option2;
		$sql_module = "select module_id, module_name, module_folder from st_module_info ";
		$res_module = mysql_query($sql_module);
		while($res = mysql_fetch_array($res_module))
		{
			if($res[0] == $module_id){
				$option2 .= "<option selected='selected' value='".$res[0].",".$res[2]."'>".$res[1]."</option>";
			}else{
				$option2 .= "<option value='".$res[0].",".$res[2]."'>".$res[1]."</option>";
			}
		}
		return $option2;
	}
	function get_child_name($mother_menu_id)
	{
		global $option1;
		$sql_mother_menu = "select menu_id, menu_name from st_menu_info where active_flag='Y' and  	mother_menu_id=0";
		$res_mother_menu = mysql_query($sql_mother_menu);
		while($res = mysql_fetch_array($res_mother_menu))
		{
			if($res[0] == $mother_menu_id){
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
	
		$("#btn_update").click(function(){
			var menu_id = $("#menu_id_e").val();
			var menu_name = $("#menu_name_e").val();
			var menu_contant = $("#menu_contant_e").val();
			var module_info = $("#module_id_e").val();
			var myArray = module_info.split(',');
			var module_id = myArray[0];
			var module_folder = myArray[1];
			var mother_menu_id = $("#mother_menu_id_e").val();
			var sub_menu_flag = $("#sub_menu_flag_e").val();
			var common_for_all = $("#common_for_all_e").val();
			var menu_order = $("#menu_order_e").val();

			menu_name = menu_name.replace("&", "~and~");
			var dataStr = "menu_name="+menu_name+"&menu_contant="+menu_contant+"&module_id="+module_id+"&module_folder="+module_folder+"&mother_menu_id="+mother_menu_id+"&sub_menu_flag="+sub_menu_flag+"&common_for_all="+common_for_all+"&menu_order="+menu_order+"&menu_id="+menu_id;
			//alert(dataStr);
			$.ajax({
			   type:"post" ,
			   url:"includes/edit/menu_edit_by_ajax.php" ,
			   data:dataStr , 
			   cache:false ,
			   success:function(st){
				  alert(st);
				  close_popup();
				  data_load()
			   }
			});
		});
	});
</script> 
