<?php  ob_start();  include("../db.php");
		//session_start();
        $company_id    = 1;   
		
		//$_SESSION["COMPANY_ID"];
        //product_transfer_report.php		
		
		function get_company_details($company_id) 
		{
			$str = "SELECT company_name,company_address,company_contact_no,company_website
				FROM st_company_info WHERE company_id=$company_id";
			$sql = mysql_query($str);
			$res = mysql_fetch_row($sql);
			return $res[0]."#".$res[1]."#".$res[2]."#".$res[3];
		}
	  
		$detail  = get_company_details($company_id);
		$parse = explode("#" , $detail);	  
		$company_name 			=  $parse[0];
		$company_address 		= $parse[1];
		$company_contact_no 	= $parse[2];
		$company_website 		= $parse[3];	
?>
<table cellpadding="0" cellspacing="0" border="0" align="center">
	<tr><td><b style="font-family:Arial;font-size:25px;"><?php echo $company_name;?></b></td></tr>
	<tr><td><font style="margin-left:40px;"><?php echo $company_address;?></font></td></tr>
	<tr><td><font style="margin-left:60px;"><?php echo $company_contact_no;?></font></td></tr>
	<tr><td><font style="margin-left:40px;"><?php echo $company_website;?></font></td></tr>
	<tr><td><b style="font-family:Arial;margin-left:40px;">Product Transfer Report</b></td></tr>
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
				<td style="width:100px;border-top:1px solid #000;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>			
				<td style="width:140px;border-top:1px solid #000;border-left:1px solid #fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>
				<td style="width:100px;border-top:1px solid #000;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>			   
				<td style="width:100px;border-top:1px solid #000;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>
				<td style="width:190px;border-top:1px solid #000;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>
				<td style="width:100px;border-top:1px solid #000;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>				
	</tr>  
</table>
<br/>
<?php
		$str = "SELECT t1.challan_no,t1.invoice_no,t1.ref_no,t1.transport_id,t1.transport_type,
				t1.transfer_from,t1.transfer_to,date_format(t1.delivery_date , '%d/%m/%Y') as delivery_date,t1.load_supervised_by,
				t1.in_charge_emp_id,t2.product_id,t2.product_code,t2.pack_size,
				t2.product_quantity,t2.unit_price,t2.total_unit_price	FROM product_transfer_info  AS t1
			LEFT JOIN transfering_product_info AS t2 ON
			t1.invoice_no=t2.invoice_no and t1.company_id=$company_id";
			
		$sql = mysql_query($str);						
?>

<table border="0" cellpadding="0" cellspacing="0" width="100%" align="center">
    <thead>
        <tr>
            <th style="width:60px;text-align:center;border-left:1px solid #000;border-right:#fff;border-bottom:1px solid #000;border-top:1px solid #000;background-color:#fff;font-family:Arial;">ChallanNo</th>
		    <th style="width:80px;text-align:center;border-left:1px solid #000;border-right:#000;border-bottom:1px solid #000;border-top:1px solid #000;background-color:#fff;font-family:Arial;">Invoice No</th>	
            <th style="width:60px;text-align:center;border-left:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;border-top:1px solid #000;background-color:#fff;font-family:Arial;">Ref No</th>
			<th style="width:60px;text-align:center;border-left:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;border-top:1px solid #000;background-color:#fff;font-family:Arial;">Transport Id</th>	
            <th style="width:50px;text-align:center;border-right:1px solid #000;border-left:1px solid #fff;border-bottom:1px solid #000;border-top:1px solid #000;background-color:#fff;font-family:Arial;">Transport Type</th>
            <th style="width:50px;text-align:center;border-left:1px solid #000;border-right:1px solid #fff;border-bottom:1px solid #000;border-top:1px solid #000;background-color:#fff;font-family:Arial;">Transfer From</th>
		    <th style="width:50px;text-align:center;border-left:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;border-top:1px solid #000;background-color:#fff;font-family:Arial;">Transfer To</th>	
            <th style="width:80px;text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;border-top:1px solid #000;background-color:#fff;font-family:Arial;">Delivery Date</th>
			<th style="width:50px;text-align:center;border-left:1px solid #fff;border-right:1px solid #000;border-bottom:1px solid #000;border-top:1px solid #000;background-color:#fff;font-family:Arial;">Supervisor</th>	
            <th style="width:50px;text-align:center;border-right:1px solid #000;border-left:1px solid #fff;border-bottom:1px solid #000;border-top:1px solid #000;background-color:#fff;font-family:Arial;">In Charge</th>
            <th style="width:50px;text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;border-top:1px solid #000;background-color:#fff;font-family:Arial;">Product Code</th>
			<th style="width:50px;text-align:center;border-left:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;border-top:1px solid #000;background-color:#fff;font-family:Arial;">Pack Size</th>	
            <th style="width:50px;text-align:center;border-right:1px solid #000;border-left:1px solid #fff;border-bottom:1px solid #000;border-top:1px solid #000;background-color:#fff;font-family:Arial;">Quantity</th>			
            <th style="width:50px;text-align:center;border-right:1px solid #000;border-left:1px solid #000;border-bottom:1px solid #000;border-top:1px solid #000;background-color:#fff;font-family:Arial;">Unit Price</th>						
            <th style="width:50px;text-align:center;border-right:1px solid #000;border-left:1px solid #000;border-bottom:1px solid #000;border-top:1px solid #000;background-color:#fff;font-family:Arial;">Total Unit Price</th>									
        </tr>          
    </thead>
	<tbody>
