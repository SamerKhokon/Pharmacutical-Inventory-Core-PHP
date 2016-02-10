<?php   include("../../db.php");
	
	$user_group_id = $_REQUEST['id'];              
	$str = "select * from st_user_group where user_group_id=$user_group_id";
	$sql = mysql_query($str);
	$data = "";
	if($row = mysql_fetch_array($sql))
	{
		$data = $user_group_id."|".$row['user_group']."|".$row['module_ids']."|".$row['menu_ids'];
		
	}
	echo $data;
?>