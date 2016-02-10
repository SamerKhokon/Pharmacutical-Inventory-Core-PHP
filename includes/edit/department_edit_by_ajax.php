<?php     include("../../db.php");

		$department_id = trim($_POST["department_id"]);
		$dept_name = trim($_POST["dept_name"]);
		$dept_code = trim($_POST["dept_code"]);
		$dept_address = trim($_POST["dept_address"]);
		$dept_contact_no = trim($_POST["dept_contact_no"]);
		$dept_email = trim($_POST["dept_email"]);
		
	
		$update_query = "UPDATE `decent_pharma_db`.`hr_emp_dept_info` 
						SET
						`dept_name` = '$dept_name',
						`dept_code` = '$dept_code' , 						
						`dept_address` = '$dept_address' , 
						`dept_contact_no` = '$dept_contact_no' ,
						`dept_email` = '$dept_email'
						WHERE	`dep_id` = '$department_id';";
		$sql = mysql_query($update_query);
		if($sql)
		echo "Data modified successfully";
		else
		echo "Error";
?>