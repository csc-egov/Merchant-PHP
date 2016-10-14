<?php
date_default_timezone_set('Asia/Kolkata');
//echo "qqqqqqqq";
require_once 'includes/BridgePGUtil2.php';

$bconn = new BridgePGUtil();
$bconn->set_mid('41174');

//echo $bconn->get_enquiry('MW3341');

//Status
//--echo $bconn->get_status('MW226691', '679046816092719145867631');

//Refund Log
//--echo $bconn->refund_log('MW226691', '679046816092719145867631', "1", "2", "3", "4", "5", "6", "7", "8");

//Refund Status
//--echo $bconn->refund_status('MW226691', '679046816092719145867631', "315932616092819183574592");

//Recon Status
echo $bconn->recon_log('MW226691', '679046816092719145867631', "1", "2", "3", "4", date('Y-m-d H:i:s'), "6", "7");

