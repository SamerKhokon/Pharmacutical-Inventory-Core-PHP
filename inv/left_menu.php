		<?php include("../db.php");  
		     if(isset($_GET["mid"])) {
					 $main_menu_id = $_GET["mid"];  
					 if($main_menu_id=="") {
					 $main_menu_id = 0;
					 }else{
					   $main_menu_id = $main_menu_id;
					 }
					  $left_menu_str = "select * from st_left_menu where module='inv' and main_menu_id=$main_menu_id";
					 $left_menu_sql = mysql_query($left_menu_str);
		?>
		<div id="sidebar" class="">
			<h2 class="side_head">Company Logo</h2>
			<ul>
			    <?php  while($r = mysql_fetch_array($left_menu_sql) ){  ?>
				<li ><a href="?mid=<?php echo $main_menu_id;?>&page=<?php echo $r[1];?>" class="head"><?php echo $r[2]; ?></a>
				<?php  }  ?>
			</ul>
		</div>
		<?php }else{ ?>
		<div id="sidebar" class="">
			<h2 class="side_head">Company Logo</h2>
			<ul><li>&nbsp;</li>
			</ul>
		</div>
		
		<?php  }?>