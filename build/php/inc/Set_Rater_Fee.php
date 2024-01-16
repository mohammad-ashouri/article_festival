<?php
if (isset($_POST['festival_id']) and !empty($_POST['ejmali']) and !empty($_POST['tafsili'])){
    include_once __DIR__ . '/../../../config/connection.php';
    session_start();
    $festivalId=$_POST['festival_id'];
    $ejmali=$_POST['ejmali'];
    $tafsili=$_POST['tafsili'];
    $registrar=$_SESSION['id'];
    $query=mysqli_query($connection_maghalat,"insert into fees (festival_id, ejmali, tafsili, user_id, edited_at) values ('$festivalId','$ejmali','$tafsili','$registrar','$datewithtime')");
    header("Location: ../../../rater_fees.php?FeeSet&festival=$festivalId");
}
    header("Location: ../../../rater_fees.php?ErrorSetFee");
