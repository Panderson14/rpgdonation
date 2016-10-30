<?php
require 'PHPMailerAutoload.php';
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


$order = "INSERT INTO siteusers

        (first_name, last_name, email, address, city, state, zip_code, password)

        VALUES

        ('$first', '$last', '$email', '$address', '$city', '$state', '$zip', '$pass')";


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
header('Location: /index.html')
?>