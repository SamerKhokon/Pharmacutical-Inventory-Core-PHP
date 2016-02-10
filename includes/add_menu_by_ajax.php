<?php   include("../db.php");
              
			 /*
			 var dataStr = "menu_name="+menu_name+"&menu_contant="+menu_contant+"&module_id="+module_id+"&module_folder="+module_folder+"&mother_menu_id="+mother_menu_id+"&sub_menu_flag="+sub_menu_flag+"&common_for_all="+common_for_all+"&menu_order="+menu_order+"&entry_by="+entry_by;
			 */ 
		     $menu_name  = trim($_POST["menu_name"]);
			 $menu_name = str_replace('~and~', '&', $menu_name);										 
			 $menu_contant = trim($_POST["menu_contant"]);
			 $module_id = trim($_POST["module_id"]);	
			 $module_folder = trim($_POST["module_folder"]);
			 $mother_menu_id = trim($_POST["mother_menu_id"]);
			 $sub_menu_flag = trim($_POST["sub_menu_flag"]);
			 $common_for_all = trim($_POST["common_for_all"]);
			 $menu_order = trim($_POST["menu_order"]);
			 $entry_by = trim($_POST["entry_by"]);	
			 
			 
			if(is_exist($menu_name,$module_id,$mother_menu_id)==0)  
			{
			
			
			 	$str = "insert into decent_pharma_db.st_menu_info 
				(menu_name, module_id, module_folder, mother_menu_id, 
				sub_menu_flag, 
				menu_contant, 
				common_for_all, 
				menu_order, 
				entry_by, 
				entry_date, 
				active_flag
				)
				values
				('$menu_name', $module_id, '$module_folder', $mother_menu_id, 
				$sub_menu_flag, 
				'$menu_contant', 
				$common_for_all, 
				$menu_order, 
				$entry_by, 
				now(), 
				'Y'
				)";			
			
			
				$sql = mysql_query($str);
				if($sql)
				echo  "Data saved successfully!";
				else
				echo "Error";
			}else{
			  echo "Data already exist!";
			}
			
			function is_exist($menu_name, $module_id, $mother_menu_id) {
				$str = "select count(*) from st_menu_info where menu_name='$menu_name' and module_id=$module_id and mother_menu_id=$mother_menu_id";
				$sql = mysql_query($str);
				$res = mysql_fetch_row($sql);
				return $res[0];
			}
?>