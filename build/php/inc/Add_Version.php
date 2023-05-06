<?php
session_start();
include_once __DIR__ . '/../../../config/connection.php';
function convertPersianToEnglish($number) {
    $persianNumbers = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
    $englishNumbers = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
    return str_replace($persianNumbers, $englishNumbers, $number);
}

if (isset($_POST['Sub_Mag_Version']) and isset($_POST['mag_name'])) {
    $mag_id = $_POST['mag_name'];
    $publication_period_year = $_POST['publication_period_year'];
    $publication_period_number = $_POST['publication_period_number'];
    $publication_number = $_POST['publication_number'];
    $publication_year = convertPersianToEnglish($_POST['publication_year']);
    $number_of_pages = $_POST['number_of_pages'];
    $number_of_articles = $_POST['number_of_articles'];

    $cover_url_size = $_FILES['cover_url']['size'];
    $cover_url_name = $_FILES['cover_url']['name'];
    $cover_url_type = $_FILES['cover_url']['type'];
    $cover_url_tmpname = $_FILES["cover_url"]["tmp_name"];

    $file_url_size = $_FILES['file_url']['size'];
    $file_url_name = $_FILES['file_url']['name'];
    $file_url_type = $_FILES['file_url']['type'];
    $file_url_tmpname = $_FILES["file_url"]["tmp_name"];

    $allowed_pdf = array('pdf', 'doc', 'docx');
    $ext_pdf = pathinfo($file_url_name, PATHINFO_EXTENSION);

    $allowed_jpg = array('jpg', 'jpeg', 'pdf');
    $ext_jpg = pathinfo($cover_url_name, PATHINFO_EXTENSION);

    $adhesive = $_SESSION['id'];

    if ($cover_url_size > 10485760 or $file_url_size > 10485760) {
        header("location: ../../../version_manager.php?WrongFileSize>10485760");
    } elseif ($cover_url_size == 0 or $file_url_size == 0) {
        header("location: ../../../version_manager.php?WrongFileSize0");
    } elseif (!in_array($ext_pdf, $allowed_pdf) or !in_array($ext_jpg, $allowed_jpg)) {
        header("location: ../../../version_manager.php?WrongExtension");
    } else {
        if ((!empty($_FILES['cover_url']) or $cover_url_name != '') and (!empty($_FILES['file_url']) or $file_url_name != '')) {
            $folder_name = $mag_id . '-' . $publication_period_year . '-' . $publication_period_number . '-' . $publication_number . '-' . $publication_year . '-' . $adhesive;
            if (!file_exists(__DIR__ . "/../../../Files/Mag_Files/" . $folder_name)) {
                $query = mysqli_query($connection_mag, "select * from mag_info where id='$mag_id'");
                foreach ($query as $Mag_Info) {
                }
                $version_name = $Mag_Info['name'];
                $admin_id = $Mag_Info['admin_id'];
                $file_address = "Files/Mag_Files/$folder_name/" . $file_url_name;
                $cover_address = "Files/Mag_Files/$folder_name/" . $cover_url_name;
                mysqli_query($connection_mag, "insert into mag_versions(mag_info_id,mag_admins_id,publication_period_year,publication_period_number,publication_number,
                                                    publication_year,number_of_pages,number_of_articles,folder_name,file_url,cover_url,adder,added_date) values
                                                    ('$mag_id','$admin_id','$publication_period_year','$publication_period_number','$publication_number',
                                                    '$publication_year','$number_of_pages','$number_of_articles','$folder_name','$file_address','$cover_address','$adhesive','$datewithtime')");

                if (!mkdir($concurrentDirectory = __DIR__ . "/../../../Files/Mag_Files/" . $folder_name) && !is_dir($concurrentDirectory)) {
                    throw new \RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory));
                }
                move_uploaded_file($cover_url_tmpname, __DIR__ . "/../../../Files/Mag_Files/$folder_name/" . $cover_url_name);
                move_uploaded_file($file_url_tmpname, __DIR__ . "/../../../Files/Mag_Files/$folder_name/" . $file_url_name);
                header("location: ../../../version_manager.php?VersionAdded&version_name=$version_name");
            } else {
                header("location: ../../../version_manager.php?finded");
            }
        } else {
            header("location: ../../../version_manager.php?EmptyFile");
        }
    }
}

