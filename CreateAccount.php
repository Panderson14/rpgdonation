<?php
use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;

require 'start.php';
$product = 'RPG Membership';
$price = 1.00;
$shipping = 0.00;

$total = $price + $shipping;

$payer = new Payer();
$payer->setPaymentMethod('paypal');

$item = new Item();
$item->setName($product)
	->setCurrency('USD')
	->setQuantity(1)
	->setPrice($price);

$itemList = new ItemList();
$itemList->setItems(array($item));
$details = new Details();
$details->setShipping($shipping)
	->setSubtotal($price);
$amount = new Amount();
$amount->setCurrency('USD')
	->setTotal($total)
	->setDetails($details);

$transaction = new Transaction();
$transaction->setAmount($amount)
	->setItemList($itemList)
	->setDescription('Payment for RPG Charity Membership')
	->setInvoiceNumber(uniqid());
$redirectUrls = new RedirectUrls();
$redirectUrls->setReturnUrl('http://localhost/pay.php?success=true')
	->setCancelUrl('http://localhost/pay.php?success=false');
$payment = new Payment();
$payment->setIntent('sale')
	->setPayer($payer)
	->setRedirectUrls($redirectUrls)
	->setTransactions(array($transaction));
$email=$_POST['email'];
$first=$_POST['first'];
$last=$_POST['last'];
$address=$_POST['address'];
$city=$_POST['city'];
$state=$_POST['state'];
$zip=$_POST['zipcode'];
$pass=$_POST['pass'];
$credit=$_POST['number'];
$expiry=$_POST['expiry'];
$cvc=$_POST['cvc'];
setcookie("rpgemail", $email, time() + (1200));
setcookie("rpgfirst", $first, time() + (1200));
setcookie("rpglast", $last, time() + (1200));
setcookie("rpgaddress", $address, time() + (1200));
setcookie("rpgcity", $city, time() + (1200));
setcookie("rpgstate", $state, time() + (1200));
setcookie("rpgzip", $zip, time() + (1200));
setcookie("rpgpass", $pass, time() + (1200));
setcookie("rpgcredit", $credit, time() + (1200));
setcookie("rpgexpiry", $expiry, time() + (1200));
setcookie("rpgcvc", $cvc, time() + (1200));


try {
	$payment->create($paypal);
} catch (Exception $e) {
	echo $e;
}


$approvalUrl = $payment->getApprovalLink();
header("Location: {$approvalUrl}");
?>