<?php     include("../../db.php");
		/*
		var dataStr = "user_group_id="+user_group_id+"&user_full_name="+user_full_name+"&user_login_id="+user_login_id
						+"&user_password="+user_password+"&user_contact_no="+user_contact_no+"&user_email_no="+user_email_no+"&user_address="+user_address+"&user_id="+user_id;
		*/

		$user_group_id = trim($_POST["user_group_id"]);
		$user_full_name = trim($_POST["user_full_name"]);
		$user_login_id = trim($_POST["user_login_id"]);
		$user_password = trim($_POST["user_password"]);
		$user_contact_no = trim($_POST["user_contact_no"]);
		$user_email = trim($_POST["user_email_no"]);
		$user_address = trim($_POST["user_address"]);
		$user_id = trim($_POST["user_id"]);
		
	
		$update_query = "UPDATE `decent_pharma_db`.`st_user_info` 
						SET
						`user_group_id` = $user_group_id,
						`user_full_name` = '$user_full_name' , 						
						`user_login_id` = '$user_login_id' , 
						`user_password` = '$user_password',
						`user_contact_no` = '$user_contact_no',
						`user_email` = '$user_email',
						`user_address` = '$user_address'
						WHERE	`user_id` = $user_id;";
		$sql = mysql_query($update_query);
		if($sql)
		echo "Data modified successfully";
		else
		echo "Error";
?>