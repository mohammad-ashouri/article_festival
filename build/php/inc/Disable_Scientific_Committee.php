<?php
include_once __DIR__.'/../../../config/connection.php';
session_start();
if (isset($_POST['Scientific_Committee']) and !empty($_SESSION['id'])) {
    $user=$_SESSION['id'];
    echo $Scientific_Committee=$_POST['Scientific_Committee'];
    $query=mysqli_query($connection_variables,"select * from mag_festival_scientific_committee where id='$Scientific_Committee'");
    foreach ($query as $check){}
    if (!empty($check)){
        mysqli_query($connection_variables,"update mag_festival_scientific_committee set active=0 where id='$Scientific_Committee'");
        header("Location: ../../../catalogs.php?Scientific_Committee_Enabled");
    }else{
        header("Location: ../../../catalogs.php?Scientific_Committee_Not_Founded");
    }
}
