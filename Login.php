<?php
$user_name = "root";
$password = NULL;
$database = "rpgcharity";
$server = "localhost";
$loginSuccess = false;

mysql_connect("$server","$user_name","$password");

mysql_select_db("$database");
$email = $_POST['email'];
$password = $_POST['password'];
$order = "SELECT * FROM siteusers WHERE email='$email'";

$result = mysql_query($order);
echo $result;
$row = mysql_fetch_array($result);
if ($row['password'] == $password){
	$first = $row['first_name'];
	session_start();
	$_SESSION['email'] = $email;
	$_SESSION['firstName'] = $first;
	$loginSuccess = true;
}
if($loginSuccess){
	header("Location: /index.php");
} else {
	header("Location: /gg.php");
}

?>