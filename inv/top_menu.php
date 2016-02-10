		<!-- Blue Menu --><?php include("../db.php");
		             $string_hr_top_menu_str = "SELECT menu_id,menu_name FROM st_menu_info WHERE module_id=2 and active_flag='Y'";
		?>
		<ul id="menu" class="blue">
			<li><a href="javascript:void(0);">Home</a></li>
			<?php  //if($con) echo "1";else echo "0";
			       $string_hr_top_menu_sql = mysql_query($string_hr_top_menu_str);
			        while($rs = mysql_fetch_array($string_hr_top_menu_sql)) {
			   ?>
			<li><a href="?mid=<?php echo $rs[0];?>"><?php echo $rs[1];?></a></li>
			<?php  } ?>
			<li><a href="../logout.php">Logout</a></li>			
		</ul>