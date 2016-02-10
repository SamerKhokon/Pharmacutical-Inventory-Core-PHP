<?php    include("../../../db.php");
             session_start();

			 $slno    = trim($_POST["rid"]);
			 $delete = "delete from `courier_service_info` where courier_service_id=$slno";
			 $sql      = mysql_query($delete);
			 
			 if($sql)
			  echo "Data removed successfully";
			 else
			  echo "Error";
			 //courier_delete.php
?>