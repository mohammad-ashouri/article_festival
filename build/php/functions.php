<?php

// used in festival_manager.php
function last_festival_id($connection_maghalat){
    $query=mysqli_query($connection_maghalat,"select * from festival order by id desc limit 1");
    foreach ($query as $last_id){}
    return @$last_id['id'];
}

// used in panel.php
function showlastseentimeonnavbar($connection,$user){
    $showlastlogindatequery=mysqli_query($connection,"select * from log_helli where username='$user' and logout_year is not null");
    foreach ($showlastlogindatequery as $showlastlogindate){}
    echo @$showlastlogindate['login_year']."/".@$showlastlogindate['login_month']."/".@$showlastlogindate['login_day'].' '.@$showlastlogindate['login_hour'].":".@$showlastlogindate['login_minute'];
}

// used in index.php
function getIPAddress(){
    //whether ip is from the share internet
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } //whether ip is from the proxy
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } //whether ip is from the remote address
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function logsend($operation,$urlofthispage,$connection_maghalat){
    $year=jdate('Y');
    $month=jdate('n');
    $day=jdate('j');
    $hour=jdate('H');
    $min=jdate('i');
    $sec=jdate('s');
    $datewithtime=$year."/".$month."/".$day.' '.$hour.":".$min;
    if (!empty($_SESSION['id'])){
        $user=$_SESSION['id'];
    }
    else{
        $user=0;
    }
    $ip=getIPAddress();
    $browsername=$_SERVER['HTTP_USER_AGENT'];
    mysqli_query($connection_maghalat,"insert into logs (user_id,operation,url,dateandtime,ip_address,browser) values ('$user','$operation','$urlofthispage','$datewithtime','$ip','$browsername')");
}