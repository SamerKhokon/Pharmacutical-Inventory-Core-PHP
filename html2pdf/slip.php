<?php   ob_start();  //$dateid	=$_GET['dateid'];  
		include("../includes/db.php");
		$content = ob_get_clean();
		// convert to PDF
		// require_once(dirname(__FILE__).'/../html2pdf.class.php');		
		// get the HTML		
		
    $content = 	file_get_contents(dirname(__FILE__).'/_tcpdf_'.HTML2PDF_USED_TCPDF_VERSION.'/cache/bng.php');
    $content = '<page style="font-family: freeserif"><br />'.nl2br($content).'</page>';
		
		include('html2pdf.class.php');
		try
		{
			$html2pdf = new HTML2PDF('L', 'A4', 'fr');
			$html2pdf->pdf->SetDisplayMode('fullpage');
			$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
			$html2pdf->Output('mojid.pdf');
		}
		catch(HTML2PDF_exception $e) {
			echo $e;
			exit;
		}
?>