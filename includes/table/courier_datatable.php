<?php include("../../db.php");  
       /**************************************
	     DB Connection check
	   **************************************
	   if($con) echo 1;else echo 0;
	   ***************************************/
	   session_start();
	   $company_id = $_SESSION["COMPANY_ID"];
	   $str = "SELECT * FROM `courier_service_info` WHERE company_id=$company_id";
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
					<th>Name</th>
					<th>Code</th>
					<th>Address</th>
					<th>Contact Person</th>
					<th>Contact No</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>		
			
			     <?php  while($res = mysql_fetch_assoc($sql) ) {			 
				                  $courier_service_id 			  = $res['courier_service_id'];
								  $courier_service_company = $res['courier_service_company'];
								  $csc_code 					      = $res['csc_code'];
								  $csc_address            = $res['csc_address'];								  
								  $csc_contact_person = $res['csc_contact_person'];								  
								  $csc_contact_no        = $res['csc_contact_no'];								  
				 ?>
				 <tr class="gradeA">
				   <td align="center"><?php echo $courier_service_company;?></td>
				   <td align="center"><?php echo $csc_code;?></td>
				   <td align="center"><?php echo $csc_address;?></td>
				   <td align="center"><?php echo $csc_contact_person;?></td>
				   <td align="center"><?php echo $csc_contact_no;?></td>				   
				  <td align="center">
				  <a href="javascript:void(0);"  ><img src="./media/images/view-icone-6308-128.png" width="20" height="20" alt="View" title="View"></a>
				  <a href="javascript:void(0);"   id="<?php echo $courier_service_id; ?>" class="courier_edit"><img src="./media/images/edit-notes.png" width="20" height="20" alt="Edit" title="Edit"></a>
				  <a href="javascript:void(0);"   id="<?php echo $courier_service_id; ?>" class="courier_delete"><img src="./media/images/Delete_Icon.png" width="20" height="20" alt="Delete" title="Delete"></a>
				 </td>
				 </tr>		 
				 <?php } ?>				 
			</tbody>
			<tfoot class="tab_fot">				
				<tr>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>					
				</tr>
			</tfoot>
		</table>
</div>