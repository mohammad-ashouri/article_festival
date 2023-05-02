<?php
session_start();
include_once __DIR__.'/../../../config/connection.php';
$user=$_SESSION['username'].' from ';
$subject=$_POST['subject'];
mysqli_query($connection_variables,"insert into person_subjects (subject,adder,added_date) values ('$subject','$user','$datewithtime')");
header("Location: ../../../mag_manager.php?AddedSubject");
