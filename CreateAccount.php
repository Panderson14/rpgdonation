<?php

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


$order = "INSERT INTO siteusers

        (first_name, last_name, email, address, city, state, zip_code)

        VALUES

        ('$first', '$last', '$email', '$address', '$city', '$state', '$zip')";


$result = mysql_query($order);
header('Location: /index.html')
?>