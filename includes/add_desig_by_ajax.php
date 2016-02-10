<?php   include("../db.php");              
			 $designation_name  = trim($_POST["designation_name"]);
			 $designation_code   = trim($_POST["designation_code"]);
			 $company_id            = trim($_POST["company_id"]);
			 $entry_by                  = trim($_POST["entry_by"]);	
			 $last_update_date    = date('Y-m-d h:i:s');			 
			 $entry_date              = date('Y-m-d');	 
			 
			if(is_exist($designation_name)==0)  
			{
				$insert_designation_str = "INSERT INTO `decent_pharma_db`.`hr_emp_designation`(`designation`, `designation_code`,
				`entry_by`, `entry_date`,  `last_update_date`, `company_id`, `active_flag`)	VALUES	('$designation_name', '$designation_code', $entry_by, 
				'$entry_date', 	now(), 	$company_id, 	'Y'	);";
			
				$sql = mysql_query($insert_designation_str);
				if($sql)
				echo  "Data saved successfully!";
				else
				echo "Error";
			}else{
			  echo "Data already exist!";
			}
			
			function is_exist($designation_name) 
			{
				$str = "select count(*) from hr_emp_designation where 
				designation='$designation_name'";
				$sql = mysql_query($str);
				$res = mysql_fetch_row($sql);
				return $res[0];
			}
?>