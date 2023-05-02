<?php
include_once __DIR__.'/../../../config/connection.php';
session_start();
if (isset($_POST['Service_Location']) and !empty($_SESSION['id'])) {
    $user=$_SESSION['id'];
    $Service_Location=$_POST['Service_Location'];
    $query=mysqli_query($connection_variables,"select * from service_location where subject='$Service_Location'");
    foreach ($query as $check){}
    if (!empty($check)){
        mysqli_query($connection_variables,"update service_location set active=0 where subject='$Service_Location'");
        header("Location: ../../../catalogs.php?Service_Location_Disabled");
    }else{
        header("Location: ../../../catalogs.php?Service_Location_Not_Founded");
    }
}
