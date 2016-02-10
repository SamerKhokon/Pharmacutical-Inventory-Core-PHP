<?php  include("../db.php");
            session_start();
			$emp_code 					= trim($_POST["emp_code"]);
			$emp_desig 					= trim($_POST["emp_desig"]);
			$emp_dept 						= trim($_POST["emp_dept"]);
			$emp_name 					= trim($_POST["emp_name"]);
			$emp_father 					= trim($_POST["emp_father"]);
			$emp_mother 					= trim($_POST["emp_mother"]);
			$emp_pre_addres 			= trim($_POST["emp_pre_addres"]);
			$emp_par_address 		= trim($_POST["emp_par_address"]);
			$emp_contact_no 			= trim($_POST["emp_contact_no"]);
			$gender 							= trim($_POST["gender"]);
			$emp_dob 						= trim($_POST["emp_dob"]);
			$emp_marital_status 		= trim($_POST["emp_marital_status"]);
			$emp_nationalid 			= trim($_POST["emp_nationalid"]);
			$emp_bankacct 			 	= trim($_POST["emp_bankacct"]);
			$emp_prev_exp 				= trim($_POST["emp_prev_exp"]);
			$emp_edu_qualification  = trim($_POST["emp_edu_qualification"]);
			$emp_driving_license 	= trim($_POST["emp_driving_license"]);
			$emp_join_date 				= trim($_POST["emp_join_date"]);
            $entry_by 					    = $_SESSION['LOGIN_USERID'];	
			$company_id			 		= $_SESSION['COMPANY_ID'];
			$entry_date 					= date('Y-d-m');
			
        if( is_employee_exist($emp_code) == 0 ) 
		{
				$str = "INSERT INTO `decent_pharma_db`.`hr_employee_info` (`employee_code`, `dept_id`, `designation_id`, `emp_name`, `emp_father`, 
					`emp_mother`, `emp_pre_address`, `emp_par_address`, `emp_contact_no`,`emp_gender`, `emp_dob`, `emp_national_id`, 
					`emp_dl_no`, `emp_maritual_status`, `prev_experience`, `emp_bank_acc_no`, `emp_edu_qualification`, `joining_date`,  `emp_type`, `entry_by`,`entry_date`, 
					`company_id`,`active_flag`)	VALUES	('$emp_code', $emp_dept, $emp_desig, '$emp_name', 	'$emp_father', '$emp_mother', 
					'$emp_pre_addres',	'$emp_par_address', '$emp_contact_no', '$gender',str_to_date('$emp_dob','%d-%m-%Y'),'$emp_nationalid','$emp_driving_license', 
					'$emp_marital_status',	'$emp_prev_exp',	'$emp_bankacct',	'$emp_edu_qualification', 
					str_to_date('$emp_join_date','%d-%m-%Y'),'empoyee',$entry_by,now(),$company_id,'Y');";
			
				$sql = mysql_query($str);
				
				if($sql)
					echo "Data saved successfully";
				else
					echo "Error";	
		}
		else
		{
				echo "Data already exist";
		}	
		
		function is_employee_exist($employee_code)
		{
			  $str = "select count(*) from hr_employee_info where employee_code='$employee_code'";
			  $sql = mysql_query($str);
			  $res = mysql_fetch_row($sql);
			  return $res[0];
		}	
	?>