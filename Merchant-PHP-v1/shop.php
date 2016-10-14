<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Shop :: Merchant .php</title>
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

</head>
<body>



<div id="wrapper">
	<!-- start header -->
	<?php include("includes/header.php"); ?>
	<!-- end header -->


	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li><a href="index.php">Home</a><i class="icon-angle-right"></i></li>
					<li class="active">Shop</li>
				</ul>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h4>Example with <strong>3 Products</strong></h4>
			</div>
			<div class="col-lg-4">
				<div class="pricing-box-alt">
					<div class="pricing-heading">
						<h3>.php <strong>Basic</strong></h3>
					</div>
					<div class="pricing-terms">
						<h6> INR 150.00 </h6>
					</div>
					<div class="pricing-content">
						<ul>
							<li><i class="icon-ok"></i> 1 applications</li>
							<li><i class="icon-ok"></i> 24x7 learning</li>
							<li><i class="icon-ok"></i> No hidden fees</li>
							<li><i class="icon-ok"></i> Free 30-days trial</li>
							<li><i class="icon-ok"></i> Stop anytime easily</li>
						</ul>
					</div>
				 <?php 
                    if($_SESSION){ ?>
					<div class="pricing-action">
						<a href="pay.php?amt=150&pid=6293785614" class="btn btn-primary btn-theme"><i class="icon-bolt"></i> Buy now</a>
					</div>
				<?php } ?>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="pricing-box-alt special">
					<div class="pricing-heading">
						<h3>.php <strong>Intermediate</strong></h3>
					</div>
					<div class="pricing-terms">
						<h6>INR 1400.00 / Month</h6>
					</div>
					<div class="pricing-content">
						<ul>
							<li><i class="icon-ok"></i> 10 applications</li>
							<li><i class="icon-ok"></i> 24x7 learning</li>
							<li><i class="icon-ok"></i> No hidden fees</li>
							<li><i class="icon-ok"></i> Free 30-days trial</li>
							<li><i class="icon-ok"></i> Stop anytime easily</li>
						</ul>
					</div>
				 <?php 
                    if($_SESSION){ ?>
					<div class="pricing-action">
						<a href="pay.php?amt=1400&pid=6293748583" class="btn btn-primary btn-theme"><i class="icon-bolt"></i> Buy now</a>
					</div>
				<?php } ?>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="pricing-box-alt">
					<div class="pricing-heading">
						<h3>.php <strong>Advanced</strong></h3>
					</div>
					<div class="pricing-terms">
						<h6>INR 2500.00 / Month</h6>
					</div>
					<div class="pricing-content">
						<ul>
							<li><i class="icon-ok"></i> 100 applications</li>
							<li><i class="icon-ok"></i> 24x7 support available</li>
							<li><i class="icon-ok"></i> No hidden fees</li>
							<li><i class="icon-ok"></i> Free 30-days trial</li>
							<li><i class="icon-ok"></i> Stop anytime easily</li>
						</ul>
					</div>
				 <?php 
                    if($_SESSION){ ?>
					<div class="pricing-action">
						<a href="pay.php?amt=2500&pid=6293767983" class="btn btn-primary btn-theme"><i class="icon-bolt"></i> Buy now</a>
					</div>
				<?php } ?>
				</div>
			</div>
		</div>
	</div>
	</section>

	<?php include("includes/footer.php"); ?>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/bootstrap.min.js"></script>

	
</body>
</html>
