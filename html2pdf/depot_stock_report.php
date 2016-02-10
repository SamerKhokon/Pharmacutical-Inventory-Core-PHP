<?php   ob_start();
			include('../db.php');		
			
			$depot_id 	   = trim($_GET["depot_id"]);
			$product_id    = trim($_GET["product_id"]);
			$report_type = trim($_GET["report_type"]);
			$company_id = 1;
	  
			function get_company_details($company_id) 
			{
				$str = "SELECT company_name,company_address,company_contact_no,company_website
					FROM st_company_info WHERE company_id=$company_id";
				$sql = mysql_query($str);
				$res = mysql_fetch_row($sql);
				return $res[0]."#".$res[1]."#".$res[2]."#".$res[3];
			}
	  
			$detail = get_company_details($company_id);
			$parse = explode("#" , $detail);	  
			$company_name 			=  $parse[0];
			$company_address 		= $parse[1];
			$company_contact_no 	= $parse[2];
			$company_website 		= $parse[3];
			
			if($depot_id!="") 
			{
						$where = "where depot_id=$depot_id";
			}
			else
			{
			  $where = "";
			}
			
?>


<table cellpadding="0" cellspacing="0" border="0" align="center">
	<tr><td><b style="font-family:Arial;font-size:25px;"><?php echo $company_name;?></b></td></tr>
	<tr><td><font style="margin-left:40px;"><?php echo $company_address;?></font></td></tr>
	<tr><td><font style="margin-left:60px;"><?php echo $company_contact_no;?></font></td></tr>
	<tr><td><font style="margin-left:40px;"><?php echo $company_website;?></font></td></tr>
	<tr><td><b style="font-family:Arial;margin-left:80px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Stock Report</b></td></tr>
</table>
<br/>

<table align="center" cellpadding="0" cellspacing="0">
<tr>
	<td>Printing Date:</td><td><?php echo date("d/m/Y");?></td>
	<td style="width:50px;"></td><td style="width:50px;"></td>
	<td style="width:50px;"></td><td style="width:50px;"></td>
	<td style="width:50px;"></td><td style="width:50px;"></td>
	<td style="width:50px;"></td><td style="width:50px;"></td>
</tr>
</table>
<br/>

<table  cellpadding="0" cellspacing="0" border="0" align="center">
	<tr>
		<td style="width:90px;border-top:1px solid #000;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>			
		<td style="width:140px;border-top:1px solid #000;border-left:1px solid #fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>
		<td style="width:90px;border-top:1px solid #000;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>			   
		<td style="width:100px;border-top:1px solid #000;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>
		<td style="width:90px;border-top:1px solid #000;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>
		<td style="width:100px;border-top:1px solid #000;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>				
	</tr>  
</table>
<br/>
<table border="0" cellpadding="0" cellspacing="0" width="100%" align="center">
    <thead>
        <tr>
            <th style="width:100px;text-align:center;border-left:#000;border-right:#fff;border-bottom:#000;border-top:#000;background-color:#fff;font-family:Arial;">Depot Type</th>
		    <th style="width:100px;text-align:center;border-left:#000;border-right:#000;border-bottom:#000;border-top:#000;background-color:#fff;font-family:Arial;">Depot Name</th>	
            <th style="width:250px;text-align:center;border-right:#000;border-bottom:#000;border-top:#000;background-color:#fff;font-family:Arial;">Address</th>
			<th style="width:100px;text-align:center;border-left:#fff;border-right:#000;border-bottom:#000;border-top:#000;background-color:#fff;font-family:Arial;">Contact No</th>	
            <th style="width:100px;text-align:right;border-right:#000;border-left:1px solid #fff;border-bottom:#000;border-top:#000;background-color:#fff;font-family:Arial;">Current Stock</th>
        </tr>          
    </thead>
	<tbody>
<?php  
			$i=1;		
            $total_stock = 0;			
			 $depot_stock_str = "SELECT depot_id,depot_type,
			(SELECT depot_name FROM inv_depot_info WHERE depot_id=a.depot_id) AS depot_name,
				(SELECT depot_address FROM inv_depot_info WHERE depot_id=a.depot_id) AS depot_address,
				(SELECT depot_contact_no FROM inv_depot_info WHERE depot_id=a.depot_id) AS depot_contact_no,
				SUM(current_stock) as cst FROM inv_depot_product_stock as a 
				 $where
				GROUP BY depot_id";
				
			$sql = mysql_query($depot_stock_str);	
			
			while($rs = mysql_fetch_assoc($sql)) 
			{
			    $depot_id 				  = $rs['depot_id'];  
				$depot_type 			  = $rs['depot_type'];
				$depot_name 		  = $rs['depot_name'];
				$depot_address 	  = $rs['depot_address'];
				$depot_contact_no = $rs['depot_contact_no'];
				$current_stock         = $rs['cst'];
				$total_stock += $current_stock;
	?>
				<tr>
					<td style="width:90px;border-top:1px solid #fff;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"><?php echo $depot_type;?></td>
					<td style="width:90px;border-top:1px solid #fff;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"><?php echo $depot_name;?></td>					
					<td style="width:250px;border-top:1px solid #fff;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"><?php echo $depot_address;?></td>
					<td style="width:90px;border-top:1px solid #fff;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"><?php echo $depot_contact_no;?></td>					
					<td style="width:90px;border-top:1px solid #fff;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"><?php echo $current_stock;?></td>				
				</tr>
<?php		$i++;   }    ?>  
			<tr>
				<td style="width:90px;border-top:1px solid #000;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>
				<td style="width:90px;border-top:1px solid #000;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>
				<td style="width:90px;border-top:1px solid #000;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>				
				<td style="width:90px;border-top:1px solid #000;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>
				<td style="width:90px;border-top:1px solid #000;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>
		    </tr>  
			<tr>
				<td style="width:90px;border-top:1px solid #fff;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>
				<td style="width:90px;border-top:1px solid #fff;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>
				<td style="width:90px;border-top:1px solid #fff;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>				
				<td style="width:90px;border-top:1px solid #fff;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;">Total Stock:</td>
				<td style="width:90px;border-top:1px solid #fff;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"><?php echo $total_stock;?></td>
		    </tr>  			
			
			
		 </tbody>
  </table>
  <br/>
  <br/> <br/> 
  <br/><br/>  
  <?php    //depot_stock_report.php
				$content = ob_get_clean();
				// convert to PDF

				include('html2pdf.class.php');				
				try
				{
					$html2pdf = new HTML2PDF('L', 'A4', 'fr');
					$html2pdf->pdf->SetDisplayMode('fullpage');
					$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
					$html2pdf->Output('test.pdf');
				}
				catch(HTML2PDF_exception $e)
				{
					echo $e;
					exit;
				}
?>