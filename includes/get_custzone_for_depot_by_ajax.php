<?php	include("../db.php");
			  
	$depot_id = trim($_POST["depot_id"]);
	
	$str = "select zone_id, zone_name from inv_customer_zone 
	where depot_id=$depot_id";
	$sql = mysql_query($str);
	while($row = mysql_fetch_array($sql))
	{
		$option .= '<option value="'.$row[0].'">'.$row[1].'</option>';
	}
	if($option=='')
		$option = '<option value=""></option>';
	echo $option;
?>