<?php
include_once __DIR__ . '/../../../config/connection.php';
session_start();
function convertPersianToEnglish($number) {
    $persianNumbers = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
    $englishNumbers = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
    return str_replace($persianNumbers, $englishNumbers, $number);
}
if ($_SESSION['head'] == 3 or $_SESSION['head'] == 4) {
    $versionID = $_POST['editedVersionID'];
    $editor = $_SESSION['id'];

    $editedPublicationPeriodYear = $_POST['editedPublicationPeriodYear'];
    $editedPublicationPeriodNumber = $_POST['editedPublicationPeriodNumber'];
    $editedPublicationNumber = $_POST['editedPublicationNumber'];
    $editedPublicationYear = convertPersianToEnglish($_POST['editedPublicationYear']);
    $editedNumberOfPages = $_POST['editedNumberOfPages'];
    $editedNumberOfArticles = $_POST['editedNumberOfArticles'];

    $query="update mag_versions set publication_period_year='$editedPublicationPeriodYear',publication_period_number='$editedPublicationPeriodNumber',
                        publication_number='$editedPublicationNumber',publication_year='$editedPublicationYear',
                        number_of_pages='$editedNumberOfPages',number_of_articles='$editedNumberOfArticles',editor='$editor',edited_date='$datewithtime' where
                                                                               id='$versionID'";
    mysqli_query($connection_mag, $query);

    if (isset($_FILES['editedCoverUrl2'])) {
        $editedCoverUrl2 = $_FILES['editedCoverUrl2'];

        $cover_url_size = $_FILES['editedCoverUrl2']['size'];
        $cover_url_name = $_FILES['editedCoverUrl2']['name'];
        $cover_url_type = $_FILES['editedCoverUrl2']['type'];
        $cover_url_tmpname = $_FILES["editedCoverUrl2"]["tmp_name"];
        $allowed_jpg = array('jpg', 'jpeg', 'pdf');
        $ext_jpg = pathinfo($cover_url_name, PATHINFO_EXTENSION);

        $folder_name = $versionID . '-' . $editedPublicationPeriodYear . '-' . $editedPublicationPeriodNumber . '-' . $editedPublicationNumber . '-' . $editedPublicationYear . '-' . time() . '-' . $editor;
        $cover_address = "Files/Mag_Files/$folder_name/" . $cover_url_name;

        if (!mkdir($concurrentDirectory = __DIR__ . "/../../../Files/Mag_Files/" . $folder_name) && !is_dir($concurrentDirectory)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory));
        }
        $query="update mag_versions set cover_url='$cover_address',editor='$editor',edited_date='$datewithtime' where id='$versionID'";
        mysqli_query($connection_mag, $query);
        move_uploaded_file($cover_url_tmpname, __DIR__ . "/../../../Files/Mag_Files/$folder_name/" . $cover_url_name);
    }

    if (isset($_FILES['editedFileUrl2'])) {
        $editedCoverUrl2 = $_FILES['editedFileUrl2'];

        $file_url_size = $_FILES['editedFileUrl2']['size'];
        $file_url_name = $_FILES['editedFileUrl2']['name'];
        $file_url_type = $_FILES['editedFileUrl2']['type'];
        $file_url_tmpname = $_FILES["editedFileUrl2"]["tmp_name"];
        $allowed_pdf = array('pdf', 'doc', 'docx');
        $ext_pdf = pathinfo($file_url_name, PATHINFO_EXTENSION);

        $folder_name = $versionID . '-' . $editedPublicationPeriodYear . '-' . $editedPublicationPeriodNumber . '-' . $editedPublicationNumber . '-' . $editedPublicationYear . '-' . time() . '-' . $editor;
        $file_address = "Files/Mag_Files/$folder_name/" . $file_url_name;

        $folder_name = $versionID . '-' . $editedPublicationPeriodYear . '-' . $editedPublicationPeriodNumber . '-' . $editedPublicationNumber . '-' . $editedPublicationYear . '-' . time() . '-' . $editor;
        if (!mkdir($concurrentDirectory = __DIR__ . "/../../../Files/Mag_Files/" . $folder_name) && !is_dir($concurrentDirectory)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory));
        }
        $query="update mag_versions set file_url='$file_address',editor='$editor',edited_date='$datewithtime' where id='$versionID'";
        mysqli_query($connection_mag, $query);

        move_uploaded_file($file_url_tmpname, __DIR__ . "/../../../Files/Mag_Files/$folder_name/" . $file_url_name);
    }

}