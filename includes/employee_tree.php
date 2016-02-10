<style>
#search-form {
	background: #e1e1e1; /* Fallback color for non-css3 browsers */
	width: 355px;
	
	/* Gradients */
	background: -webkit-gradient( linear,left top, left bottom, color-stop(0, rgb(243,243,243)), color-stop(1, rgb(225,225,225)));
	background: -moz-linear-gradient( center top, rgb(243,243,243) 0%, rgb(225,225,225) 100%);
	
	/* Rounded Corners */
	border-radius: 17px; 
	-webkit-border-radius: 17px;
	-moz-border-radius: 17px;
	
	/* Shadows */
	box-shadow: 1px 1px 2px rgba(0,0,0,.3), 0 0 2px rgba(0,0,0,.3); 
	-webkit-box-shadow: 1px 1px 2px rgba(0,0,0,.3), 0 0 2px rgba(0,0,0,.3);
	-moz-box-shadow: 1px 1px 2px rgba(0,0,0,.3), 0 0 2px rgba(0,0,0,.3);
}

/*** TEXT BOX ***/
input[type="text"]{
	background: #fafafa; /* Fallback color for non-css3 browsers */
	
	/* Gradients */
	background: -webkit-gradient( linear, left bottom, left top, color-stop(0, rgb(250,250,250)), color-stop(1, rgb(230,230,230)));
	background: -moz-linear-gradient( center top, rgb(250,250,250) 0%, rgb(230,230,230) 100%);
	
	border: 0;
	border-bottom: 1px solid #fff;
	border-right: 1px solid rgba(255,255,255,.8);
	font-size: 16px;
	margin: 4px;
	padding: 2px;
	width: 250px;
	
	/* Rounded Corners */
	border-radius: 17px; 
	-webkit-border-radius: 17px;
	-moz-border-radius: 17px;
	
	/* Shadows */
	box-shadow: -1px -1px 2px rgba(0,0,0,.3), 0 0 1px rgba(0,0,0,.2);
	-webkit-box-shadow: -1px -1px 2px rgba(0,0,0,.3), 0 0 1px rgba(0,0,0,.2);
	-moz-box-shadow: -1px -1px 2px rgba(0,0,0,.3), 0 0 1px rgba(0,0,0,.2);
}

/*** USER IS FOCUSED ON TEXT BOX ***/
input[type="text"]:focus{
	outline: none;
	background: #fff; /* Fallback color for non-css3 browsers */
	
	/* Gradients */
	background: -webkit-gradient( linear, left bottom, left top, color-stop(0, rgb(255,255,255)), color-stop(1, rgb(235,235,235)));
	background: -moz-linear-gradient( center top, rgb(255,255,255) 0%, rgb(235,235,235) 100%);
}

/*** SEARCH BUTTON ***/
input[type="button"]{
	background: #44921f;/* Fallback color for non-css3 browsers */
	
	/* Gradients */
	background: -webkit-gradient( linear, left top, left bottom, color-stop(0, rgb(79,188,32)), color-stop(0.15, rgb(73,157,34)), color-stop(0.88, rgb(62,135,28)), color-stop(1, rgb(49,114,21)));
	background: -moz-linear-gradient( center top, rgb(79,188,32) 0%, rgb(73,157,34) 15%, rgb(62,135,28) 88%, rgb(49,114,21) 100%);
	
	border: 0;
	color: #eee;
	cursor: pointer;
	float: right;
	font: 16px Arial, Helvetica, sans-serif;
	font-weight: bold;
	height: 30px;
	margin: 1px 4px 0;
	text-shadow: 0 -1px 0 rgba(0,0,0,.3);
	width: 84px;
	outline: none;
	
	/* Rounded Corners */
	border-radius: 30px; 
	-webkit-border-radius: 30px;
	-moz-border-radius: 30px;
	
	/* Shadows */
	box-shadow: -1px -1px 1px rgba(255,255,255,.5), 1px 1px 0 rgba(0,0,0,.4);
	-moz-box-shadow: -1px -1px 1px rgba(255,255,255,.5), 1px 1px 0 rgba(0,0,0,.2);
	-webkit-box-shadow: -1px -1px 1px rgba(255,255,255,.5), 1px 1px 0 rgba(0,0,0,.4);
}
/*** SEARCH BUTTON HOVER ***/
input[type="submit"]:hover {
	background: #4ea923; /* Fallback color for non-css3 browsers */
	
	/* Gradients */
	background: -webkit-gradient( linear, left top, left bottom, color-stop(0, rgb(89,222,27)), color-stop(0.15, rgb(83,179,38)), color-stop(0.8, rgb(66,143,27)), color-stop(1, rgb(54,120,22)));
	background: -moz-linear-gradient( center top, rgb(89,222,27) 0%, rgb(83,179,38) 15%, rgb(66,143,27) 80%, rgb(54,120,22) 100%);
}
input[type="submit"]:active {
	background: #4ea923; /* Fallback color for non-css3 browsers */
	
	/* Gradients */
	background: -webkit-gradient( linear, left bottom, left top, color-stop(0, rgb(89,222,27)), color-stop(0.15, rgb(83,179,38)), color-stop(0.8, rgb(66,143,27)), color-stop(1, rgb(54,120,22)));
	background: -moz-linear-gradient( center bottom, rgb(89,222,27) 0%, rgb(83,179,38) 15%, rgb(66,143,27) 80%, rgb(54,120,22) 100%);
}
</style>

