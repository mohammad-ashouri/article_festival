<?php
include_once __DIR__ . '/../../../config/connection.php';
session_start();
if ($_SESSION['head'] == 6 or $_SESSION['head'] == 4 or $_SESSION['head'] == 3) {
    $work = $_POST['work'];
    $articleID = $_POST['articleID'];
    switch ($work) {
        case 'sortG1':
            $groupID = $_POST['groupID'];
            $query = mysqli_query($connection_mag, "update mag_articles set scientific_group_1='$groupID' where id='$articleID' and sorted=0");
            if (!$query) {
                echo 'Err';
            }
            break;
        case 'sortG2':
            $groupID = $_POST['groupID'];
            if ($groupID==null or $groupID=='' or $groupID=='بدون گروه دوم') {
                $query = mysqli_query($connection_mag, "update mag_articles set scientific_group_2=null where id='$articleID' and sorted=0");
            }else{
                $query = mysqli_query($connection_mag, "update mag_articles set scientific_group_2='$groupID' where id='$articleID' and sorted=0");
            }
            if (!$query) {
                echo 'Err';
            }
            break;
        case 'approveSort':
            $query=mysqli_query($connection_mag,"update mag_articles set sorted=1 where sorted=0 and id=".$articleID);
            if (!$query) {
                echo 'Err';
            }
            break;
    }
}