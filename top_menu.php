<?php  
if(isset($_SESSION['LOGIN_USER'])){
	$active_module = 0;
	if(isset($_REQUEST['mdid']))
		$active_module = trim($_REQUEST['mdid']);
	$string_top_menu_str = "SELECT module_id, module_name, module_folder FROM st_module_info WHERE active_flag='Y'";
	?>		
    <ul id="menu" class="blue">
		<li><a href="index.php">Home</a></li>
		<?php  //if($con) echo "1";else echo "0";
		$string_top_menu_sql = mysql_query($string_top_menu_str);
		while($rs = mysql_fetch_array($string_top_menu_sql)) 
		{
		?>
		<li <?php if($active_module==$rs['module_id']){ echo 'class="active"';}?>><a href="?mdid=<?php echo $rs['module_id'];?>&mdf=<?php echo $rs['module_folder'];?>"><?php echo $rs['module_name'];?></a></li>
		<?php  
		} 
		?>
		<!--<li><a href="logout.php">Logout</a></li> -->
		<!--<li class="active">class will have to set to 'active' for active module</li>-->
	</ul>

    <!--<ul id="menu" class="blue">
		<li><a href="#">Home</a></li>
		<li class="active"><a href="#">About</a></li>
		<li><a href="#">Services</a></li>
		<li><a href="#">Products</a></li>
		<li><a href="#">Contact</a></li>
	</ul> -->
<?php 
}else{
?>
    <ul id="menu" class="blue"></ul>		
<?php  
}?>