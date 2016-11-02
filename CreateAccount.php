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
require 'PHPMailerAutoload.php';
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
setcookie("rpgemail", $email, time() + (86400 * 30), "/"); 
try {
	$payment->create($paypal);
} catch (Exception $e) {
	echo $e;
}


$approvalUrl = $payment->getApprovalLink();
header("Location: {$approvalUrl}");

$user_name = "root";
$password = NULL;
$database = "rpgcharity";
$server = "localhost";

mysql_connect("$server","$user_name","$password");

mysql_select_db("$database");
$first=$_POST['first'];
$last=$_POST['last'];
$email=$_POST['email'];
$address=$_POST['address'];
$city=$_POST['city'];
$state=$_POST['state'];
$zip=$_POST['zipcode'];
$pass=$_POST['pass'];
$credit=$_POST['number'];
$expiry=$_POST['expiry'];
$cvc=$_POST['cvc'];
$hasPaid=0;
//setcookie("rpgemail", $email, time() + (86400 * 30), "/"); 


$order = "INSERT INTO siteusers

        (first_name, last_name, email, address, city, state, zip_code, password, credit, expiry, cvc, hasPaid)

        VALUES

        ('$first', '$last', '$email', '$address', '$city', '$state', '$zip', '$pass', '$credit', '$expiry', '$cvc', '$hasPaid')";


$result = mysql_query($order);


$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  					  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'rpgcharity@gmail.com';                 // SMTP username
$mail->Password = 'charity4U';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('rpgcharity@gmail.com', 'RPG Charity');
$mail->addAddress($email, $first + $last);     // Add a recipient, Name is optional
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Thanks for Signing Up';
$mail->Body    = 'Thanks for signing up, ' . $first . '. We are really excited for you to get started!';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
//header('Location: /index.html');
?>