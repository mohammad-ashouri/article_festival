<?php include_once __DIR__.'/header.php';
if (isset($_POST['ej'])){
    include_once 'Pages/Rate_Pages/Ejmali.php';
}elseif (isset($_POST['ta'])){
    include_once 'Pages/Rate_Pages/Tafsili.php';
}
include_once __DIR__.'/footer.php';
?>


