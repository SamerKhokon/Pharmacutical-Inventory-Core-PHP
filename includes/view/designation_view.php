<?php   include("../../db.php");
	
	$designation_id = $_REQUEST['id'];              
	$str = "select * from hr_emp_designation where designation_id=$designation_id";
	$sql = mysql_query($str);
	$data = "";
	if($row = mysql_fetch_array($sql))
	{
		$data = $row['designation']."|".$row['designation_code'];
		
	?>
	<h1 class="pop_head"> Designation Information </h1>

    <table class="pop_table">
        <tr>
            <td valign="top">Designation Name </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['designation'];?></td>
        </tr>
        <tr>
            <td valign="top">Designation Code </td>
            <td valign="top">&nbsp;&nbsp;</td>
            <td valign="top">:&nbsp;<?php echo $row['designation_code'];?></td>
        </tr>
        
        <!--<tr>
        	<td></td>
            <td></td>
            <td><input type="button" id="btn_close" value="OK" onclick="close_popup();" /></td>
        </tr> -->
    </table> 
    <?php
	}
	
?>                                                                                                