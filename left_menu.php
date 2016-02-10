 <?php  //session_start();
if(isset($_SESSION['LOGIN_USER'])) {        
?>		
		
    <div id="sidebar" class="" >
        <h2 class="side_head">Software Name</h2>
        <ul>
			<?php
            if(isset($_REQUEST['mdid']) && isset($_REQUEST['mdf']))
			{
				$mdid = trim($_REQUEST['mdid']);
				$mdf = trim($_REQUEST['mdf']);
				$sql_module_left_menu = "select menu_id, menu_name, menu_contant, sub_menu_flag from st_menu_info where active_flag='Y' and mother_menu_id=0 and module_id=".trim($_REQUEST['mdid'])." order by menu_order";
				$res_module_left_menu = mysql_query($sql_module_left_menu);
				while($row_module_left_menu = mysql_fetch_array($res_module_left_menu))
				{
					$main_menu_contant = '';
					$main_menu_id = $row_module_left_menu['menu_id'];
					$main_menu_name = $row_module_left_menu['menu_name'];
					$main_menu_contant = trim($row_module_left_menu['menu_contant']);
					$main_menu_sub_flag = $row_module_left_menu['sub_menu_flag'];
					if($main_menu_sub_flag==0)
					{
						if($main_menu_contant!='')
							echo '<li><a href="?mdid='.$mdid.'&mdf='.$mdf.'&page='.$main_menu_contant.'" class="head">'.$main_menu_name.'</a></li>';
						else	
							echo '<li><a href="" class="head">'.$main_menu_name.'</a></li>';		
								
					}
					else
					{
						echo '<li><a href="" class="head">'.$main_menu_name.'</a><ul>';
						$sql_sub_menu = "select menu_id, menu_name, menu_contant, sub_menu_flag from st_menu_info where active_flag='Y' and mother_menu_id=".$main_menu_id." order by menu_order";
						$res_sub_menu = mysql_query($sql_sub_menu);
						while($row_sub_menu = mysql_fetch_array($res_sub_menu))
						{
							$menu_id = $row_sub_menu['menu_id'];
							$menu_name = $row_sub_menu['menu_name'];
							$menu_contant = $row_sub_menu['menu_contant'];
							
							//echo '<li><a href="?mdid='.$mdid.'&mdf='.$mdf.'&mid='.$main_menu_id.'&smid='.$menu_id.'&page='.$menu_contant.'" class="head1">'.$menu_name.'</a></li>';
							echo '<li><a href="?mdid='.$mdid.'&mdf='.$mdf.'&page='.$menu_contant.'" class="head1">'.$menu_name.'</a></li>';
						}
						echo '</ul></li>';
					}
				}
			?>
            <?php
            }
			?>
            <!--
				<li ><a href="" class="head">Lorem</a>
                <li ><a href="" class="head1">ipsum</a></li>
				<li><a href="" class="head1">dolor</a></li>
                </li>				
				<li><a href="" class="head">sit</a>
					<ul>             
						<li><a href="" class="head1">amet</a></li>
						<li><a href="" class="head1">consectetuer</a></li>
						<li><a href="" class="head1">adipiscing</a></li>
					</ul>                
                </li>
				<li><a href="" class="head">consectetuer</a>             
					<ul>
							<li><a href="" class="head1">elit</a></li>
							<li><a href="" class="head1">Donec</a></li>
							<li><a href="" class="head1">risus</a></li>
							<li><a href="" class="head1">Lorem</a></li>
							<li><a href="" class="head1">ipsum</a></li>
							<li><a href="" class="head1">dolor</a></li>
							<li><a href="" class="head1">sit</a></li>
							<li><a href="" class="head2">Amet</a>
								<ul>
									<li><a href="" class="head1">adipiscing</a></li>
									<li><a href="" class="head1">elit</a></li>
						   
								</ul>                
							</li>               
					</ul>                
				</li>				
				<li><a href="" class="head">sit</a></li>	 -->			
        </ul>
    </div>
<?php 
}
else{ 
?>
<div id="sidebar" class="">
    <h2 class="side_head">Company Logo</h2>
    <ul></ul>
</div>
<?php  
}?>		