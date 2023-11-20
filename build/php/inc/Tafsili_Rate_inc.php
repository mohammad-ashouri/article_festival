<?php
session_start();
if (isset($_POST['article_id']) and isset($_POST['subject'])) {
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
        if ($_POST['r' . $i] == null) {
            $_POST['r' . $i] = 0;
        }
        $sum = $_POST['r' . $i] + $sum;
    }
    $query = mysqli_query($connection_maghalat, "insert into tafsili
    (article_id, r1,r1_comment, r2,r2_comment, r3,r3_comment, r4,r4_comment,r5,r5_comment,r6,r6_comment,r7,r7_comment,r8,r8_comment,r9_1,r9_1_comment,r9_2,r9_2_comment,general_comment, sum,type, rater, rate_date) values
    ('$article_id','$r1','$comment_r1','$r2','$comment_r2','$r3','$comment_r3','$r4','$comment_r4','$r5','$comment_r5','$r6','$comment_r6','$r7','$comment_r7','$r8','$comment_r8','$r9','$comment_r9','$r10','$comment_r10','$general_comment','$sum','$type','$user','$datewithtime')");

    if ($query) {
        $articleInfo = mysqli_query($connection_maghalat, "select * from article where id='$article_id'");
        foreach ($articleInfo as $article) {
        }
        $magArticleInfo = mysqli_query($connection_mag, "select * from mag_articles where id='$article_id'");
        foreach ($magArticleInfo as $magArticle) {
        }
        $authorGender = explode('|', $magArticle['author']);
        $authorGender = $authorGender[2];

        switch ($type) {
            case 'ta1':
                if ($article['tafsili2_done'] == 1) {
                    $query = mysqli_query($connection_maghalat, "select sum from tafsili where article_id='$article_id' and type='ta2'");
                    foreach ($query as $ta2) {
                    }
                    $avg = ($sum + $ta2['sum']) / 2;
                    switch ($authorGender) {
                        case 'مرد':
                            if ($avg >= 80) {
                                $status = 'تفصیلی سوم';
                            } elseif ($avg >= 75 and $avg < 80) {
                                if (abs($sum - $ta2['sum']) >= 12) {
                                    $status = 'تفصیلی سوم';
                                } else {
                                    $status = 'تفصیلی ردی';
                                }
                            } else {
                                $status = 'تفصیلی ردی';
                            }

                            if ($status === 'تفصیلی ردی') {
                                mysqli_query($connection_maghalat, "update article set rate_status='$status', grade='$avg' where id='$article_id'");
                            } else {
                                mysqli_query($connection_maghalat, "update article set rate_status='$status' where id='$article_id'");
                            }

                            break;
                        case 'زن':
                            if ($avg >= 75) {
                                $status = 'تفصیلی سوم';
                            } elseif ($avg >= 70 and $avg < 75) {
                                if (abs($sum - $ta2['sum']) >= 12) {
                                    $status = 'تفصیلی سوم';
                                } else {
                                    $status = 'تفصیلی ردی';
                                }
                            } else {
                                $status = 'تفصیلی ردی';
                            }

                            if ($status === 'تفصیلی ردی') {
                                mysqli_query($connection_maghalat, "update article set rate_status='$status', grade='$avg' where id='$article_id'");
                            } else {
                                mysqli_query($connection_maghalat, "update article set rate_status='$status' where id='$article_id'");
                            }
                            break;
                    }
                }
                mysqli_query($connection_maghalat, "update article set tafsili1_done=1 where id='$article_id'");
                header("location: ../../../panel.php?TaSet");
                break;
            case 'ta2':
                if ($article['tafsili1_done'] == 1) {
                    $query = mysqli_query($connection_maghalat, "select sum from tafsili where article_id='$article_id' and type='ta1'");
                    foreach ($query as $ta1) {
                    }
                    $avg = ($sum + $ta1['sum']) / 2;
                    switch ($authorGender) {
                        case 'مرد':
                            if ($avg >= 80) {
                                $status = 'تفصیلی سوم';
                            } elseif ($avg >= 75 and $avg < 80) {
                                if (abs($sum - $ta1['sum']) >= 12) {
                                    $status = 'تفصیلی سوم';
                                } else {
                                    $status = 'تفصیلی ردی';
                                }
                            } else {
                                $status = 'تفصیلی ردی';
                            }

                            if ($status === 'تفصیلی ردی') {
                                mysqli_query($connection_maghalat, "update article set rate_status='$status', grade='$avg' where id='$article_id'");
                            } else {
                                mysqli_query($connection_maghalat, "update article set rate_status='$status' where id='$article_id'");
                            }

                            break;
                        case 'زن':
                            if ($avg >= 75) {
                                $status = 'تفصیلی سوم';
                            } elseif ($avg >= 70 and $avg < 75) {
                                if (abs($sum - $ta1['sum']) >= 12) {
                                    $status = 'تفصیلی سوم';
                                } else {
                                    $status = 'تفصیلی ردی';
                                }
                            } else {
                                $status = 'تفصیلی ردی';
                            }

                            if ($status === 'تفصیلی ردی') {
                                mysqli_query($connection_maghalat, "update article set rate_status='$status', grade='$avg' where id='$article_id'");
                            } else {
                                mysqli_query($connection_maghalat, "update article set rate_status='$status' where id='$article_id'");
                            }
                            break;
                    }
                }
                mysqli_query($connection_maghalat, "update article set tafsili2_done=1 where id='$article_id'");
                header("location: ../../../panel.php?TaSet");
                break;
            case 'ta3':
                $query = mysqli_query($connection_maghalat, "select sum from tafsili where article_id='$article_id' and type='ta1'");
                foreach ($query as $ta1) {
                }
                $query = mysqli_query($connection_maghalat, "select sum from tafsili where article_id='$article_id' and type='ta2'");
                foreach ($query as $ta2) {
                }
                if ($ta1['sum'] >= 80 and $ta2['sum'] >= 80 and $sum >= 80) {
                    $finalAVG = ($sum + $ta1['sum'] + $ta2['sum']) / 3;
                } elseif ((abs($sum - $ta1['sum']) >= 12) and (abs($sum - $ta2['sum']) >= 12) and (abs($ta1['sum'] - $ta2['sum']) >= 12)) {
                    $finalAVG = ($sum + $ta1['sum'] + $ta2['sum']) / 3;
                } elseif ((abs($sum - $ta1['sum']) >= 12) or (abs($sum - $ta2['sum']) >= 12)) {
                    $difference3v1 = abs($sum - $ta1['sum']);
                    $difference3v2 = abs($sum - $ta2['sum']);
                    $difference1v2 = abs($ta1['sum'] - $ta2['sum']);
                    if ($difference1v2 < 12 and ($ta1['sum'] + $ta2['sum'] / 2) >= 80) {
                        $finalAVG = ($ta1['sum'] + $ta2['sum']) / 2;
                    } else {
                        if ($difference3v1 > $difference3v2) {
                            $finalAVG = ($sum + $ta2['sum']) / 2;
                        } elseif ($difference3v1 < $difference3v2) {
                            $finalAVG = ($sum + $ta1['sum']) / 2;
                        } elseif ($difference3v1 == $difference3v2) {
                            $finalAVG = ($sum + $ta1['sum']) / 2;
                        }
                    }
                } elseif ((abs($sum - $ta1['sum']) < 12) or (abs($sum - $ta2['sum']) < 12)) {
                    $finalAVG = ($sum + $ta1['sum'] + $ta2['sum']) / 3;
                }
                if ($finalAVG >= 80) {
                    mysqli_query($connection_maghalat, "update article set tafsili3_done=1,rate_status='منتظر تایید',grade='$finalAVG' where id='$article_id'");
                    if ($finalAVG >= 80 and $finalAVG < 85) {
                        mysqli_query($connection_maghalat, "update article set chosen_status=1,chosen_subject='شایسته تقدیر' where id='$article_id'");
                    } else {
                        mysqli_query($connection_maghalat, "update article set chosen_status=1,chosen_subject='برگزیده' where id='$article_id'");
                    }
                } elseif ($finalAVG < 80) {
                    mysqli_query($connection_maghalat, "update article set rate_status='تفصیلی ردی',grade='$finalAVG' where id='$article_id'");
                }
                mysqli_query($connection_maghalat, "update article set tafsili3_done=1 where id='$article_id'");
                header("location: ../../../panel.php?TaSet");
                break;
            default:
                throw new \Exception('Unexpected value');
        }
    }
//    header("location: ../../../panel.php?TaSet");
}