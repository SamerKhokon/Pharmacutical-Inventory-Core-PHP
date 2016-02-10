<style type="text/css">ul li{list-style:none;}</style>
<div id="content"> <?php //session_start();?>
    <input type="hidden" id="company_id" value="<?php echo $_SESSION['COMPANY_ID'];?>"/>
    <input type="hidden" id="entry_by" value="<?php echo $_SESSION["LOGIN_USERID"]   ;?>"/>		
    <div>
        <span action="javascript:void(0);" class="register">
            <!-- <h1>Form Design</h1>			-->		
            <fieldset class="row1">
                <legend>Designation Stting	</legend>
                <table border="0" class="product_table" style="font-size:12px; font-weight:bold;">
                	<tr>
                    	<td><label>User Group * </label></td>
                        <td style="padding-left:10px;"><input type="text" id="user_group" class=""/></td>
                    </tr>
                    <tr><td colspan="2">&nbsp;</td></tr>
                    <tr>
                    	<td valign="top"><label>Select Modules * </label></td>
                        <td valign="top" style="text-align:left;"><ul><?php echo module_tree()?></ul></td>
                    </tr>
                    <tr><td colspan="2">&nbsp;</td></tr>
                    <tr>
                    	<td valign="top"><label>Select Menus * </label></td>
                        <td valign="top" style="text-align:left;"><ul><?php echo menu_tree();?></ul></td>
                    </tr>
                    <tr><td colspan="2">&nbsp;</td></tr>
                    <tr>
                    	<td></td>
                        <td valign="top" style="text-align:left;"><ul><?php echo module_menu_tree();?></ul></td>
                    </tr>
                    <tr>
                    	<td>&nbsp;</td>
                        <td class="btm_save_reset"><input type="button" style="width:70px;" class="btn_save"  id="desgination_save"  value="Save"/>
                    &nbsp;<input type="button" style="width:70px;" class="btn_reset"  id="desgination_reset"  value="Reset"/></td>
                    </tr>
                </table>
                
            </fieldset>
        </span>
    </div>
	<script   type="text/javascript">
	
	$(document).ready(function(){
		$('.sub').hide();
		$('.main').click(function() {
			var m_id = $(this).attr('id');
			var m_plus = '#'+m_id+'_plus';
			var m_minus = '#'+m_id+'_minus';
			//alert(m_id);
			$(m_plus).hide();
			$(m_minus).show();				
			$('#ss_'+m_id).show();
			if($('#'+m_id+'_m').is(':checked'))
			{
				var smenus = $("[name='"+m_id+"']");
				if(smenus.length>0)
				{
					$(smenus).each(function(){
						$(this).attr('checked',true);
					});
				}	
			}
			else
			{
				var smenus = $("[name='"+m_id+"']");
				if(smenus.length>0)
				{
					$(smenus).each(function(){
						$(this).attr('checked',false);
					});
				}	
			}	
			/*$(".sub").each(function(){		
				var s_id = $(this).attr('id');		    
				if(s_id != 'ss_'+m_id){
					$('#'+s_id).hide();
					$(m_plus).show();
					$(m_minus).hide();
				}
			});*/		
		});
		$('.chk_sub').click(function(){
			var main_menu_id = $(this).attr('name');
			alert(main_menu_id);
		});
		$('.plus').click(function(){
			var myString = $(this).attr('id');
			plus_minus(myString);
		});
		$('.minus').click(function(){
			var myString = $(this).attr('id');
			plus_minus(myString);
		});
		/*$("#designation_name").focus();
	   	$("#desig_table").load("includes/table/designation_datatable.php" , function(){}).fadeIn('slow');
	   
		$(".designation_delete").live("click" , function(){
			var designation_id = $(this).attr("id");
		   	//alert(designation_id);
		   	$.ajax({
				type:"post",
			   	url:"includes/remove/designation_delete.php",
			   	data:"rid="+designation_id,
			   	cache:false,
			   	success:function(st){
					alert(st);
				   	$("#desig_table").load("includes/table/designation_datatable.php" , function(){}).fadeIn('slow');
			   	}
		   	});
		  
		});
	
	   	$("#designation_name").keypress(function(ex){
			if(ex.which == 13 ) {
				var   designation_name  =  $("#designation_name").val();
			   	if(designation_name=="") {
					alert("Enter designation name");
				   	$("#designation_name").focus();
				   	return false;
				}else{
					$("#designation_code").focus();
				}
			}
	   	});
		$("#desgination_save").click(function(){	
			var designation_name = $("#designation_name").val();						   
		 	var designation_code = $("#designation_code").val();
		 	var company_id           = $("#company_id").val();
		 	var entry_by                 = $("#entry_by").val();
		 	var dataStr                   = "designation_name="+designation_name+"&designation_code="+designation_code
												 +"&company_id="+company_id+"&entry_by="+entry_by;
		 
			if(designation_name=="") {
				alert("Enter designation name");
				$("#designation_name").focus();
				return false;
			}else if(designation_code=="") {
				alert("Enter designation code");
				$("#designation_code").focus();
				return false;
			}else{
				//alert(dataStr);
				 
				 $.ajax({
					type:"post" ,
					url:"includes/add_desig_by_ajax.php" ,
					data:dataStr ,
					cache:false ,
					success:function(st)
					{
						alert(st);
						$("#desig_table").load("includes/table/designation_datatable.php" , function(){}).fadeIn('slow');
						reset_fields();
					}
				 });
			}

	   });*/
	});
	function plus_minus(myString){
		//alert(myString);
		var myArray = myString.split('_');
		//alert(myArray[0]+','+myArray[1]);
		var id = myArray[0];
		var sp_plus = '#'+id+'_plus';
		var sp_minus = '#'+id+'_minus';
		var ss_id = '#ss_'+myArray[0];
		if(myArray[1]=='plus'){
			$(ss_id).show();
			$(sp_plus).hide();
			$(sp_minus).show();
		}
		else{
			$(ss_id).hide();
			$(sp_plus).show();
			$(sp_minus).hide();
		}
	}
	/*function edit_data(id)
	{
		//alert(id);
		var dataStr = "id="+id;
		//alert(dataStr);
		$.ajax({
			type:"post" ,
			url:"includes/edit/designation_edit.php" ,
			data:dataStr ,
			cache:false ,
			success:function(st)
			{
				
				//$data = $row['menu_name']."|".$row['module_id'].",".$row['module_folder']."|".$row['mother_menu_id']."|".$row['sub_menu_flag']."|".$row['menu_contant']."|".$row['common_for_all']."|".$row['menu_order'];
				
				if($.trim(st))
				{
					$("#inline2").html($.trim(st));
				}				
			}
		});
	}
	function view_data(id)
	{
		//alert(id);
		var dataStr = "id="+id;
		//alert(dataStr);
		$.ajax({
			type:"post" ,
			url:"includes/view/designation_view.php" ,
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
	}*/
	</script>
    <div id="desig_table"></div>
    <br /> <br />
