<?php  include("../db.php");
             session_start();
			$employee_id 		 = trim($_POST["emp_id"]);
			$superior_emp_id = trim($_POST["superior_emp_id"]);
			$entry_by 			  = $_SESSION['LOGIN_USERID'];	
			$company_id		  = $_SESSION['COMPANY_ID'];
			$entry_date 			  = date('Y-d-m');	
	
			 $str = "INSERT INTO `decent_pharma_db`.`hr_employee_hierarchy` (`employee_id`, 
					`superior_emp_id`, `company_id`, `entry_by`, `entry_date`, `active_flag`)	VALUES($employee_id, 
					$superior_emp_id, $company_id, $entry_by, now(), 'Y')";	
	       $sql = mysql_query($str);
	 
           if($sql) 
				echo "Data saved successfully";
		   else
				echo "Error";
?>