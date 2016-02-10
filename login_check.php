<?php   include("db.php");			  
			  $username = trim($_POST["username"]);
			  $password = trim($_POST["password"]);
			  
			 $str = "select company_id,company_name,company_address from st_company_info where active_flag='Y'"; 
			 $sql = mysql_query($str);
			 $res = mysql_fetch_row($sql);
			 $company_id = $res[0];
			 $company_name = $res[1];
			 $company_address = $res[2];
			 
			 $user_check_str = "SELECT COUNT(*),user_id, user_full_name FROM st_user_info WHERE user_login_id='$username' AND user_password='$password' AND active_flag='Y'";
			 $user_check_sql = mysql_query($user_check_str);
			 $user_check_res = mysql_fetch_row($user_check_sql);
    	     $flag  = $user_check_res[0];
			 
			  if($flag!=0) {			    
			     session_start();
				 $_SESSION["LOGIN_USER"]        = $user_check_res[2];//$username;
				 $_SESSION["LOGIN_USERID"]        = $user_check_res[1];
				 $_SESSION["LOGIN_IP"]               = $_SERVER["REMOTE_ADDR"];
				 $_SESSION["COMPANY_ID"]        = $company_id;
				 $_SESSION["COMPANY_NAME"] = $company_name;
				 $_SESSION["COMPANY_ADDRESS"] = $company_address;
				 echo 1;
			  }else{
			    echo 0;
			  }
?>