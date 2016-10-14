<?php
date_default_timezone_set('Asia/Kolkata');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Payment Confirmation :: Merchant .php</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Bootstrap template for Sample Merchant Application" />
<meta name="author" content="Abhishek Ranjan" />
<!-- css -->
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" />

	
<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

<script type="text/javascript" language="javascript">  
	function disableBackButton()
	{
		window.history.forward()
	} 
	disableBackButton(); 
	window.onload=disableBackButton(); 
	window.onpageshow=function(evt) { if(evt.persisted) disableBackButton() } 
	window.onunload=function() { void(0) } 
</script>


  </head>

  <body onload="disableBackButton();" onpageshow="if (event.persisted) disableBackButton();" onunload="">


<div id="wrapper">
	<!-- start header -->
	<?php include("includes/header.php"); ?>
	<?php include('session_valid.php'); ?>
	<!-- end header -->
	
	
	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li><a href="index.html">Home</a><i class="icon-angle-right"></i></li>
					<li class="active">Payments</li>
				</ul>
			</div>
		</div>
	</div>
	</section>
	
<?php
require_once 'includes/BridgePGUtil.php';

$bconn = new BridgePGUtil();
$user = (array)$_SESSION['User'];
$p = array(
	'csc_id' => $user['username'],
//	'csc_id' => $_SESSION['username'],
	'merchant_receipt_no' => 'Recpt#' . rand(100,999),
	'txn_amount' => $_GET['amt'],
	//~ 'return_url' => 'http://merchant.csccloud.in/pay_success.php',
	//~ 'cancel_url' => 'http://merchant.csccloud.in/pay_success.php',
	'return_url' => 'http://10.1.1.13/merchant/pay_success.php',
	'cancel_url' => 'http://10.1.1.13/merchant/pay_success.php',
	'txn_amount' => $_GET['amt'],
	'product_id' => $_GET['pid'],//'1112101',
	'merchant_txn' => 'MW' . rand(1000, 9999)
);

$bconn->set_params($p);
$enc_text = $bconn->get_parameter_string();
$frac = $bconn->get_fraction();//
?>

	<!-- payment response section  -->
	<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<h1>Proceed To Pay</h1>
				<h4>Invoice#: <?php echo $p['merchant_receipt_no']; ?></h4>
				<h4>txn ID :  <?php echo $p['merchant_txn']; ?></h4>
				<h3>Amount: <?php echo $_GET['amt']; ?> </h3>
				<form method="post" action="http://pay.csccloud.in/v1/payment/<?php echo $frac;?>">
					<input type="hidden" name="message" value="<?php echo $enc_text;?>" />
					<input type="submit" value="Pay" />
				</form>
			</div>
			<div class="col-lg-6">
				<h4>Product Details</h4>
				<p>
					<strong>Information</strong>, write a summary of transaction for VLE to see
				</p>
				
				
		</div>
	
		
		
		<!-- divider -->
		<div class="row">
			<div class="col-lg-12">
				<div class="solidline">
				</div>
			</div>
		</div>

		<!-- end divider -->
		<div class="row">
			<div class="col-lg-12">
				<h4>Wait for Response from CSC Payment Gateway</h4>

			</div>
		</div>
	</div>
	</section>

	
	
	<!-- payment response status -->
	

	<?php include("includes/footer.php"); ?>
</div>


<script src="js/jquery.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/bootstrap.min.js"></script>

	
</body>
</html>
