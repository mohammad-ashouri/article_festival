<?php include_once __DIR__ . '/../../../config/connection.php'; ?>
<!DOCTYPE html>
<html>
<body>
<?php
session_start();
$coderater = $_GET['coderater'];
$codeasar = $_GET['codeasar'];
$registrar = $_SESSION['id'];
$query=mysqli_query($connection_mag,"select * from mag_articles where id='$codeasar'");
foreach ($query as $festival_detail){}
$festival_id=$festival_detail['festival_id'];
$query=mysqli_query($connection_maghalat,"select * from article where festival_id='$festival_id' and article_id='$codeasar'");
foreach ($query as $CheckIfArticleExists){}
if (empty($CheckIfArticleExists)){
    mysqli_query($connection_maghalat,"insert into article (article_id, festival_id,ejmali2_registrar_g2,ejmali2_set_date_g2, adder, date_added) values ('$codeasar','$festival_id','$registrar','$datewithtime','$registrar','$datewithtime')");
    mysqli_query($connection_maghalat,"update article set ejmali2_ratercode_g2='$coderater' where article_id='$codeasar'");
}else{
    mysqli_query($connection_maghalat,"update article set ejmali2_ratercode_g2='$coderater',ejmali2_registrar_g2='$registrar',ejmali2_set_date_g2='$datewithtime' where article_id='$codeasar'");
}

$codeasar = null;
$coderater = null;
mysqli_close($connection_maghalat);
?>

</body>
</html>