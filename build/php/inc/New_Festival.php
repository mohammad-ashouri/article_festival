<?php

if (isset($_POST['New_Festival']) and !empty($_POST['festival_name'])){
    include_once __DIR__.'/../../../config/connection.php';
    session_start();
    $festival_name=$_POST['festival_name'];
    $password=$_POST['password'];
    $registrar=$_SESSION['id'];
    echo $start_date=$_POST['start_date'];

//    $QueryForCheckFestivalExists=mysqli_query($connection_maghalat,"select * from festival where name='$festival_name'");
//    foreach ($QueryForCheckFestivalExists as $Festivalitem){}
//
//    $QueryForCheckPassword=mysqli_query($connection_maghalat,"select * from users where id='$registrar' and type=4");
//    foreach ($QueryForCheckPassword as $Passworditem){}
//    $pass=$Passworditem['password'];
//
//    if (!empty($Festivalitem)){
//        header("Location: ../../../festival_manager.php?FestivalFounded");
//    }
//    elseif (!password_verify($password,$pass)){
//        header("Location: ../../../festival_manager.php?WrongPassword");
//    }
//    else{
//        mysqli_query($connection_maghalat, "update festival set active=0 where active=1");
//        mysqli_query($connection_maghalat,"insert into festival (name, start_date, starter) values ('$festival_name','$start_date','$registrar')");
//        header("Location: ../../../festival_manager.php?NewFestival&name=$festival_name");
//    }
}