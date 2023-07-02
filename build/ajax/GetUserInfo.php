<?php include_once __DIR__ . '/../../config/connection.php';
session_start();
$userID = $_GET['id'];
$query = mysqli_query($connection_maghalat, "select * from users where id='$userID'");
foreach ($query as $userInfo) {
}
header('Content-Type: application/json');
echo json_encode([
    'id' => $userInfo['id'] ,
    'name' => $userInfo['name'] ,
    'family' => $userInfo['family'] ,
    'national_code' => $userInfo['national_code'] ,
]);
mysqli_close($connection_maghalat);
session_abort();
?>