<?php
require 'vendor/autoload.php';
define('SITE_URL', 'localhost');
$paypal = new \PayPal\Rest\ApiContext(
	new \PayPal\Auth\OAuthTokenCredential(
	'ATpha6bIx-_I4IVCqKO6k5x4tab935kswgNSSDwqZ6UC8JFR7Mj-L_zm3dFG01ZDPJQLCaTkj_Y9rXqa',
	'EFrPxjQau8DfTcQjrW4PDGor1wq2jxoSWMY25wkO-1bBWkhwnwLlImbKOaY-pURD9NCPW_-lTQFx7Cx_')
);


