<?php
include_once __DIR__ . '/../../../config/connection.php';
session_start();
if ($_SESSION['head'] == 3 or $_SESSION['head'] == 4) {
    $editor = $_SESSION['id'];
    $versionID = $_POST['id'];
    mysqli_query($connection_mag, "update mag_versions set active=0 ,deleted=1 , editor='$editor',edited_date='$datewithtime' where id='$versionID'");
}