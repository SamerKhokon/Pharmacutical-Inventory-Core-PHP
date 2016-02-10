 <?php  //session_start();
             if(isset($_SESSION['LOGIN_USER'])) {        
 ?>		
		
		<div id="sidebar" class="">
             
			<h2 class="side_head">Company Logo</h2>
			
			
			<ul>
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
<?php }else{ ?>
		<div id="sidebar" class="">
			<h2 class="side_head">Company Logo</h2>
			<ul>
			</ul>
		</div>
<?php  }?>		