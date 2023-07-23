<?php
include_once __DIR__ . '/../../../config/connection.php';
ini_set('display_errors', 1);
session_start();
if ($_SESSION['head'] == 6 or $_SESSION['head'] == 4 or $_SESSION['head'] == 3) {
    $work = @$_POST['work'];
    if ($work) {
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
                $query = mysqli_query($connection_mag, "select * from mag_articles where id=" . $articleID);
                foreach ($query as $checkG1) {
                }
                if ($checkG1['scientific_group_1'] == $groupID) {
                    echo 'EqualGroups';
                } else {
                    if ($groupID == null or $groupID == '' or $groupID == 'بدون گروه دوم') {
                        $query = mysqli_query($connection_mag, "update mag_articles set scientific_group_2=null where id='$articleID' and sorted=0");
                    } else {
                        $query = mysqli_query($connection_mag, "update mag_articles set scientific_group_2='$groupID' where id='$articleID' and sorted=0");
                    }
                    if (!$query) {
                        echo 'Err';
                    }
                }
                break;
            case 'approveSort':
                $user=$_SESSION['id'];
                $query = mysqli_query($connection_mag, "update mag_articles set sorted=1,sorter='$user' where sorted=0 and id=" . $articleID);
                if (!$query) {
                    echo 'Err';
                }
                break;
        }
    }
    elseif (isset($_FILES['SortingClassificationFile'])) {
        $user=$_SESSION['id'];
        $SortingClassificationFile_size = $_FILES['SortingClassificationFile']['size'];
        $SortingClassificationFile_name = $_FILES['SortingClassificationFile']['name'];
        $SortingClassificationFile_type = $_FILES['SortingClassificationFile']['type'];
        $SortingClassificationFile_tmpname = $_FILES["SortingClassificationFile"]["tmp_name"];
        $bytes = random_bytes(20);
        $encodedString = bin2hex($bytes);
        $directory = __DIR__ . "/../../../Files/Proceedings_Files/Sorting/" . $encodedString . $SortingClassificationFile_name;
        if (!mkdir($directory, 0777, true) && !is_dir($directory)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $directory));
        }
        move_uploaded_file($SortingClassificationFile_tmpname, $directory . '/' . $SortingClassificationFile_name);
        $postFileDirectory = "Files/Proceedings_Files/Sorting/" . $encodedString . $SortingClassificationFile_name . '/' . $SortingClassificationFile_name;

        $query=mysqli_query($connection_mag,"insert into sorting_classifications (file_name, src, adder, added_date) values ('$SortingClassificationFile_name','$postFileDirectory','$user','$datewithtime')");
        if ($query){
            $lastInsertID =mysqli_insert_id($connection_mag);
            $query=mysqli_query($connection_mag,"select * from mag_articles where sorted=1 and sorting_classification_id is null");
            foreach ($query as $notSortedArticles) {
                $articleID=$notSortedArticles['id'];
                mysqli_query($connection_maghalat,"update article set rate_status='اجمالی' where article_id='$articleID'");
            }
            mysqli_query($connection_mag, "update mag_articles set sorting_classification_id='$lastInsertID' where sorted=1 and (sorting_classification_id is null or sorting_classification_id='')");
            echo 'Done';
        } else {
            echo "ErrorForSubmittingFile";
        }
    }elseif (isset($_POST['ApproveSort'])){
        $user=$_SESSION['id'];
        $query=mysqli_query($connection_mag,"select * from mag_articles where sorted=1 and sorting_classification_id is null");
        foreach ($query as $notSortedArticles) {
            $articleID=$notSortedArticles['id'];
            mysqli_query($connection_maghalat,"update article set rate_status='اجمالی' where article_id='$articleID'");
        }
        mysqli_query($connection_mag, "update mag_articles set sorted='1',sorter='$user',sort_date='$datewithtime' where sorted=1 and sort_date is null");
    }
}