<?php include("../db.php");
             session_start();
			 
			$company_id	  = $_SESSION['COMPANY_ID'];
			$employee_id    = trim($_POST["emp_id"]);
			$depot_id  		  = trim($_POST["depot_id"]);
			$designation_id = trim($_POST["desig_id"]);
			$designation 	  = get_designation($designation_id,$company_id);			
			$entry_by 		  = $_SESSION['LOGIN_USERID'];				
			$entry_date 		  = date('Y-d-m h:i:s');				

			
			 $str = "INSERT INTO `decent_pharma_db`.`hr_employee_depot_rel` (`employee_id`, `depot_id`, `designation_id`, `designation`, 
				`entry_by`, `entry_date`, `company_id`, 	`active_flag`	)	VALUES	($employee_id, 	$depot_id, $designation_id, 	'$designation', 
				$entry_by, now(), $company_id,	'Y');";
			$sql = mysql_query($str);	
			
			if($sql) 
				echo "Data saved successfully";
			else
				echo "Error";					
		
		
			function get_designation($desig_id,$company_id)
		    {
		      $str = "SELECT designation_code FROM `hr_emp_designation` WHERE company_id=$company_id AND designation_id=$desig_id";
			  $sql = mysql_query($str);
			  $res = mysql_fetch_row($sql);
			  return $res[0];
			}
?>