<?php include("../db.php");
			//if($con) echo "connected"; else echo "not";
			$search_text = trim($_POST["emp_search"]);     
?>
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
		<div id="sidetree">
			<div class="treeheader" style="margin:5px 0px 5px 50px;">
            </div>
		</div>
				<div id="sidetreecontrol"  style="margin:0px 0px 0px 50px; padding:0px 10px 0px 10px; background-color:#356aa0; float:left; color:#FFFFFF">
						 <a href="?#" style="color:#FFFFFF">Collapse All</a> | <a href="?#" style="color:#FFFFFF">Expand All</a> 
				</div>
                 <br/>
					<ul id="tree"  style="margin:0px 0px 0px 50px;">
						<?php
						  $emp_id = get_employee_id($search_text) ;
							 $string = "SELECT distinct superior_emp_id	FROM `hr_employee_hierarchy` AS a where employee_id=$emp_id";
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
							    $emp_name = get_employee_name($superior_emp_id);								
?>
							<li><a href="javascript:void(0);"><strong class="tree_head"><?php echo $emp_name;?></strong></a>
									<ul>
									   <?php
											while($res = mysql_fetch_assoc($child_sql)) {
											$emp_id = $res['employee_id'];
									   ?>
										<li class="tree_child"><a href="javascript:void(0);"><?php echo get_employee_name($emp_id);?></a></li>
									  <?php } ?>	
									</ul>
							</li>
						<?php } ?>	
					</ul>
	    
    
<?php 
        
		  function get_employee_id($emp_code) {
               $emp_str = "SELECT employee_id
			   FROM `hr_employee_info` as a WHERE employee_code='$emp_code'";		  
			  $emp_sql = mysql_query($emp_str);
			  $emp_res =mysql_fetch_row($emp_sql);
			  return $emp_res[0];
		}
		
		
        function get_employee_name($emp_id) {
               $emp_str = "SELECT emp_name,(SELECT designation_code FROM hr_emp_designation WHERE  designation_id=a.designation_id) AS desig
			   FROM `hr_employee_info` as a WHERE employee_id=$emp_id";		  
			  $emp_sql = mysql_query($emp_str);
			  $emp_res =mysql_fetch_row($emp_sql);
			  return $emp_res[0]." (".$emp_res[1].")";
		}
?>
<!-- end content -->