<?php
session_start();
include_once __DIR__.'/../../../config/connection.php';

$user=$_SESSION['id'];
if ($_POST['Subname']=='SubEjmali' and !empty($_POST['id']) and !empty($_POST['scientific_group'])){
    $r1=$_POST['r1'];
    $r2=$_POST['r2'];
    $r3=$_POST['r3'];
    $r4=$_POST['r4'];
    $asar=$_POST['id'];
    $query=mysqli_query($connection_maghalat,"select * from article where id='$asar'");
    foreach ($query as $article_info){}

}