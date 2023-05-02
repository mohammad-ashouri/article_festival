<?php
include_once __DIR__.'/../../../config/connection.php';
session_start();
if (isset($_POST['Special_Type']) and !empty($_SESSION['id'])) {
    $user=$_SESSION['id'];
    $Special_Type=$_POST['Special_Type'];
    $query=mysqli_query($connection_maghalat,"select * from special_type where subject='$Special_Type'");
    foreach ($query as $check){}
    if (empty($check)){
        mysqli_query($connection_maghalat,"insert into special_type (subject, adder, added_date) values ('$Special_Type','$user','$datewithtime')");
        header("Location: ../../../catalogs.php?Special_Type_Added");
    }else{
        header("Location: ../../../catalogs.php?Special_Type_Founded");
    }
}
