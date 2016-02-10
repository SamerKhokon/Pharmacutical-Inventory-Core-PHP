<?php     include("../../db.php");

		$eh_id = trim($_POST["eh_id"]);
		$employee_id = trim($_POST["employee_id"]);
		$superior_emp_id = trim($_POST["superior_emp_id"]);
		
		
	
		$update_query = "UPDATE `decent_pharma_db`.`hr_employee_hierarchy` 
								SET
								`eh_id` = '$eh_id' , 
								`employee_id` = '$employee_id' , 
								`superior_emp_id` = '$superior_emp_id'
								
								WHERE
								`eh_id` = '$eh_id' ;";
									$sql = mysql_query($update_query);
									if($sql)
									echo "Data modified successfully";
									else
									echo "Error";
?>