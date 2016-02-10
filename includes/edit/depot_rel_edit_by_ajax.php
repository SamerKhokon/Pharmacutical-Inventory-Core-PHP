<?php     include("../../db.php");

		$edr_id = trim($_POST["edr_id"]);
		$employee_id = trim($_POST["employee_id"]);
		$depot_id = trim($_POST["depot_id"]);
		$designation_id = trim($_POST["designation_id"]);
		
		
	
	 $update_query = "UPDATE `decent_pharma_db`.`hr_employee_depot_rel` 
								SET
								`edr_id` = '$edr_id' , 
								`employee_id` = '$employee_id' , 
								`depot_id` = '$depot_id' , 
								`designation_id` = '$designation_id'
								
								
								WHERE
								`edr_id` = '$edr_id'";
									$sql = mysql_query($update_query);
									if($sql)
									echo "Data modified successfully";
									else
									echo "Error";
?>