<?php include("../../db.php");  
       /**************************************
	     DB Connection check
	   **************************************
	   if($con) echo 1;else echo 0;
	   ***************************************/
	   session_start();
	   $company_id = $_SESSION["COMPANY_ID"];
	   $str = "SELECT * FROM `inv_depot_info` WHERE company_id=$company_id";
	   $sql = mysql_query($str);
	   
?>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#example').dataTable( {
			"sPaginationType": "full_numbers"
		} );
		$(".various1").fancybox({
			'titlePosition'		: 'inside',
			'transitionIn'		: 'none',
			'transitionOut'		: 'none'
		});
		$(".various2").fancybox({
			'titlePosition'		: 'inside',
			'transitionIn'		: 'none',
			'transitionOut'		: 'none'
		});
	} );
</script>
<div style="display: none;">
    <div id="inline1" class="pop_div"></div>
</div>
<div style="display: none;">
	<div id="inline2" class="pop_div"></div>
</div>
<div id="demo">
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
        <thead class="tab_head">
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Mobile No</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>		
		<?php  
		while($res = mysql_fetch_assoc($sql) ) {			 
			$depot_id 			  = $res['depot_id'];
			$depot_name = $res['depot_name'];
			$depot_address            = trim($res['depot_address']);
			$depot_address = nl2br($depot_address);  
			$depot_flag              = $res['depot_flag'];
			$depot_contact_no        = $res['depot_contact_no'];								  

		?>
            <tr class="gradeA">
                <td align="center"><?php echo $depot_name;?></td>
                <td><?php echo $depot_address;?></td>
                <td align="center"><?php echo $depot_contact_no;?></td>
                <td align="center"><?php echo $depot_flag;?></td>				   
                <td align="center">
                <a class="various1" href="#inline1" title="" onclick="view_data('<?php echo $depot_id;?>');"><img src="./media/images/view-icone-6308-128.png" width="20" height="20" alt="View" title="View"></a>
                <a class="various2" href="#inline2" title="" onclick="edit_data('<?php echo $depot_id;?>');"><img src="./media/images/edit-notes.png" width="20" height="20" alt="Edit" title="Edit"></a>
                <a href="javascript:void(0);" id="<?php echo $depot_id ;?>" class="depo_delete"><img src="./media/images/Delete_Icon.png" width="20" height="20" alt="Delete" title="Delete"></a></td>
            </tr>		 
		<?php 
		} 
		?>				 
        </tbody>
        <tfoot class="tab_fot">				
            <tr>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>					
                <th>&nbsp;</th>
            </tr>
        </tfoot>
    </table>
</div>