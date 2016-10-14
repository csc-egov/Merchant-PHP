<?php
require_once 'includes/Bridge_connector.php';

$bconn = new Bridge_connector();
$p = array('csc_id' => 'sandeep', 'txn_amount' => 100 + rand(0,9));
$bconn->set_params($p);
?>
<!DOCTYPE html>
<html lang="en">
<body>
<div id="container">
	<form id="buy_f" method="post" action="http://localhost/sandeep/bridge/index.php/pay/m2b/1000">
		<input type="hidden" name="message1" value="<?=0;?>" />
		<input type="hidden" name="message" value="<?=$bconn->get_parameter_string();?>" />
		<input type="submit" value="Pay" />
	</form>
</div>
	
</body>
</html>
