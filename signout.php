<?php
//Code to end the PHP Session currently at
session_start();
session_destroy();
header("Location: /index.php");	
?>