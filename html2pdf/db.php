 <?php 	  
$conn = oci_connect('semipayroll', 'semipayroll', 'xe');
if (!$conn) {
$e = oci_error();
trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}	 
?>