</div>
<!-- end content -->
<?php
function module_tree()
{
	$sql = "select 	
	module_id, module_name, module_folder
	from 
	decent_pharma_db.st_module_info 
	where
	active_flag='Y'";
	$res = mysql_query($sql);
	while($row = mysql_fetch_array($res))
	{
		$module_id = $row['module_id'];
		$module_name = $row['module_name'];
		
		echo '<li style="list-style:none;">';
			echo '<input type="checkbox" name="mdl_'.$module_id.'" id="mdl_'.$module_id.'" value="'.$module_id.'" /> '.$module_name;
		echo '</li>';
		//echo '<ul>'.menu_tree2($row['module_folder']).'</ul>';
		
		
	}
}

function module_menu_tree()
{
	$sql = "select 	
	module_id, module_name, module_folder
	from 
	decent_pharma_db.st_module_info 
	where
	active_flag='Y'";
	$res = mysql_query($sql);
	while($row = mysql_fetch_array($res))
	{
		$module_id = $row['module_id'];
		$module_name = $row['module_name'];
		$module_folder = $row['module_folder'];
		
		echo '<li style="list-style:none;">';
			echo '<input type="checkbox" name="mdl_'.$module_id.'" id="mdl_'.$module_id.'" value="'.$module_id.'" /> '.$module_name;
			echo '<ul style="display:none;">';
			$sql_main_menu = "select 
			menu_id, menu_name, sub_menu_flag 
			from st_menu_info 
			where
			active_flag='Y'
			and module_folder='$module_folder'
			and mother_menu_id=0
			and common_for_all=0";
			$res_main_menu = mysql_query($sql_main_menu);
			$main_menu_count = mysql_num_rows($res_main_menu);
			if($main_menu_count>0)
			{
				while($row_main_menu = mysql_fetch_array($res_main_menu))
				{
					$main_menu_id = $row_main_menu['menu_id'];
					$main_menu_name = $row_main_menu['menu_name'];
					$main_menu_sub_flag = $row_main_menu['sub_menu_flag'];
					//echo '<li style="padding-left:10px;">'.$main_menu_name.'</li>';
					//echo '<ul style="display:none;">';
					if($main_menu_sub_flag==1)
					{
						$sql_sub_menu = "select 
						menu_id, menu_name 
						from
						st_menu_info
						where
						active_flag='Y'
						and mother_menu_id=$main_menu_id
						and common_for_all=0";
						$res_sub_menu = mysql_query($sql_sub_menu);
						$sub_menu_count = mysql_num_rows($res_sub_menu);
						if($sub_menu_count>0)
						{
							echo '<li style="list-style:none; padding-left:10px;">'.$main_menu_name.'  <span id="sp_mm_plus">[+]</span><span id="sp_mm_plus" style="display:none;">[-]</span></li>';
							echo '<ul style="display:none;">';
							while($row_sub_menu = mysql_fetch_array($res_sub_menu))
							{
								$sub_menu_id = $row_sub_menu['menu_id'];
								$sub_menu_name = $row_sub_menu['menu_name'];
								echo '<li style="list-style:none; padding-left:20px;">'.$sub_menu_name.'</li>';
								
							}
							echo '</ul>';
						}
						else
						{
							echo '<li style="list-style:none; padding-left:10px;">'.$main_menu_name.'</li>';
						}		
					}
					else
					{
						echo '<li style="padding-left:10px;">'.$main_menu_name.'</li>';
					}
				}
			}
			else
			{
				echo '<li style="list-style:none; color:#FF0000; padding-left:10px;">No Menu</li>';
			}
			echo '</ul>';
		echo '</li>';
	}
}
function menu_tree()   
{
    //global $conn;
    $sql_mm = "SELECT * FROM `st_menu_info` WHERE `mother_menu_id` =0 AND `common_for_all` =0 AND `active_flag` = 'Y' ORDER BY `menu_order`";
    $res_mm = mysql_query($sql_mm);
    while($row_mm = mysql_fetch_array($res_mm))  
    {
        $main_menu_id   = $row_mm['menu_id'];
        $main_menu_name = $row_mm['menu_name'];
		$sub_menu_flag = $row_mm['sub_menu_flag'];
    ?>			  
        <li style="list-style:none;">
            <span class="main" id="<?php echo $main_menu_id;?>"><input type="checkbox" id="<?php echo $main_menu_id;?>_m"/><?php echo $main_menu_name;?>&nbsp;</span>
            <span class="plus" id="<?php echo $main_menu_id;?>_plus" style="cursor:pointer;">[+]</span>		
            <span class="minus" id="<?php echo $main_menu_id;?>_minus" style="cursor:pointer; display:none;">[-]</span>		
            <ul class="sub" id="ss_<?php echo $main_menu_id;?>">
            <?php
			if($sub_menu_flag==1)
			{	 
				$sql_sm = "SELECT * FROM `st_menu_info` WHERE `mother_menu_id` =$main_menu_id AND `active_flag` = 'Y' ORDER BY `menu_order`";
				$res_sm = mysql_query($sql_sm);
				while($row_sm = mysql_fetch_array($res_sm))   
				{			  
				   $sub_menu_id = $row_sm['menu_id'];
				   $sub_menu_name = $row_sm['menu_name'];				
				?>				
					<li style="padding-left:10px;">
					<input class="chk_sub" type="checkbox" name="<?php echo $main_menu_id;?>" id="<?php echo $sub_menu_id."_s";?>" /><?php echo $sub_menu_name;?>
					</li>
				<?php
				}
			}
			else
			{
				?><li style="color:#FF0000;">No Sub-Menu</li><?php
			}	 
            ?>
            </ul>										  
        </li>
    <?php
    }
} 
?>