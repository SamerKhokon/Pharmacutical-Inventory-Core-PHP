<?php    include("../../db.php");
             session_start();

			 $slno    = trim($_POST["rid"]);
			 $delete = "delete from `inv_customer_info` where customer_id=$slno";
			 $sql      = mysql_query($delete);
			 
			 if($sql)
			  echo "Data removed successfully";
			 else
			  echo "Error";
			 //courier_delete.php
?>