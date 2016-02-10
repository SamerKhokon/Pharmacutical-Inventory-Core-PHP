<?php	include("../db.php");
			  
	$code = strtolower(trim($_POST["code"]));
	
	if(is_exist($code)!=0){			
		echo  "yes";
	}
	else{
		echo "no";
	}
			
	function is_exist($code) 
	{
		$str = "select count(*) from hr_emp_dept_info where 
		lower(dept_code)='$code'";
		$sql = mysql_query($str);
		$res = mysql_fetch_row($sql);
		return $res[0];
	}
?>