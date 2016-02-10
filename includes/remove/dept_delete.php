<?php  include("../../db.php");
             session_start();

			 $slno    = trim($_POST["rid"]);
			 $delete = "delete from `hr_emp_dept_info` where dep_id=$slno";
			 $sql      = mysql_query($delete);
			 
			 if($sql)
			  echo "Data removed successfully";
			 else
			  echo "Error";
?>