<?php
include_once __DIR__ . '/../../../config/connection.php';
session_start();
if (isset($_POST['UploadArticleFile']) and !empty($_SESSION['id']) and !empty($_FILES['ArticleFile'])) {
    $user = $_SESSION['id'];
    $ArticleID = $_POST['ArticleID'];
    $query = mysqli_query($connection_mag, "select * from mag_articles where id='$ArticleID'");
    foreach ($query as $articleInfo) {
    }
    if (!empty($articleInfo)) {
        $folder = explode('/', $articleInfo['file_url']);
        $bytes = random_bytes(20);
        $encodedString = bin2hex($bytes);
        $folder_name = $encodedString . 'Article' . ' Mag-Ver ' . $articleInfo['mag_version_id'];
        $file_url_tmpname = $_FILES["ArticleFile"]["tmp_name"];
        if (!mkdir($concurrentDirectory = __DIR__ . "/../../../Files/Mag_Files/" . $folder[0] . '/' . $folder_name) && !is_dir($concurrentDirectory)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory));
        }
        move_uploaded_file($file_url_tmpname, __DIR__ . "/../../../Files/Mag_Files/$folder[0]/$folder_name/" . $_FILES["ArticleFile"]["name"]);
        $file_url = $folder[0] . "/$folder_name/" . $_FILES["ArticleFile"]["name"];
        mysqli_query($connection_mag, "update mag_articles set file_url='$file_url',editor='$user',edited_date='$datewithtime' where id='$ArticleID'");
        header("Location: ../../../article_manager.php?Article_File_Set");
    } else {
        header("Location: ../../../article_manager.php?Article_Not_Founded");
    }
}
