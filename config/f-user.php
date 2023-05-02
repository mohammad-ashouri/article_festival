<?php
include_once 'connection.php';
?>
<?php
function login_user($user,$pass){
    $sql="select `username`,`password` from rater_list where username='".$user."' && password='".$pass."'";
    run_mysql_query($sql);
}
?>