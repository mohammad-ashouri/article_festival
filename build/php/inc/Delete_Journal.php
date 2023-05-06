<?php
include_once __DIR__ . '/../../../config/connection.php';
session_start();
if ($_SESSION['head'] == 3 or $_SESSION['head'] == 4) {
    $editor = $_SESSION['id'];
    $magID = $_POST['id'];
    mysqli_query($connection_mag, "update mag_info set active=0 ,deleted=1 , editor='$editor',edited_date='$datewithtime' where id='$magID'");
}