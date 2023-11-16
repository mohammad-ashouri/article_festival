<?php
include_once __DIR__ . '/../../config/connection.php';
session_start();
$user = $_SESSION['id'];
if (($_SESSION['head'] == 3 or $_SESSION['head'] == 4)) {
    switch ($_POST['work']) {
        case 'ChangeRateStatus':
            $articleID = $_POST['id'];
            $query = mysqli_query($connection_maghalat, "update article set rate_status='تفصیلی سوم',grade=null,editor='$user',edited_date='$datewithtime' where article_id='$articleID'");
            if (!$query) {
                return false;
            }
            break;
    }
}