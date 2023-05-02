<?php
session_start();
if (isset($_POST['article_id']) and isset($_POST['subject'])) {
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    include_once __DIR__ . '/../../../config/connection.php';
    $r = null;
    $sum = null;
    $user = $_SESSION['id'];
    $article_id = $_POST['article_id'];
    $type = $_POST['subject'];
    $query = mysqli_query($connection_variables, "select * from mag_festival_tafsili_options");
    $All_ID_nums = mysqli_num_rows($query);
    $r1 = $_POST['r1'];
    $r2 = $_POST['r2'];
    $r3 = $_POST['r3'];
    $r4 = $_POST['r4'];
    $r5 = $_POST['r5'];
    $r6 = $_POST['r6'];
    $r7 = $_POST['r7'];
    $r8 = $_POST['r8'];
    $r9 = $_POST['r9'];
    $r10 = $_POST['r10'];
    $comment_r1 = $_POST['description_1'];
    $comment_r2 = $_POST['description_2'];
    $comment_r3 = $_POST['description_3'];
    $comment_r4 = $_POST['description_4'];
    $comment_r5 = $_POST['description_5'];
    $comment_r6 = $_POST['description_6'];
    $comment_r7 = $_POST['description_7'];
    $comment_r8 = $_POST['description_8'];
    $comment_r9 = $_POST['description_9'];
    $comment_r10 = $_POST['description_10'];
    $general_comment = $_POST['general_comment'];
    for ($i = 1; $i <= $All_ID_nums; $i++) {
        $sum = $_POST['r' . $i] + $sum;
    }
    mysqli_query($connection_maghalat, "insert into tafsili 
    (article_id, r1,r1_comment, r2,r2_comment, r3,r3_comment, r4,r4_comment,r5,r5_comment,r6,r6_comment,r7,r7_comment,r8,r8_comment,r9_1,r9_1_comment,r9_2,r9_2_comment,general_comment, sum,type, rater, rate_date) values
    ('$article_id','$r1','$comment_r1','$r2','$comment_r2','$r3','$comment_r3','$r4','$comment_r4','$r5','$comment_r5','$r6','$comment_r6','$r7','$comment_r7','$r8','$comment_r8','$r9','$comment_r9','$r10','$comment_r10','$general_comment','$sum','$type','$user','$datewithtime')");
    switch ($type) {
        case 'ta1':
            $query = mysqli_query($connection_maghalat, "select sum from tafsili where article_id='$article_id' and type='t2'");
            foreach ($query as $ta2) {
            }
            if (@$ta2 != null) {
                $avg = ($sum + $ta2['sum']) / 2;
                mysqli_query($connection_maghalat, "update article set avg_tafsili='$avg' where id='$article_id'");
            }
            mysqli_query($connection_maghalat, "update article set tafsili1_done=1,rate_status='منتظر تایید' where id='$article_id'");
            break;
        case 'ta2':
            $query = mysqli_query($connection_maghalat, "select sum from tafsili where article_id='$article_id' and type='t1'");
            foreach ($query as $ta1) {
            }
            if (@$ta1 != null) {
                $avg = ($sum + $ta1['sum']) / 2;
                mysqli_query($connection_maghalat, "update article set avg_tafsili='$avg' where id='$article_id'");
            }
            mysqli_query($connection_maghalat, "update article set tafsili2_done=1,rate_status='منتظر تایید' where id='$article_id'");
            break;
        case 'ta3':
            $query = mysqli_query($connection_maghalat, "select sum from tafsili where article_id='$article_id' and type='t1'");
            foreach ($query as $ta1) {
            }
            $query = mysqli_query($connection_maghalat, "select sum from tafsili where article_id='$article_id' and type='t2'");
            foreach ($query as $ta2) {
            }
            $sum = ($sum + $ta1['sum'] + $ta2['sum']) / 3;
            mysqli_query($connection_maghalat, "update article set tafsili3_done=1,rate_status='منتظر تایید' where id='$article_id'");
            break;
    }
    header("location: ../../../panel.php?EjSet");
}