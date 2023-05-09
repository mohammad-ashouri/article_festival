<?php include_once __DIR__.'/header.php';
switch ($_SESSION['head']){
    case 1:
        include_once 'Pages/Panels/Raters.php';
        break;
    case 2:
        break;
    case 3:
    case 4:
        include_once 'Pages/Panels/Admins.php';
        break;
    case 5:
        include_once 'Pages/Panels/Journal_Admin.php';
        break;
}
include_once __DIR__.'/footer.php';



