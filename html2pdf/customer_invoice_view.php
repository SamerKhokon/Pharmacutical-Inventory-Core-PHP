<?php   ob_start();
			include('../db.php');
			$customer_id = trim($_GET["customer_id"]);
			$invoice_id = trim($_GET["invoice_no"]);
			$company_id = 1;
			
			$prev_outstanding_amount = $_GET["prev_outstanding_amount"];
			$total_outstanding_amount = $_GET["total_outstanding_amount"];
			$adjust_amount = $_GET["adjustment_amount"];
			$discount = $_GET["discount"];
			$net_invoice_amount = $_GET["net_invoice_amount"			];
			
			
		  function get_customer_name($customer_id) 
		  {
			   $str = "select customer_name from inv_customer_info where customer_id=$customer_id";
			   $sql = mysql_query($str);
			   $res = mysql_fetch_row($sql);
			   return $res[0];
		  }
	  
			function get_customer_code($customer_id) 
		  {
			   $str = "select customer_code from inv_customer_info where customer_id=$customer_id";
			   $sql = mysql_query($str);
			   $res = mysql_fetch_row($sql);
			   return $res[0];
		  }	  
	  
	  
	function get_delivery_date($customer_id , $invoice_id) {
	  $str = "SELECT DATE_FORMAT(delivery_date,'%d/%m/%Y') AS delivery_date FROM 
	  `inv_customer_invoice_info` WHERE customer_id=$customer_id
	  AND invoice_no='$invoice_id'";
	  $sql = mysql_query($str);
	  $res = mysql_fetch_row($sql);
	  return $res[0];
	}
	
	  
	  
	 function get_sr_id($invoice_id , $customer_id) {
			$str = "SELECT employee_id,employee_code,emp_name FROM hr_employee_info WHERE employee_id IN(
			SELECT mr_id FROM `inv_customer_invoice_info` 
			WHERE customer_id=$customer_id AND invoice_no='$invoice_id')";
			$sql = mysql_query($str);
			$res = mysql_fetch_row($sql);
			return $res[0]."#".$res[1]."#".$res[2];
	 } 
	  
	
	  
	  function get_company_details($company_id) {
	     $str = "SELECT company_name,company_address,company_contact_no,company_website
		FROM st_company_info WHERE company_id=$company_id";
		$sql = mysql_query($str);
		$res = mysql_fetch_row($sql);
		return $res[0]."#".$res[1]."#".$res[2]."#".$res[3];
	  }
	  
	  $detail = get_company_details($company_id);
	  $parse = explode("#" , $detail);
	  
	 $company_name =  $parse[0];
	$company_address = $parse[1];
	$company_contact_no = $parse[2];
	$company_website = $parse[3];
         $total_price = $_GET["total_price"];
			$prev_outstanding_amount = $_GET["prev_outstanding_amount"];
			$total_outstanding_amount = $_GET["total_outstanding_amount"];
			$adjust_amount = $_GET["adjustment_amount"];
			$discount = $_GET["discount"];
			$net_invoice_amount = $_GET["net_invoice_amount"];		
		  
		  
		  $product_delivery_date = get_delivery_date($customer_id , $invoice_id);
	  
       $customer_name = get_customer_name($customer_id);
	   $customerCode = get_customer_code($customer_id) ;
	   
	     $sr_detail = get_sr_id($invoice_id , $customer_id);
	  $parse_sr_detail = explode("#",$sr_detail);
	  $employee_id = $parse_sr_detail[0];
	  $employee_code = $parse_sr_detail[1];
	  $emp_name = $parse_sr_detail[2];
?>


<table cellpadding="0" cellspacing="0" border="0" align="center">
<tr><td><b style="font-family:Arial;font-size:25px;"><?php echo $company_name;?></b></td></tr>
<tr><td><font style="margin-left:40px;"><?php echo $company_address;?></font></td></tr>
<tr><td><font style="margin-left:60px;"><?php echo $company_contact_no;?></font></td></tr>
<tr><td><font style="margin-left:40px;"><?php echo $company_website;?></font></td></tr>
<tr><td><b style="font-family:Arial;margin-left:80px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INVOICE</b></td></tr>
</table>
<br/>

<table  cellpadding="0" cellspacing="0" border="0" align="center">
	<tr>
				<td style="width:90px;border-top:1px solid #000;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>			
				<td style="width:140px;border-top:1px solid #000;border-left:1px solid #fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>
				<td style="width:90px;border-top:1px solid #000;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>			   
				<td style="width:90px;border-top:1px solid #000;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>
				<td style="width:90px;border-top:1px solid #000;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>
				<td style="width:90px;border-top:1px solid #000;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>				
		    </tr>  
</table>
<br/>

<table width="100%" cellpadding="0" cellspacing="0" border="0" align="center">
<tr><th>Customer Code:</th><td><?php echo $customerCode;?></td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<th>Customer Name:</th><td><?php echo $customer_name;?></td>
</tr>

<tr><th>Employee Code:</th><td><?php echo $employee_code;?></td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<th>Employee Name:</th><td><?php echo $emp_name;?></td>
</tr>

