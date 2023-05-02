<?php
include_once __DIR__.'/../../../config/connection.php';
session_start();
if (isset($_POST['Special_Type']) and !empty($_SESSION['id'])) {
    $user=$_SESSION['id'];
    $Special_Type=$_POST['Special_Type'];
    $query=mysqli_query($connection_maghalat,"select * from special_type where subject='$Special_Type'");
    foreach ($query as $check){}
    if (!empty($check)){
        mysqli_query($connection_maghalat,"update special_type set active=0 where subject='$Special_Type'");
        header("Location: ../../../catalogs.php?Special_Type_Disabled");
    }else{
        header("Location: ../../../catalogs.php?Special_Type_Not_Founded");
    }
}
