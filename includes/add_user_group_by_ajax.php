<?php	include("../db.php");
			  
	/*
	var dataStr = 'user_group='+user_group+'&module_ids='+mdl+'&menu_ids='+ss+'&entry_by='+entry_by+'&company_id='+company_id;
	*/
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

	if(is_exist($user_group)==0)  
	{
			
		$str = "INSERT INTO `decent_pharma_db`.`st_user_group` (`user_group`, `module_ids`, `menu_ids`, `entry_by`, `entry_date`, `company_id`, `active_flag`) VALUES('$user_group', '$module_ids', '$menu_ids', $entry_by, now(), $company_id, 'Y')";			
		$sql = mysql_query($str);
		if($sql)
			echo "Data saved successfully!";
		else
			echo "Error";
	}
	else{
		echo "Data already exist!";
	}
			
	function is_exist($user_group) {
		$str = "select count(*) from st_user_group where user_group='$user_group'";
		$sql = mysql_query($str);
		$res = mysql_fetch_row($sql);
		return $res[0];
	}
?>