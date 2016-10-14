
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Payment Response :: Merchant .php</title>
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
<?php
require_once 'includes/BridgePGUtil.php';

$bconn = new BridgePGUtil();
$bridge_message = $bconn->get_bridge_message();
?>
</head>
<body>


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
	
	<!-- payment response section  -->
	<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<h4>Transaction ID (CSC PG): <?php echo substr(number_format(time() * rand(),16,'',''),0,16); ?></h4>
				<h1>txn ID :  <?php echo substr(number_format(time() * rand(),8,'',''),0,8); ?></h1>
				<h2>Date: <?php echo date('d-M-Y')?></h2>
				<h3>Amount: <?php echo $_POST['walletResponseMessage']; ?> </h3>
				<h3>Test: <?php //echo json_encode($_POST); ?> </h3>
				<h4>Invoice:  <?php echo substr(number_format(time() * rand(),10,'',''),0,10); ?></h4>

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
				<h4>Response from CSC Payment Gateway</h4>
				<pre class="prettyprint linenums">
					print the response string 
					
					Encrypted Values:  <?php echo $_POST['bridgeResponseMessage']; ?>
					
					<br>
					
					Decrypted Values: <?php echo $bridge_message;?>
				</pre>
			</div>
		</div>

	<!-- payment response status -->
<?php
	$api_inputs = array(
		'merchant_txn' => 'Merchant Transaction',
		'csc_txn' => 'Bridge Transaction',
		'product_id' => 'Product ID',
		'merchant_txn_status' => 'Merchant Transaction Status',
		'merchant_reference' => 'Merchant Reference',
		'refund_deduction' => 'Refund Deduction',
		'refund_mode' => 'Refund Mode',
		'refund_type' => 'Refund Type',
		'refund_trigger' => 'Refund Trigger',
		'refund_reason' => 'Refund Reason',
		'refund_reference' => 'Refund Reference',
		'cscuser_id' => 'VLE ID (USER)',
		'txn_amount' => 'Transaction Amount',
		'merchant_date' => 'Merchsnt Date',
		'merchant_reciept' => 'Merchsnt Receipt'
	);
?>
<?php
$api_calls = array(
	'enquiry'     => array(
		'merchant_txn'
	),
	'status'      => array(
		'merchant_txn',
		'csc_txn'
	),
	'refund_log'  => array(
			'merchant_txn'       ,
			'csc_txn'            ,
			'product_id'         ,
			'merchant_txn_status',
			'merchant_reference' ,
			'refund_deduction'   ,
			'refund_mode'        ,
			'refund_type'        ,
			'refund_trigger'     ,
			'refund_reason' 
	),
	'refund_status' => array(
			'merchant_txn'       ,
			'csc_txn'            ,
			'refund_reference'
	),
	'recon_log'   => array(
			'merchant_txn'       ,
			'csc_txn'            ,
			'refund_reference'   ,
			'cscuser_id'         ,
			'product_id'         ,
			'txn_amount'         ,
			'merchant_date'      ,
			'merchant_txn_status',
			'merchant_reciept'
	)
);
?>

		<div class="row">
			<div class="col-md-8 col-lg-8 col-xl-8 col-sm-12 col-xs-12 bg">
				<h4>CSC PG Respponse</h4><hr>
<?php foreach( $api_inputs as $iid => $iin) { ?>
				<div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 col-xs-12 padding-btm">
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<label class="control-label"><strong><?php echo $iin; ?>:</strong></label>
					</div>	
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">						
						<input id="api_input_<?php echo $iid; ?>" name="api_input_<?php echo $iid; ?>" type="text" value="" class="form-control">
					</div>
				</div>
<?php } ?>				
			</div>
			<div class="col-md-2 col-lg-2 col-xl-2 col-sm-12 col-xs-12 bg">
				<h4>CSC PG Action</h4><hr>
<?php foreach($api_calls as $mname => $parameters){ ?>
				<div class="col-md-12 col-lg-12 col-xl-2 col-sm-12 col-xs-12 padding-btm">
					<input type="button" name="btn_<?php echo $mname;?>" value="<?php echo $mname;?>" id="btn_<?php echo $mname;?>" class="btn btn-default">
				</div>
<?php } ?>
			</div>
			<div class="col-md-2 col-lg-2 col-xl-2 col-sm-12 col-xs-12 bg">
				<h6 id="api_resp"></h6>
			</div>
		</div> <!-- End of div / row -->
	</div>
	</section>

	<?php include("includes/footer.php"); ?>
</div>
<style>
.btn-default{background:#e6e6e6;}
.padding-btm{padding-bottom:5px;}
.bg{background:#f2f2f2;border-right:3px solid #fff;min-height: 560px;}
.bg-top{background:#f2f2f2;border-right:3px solid #fff;min-height: 290px;}
.solidline{margin-top:20px;}
</style>


<script src="js/jquery.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/bootstrap.min.js"></script>

<script>
	$(document).ready(function(){
		postToFields();
<?php foreach($api_calls as $api_name => $api_parameters) {?>
		$('#btn_<?php echo $api_name; ?>').click(function(){
			doApiReq('<?php echo $api_name; ?>');
		});
<?php } ?>
	});
	
	function updateInputFields(){
		
	};

	function doApiReq(api_name){
		//alert(api_name + " : API Call");
		var api_calls_str = '<?php echo json_encode($api_calls);?>';
		var api_calls = JSON.parse(api_calls_str);
		
		var data = {};//array();
		var api_parameters = api_calls[api_name];

		for(var params in api_parameters ){
			var param_name = api_parameters[params];
			var pv = $('#api_input_' + api_parameters[params]).val();
			if(!pv){
				alert('Required Parameter ' + param_name + ' is not set');
				return;
			}
			data[param_name] = pv;
		}
		var url = 'http://10.1.1.13/merchant/api.php?api_name=' + api_name;
		//alert("Data: " + data);
		$.post( url, data )
			.done(function( data ) {
				//alert( "Data Loaded: " + data );
				var text = "";
				var dataArray = JSON.parse(data);
				for(var iid in dataArray)
					text += "<br />" + iid + " = " + dataArray[iid];
				$('#api_resp').html(text);
		});
	};
	
	function postToFields(){
		<?php
			$ret = array();
			$arr = explode("|", $bridge_message);
			foreach($arr as $pair){
				if(trim($pair)){
					$vals = explode("=", $pair);
					if(count($vals) == 2 && trim($vals[0]) )
						$ret[$vals[0]] = $vals[1];
				}
			}
		?>
		
		var posted = '<?php echo json_encode($ret); ?>';
		var pData = JSON.parse(posted);
		for(var iid in pData){
			$('#api_input_' + iid).val(pData[iid]);
		}
	};
</script>
</body>
</html>
