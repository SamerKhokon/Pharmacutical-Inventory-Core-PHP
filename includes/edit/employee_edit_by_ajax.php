<?php     include("../../db.php");

		
		$employee_id = trim($_POST["employee_id"]);	
		$employee_code = trim($_POST["employee_code"]);
		$dept_id = trim($_POST["dept_id"]);
		$designation_id = trim($_POST["designation_id"]);
		$emp_name = trim($_POST["emp_name"]);
		$emp_father = trim($_POST["emp_father"]);
		$emp_mother = trim($_POST["emp_mother"]);
		$emp_pre_address = trim($_POST["emp_pre_address"]);
		$emp_par_address = trim($_POST["emp_par_address"]);
		$emp_contact_no = trim($_POST["emp_contact_no"]);
		$emp_gender = trim($_POST["emp_gender"]);
		$emp_dob = trim($_POST["emp_dob"]);
		$emp_national_id = trim($_POST["emp_national_id"]);
		$emp_bank_acc_no = trim($_POST["emp_bank_acc_no"]);
		$emp_maritual_status = trim($_POST["emp_maritual_status"]);
		$prev_experience = trim($_POST["prev_experience"]);
		$emp_edu_qualification = trim($_POST["emp_edu_qualification"]);
		$emp_dl_no = trim($_POST["emp_dl_no"]);
		$joining_date = trim($_POST["joining_date"]);
		
		
	
		 $update_query = "UPDATE `decent_pharma_db`.`hr_employee_info` 
							SET
							`dept_id` = '$dept_id' , 
							`designation_id` = '$designation_id' , 
							`emp_name` = '$emp_name' , 
							`emp_father` = '$emp_father' , 
							`emp_mother` = '$emp_mother' , 
							`emp_pre_address` = '$emp_pre_address' , 
							`emp_par_address` = '$emp_par_address' , 
							`emp_contact_no` = '$emp_contact_no' , 
							`emp_gender` = '$emp_gender' , 
							`emp_dob` = str_to_date('$emp_dob','%m/%d/%Y') , 
							`emp_national_id` = '$emp_national_id' , 
							`joining_date` = str_to_date('$joining_date','%m/%d/%Y') , 
							`emp_dl_no` = '$emp_dl_no' , 
							`emp_maritual_status` = '$emp_maritual_status' , 
							`prev_experience` = '$prev_experience' , 
							`emp_bank_acc_no` = '$emp_bank_acc_no' , 
							`emp_edu_qualification` = '$emp_edu_qualification' 
						
							
							WHERE
							`employee_id` = '$employee_id' ";
								$sql = mysql_query($update_query);
								if($sql)
								echo "Data modified successfully";
								else
								echo "Error";
?>