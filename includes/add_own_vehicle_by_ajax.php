<?php  include("../db.php");
             session_start();
			$vehicle_type		  = trim($_POST["vehicle_type"]);
			$regi_no				  = trim($_POST["regi_no"]);
			$managing_person_id = trim($_POST["managing_person"]);
			$vehicle_name    = trim($_POST["vehicle_name"]);
			$entry_by				= $_SESSION['LOGIN_USERID'];	
			$company_id			= $_SESSION['COMPANY_ID'];
			$entry_date 			= date('Y-d-m h:i:s');						 
            $managing_person = get_managing_person_name($managing_person_id , $company_id);
			
			$str = "INSERT INTO `decent_pharma_db`.`vehicle_info` (`vehicle_type`,`vehicle_name`, `regi_no`, 	`managing_person_id`, 
	`managing_person_name`, `entry_by`, `entry_date`,  `company_id`, 	`active_flag`	)
	VALUES('$vehicle_type','$vehicle_name', '$regi_no', 	$managing_person_id, 	'$managing_person', $entry_by, 
	'$entry_date', 	$company_id, 	'Y'	);";
	
	        
			
			$sql = mysql_query($str);
				if($sql)
				echo  "Data saved successfully!";
				else
				echo "Error";
	
	
	    function get_managing_person_name($managing_person_id , $company_id) {
		   $str = "SELECT emp_name FROM `hr_employee_info` WHERE  employee_id=$managing_person_id and
		   company_id=$company_id";
		   $sql = mysql_query($str);
		   $res = mysql_fetch_row($sql);
	      return $res[0];	   
	    }
?>