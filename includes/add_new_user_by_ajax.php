<?php  include("../db.php");
            session_start();		
		    
			/*
			var dataStr = "user_group_id="+user_group_id+"&user_full_name="+user_full_name+"&user_login_id="+user_login_id
						+"&user_password="+user_password+"&user_contact_no="+user_contact_no+"&user_email_no="+user_email_no+"&user_address="+user_address;
			*/
			$user_group_id          	= trim($_POST["user_group_id"]);
			$user_full_name         	= trim($_POST["user_full_name"]);
			$user_login_id     	= trim($_POST["user_login_id"]);
			$user_password   = trim($_POST["user_password"]);
            $user_contact_no   = trim($_POST["user_contact_no"]);
            $user_email_no   = trim($_POST["user_email_no"]);
            $user_address   = trim($_POST["user_address"]);
            $entry_by					= $_SESSION['LOGIN_USERID'];	
			$company_id			= $_SESSION['COMPANY_ID'];
						
			$str = "INSERT INTO `decent_pharma_db`.`st_user_info`	(`user_group_id`, `user_full_name`, `user_login_id`,
			`user_password`, `user_contact_no`, `user_email`, `user_address`, `entry_by`, `entry_date`, `active_flag`, `company_id`)	VALUES($user_group_id, 
			'$user_full_name', '$user_login_id', '$user_password', '$user_contact_no', '$user_email_no', '$user_address', $entry_by, now(), 'Y', $company_id);";			
			//echo "<br>";
			$sql = mysql_query($str);
			if($sql)
			echo "Data saved successfully!";
			else
			echo "Error";			
?>