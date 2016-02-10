<style type="text/css">ul li{list-style:none;}</style>
<div id="content"> <?php //session_start();?>
    <input type="hidden" id="company_id" value="<?php echo $_SESSION['COMPANY_ID'];?>"/>
    <input type="hidden" id="entry_by" value="<?php echo $_SESSION["LOGIN_USERID"]   ;?>"/>		
    <div>
        <span action="javascript:void(0);" class="register">
            <!-- <h1>Form Design</h1>			-->		
            <fieldset class="row1">
                <legend>User Group Stting	</legend>
                <table border="0" class="product_table" style="font-size:12px; font-weight:bold;">
                	<tr>
                    	<td valign="top"><label style="width:200px;">User Group <font color="#FF0000">*</font> </label></td>
                        <td style="padding-left:10px;"><input type="text" id="user_group" class="long"/></td>
                    </tr>
                    <tr><td colspan="2">&nbsp;</td></tr>
                    <tr>
                    	<td valign="top"><label style="width:200px;">Select Modules &amp; Menus <font color="#FF0000">*</font> </label></td>
                        <td valign="top" style="text-align:left; padding-left:10px;"><ul><?php echo module_tree()?></ul></td>
                    </tr>
                    <tr><td colspan="2">&nbsp;</td></tr>
                    <tr>
                    	<td>&nbsp;</td>
                        <td class="btn_save_reset">
							<input type="button" style="width:70px;" class="btn_save"  id="btn_save"  value="Save"/>
							<input type="button" class="btn_save"  id="btn_edit"  value="Edit" style="width:70px; display:none;"/>&nbsp;
							<input type="button" style="width:70px;" class="btn_reset"  id="btn_reset"  value="Reset"/>
							<input type="hidden" name="user_group_id" id="user_group_id" value="" />
					</td>
                    </tr>
                </table>
                
            </fieldset>
        </span>
    </div>
	<script   type="text/javascript">
	
	$(document).ready(function(){
		$("#div_data_table").load("includes/table/user_group_datatable.php" , function(){}).fadeIn('slow');
		$('.sub').hide();
		$('#user_group').focus();
		$('.module').click(function(){
			var module_id = $(this).val();
			var mm_name = 'mdl_'+module_id;
			var m = $("[name='"+mm_name+"']");
			//alert(m.length);
			if($('#'+mm_name).is(':checked'))
			{
				if(m.length>0)
				{
					$(m).each(function(){
						var m_id = $(this).val();
						//alert(m_id);
						var main_menu_id = '#'+m_id+'_m';
						$(main_menu_id).attr('checked',true);
						click_main(m_id);
					});
				}
			}
			else
			{
				if(m.length>0)
				{
					$(m).each(function(){
						var m_id = $(this).val();
						//alert(m_id);
						var main_menu_id = '#'+m_id+'_m';
						$(main_menu_id).attr('checked',false);
						click_main(m_id);
					});
				}
			}
				
		});
		$('.main').click(function() {
			var m_id = $(this).attr('id');
			click_main(m_id);
		});
		$('.chk_sub').click(function(){
			var main_menu_id = $(this).attr('name');
			//alert(main_menu_id);
		});
		$('.plus').click(function(){
			var myString = $(this).attr('id');
			plus_minus(myString);
		});
		$('.minus').click(function(){
			var myString = $(this).attr('id');
			plus_minus(myString);
		});
		$('#btn_save').click(function(){
			var user_group = $('#user_group').val();
			var entry_by = $('#entry_by').val();
			var company_id = $('#company_id').val();
			var mdl = [];
			var ss = [];
			$(":checkbox:checked").each(function(){
				var str = $(this).attr('id');
				if(/mdl_/i.test(str))
					mdl.push(str);
				else	
					ss.push(str);		        
			});
			//alert(mdl);
			//alert(ss);
			if(user_group=='')
			{
				alert('Please Enter User Group Name');
				$('#user_group').focus();
			}
			else{
				var dataStr = 'user_group='+user_group+'&module_ids='+mdl+'&menu_ids='+ss+'&entry_by='+entry_by+'&company_id='+company_id;
				//alert(dataStr);								     
				$.ajax({
					type:"post" ,
					url:"includes/add_user_group_by_ajax.php" ,
					data:dataStr ,
					cache:false ,
					success:function(st)
					{
						alert(st);
						$("#div_data_table").load("includes/table/user_group_datatable.php" , function(){}).fadeIn('slow');
						reset_fields();
					}
				});
			}
			
		});
		$('#btn_reset').click(function(){
			reset_fields();	
		});
		$('#btn_edit').click(function(){
			var user_group_id = $('#user_group_id').val();
			var user_group = $('#user_group').val();
			var entry_by = $('#entry_by').val();
			var company_id = $('#company_id').val();
			var mdl = [];
			var ss = [];
			$(":checkbox:checked").each(function(){
				var str = $(this).attr('id');
				if(/mdl_/i.test(str))
					mdl.push(str);
				else	
					ss.push(str);		        
			});
			//alert(mdl);
			//alert(ss);
			if(user_group=='')
			{
				alert('Please Enter User Group Name');
				$('#user_group').focus();
			}
			else{
				var dataStr = 'user_group='+user_group+'&module_ids='+mdl+'&menu_ids='+ss+'&entry_by='+entry_by+'&company_id='+company_id+'&user_group_id='+user_group_id;
				//alert(dataStr);								     
				$.ajax({
					type:"post" ,
					url:"includes/edit_user_group_by_ajax.php" ,
					data:dataStr ,
					cache:false ,
					success:function(st)
					{
						alert(st);
						$('#user_group_id').val('');
						$('#btn_save').show();
						$('#btn_edit').hide();
						$("#div_data_table").load("includes/table/user_group_datatable.php" , function(){}).fadeIn('slow');
						reset_fields();
					}
				});
			}
			
		});
		/*
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
	
		*/
	});
	function click_main(m_id)
	{
		//alert(m_id);
		var m_plus = '#'+m_id+'_plus';
		var m_minus = '#'+m_id+'_minus';
		//alert(m_id);
		$(m_plus).hide();
		$(m_minus).show();				
		$('#ss_'+m_id).show();
		if($('#'+m_id+'_m').is(':checked'))
		{
			//alert($('#'+m_id+'_m').attr('name'));
			var module_id = '#'+$('#'+m_id+'_m').attr('name');
			$(module_id).attr('checked',true);
			var smenus = $("[name='"+m_id+"_m']");
			if(smenus.length>0)
			{
				$(smenus).each(function(){
					$(this).attr('checked',true);
				});
			}	
		}
		else
		{
			var smenus = $("[name='"+m_id+"_m']");
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
		
	}
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
	function reset_fields()
	{
		$('#user_group').val('');
		$('.module').each(function(){
			var module_id = $(this).attr('id');
			$('#'+module_id).attr('checked',false);
		});
		$('.main').each(function(){
			var m_id = $(this).attr('id');
			//alert(m_id)
			$('#'+m_id+'_m').attr('checked',false);
			click_main(m_id);
			var m_plus = '#'+m_id+'_plus';
			var m_minus = '#'+m_id+'_minus';
			$(m_plus).show();
			$(m_minus).hide();
		});
		$('.sub').hide();
		
		$('#user_group').focus();
	}
	function edit_data(id)
	{
		//alert(id);
		var dataStr = "id="+id;
		//alert(dataStr);
		$.ajax({
			type:"post" ,
			url:"includes/edit/user_group_edit.php" ,
			data:dataStr ,
			cache:false ,
			success:function(st)
			{
				
				//$data = $row['module_ids']."|".$row['menu_ids'];
				
				if($.trim(st))
				{
					$("#btn_save").hide();
					$("#btn_edit").show();
					var my_str =st.split('|');					
					var id = my_str[0];
					var user_group = my_str[1];
					var module_ids = my_str[2];
					var menu_ids = my_str[3];
					$('#user_group_id').val(id);
					$('#user_group').val(user_group);
					/*$('.module').each(function(){
						var module_id = $(this).attr('id');
						$('#mdl_'+module_id).attr('checked',false);
					});*/
					$('.sub').show();
					$('.plus').hide();
					$('.minus').show();
					
					var module_ids_parse = module_ids.split(',');
					for(var i=0 ; i<module_ids_parse.length;i++){
						var xid = 'mdl_'+module_ids_parse[i];
						        
						$(":checkbox").each(function(){
							if($(this).attr('id')  == xid ){
								$(this).attr('checked',true);
							}
						});
					}
					var menu_ids_parse = menu_ids.split(',');
					for(var i=0 ; i<menu_ids_parse.length;i++){
						var mid = menu_ids_parse[i]+'_m';
						var sid = menu_ids_parse[i]+'_s';
						$(":checkbox").each(function(){
							var id = $(this).attr('id');
							if(id == mid||id==sid){
								$(this).attr('checked',true);
							}
						});
					}
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
			url:"includes/view/user_group_view.php" ,
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
    <div id="div_data_table"></div>
    <br /> <br />
</div>
<!-- end content -->
<?php
function module_tree()
{
	$sql = "select 	
	module_id, module_name
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
			echo '<input type="checkbox" class="module" name="'.$module_id.'" id="mdl_'.$module_id.'" value="'.$module_id.'" /> '.$module_name;
			echo '<ul>'.menu_tree2($row[0]).'</ul>';
		echo '</li>';
	}
}
function menu_tree2($module_id)   
{
    //global $conn;
    $sql_mm = "SELECT * FROM `st_menu_info` WHERE `mother_menu_id` =0 AND `common_for_all` =0 AND `active_flag` = 'Y' and module_id=$module_id ORDER BY `menu_order`";
    $res_mm = mysql_query($sql_mm);
    while($row_mm = mysql_fetch_array($res_mm))  
    {
        $main_menu_id   = $row_mm['menu_id'];
        $main_menu_name = $row_mm['menu_name'];
		$sub_menu_flag = $row_mm['sub_menu_flag'];
    ?>			  
        <li style="list-style:none; padding-left:20px;">
            <span class="main" id="<?php echo $main_menu_id;?>"><input type="checkbox" name="<?php echo 'mdl_'.$module_id;?>" id="<?php echo $main_menu_id;?>_m" value="<?php echo $main_menu_id;?>"/><?php echo $main_menu_name;?>&nbsp;</span>
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
					<input class="chk_sub" type="checkbox" name="<?php echo $main_menu_id;?>_m" id="<?php echo $sub_menu_id."_s";?>" /><?php echo $sub_menu_name;?>
					</li>
				<?php
				}
			}
			else
			{
				?><li style="color:#FF0000; padding-left:10px;">No Sub-Menu</li><?php
			}	 
            ?>
            </ul>										  
        </li>
    <?php
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
    ?>		   
</ul>
<?php	
} 
?>