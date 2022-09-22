<?php
ob_start();
include ('connection.php');
######################################
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
@$a = $xyz / 0; // no error 

//destroy all session
unset($_SESSION['id']);
unset($_SESSION['accttype']);
$_SESSION['errmsg'] ="Account Logout Successfully!!!";
header("location:index.php");
exit;
?>