<?php
	//echo json_encode(array('post' => $_POST) );
require_once 'includes/BridgePGUtil.php';

$api_name = $_GET['api_name'];

$bconn = new BridgePGUtil();
$bconn->set_mid('11121');

switch($api_name){
	case "status" :
		$bconn->get_status( $_POST['merchant_txn'] , $_POST['csc_txn'] );
		exit;
	case "enquiry" :
		$bconn->get_enquiry( $_POST['merchant_txn']  );
		exit;
	case "refund_log" :
		$bconn->refund_log(
			$_POST['merchant_txn'] ,
			$_POST['csc_txn'],
			$_POST['product_id'],
			$_POST['merchant_txn_status'],
			$_POST['merchant_reference'],
			$_POST['refund_deduction'],
			$_POST['refund_mode'],
			$_POST['refund_type'],
			$_POST['refund_trigger'],
			$_POST['refund_reason']
		);
		exit;
	case "refund_status" :
		$bconn->refund_status(
			$_POST['merchant_txn'] ,
			$_POST['csc_txn'],
			$_POST['refund_reference']
		);
		exit;
	case "recon_log" :
		$bconn->recon_log(
			$_POST['merchant_txn'] ,
			$_POST['csc_txn'],
			$_POST['refund_reference'],
			$_POST['cscuser_id'],
			$_POST['product_id'],
			$_POST['txn_amount'],
			$_POST['merchant_date'],
			$_POST['merchant_txn_status'],
			$_POST['merchant_reciept']
		);
		exit;
}
