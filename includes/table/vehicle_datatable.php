<?php include("../../db.php");  
       /**************************************
	     DB Connection check
	   **************************************
	   if($con) echo 1;else echo 0;
	   ***************************************/
	   session_start();
	   $company_id = $_SESSION["COMPANY_ID"];
	   $str = "SELECT * FROM `vehicle_info` WHERE company_id=$company_id";
	   $sql = mysql_query($str);
	   
?>
 <script type="text/javascript" charset="utf-8">
                $(document).ready(function() {
                    $('#example').dataTable( {
                        "sPaginationType": "full_numbers"
                    } );
                } );
            </script>
<div id="demo">
		<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
			<thead class="tab_head">
				<tr>
					<th>Vehicle Type</th>
					<th>Registration No</th>
					<th>Managing Person</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>		
			
			     <?php  while($res = mysql_fetch_assoc($sql) ) {			 
				                  $vehicle_type = $res['vehicle_type'];
								  $regi_no = $res['regi_no'];
								  $managing_person_name = $res['managing_person_name'];
				 ?>
				 <tr class="gradeA">
				   <td align="center"><?php echo $vehicle_type;?></td>
				   <td align="center"><?php echo $regi_no;?></td>
				   <td align="center"><?php echo $managing_person_name;?></td>
				  <td align="center"><a href=""><img src="./media/images/view-icone-6308-128.png" width="20" height="20" alt="View" title="View"></a><a href=""><img src="./media/images/edit-notes.png" width="20" height="20" alt="Edit" title="Edit"></a><a href=""><img src="./media/images/Delete_Icon.png" width="20" height="20" alt="Delete" title="Delete"></a></td>
				 </tr>		 
				 <?php } ?>				 
			</tbody>
			<tfoot class="tab_fot">				
				<tr>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
				</tr>
			</tfoot>
		</table>
</div>