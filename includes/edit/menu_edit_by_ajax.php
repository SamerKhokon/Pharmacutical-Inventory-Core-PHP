<?php     include("../../db.php");
		/*
		var dataStr = "menu_name="+menu_name+"&menu_contant="+menu_contant+"&module_id="+module_id+"&module_folder="+module_folder+"&mother_menu_id="+mother_menu_id+"&sub_menu_flag="+sub_menu_flag+"&common_for_all="+common_for_all+"&menu_order="+menu_order+"&menu_id="+menu_id;
		*/
		
		$menu_id = trim($_POST["menu_id"]);
		$menu_name  = trim($_POST["menu_name"]);
		$menu_name = str_replace('~and~', '&', $menu_name);										 
		$menu_contant = trim($_POST["menu_contant"]);
		$module_id = trim($_POST["module_id"]);	
		$module_folder = trim($_POST["module_folder"]);
		$mother_menu_id = trim($_POST["mother_menu_id"]);
		$sub_menu_flag = trim($_POST["sub_menu_flag"]);
		$common_for_all = trim($_POST["common_for_all"]);
		$menu_order = trim($_POST["menu_order"]);
		
	
		$update_query = "UPDATE `decent_pharma_db`.`st_menu_info` 
						SET
						`menu_name` = '$menu_name',
						`module_id` = $module_id , 						
						`module_folder` = '$module_folder' , 
						`mother_menu_id` = $mother_menu_id,
						`sub_menu_flag` = $sub_menu_flag,
						`menu_contant` = '$menu_contant',
						`common_for_all` = $common_for_all,
						`menu_order` = $menu_order
						WHERE	`menu_id` = $menu_id;";
		$sql = mysql_query($update_query);
		if($sql)
		echo "Data modified successfully";
		else
		echo "Error";
?>