<tr>
<th>Invoice No:</th><td><?php echo $invoice_id;?></td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<th>Delivery Date:</th><td><b><?php echo $product_delivery_date;?></b></td></tr>


<tr>
<th>Address:</th><td><?php echo $company_address;?></td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<td style="widht:50px;">&nbsp;&nbsp;</td>
<th>Printing Date:</th><td><b><?php echo date('d/m/Y');?></b></td></tr>
</table>
<br/>
<br/>

<table border="0" cellpadding="0" cellspacing="0" width="100%" align="center">
    <thead>

        <tr>
		    <th style="text-align:center;border-right:#000;border-left:#000;border-bottom:#000;border-top:#000;background-color:#fff;font-family:Arial;">SLno</th>
            <th style="text-align:center;border-right:#000;border-bottom:#000;border-top:#000;background-color:#fff;font-family:Arial;">Product Name</th>
            <th style="text-align:center;border-right:#000;border-bottom:#000;border-top:#000;background-color:#fff;font-family:Arial;">Pack Size</th>
            <th style="text-align:center;border-right:#000;border-bottom:#000;border-top:#000;background-color:#fff;font-family:Arial;">Quantity</th>
            <th style="text-align:center;border-right:#000;border-bottom:#000;border-top:#000;background-color:#fff;font-family:Arial;">Unit Price</th>
            <th style="text-align:center;border-right:#000;border-bottom:#000;border-top:#000;background-color:#fff;font-family:Arial;">Total Unit Price</th>
        </tr>          
    </thead>
	<tbody>
<?php
           
            /*$str = "SELECT a.customer_id,
					(SELECT customer_name FROM inv_customer_info WHERE customer_id=a.customer_id) AS customer_name,
					a.customer_code,a.mr_id
					,(SELECT emp_name FROM hr_employee_info WHERE employee_id=a.mr_id) AS mr_name,
					a.mr_code,a.sr_id
					,(SELECT emp_name FROM hr_employee_info WHERE employee_id=a.sr_id) AS sr_name,
					a.sr_code,a.delivery_date,b.product_id,
					(SELECT product_name FROM product_info WHERE product_id=b.product_id) AS product_name,
					b.product_code,b.unit,b.pack_size,
					b.unit_price,b.product_quantity,b.total_unit_price
					 FROM inv_customer_invoice_info AS a,`inv_customer_invoice_product` AS b
						WHERE a.customer_id=$customer_id AND a.invoice_no='$invoice_id'";*/

			$str = "select t1.*,t2.product_name as product_name 
			from inv_customer_invoice_product t1 
				left join product_info t2
				 on t1.product_id=t2.product_id
			where t1.invoice_no='$invoice_id'";					
$i=1;					
			$sql = mysql_query($str);						
			while($rs = mysql_fetch_assoc($sql)) 
			{
						//$customer_name = $rs["customer_name"];
						//$customer_code = $rs["customer_code"];
						//$mr_id 				= $rs["mr_id"];
						//$mr_code 			= $rs["mr_code"];		
						//$mr_name 			= $rs["mr_name"];		
						//$sr_id 					= $rs["sr_id"];			
						//$sr_code 			= $rs["sr_code"];
						//$mr_name 			= $rs["sr_name"];		
						//$delivery_date 	= $rs["delivery_date"];
						$product_id 		= $rs["product_id"];
						$product_name 	= $rs["product_name"];
						$product_code 	= $rs["product_code"];
						$product_unit 		= $rs["unit"];
						$product_qty  		= $rs["product_quantity"];
						$pack_size 			= $rs["pack_size"];
						$unit_price 			= $rs["unit_price"];
						$total_unit_price = $unit_price*$product_qty;
	?>
				<tr>
					<td style="width:90px;border-top:1px solid #fff;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"><?php echo $i;?></td>			
					<td style="width:140px;border-top:1px solid #fff;border-left:1px solid #fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"><?php echo $product_name;?></td>
					<td style="width:90px;border-top:1px solid #fff;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"><?php echo $pack_size;?></td>			   
					<td style="width:90px;border-top:1px solid #fff;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"><?php echo $product_qty;?></td>
					<td style="width:90px;border-top:1px solid #fff;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"><?php echo $unit_price;?></td>
					<td style="width:90px;border-top:1px solid #fff;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"><?php echo $total_unit_price;?></td>				
				</tr>
<?php		$i++;   }    ?>  
			<tr>
				<td style="width:90px;border-top:1px solid #000;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>			
				<td style="width:140px;border-top:1px solid #000;border-left:1px solid #fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>
				<td style="width:90px;border-top:1px solid #000;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>			   
				<td style="width:90px;border-top:1px solid #000;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>
				<td style="width:90px;border-top:1px solid #000;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>
				<td style="width:90px;border-top:1px solid #000;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>				
		    </tr>  
		 </tbody>
  </table>
  
    <br/>
     <table align="center" width="100%" cellpadding="0" cespacing="0">
  <tr>
   <td>Adjustment Amount:</td><td><?php echo $adjust_amount;?></td>
   	  <td style="width:90px;">&nbsp;</td>	
   <td>Total Price:</td>   <td><?php echo $total_price;?></td>   
  </tr>
  <tr>
   <td>Previous Oustanding Amount:</td><td><?php echo $prev_outstanding_amount;?></td> 
   	  <td style="width:90px;">&nbsp;</td>	   
   <td>Discount:</td>   <td><?php echo $discount;?></td>     
  </tr>  
