<?php
ini_set('display_errors', 1);
include_once __DIR__.'/config/connection.php';
include_once __DIR__. '/build/php/functions.php';
session_start();

// $urlofthispage = $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];

//type=1 => rater
//type=2 => header
//type=3 => admin
//type=4 => super-admin
//type=5 => journal-admin
//approved=0 => کاربر غیر فعال شده
$dateforinsertloglogins = $year . '/' . $month . '/' . $day . ' ' . $hour . ':' . $min . ':' . $sec;

if (isset($_POST) & !empty($_POST)) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    if ((!isset($_POST['submit']) and empty($user)) or empty($pass)) {
        $operation = "LoginError";
        logsend($operation, $urlofthispage, $connection_maghalat);
        header("location:index?error");
    } else {
        $result = mysqli_query($connection_maghalat, "select * from users where username='$user'");
        foreach ($result as $rows) {
        }
        if (empty($rows)) {
            $operation = "NotFoundUser - Entered User=$user";
            logsend($operation, $urlofthispage, $connection_maghalat);
            header("location:index.php?NotFoundUser-UserWrong");
        } elseif (!password_verify($pass, $rows['password'])) {
            $operation = "WrongPassword - Entered User=$user";
            logsend($operation, $urlofthispage, $connection_maghalat);
            header("location:index.php?WrongPassword-UserWrong");
        } else {
            if ($rows['approved'] == 0) {
                $operation = "NotApproved - Entered User=$user";
                logsend($operation, $urlofthispage, $connection_maghalat);
                header("location:index.php?NotApprovedUser");
            } else {
                if ($user==$rows['username']) {
                    $_SESSION['username'] = $rows['username'];
                    $_SESSION['head'] = $rows['type'];
                    $_SESSION['islogin'] = true;
                    $_SESSION['id'] = $rows['id'];
                    $_SESSION['start'] = time();
                    $_SESSION['end'] = $_SESSION['start'] + (36000);
                    if ($rows['type'] == 1) {
                        $operation = "RaterLoginSuccess";
                        logsend($operation, $urlofthispage, $connection_maghalat);
                        header("location:panel.php");
                    } elseif ($rows['type'] == 2) {
                        $operation = "AdminLoginSuccess";
                        logsend($operation, $urlofthispage, $connection_maghalat);
                        header("location:panel.php");
                    } elseif ($rows['type'] == 3) {
                        $operation = "HeaderLoginSuccess";
                        logsend($operation, $urlofthispage, $connection_maghalat);
                        header("location:panel.php");
                    } elseif ($rows['type'] == 4) {
                        $operation = "CityAdminLoginSuccess";
                        logsend($operation, $urlofthispage, $connection_maghalat);
                        header("location:panel.php");
                    } elseif ($rows['type'] == 5) {
                        $operation = "JournalAdminLoginSuccess";
                        logsend($operation, $urlofthispage, $connection_maghalat);
                        header("location:panel.php");
                    } elseif ($rows['type'] == 6) {
                        $operation = "SorterLoginSuccess";
                        logsend($operation, $urlofthispage, $connection_maghalat);
                        header("location:panel.php");
                    }
                }
            }
        }
    }
}
