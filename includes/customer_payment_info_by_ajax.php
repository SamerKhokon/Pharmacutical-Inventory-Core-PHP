<?php session_start(); include("../db.php");
    $customer_id 		= trim($_POST["customer_id"]);
    $payment_type 		= trim($_POST["payment_type"]);
	$paid_amount = trim($_POST['paid_amount']);
	$bank_name = trim($_POST['bank_name']);
	$cheque_no = trim($_POST['cheque_no']);
    $invoice_list 			= trim($_POST["invoice_list"]);
    $prev_due_list 		= trim($_POST["prev_due_list"]);
    $net_inv_list           = trim($_POST["net_inv_list"]);
    $paid_amnt_list      = trim($_POST["paid_amnt_list"]);	
    $adjust_list            = trim($_POST["adjust_list"]);	
    $tot_unit_price_list = trim($_POST["tot_unit_price_list"]);		
    $grand_tot_list       = trim($_POST["grand_tot_list"]);			
	
    $company_id = $_SESSION["company_id"];	
	$entry_by      = $_SESSION["entry_by"];
	
	$invoice_list_parse            = explode(",",$invoice_list);
    $prev_due_list_parse        = explode(",",$prev_due_list);
    $net_inv_list_parse           = explode(",",$net_inv_list);
    $paid_amnt_list_parse      = explode(",",$paid_amnt_list);
    $adjust_list_parse            = explode(",",$adjust_list);
    $tot_unit_price_list_parse = explode(",",$tot_unit_price_list);
    $grand_tot_list_parse       = explode(",",$grand_tot_list);
		
	for($i=0 ; $i<count($invoice_list_parse) ; $i++)
	{
	
	   	$invoice_no = $invoice_list_parse[0];
		$customer_invoice_str = "UPDATE `decent_pharma_db`.`inv_customer_invoice_info` 
		SET	`payed_ammount` = (`payed_ammount`+$adjust_list_parse[$i]) , 
		`current_invoice_due` = (`current_invoice_due`-$adjust_list_parse[$i]) , 
		WHERE	`customer_id` = $customer_id and invoice_no = '$invoice_no'
		";
		mysql_query($customer_invoice_str);
		/*$adv_due_str = "INSERT INTO `decent_pharma_db`.`inv_due_adv_payment`(`customer_id`,`previous_due`,`current_due`,`total_due`,`due_paid`,`new_due_or_advance`, 
			`payment_date`,`payer_type`,`entry_by`, `entry_date`,`company_id`,`active_flag`)  VALUES($customer_id,$prev_due_list_parse[$i], 'current_due',
			'total_due','due_paid', 'new_due_or_advance',sysdate,'customer',$entry_by,now(),$company_id,'Y')";*/
	}
	$prev_total_due = $prev_due_list_parse[$i-1];
	
	
	//customer payment info insert//
	$customer_code = get_customer_code($customer_id , $company_id);
	$total_closing_due = ($prev_total_due-$payed_amount);
	$customer_payment_info = "insert into decent_pharma_db.customer_payment_info 
	(invoice_no, customer_id, 
	customer_code, 
	previous_due, 
	payed_amount, 
	total_closing_due, 
	payment_date, 
	payment_type, 
	bank_name, 
	cheque_no, 
	entry_by, 
	entry_date, 
	last_update_by, 
	last_update_date, 
	company_id, 
	active_flag, 
	chk_data
	)
	values
	('$invoice_list', customer_id, 
	'$customer_code', 
	$prev_total_due, 
	$payed_amount, 
	$total_closing_due, 
	now(), 
	'$payment_type', 
	'$bank_name', 
	'$cheque_no', 
	$entry_by, 
	now(), 
	$company_id, 
	'Y'
	)"
	
	
	//insert data into inv_due_adv_payment//
	$due_adv_payment = "insert into decent_pharma_db.inv_due_adv_payment 
	(customer_id, previous_due, current_due, 
	total_due, 
	due_paid, 
	new_due_or_advance, 
	payment_date, 
	payer_type, 
	entry_by, 
	entry_date, 
	last_update_by, 
	last_update_date, 
	company_id, 
	active_flag
	)
	values
	($customer_id, $prev_total_due, 0, 
	$prev_total_due, 
	$payed_amount, 
	($prev_total_due-$payed_amount), 
	now(), 
	'customer', 
	$entry_by, 
	now(), 
	$company_id, 
	'Y'
	)";
	mysql_query(due_adv_payment);

    //update customer's current due//
  	$customer_due_info = "UPDATE `decent_pharma_db`.`inv_customer_due_info` 
	SET `current_due` = (`current_due`-$paid_amount) 	WHERE
	`customer_id` = $customer_id";
	mysql_query($customer_due_info);
	
	function get_customer_code($customer_id , $company_id) 
	 {
	   $str = "SELECT customer_code FROM inv_customer_info WHERE 
	   customer_id=$customer_id AND company_id=$company_id";
	   $sql = mysql_query($str);
	   $res = mysql_fetch_row($sql);
	   return $res[0];
	 }
?>