<tr>
   <td>Total Oustanding Amount:</td><td><?php echo $total_outstanding_amount;?></td>  
   	  <td style="width:90px;">&nbsp;</td>	   
   <td>Net Invoice Amount:</td>   <td>
   <?php echo $net_invoice_amount;?></td>     
  </tr>    
  </table>
  
  <br/>
  <table align="center" width="100%" cellpadding="0" cellspacing="0">
  <tr>
    <td style="width:200px;border-top:1px solid #000;;border-left:#FFF;border-bottom:#fff;border-right:1px solid #fff;text-align:center;">Total Invoice Amount: </td>
       	  <td style="width:50px;border-top:1px solid #000;;border-left:#FFF;border-bottom:#fff;border-right:1px solid #fff;">&nbsp;</td>	   
	   	  <td style="width:50px;border-top:1px solid #000;;border-left:#FFF;border-bottom:#fff;border-right:1px solid #fff;">&nbsp;</td>	   
	<td style="width:300px;border-top:1px solid #000;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"><?php  

        $num = $net_invoice_amount;
		$c  = substr_count($num,".");			
		if($c == 1) 
		{
		   $parse =  explode(".",$num);
		   fraction_value($parse[0] , $parse[1]);
		}
		else
		{
			integer_value($num  ); 
		}

        function integer_value($num) 
		{
           echo convert_number($num)."  only";
		}	
		function  fraction_value($num,$precision) 
		{
		   echo convert_number($num ) ."  Taka and ". convert_number($precision) ." paisa only";	
		}
			
			function convert_number($number)
			{
					if (($number < 0) || ($number > 999999999))
					{
						//throw new Exception("Number is out of range");
						echo "Number range is over!";
					}

					/* Crore */
					$Cn = floor($number/10000000);  
					$number -= $Cn * 10000000;
				
					/* Lacs  */
					$Gn = floor($number / 100000);  
					$number -= $Gn * 100000;
					
					/* Thousands */		
					$kn = floor($number / 1000);     
					$number -= $kn * 1000;
					
					/* Hundreds */		
					$Hn = floor($number / 100);      
					$number -= $Hn * 100;
					
					 /* Tens  */
					$Dn = floor($number / 10);      
					
					/* Ones */
					$n    = $number % 10;               
					$res = "";

					
					if($Cn) {
					 $res .= convert_number($Cn) . " Crore ";
					}
					
					if ($Gn) 	{
						$res .= convert_number($Gn) . " Lacs";
					}
					if ($kn)		{
						$res .= (empty($res) ? "" : " ") .convert_number($kn) . " Thousand";
					}
					if ($Hn)	{
						$res .= (empty($res) ? "" : " ") .convert_number($Hn) . " Hundred";
					}
					
					$ones = array("", "One", "Two", "Three", "Four", "Five", "Six","Seven", 
									"Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen",
									"Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen","Nineteen");
					
					$tens = array("", "", "Twenty", "Thirty", "Fourty",
									"Fifty", "Sixty","Seventy", "Eigthy", "Ninety");

					if ($Dn || $n)
					{
						if (!empty($res))	{
							$res .= " and ";
						}
						if ($Dn < 2)	{
							$res .= $ones[$Dn * 10 + $n];
						}
						else
						{
							$res .= $tens[$Dn];
							if ($n)		
							{
								$res .= "-" . $ones[$n];
							}
						}
					}
					if (empty($res))
					{
						$res = "zero";
					}
					return $res;
			}

?>
 </td>	
  </tr>
  </table>
  
  <br/>
  <table  cellpadding="0" cellspacing="0" border="0" align="center">
	<tr>
				<td style="width:90px;border-top:1px solid #000;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>			
				<td style="width:140px;border-top:1px solid #000;border-left:1px solid #fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>
				<td style="width:90px;border-top:1px solid #000;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>			   
				<td style="width:90px;border-top:1px solid #000;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>
				<td style="width:90px;border-top:1px solid #000;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>
				<td style="width:90px;border-top:1px solid #000;;border-left:#fff;border-bottom:#fff;border-right:1px solid #fff;text-align:center;"></td>				
		    </tr>  
</table>
  <br/> <br/> 
  <br/><br/>
  <table align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>-----------------------------</td>
	  <td style="width:80px;">&nbsp;</td>	
	  <td>---------------------------</td>	
	  <td style="width:80px;">&nbsp;</td>	
	  <td>---------------------------</td>	 
  </tr>    
  <tr>
    <td>Customer Signature</td>	
	  <td style="width:80px;">&nbsp;</td>	
    <td>Prepared By</td>	
	  <td style="width:80px;">&nbsp;</td>	
    <td>Authorized Signature</td>		
  </tr>

  </table>
  
  
	
  <?php 
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

