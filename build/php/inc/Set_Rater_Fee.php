<?php
if (isset($_POST['festival_id']) and !empty($_POST['ejmali']) and !empty($_POST['tafsili'])) {
    include_once __DIR__ . '/../../../config/connection.php';
    session_start();
    $festivalId = $_POST['festival_id'];
    $ejmali = $_POST['ejmali'];
    $tafsili = $_POST['tafsili'];
    $registrar = $_SESSION['id'];
    $query = mysqli_query($connection_maghalat, "select * from fees where festival_id=$festivalId");
    if (mysqli_num_rows($query) < 1) {
        $query = mysqli_query($connection_maghalat, "insert into fees (festival_id, ejmali, tafsili, user_id, edited_at) values ('$festivalId','$ejmali','$tafsili','$registrar','$datewithtime')");
    } else {
        $query = mysqli_query($connection_maghalat, "update fees set ejmali='$ejmali',tafsili='$tafsili',user_id='$registrar',edited_at='$datewithtime' where festival_id='$festivalId'");
    }
    if (mysqli_affected_rows($connection_maghalat) > 0) {
        header("Location: ../../../rater_fees.php?FeeSet&festival=$festivalId");
    } else {
        header("Location: ../../../rater_fees.php?ErrorSetFee");
    }
} else {
    header("Location: ../../../rater_fees.php?ErrorSetFee");
}
