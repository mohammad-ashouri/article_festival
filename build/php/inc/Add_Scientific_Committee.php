<?php
include_once __DIR__.'/../../../config/connection.php';
session_start();
if (isset($_POST['Scientific_Committee_Subject']) and isset($_POST['Scientific_Committee_Name']) and isset($_POST['Scientific_Committee_Family']) and !empty($_SESSION['id'])) {
    $user=$_SESSION['id'];
    $Scientific_Committee_Subject=$_POST['Scientific_Committee_Subject'];
    $Scientific_Committee_Name=$_POST['Scientific_Committee_Name'];
    $Scientific_Committee_Family=$_POST['Scientific_Committee_Family'];
    $Scientific_Committee_National_Code=$_POST['Scientific_Committee_National_Code'];
    $Scientific_Committee_Position=$_POST['Scientific_Committee_Position'];
    $query=mysqli_query($connection_variables,"select * from mag_festival_scientific_committee where name='$Scientific_Committee_Name' and family='$Scientific_Committee_Family'");
    foreach ($query as $check){}
    if (empty($check)){
        mysqli_query($connection_variables,"insert into mag_festival_scientific_committee (subject, name, family,national_code,position,adder,added_date) values ('$Scientific_Committee_Subject','$Scientific_Committee_Name','$Scientific_Committee_Family','$Scientific_Committee_National_Code','$Scientific_Committee_Position','$user','$datewithtime')");
        header("Location: ../../../catalogs.php?Scientific_Committee_Added");
    }else{
        header("Location: ../../../catalogs.php?Scientific_Committee_Founded");
    }
}