<?php   $i=1;
			while($rs = mysql_fetch_assoc($sql)) 
			{
					$challan_no 		        = $rs['challan_no'];  
					$invoice_no 			    = $rs['invoice_no'];
					$ref_no 		  			= $rs['ref_no'];
					$transport_id 	  		= $rs['transport_id'];
					$transport_type 		= $rs['transport_type'];
					$transfer_from           = $rs['transfer_from'];
					$transfer_to         	    = $rs['transfer_to'];
					$delivery_date           = $rs['delivery_date'];
					$load_supervised_by  = $rs['load_supervised_by'];
					$in_charge_emp_id    = $rs['in_charge_emp_id'];
					$product_id         	     = $rs['product_id'];				
					$product_code           = $rs['product_code'];
					$pack_size         		 = $rs['pack_size'];				
					$product_quantity       = number_format($rs['product_quantity']);
					$unit_price         		 = $rs['unit_price'];				
					$total_unit_price         = $rs['total_unit_price'];				  
?>
				<tr>
					<td style="width:60px;border-top:1px solid #fff;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"><?php echo $challan_no;?></td>
					<td style="width:80px;border-top:1px solid #fff;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"><?php echo $invoice_no;?></td>					
					<td style="width:60px;border-top:1px solid #fff;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"><?php echo $ref_no;?></td>
					<td style="width:60px;border-top:1px solid #fff;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"><?php echo get_transport_name($transport_id);?></td>					
					<td style="width:50px;border-top:1px solid #fff;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"><?php echo $transport_type;?></td>				
					<td style="width:50px;border-top:1px solid #fff;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"><?php echo get_depot_name($transfer_from);?></td>
					<td style="width:50px;border-top:1px solid #fff;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"><?php echo get_depot_name($transfer_to);?></td>					
					<td style="width:80px;border-top:1px solid #fff;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"><?php echo $delivery_date;?></td>
					<td style="width:50px;border-top:1px solid #fff;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"><?php echo get_emp_name($load_supervised_by);?></td>					
					<td style="width:50px;border-top:1px solid #fff;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"><?php echo get_emp_name($in_charge_emp_id);?></td>				
					<td style="width:50px;border-top:1px solid #fff;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"><?php echo $product_code;?></td>
					<td style="width:50px;border-top:1px solid #fff;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"><?php echo $pack_size;?></td>				
					<td style="width:50px;border-top:1px solid #fff;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"><?php echo $product_quantity;?></td>
					<td style="width:50px;border-top:1px solid #fff;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"><?php echo $unit_price;?></td>					
					<td style="width:50px;border-top:1px solid #fff;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"><?php echo $total_unit_price;?></td>									
				</tr>
<?php		$i++;   }    ?>
			<tr>
				<td style="width:50px;border-top:1px solid #000;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>
				<td style="width:50px;border-top:1px solid #000;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>
				<td style="width:50px;border-top:1px solid #000;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>				
				<td style="width:50px;border-top:1px solid #000;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>
				<td style="width:50px;border-top:1px solid #000;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>
				<td style="width:50px;border-top:1px solid #000;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>
				<td style="width:50px;border-top:1px solid #000;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>
				<td style="width:50px;border-top:1px solid #000;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>				
				<td style="width:50px;border-top:1px solid #000;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>
				<td style="width:50px;border-top:1px solid #000;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>
				<td style="width:50px;border-top:1px solid #000;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>				
				<td style="width:50px;border-top:1px solid #000;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>
				<td style="width:50px;border-top:1px solid #000;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>				
				<td style="width:50px;border-top:1px solid #000;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>
				<td style="width:50px;border-top:1px solid #000;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>								
		    </tr>  
			<tr>
				<td style="width:50px;border-top:1px solid #fff;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>
				<td style="width:50px;border-top:1px solid #fff;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>
				<td style="width:50px;border-top:1px solid #fff;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>				
				<td style="width:50px;border-top:1px solid #fff;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>
				<td style="width:50px;border-top:1px solid #fff;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>			
				<td style="width:50px;border-top:1px solid #fff;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>
				<td style="width:50px;border-top:1px solid #fff;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>
				<td style="width:50px;border-top:1px solid #fff;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>				
				<td style="width:50px;border-top:1px solid #fff;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>
				<td style="width:50px;border-top:1px solid #fff;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>
				<td style="width:50px;border-top:1px solid #fff;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>				
				<td style="width:50px;border-top:1px solid #fff;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>
				<td style="width:50px;border-top:1px solid #fff;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>								
				<td style="width:50px;border-top:1px solid #fff;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>
				<td style="width:50px;border-top:1px solid #fff;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>				
		    </tr>  			
		 </tbody>
  </table>
  <br/>
  <br/> <br/> 
  <br/><br/>  
  <?php 
  
  
		function get_transport_name($transport_id) {
		 $str = "SELECT vehicle_name FROM vehicle_info WHERE vehicle_id=$transport_id";
		 $sql =mysql_query($str);
		 $res = mysql_fetch_row($sql);
		 return $res[0];
		}
		function get_depot_name($depot_id) {
		 $str = "SELECT depot_name FROM `inv_depot_info` WHERE depot_id=$depot_id";
		 $sql =mysql_query($str);
		 $res = mysql_fetch_row($sql);
		 return $res[0];
		}		
		
		function get_emp_name($emp_id) {
		 $str = "SELECT emp_name FROM `hr_employee_info` WHERE employee_id=$emp_id";
		 $sql =mysql_query($str);
		 $res = mysql_fetch_row($sql);
		 return $res[0];
		}		
  
  
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

