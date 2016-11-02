<?php
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
require 'start.php';

if(!isset($_GET['success'], $_GET['paymentId'], $_GET['PayerID'])) {
	die();
}

if ((bool)$_GET['success'] === false) {
	die();
}
$paymentId = $_GET['paymentId'];
$payerId = $_GET['PayerID'];

$payment = Payment::get($paymentId, $paypal);
$execute = new PaymentExecution();
$execute->setPayerId($payerId);
try {
	$result = $payment->execute($execute, $paypal);
} catch (Exception $e){
	header('Location: /index.html');
}

$user_name = "root";
$password = NULL;
$database = "rpgcharity";
$server = "localhost";
//$conn = new mysqli($server, $user_name, $password, $database);

mysql_connect("$server","$user_name","$password");

mysql_select_db("$database");

$email = $_COOKIE['rpgemail'];
$sql = "UPDATE siteusers SET hasPaid='1' WHERE email='" . $email . "'";
//$conn->query($sql);
//conn->close
$result = mysql_query($sql);
header('Location: /index.html');
?>