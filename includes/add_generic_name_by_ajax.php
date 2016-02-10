<?php include("../db.php");
          session_start();
				$generic_name  =  trim($_POST["generic_name"]);
				$generic_code   =  trim($_POST["generic_code"]);				
				$entry_by 		  = $_SESSION["LOGIN_USERID"];
				$entry_date 		  = date("Y-m-d");
				$company_id 	  = $_SESSION["COMPANY_ID"];
		
				if(  is_exist($generic_name) == 0 ) 
				{
					$str = "INSERT INTO `decent_pharma_db`.`generic_name_info` (`generic_name`, 
					`generic_name_code`,`entry_by`,`entry_date`,`company_id`,`active_flag`)	VALUES
						('$generic_name','$generic_code',$entry_by,now(),$company_id,'Y');";
					$sql = mysql_query($str);
					if($sql)
						echo "Data saved successfully";
					else
						echo "Error";
				}
				else
				{
				   echo "Data already exist!";
				}

				function is_exist($generic_name) 
				{
					 $str = "select count(*) from generic_name_info where  generic_name='$generic_name'";
					 $sql = mysql_query($str);
					 $res = mysql_fetch_row($sql);
					 return $res[0];
				}
?>