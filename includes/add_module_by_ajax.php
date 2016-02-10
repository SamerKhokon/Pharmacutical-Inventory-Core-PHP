<?php   include("../db.php");
              
			 /*var dataStr = "module_name="+module_name+"&module_folder="+module_folder+"&company_id="+company_id+"&entry_by="+entry_by;*/ 
		     $module_name  = trim($_POST["module_name"]);
			 $module_name = str_replace('~and~', '&', $module_name);										 
			 $module_folder = trim($_POST["module_folder"]);
			 $last_update_by = trim($_POST["entry_by"]);	
			 
			 
			if(is_exist($module_name)==0)  
			{
			
			
			 	$str = "INSERT INTO `decent_pharma_db`.`st_module_info` (`module_name`, `module_folder`, `active_flag`, `last_update_by`, `last_update_date`) VALUES('$module_name', '$module_folder', 'Y', $last_update_by, now())";			
			
			
				$sql = mysql_query($str);
				if($sql)
				echo  "Data saved successfully!";
				else
				echo "Error";
			}else{
			  echo "Data already exist!";
			}
			
			function is_exist($module_name) {
				$str = "select count(*) from st_module_info where module_name='$module_name'";
				$sql = mysql_query($str);
				$res = mysql_fetch_row($sql);
				return $res[0];
			}
?>