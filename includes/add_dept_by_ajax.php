<?php	include("../db.php");
			  
	$department_name 			= trim($_POST["department_name"]);										 
	$department_code 			= trim($_POST["department_code"]);
	$department_address 		= trim($_POST["department_address"]);
	$department_contact_no = trim($_POST["department_contact_no"]);
	$department_email 			= trim($_POST["department_email"]);			 
	$company_id 					= trim($_POST["company_id"]);
	$entry_by 						= trim($_POST["entry_by"]);	
	$last_update_date 			= date('Y-m-d h:i:s');			 
	$entry_date 						= date('Y-m-d');			 

	if(is_exist($department_name)==0)  
	{			
		$str = "INSERT INTO `decent_pharma_db`.`hr_emp_dept_info` (`dept_name`, `dept_code`, `dept_address`, `dept_contact_no`, `dept_email`, `entry_by`, `entry_date`, `company_id`, `active_flag`) VALUES('$department_name', '$department_code', '$department_address', '$department_contact_no', '$department_email', '$entry_by', now(), $company_id, 'Y')";			
		$sql = mysql_query($str);
		if($sql)
			echo  "Data saved successfully!";
		else
			echo "Error";
	}
	else{
		echo "Data already exist!";
	}
			
	function is_exist($department_name) 
	{
		$str = "select count(*) from hr_emp_dept_info where 
		dept_name='$department_name'";
		$sql = mysql_query($str);
		$res = mysql_fetch_row($sql);
		return $res[0];
	}
?>