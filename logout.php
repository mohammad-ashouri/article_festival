<?php

session_start();
include_once __DIR__.'/config/connection.php';
include_once 'build/php/functions.php';

$urlofthispage=$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
$user= $_SESSION['id'];
$operation="Logout user= $user";
logsend($operation,$urlofthispage,$connection_maghalat);
unset($_SESSION["id"]);
unset($_SESSION["islogin"]);
unset($_SESSION["username"]);
unset($_SESSION['head']);

header("Location: index.php");