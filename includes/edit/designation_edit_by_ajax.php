<?php     include("../../db.php");

		$designation_id = trim($_POST["designation_id"]);
		$designation = trim($_POST["designation"]);
		$designation_code = trim($_POST["designation_code"]);
		
		
	
		$update_query = "UPDATE `decent_pharma_db`.`hr_emp_designation` 
						SET
						`designation` = '$designation',
						`designation_code` = '$designation_code' 
						WHERE	`designation_id` = '$designation_id';";
		$sql = mysql_query($update_query);
		if($sql)
		echo "Data modified successfully";
		else
		echo "Error";
?>