<?php //session_start();?>
<script type="text/javascript">
$(document).ready(function(){			
		$("#e_search").click(function(){
				var emp_search = $('#emp_search').val();
				$.ajax({
				  type:"post" ,
				  url:"includes/employee_tree_load_by_ajax.php" ,
				  data:"emp_search="+emp_search ,
				  cache:false,
				  success:function(st){
				    $("#main").html($.trim(st));
				  }
				});
		});
});
</script>
	<script type="text/javascript">
		$(function() {
			$("#tree").treeview({
				collapsed: true,
				animated: "medium",
				control:"#sidetreecontrol",
				persist: "location"
			});
		})
		
	</script>
<div id="content">   
<h1 class="employee_tree">Employee Tree</h1>
  <div id="search-form" >
                          <input type="text" id="emp_search"  />
                          <input type="button" value="Search" id="e_search"/>
                        </div>
    <div id="main">
    
		<!--<div id="sidetree">
			<div class="treeheader" style="margin:5px 0px 5px 50px;">
                       
                       
                            
                    </div>
			</div>-->
				<!--<div id="sidetreecontrol"  style="margin:0px 0px 0px 50px; padding:0px 10px 0px 10px; background-color:#356aa0; float:left; color:#FFFFFF">
						 <a href="?#" style="color:#FFFFFF">Collapse All</a> | <a href="?#" style="color:#FFFFFF">Expand All</a> 
				</div>
                 <br/>-->
					<!--<ul id="tree"  style="margin:0px 0px 0px 50px;">
						<?php
						//$search_text = trim($_POST[""]);     
							/*$string = "SELECT distinct superior_emp_id	FROM `hr_employee_hierarchy` AS a ";
							$query = mysql_query($string);
							while($rs = mysql_fetch_assoc($query) ){
							    //$superior_emp_id = $rs['superior_emp_id'];
								$superior[] = $rs['superior_emp_id'];
							} 
							 
							for($i=0;$i<count($superior);$i++)
							{
								$superior_emp_id = $superior[$i];								
								$child_str = "SELECT DISTINCT employee_id FROM `hr_employee_hierarchy` WHERE superior_emp_id=$superior_emp_id";
								$child_sql = mysql_query($child_str);								
							    $emp_name = get_employee_name($superior_emp_id);*/								
?>
							<li><a href="javascript:void(0);"><strong class="tree_head"><?php //echo $emp_name;?></strong></a>
									<ul>
									   <?php
											/*while($res = mysql_fetch_assoc($child_sql)) {
											$emp_id = $res['employee_id'];*/
									   ?>
										<li class="tree_child"><a href="javascript:void(0);"><?php //echo get_employee_name($emp_id);?></a></li>
									  <?php //} ?>	
									</ul>
							</li>
						<?php //} ?>	
					</ul>-->
		</div>
	</div>      
</div>       
<?php 
        
        function get_employee_name($emp_id) {
               $emp_str = "SELECT emp_name,(SELECT designation_code FROM hr_emp_designation WHERE  designation_id=a.designation_id) AS desig
			   FROM `hr_employee_info` as a WHERE employee_id=$emp_id";		  
			  $emp_sql = mysql_query($emp_str);
			  $emp_res =mysql_fetch_row($emp_sql);
			  return $emp_res[0]." (".$emp_res[1].")";
		}
?>
<!-- end content -->