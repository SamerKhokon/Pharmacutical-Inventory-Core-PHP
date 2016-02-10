<?php    /********************************************************************* 
                    Database Configuration file
					Decent Pharmacutical Ltd.
               *********************************************************************/    	
	$server = "localhost";
	$user    = "root";
	$pass   = "";
	$db       = "decent_pharma_db";
	
	$con = mysql_connect($server,$user,$pass);
	mysql_select_db($db,$con);
	//if($con) echo  "database connected"; else echo "database not connected";
?>