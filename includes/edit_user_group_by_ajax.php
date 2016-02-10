<?php	include("../db.php");
			  
	/*
	var dataStr = 'user_group='+user_group+'&module_ids='+mdl+'&menu_ids='+ss+'&entry_by='+entry_by+'&company_id='+company_id;
	*/
	$user_group_id = trim($_POST["user_group_id"]);
	$user_group = trim($_POST["user_group"]);										 
	$modules = trim($_POST["module_ids"]);
	$menus = trim($_POST["menu_ids"]);
	$entry_by = trim($_POST["entry_by"]);
	$company_id = trim($_POST["company_id"]);
	
	$search1 = array('mdl_');
	$search2 = array('_m','_s');
	$replace = "";
	$module_ids =  str_replace($search1, $replace, $modules);
	$menu_ids =  str_replace($search2, $replace, $menus);			 

	$str = "update `decent_pharma_db`.`st_user_group` set `user_group`='$user_group', `module_ids`='$module_ids', `menu_ids`='$menu_ids', `last_update_by`=$entry_by, `last_update_date`=now() where `user_group_id`=$user_group_id";			
	$sql = mysql_query($str);
	if($sql)
		echo "Data Edited successfully!";
	else
		echo "Error";
?>