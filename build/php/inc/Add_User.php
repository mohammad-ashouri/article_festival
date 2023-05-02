<?php
include_once __DIR__ . '/../../../config/connection.php';

if (isset($_POST['Add_User']) and !empty($_POST['username'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_ARGON2I);
    $name = $_POST['name'];
    $family = $_POST['family'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];
    @$service_location = $_POST['service_location'];
    @$address = $_POST['address'];
    @$bank_name = $_POST['bank_name'];
    @$bank_id = $_POST['bank_id'];
    @$debit_card_id = $_POST['debit_card_id'];
    @$shaba = $_POST['shaba'];
    $type = $_POST['type'];
    @$scientific_group = implode('||', $_POST['scientific_group']);

    $registrar = $_SESSION['id'];
    if ($service_location==null or $service_location=''){
        $service_location=0;
    }
    if ($bank_id==null or $bank_id==''){
        $bank_id=0;
    }
    if ($debit_card_id==null or $debit_card_id==''){
        $debit_card_id=0;
    }
    $QueryForCheckUserExists = mysqli_query($connection_maghalat, "select * from users where username='$username'");
    foreach ($QueryForCheckUserExists as $item) {
    }
    if (!empty($item)) {
        header("Location: ../../../user_manager.php?UserFounded");
    } else {
        mysqli_query($connection_maghalat, "insert into users (username, password, name, family, gender, national_code,service_location, phone, address, bank_name, bank_id, shaba, debit_card_id, scientific_group, type, date_added, registrar)
                                                            values ('$username','$password','$name','$family','$gender','$username','$service_location','$mobile','$address','$bank_name','$bank_id','$shaba','$debit_card_id','$scientific_group','$type','$datewithtime','$registrar')");
        header("Location: ../../../user_manager.php?UserAdded&user=$username");
    }
} else {

}