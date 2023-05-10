<?php
session_start();
include_once __DIR__ . '/../../../config/connection.php';

//echo '<pre>';
//print_r($_POST);
//echo '</pre>';
//echo '<pre>';
//print_r($_FILES);
//echo '</pre>';
//var_dump($_FILES['article_file_url_6']['size']);
if (isset($_POST['Sub_Articles'])) {
    $mag_version = $_POST['mag_version'];
    $number_of_articles = $_POST['number_of_articles'];
    $adder = $_SESSION['id'];
    $query = mysqli_query($connection_mag, "select * from mag_versions where id='$mag_version'");
    foreach ($query as $mag_version) {
    }
    $mag_folder_name = $mag_version['folder_name'];
    $mag_version_id = $mag_version['id'];

    for ($i = 1; $i <= $number_of_articles; $i++) {
        if (isset($_POST['subject_' . $i]) and !empty($_POST['subject_' . $i])){
            $file_url = $_FILES['article_file_url_' . $i];
            $file_url_size = $_FILES['article_file_url_' . $i]['size'];
            $file_url_name = $_FILES['article_file_url_' . $i]['name'];
            $file_url_type = $_FILES['article_file_url_' . $i]['type'];
            $file_url_tmpname = $_FILES["article_file_url_" . $i]["tmp_name"];
            $allowed_pdf = array('pdf');
            $ext_pdf = pathinfo($file_url_name, PATHINFO_EXTENSION);
            if ($file_url_size == 0) {
                header("location: ../../../article_manager.php?ArticleWrongFileSize0");
            } elseif (!in_array($ext_pdf, $allowed_pdf)) {
                header("location: ../../../article_manager.php?ArticleWrongExtension");
            } elseif (empty($file_url) or $file_url_name == '') {
                header("location: ../../../article_manager.php?EmptyArticleFile");
            }
        }

    }
    if (file_exists(__DIR__ . "/../../../Files/Mag_Files/" . $mag_folder_name)) {

        for ($i = 1; $i <= $number_of_articles; $i++) {
            if (isset($_POST['subject_' . $i]) and !empty($_POST['subject_' . $i])){
                $subject = $_POST['subject_' . $i];
                $type = $_POST['type_' . $i];
                $scientific_group1 = $_POST['scientific_group1_' . $i];
                $scientific_group2 = @$_POST['scientific_group2_' . $i];
                $number_of_page_in_mag_from = $_POST['number_of_page_in_mag_from_' . $i];
                $number_of_page_in_mag_to = $_POST['number_of_page_in_mag_to_' . $i];
                $language = $_POST['language_' . $i];
                $special_type = $_POST['special_type_' . $i];
                $festival_id = @$_POST['select_for_jm_' . $i];
                $file_url = $_FILES['article_file_url_' . $i];
                $file_url_size = $_FILES['article_file_url_' . $i]['size'];
                $file_url_name = $_FILES['article_file_url_' . $i]['name'];
                $file_url_type = $_FILES['article_file_url_' . $i]['type'];
                $file_url_tmpname = $_FILES["article_file_url_" . $i]["tmp_name"];
                $allowed_pdf = array('pdf');
                $ext_pdf = pathinfo($file_url_name, PATHINFO_EXTENSION);

                $folder_name = 'Article' . $i . ' Mag-Ver ' . $mag_version_id;
                mkdir(__DIR__ . "/../../../Files/Mag_Files/" . $mag_folder_name . '/' . $folder_name);
                move_uploaded_file($file_url_tmpname, __DIR__ . "/../../../Files/Mag_Files/$mag_folder_name/$folder_name/" . $file_url_name);
                $body = $_POST['body_' . $i];
                $author_name = $_POST['author_name_' . $i];
                $author_national_code = $_POST['author_national_code_' . $i];
                $author = $author_name . '|' . $author_national_code;
                $cooperation_type = $_POST['cooperation_type_' . $i];
                $file_url_table = $mag_folder_name . '/' . $folder_name . '/' . $file_url_name;

                if (@$_POST['select_for_jm_' . $i] == '' or @$_POST['select_for_jm_' . $i] == null) {
                    mysqli_query($connection_mag, "insert into mag_articles (mag_version_id,subject,body,type,scientific_group_1,scientific_group_2,
                                            number_of_page_in_mag_from,number_of_page_in_mag_to,language,special_type,author,cooperation_type,file_url,adder,added_date)
                                            values ('$mag_version_id','$subject','$body','$type','$scientific_group1','$scientific_group2','$number_of_page_in_mag_from',
                                            '$number_of_page_in_mag_to','$language','$special_type','$author','$cooperation_type','$file_url_table','$adder','$datewithtime')");
                } else {
                    mysqli_query($connection_mag, "insert into mag_articles (mag_version_id,subject,body,type,scientific_group_1,scientific_group_2,
                                            number_of_page_in_mag_from,number_of_page_in_mag_to,language,special_type,author,cooperation_type,selected_for_jm,festival_id,file_url,adder,added_date)
                                            values ('$mag_version_id','$subject','$body','$type','$scientific_group1','$scientific_group2','$number_of_page_in_mag_from',
                                            '$number_of_page_in_mag_to','$language','$special_type','$author','$cooperation_type',1,'$festival_id','$file_url_table','$adder','$datewithtime')");
                    $query = mysqli_query($connection_mag, "select max(id) from mag_articles where mag_version_id='$mag_version_id'");
                    foreach ($query as $Last_Article) {
                    }
                    $LastID = $Last_Article['max(id)'];
                    mysqli_query($connection_maghalat,"insert into article (article_id,festival_id) values ('$LastID','$festival_id')");
                }
                if ($cooperation_type == 'گروهی') {
                    for ($j = 1; $j <= 6; $j++) {
                        $info_cooperator = $_POST['info_cooperator_' . $i . '_' . $j];
                        $national_code_cooperator = $_POST['national_code_cooperator_' . $i . '_' . $j];
                        if ($info_cooperator != null and $info_cooperator != '' and $national_code_cooperator != null and $national_code_cooperator != '') {
                            $str[] = $info_cooperator . '|' . $national_code_cooperator;
                        }
                    }
                    $str = implode('|', $str);
                    $query = mysqli_query($connection_mag, "select max(id) from mag_articles where mag_version_id='$mag_version_id'");
                    foreach ($query as $Last_Article) {
                    }
                    $LastID = $Last_Article['max(id)'];
                    mysqli_query($connection_mag, "update mag_articles set cooperators='$str' where id='$LastID'");
                }
                $_POST['select_for_jm_' . $i] = null;
                $festival_id = null;
            }

        }
        mysqli_query($connection_mag, "update mag_versions set article_submitted=1 where id='$mag_version_id'");
        header("location: ../../../article_manager.php?ArticleSubmitted");
    } else {
        header("location: ../../../article_manager.php?ArticleFinded");
    }
}



