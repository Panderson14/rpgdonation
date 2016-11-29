<?php
use PayPal\Api\Payer;
require 'start.php';
$product = 'RPG Membership';
$price = 1.00;
$shipping = 0.00;

$total = $price + $shipping;

$payer = new Payer();
$payer->setPaymentMethod('paypal');
>