<?php  include("../../db.php");
             session_start();

			 $slno    = trim($_POST["rid"]);
			 $delete = "delete from `product_batch_info` where product_batch_id=$slno";
			 $sql      = mysql_query($delete);
			 
			 if($sql)
			  echo "Data removed successfully";
			 else
			  echo "Error";
?>