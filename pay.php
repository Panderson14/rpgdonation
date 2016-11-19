<?php
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
require 'start.php';
require 'PHPMailerAutoload.php';

if(!isset($_GET['success'], $_GET['paymentId'], $_GET['PayerID'])) {
	header('Location: /index.php');
}

if ((bool)$_GET['success'] === false) {
	header('Location: /index.php');
}
$paymentId = $_GET['paymentId'];
$payerId = $_GET['PayerID'];

$payment = Payment::get($paymentId, $paypal);
$execute = new PaymentExecution();
$execute->setPayerId($payerId);
try {
	$result = $payment->execute($execute, $paypal);
} catch (Exception $e){
	header('Location: /index.php');
}
session_start();
$user_name = "root";
$password = NULL;
$database = "rpgcharity";
$server = "localhost";

mysql_connect("$server","$user_name","$password");

mysql_select_db("$database");
$first=$_COOKIE['rpgfirst'];
$last=$_COOKIE['rpglast'];
$email=$_COOKIE['rpgemail'];
$address=$_COOKIE['rpgaddress'];
$city=$_COOKIE['rpgcity'];
$state=$_COOKIE['rpgstate'];
$zip=$_COOKIE['rpgzip'];
$pass=$_COOKIE['rpgpass'];
$credit=$_COOKIE['rpgcredit'];
$expiry=$_COOKIE['rpgexpiry'];
$cvc=$_COOKIE['rpgcvc'];
$hasPaid=1;
//session variable for keeping track of if logged in
$_SESSION['email'] = $email;
$_SESSION['firstName'] = $first;


$order = "INSERT INTO siteusers

        (first_name, last_name, email, address, city, state, zip_code, password, credit, expiry, cvc, hasPaid)

        VALUES

        ('$first', '$last', '$email', '$address', '$city', '$state', '$zip', '$pass', '$credit', '$expiry', '$cvc', '$hasPaid')";


$result = mysql_query($order);

//Send the user an email
$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
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
$mail->AltBody = 'Thanks for signing up, ' . $first . '. We are really excited for you to get started!';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
header('Location: /index.php');
?>