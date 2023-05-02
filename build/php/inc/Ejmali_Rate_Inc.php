<?php
session_start();
if (isset($_POST['article_id']) and isset($_POST['r1']) and isset($_POST['r2']) and isset($_POST['r3']) and isset($_POST['r4'])) {
    include_once __DIR__ . '/../../../config/connection.php';
    $user = $_SESSION['id'];
    $article_code = $_POST['article_id'];
    $level = $_POST['subject'];
    $r1 = $_POST['r1'];
    $r2 = $_POST['r2'];
    $r3 = $_POST['r3'];
    $r4 = $_POST['r4'];
    $sum = $r1 + $r2 + $r3 + $r4;
    $query=mysqli_query($connection_maghalat,"select * from article where id='$article_code'");
    foreach ($query as $ArticleInfo) {

    }
    $ArticleID=$ArticleInfo['article_id'];
    $query=mysqli_query($connection_mag,"select * from mag_articles where id='$ArticleID'");
    foreach ($query as $Mag_Article_Info){

    }
    mysqli_query($connection_maghalat, "insert into ejmali (article_code, r1, r2, r3, r4, sum,level, rater, rate_date) values ('$article_code','$r1','$r2','$r3','$r4','$sum','$level','$user','$datewithtime')");
    switch ($level) {
        case 'ej1g1':
            $query = mysqli_query($connection_maghalat, "select sum from ejmali where article_code='$article_code' and level='ej2g1'");
            foreach ($query as $ej2g1) {
            }
            $query = mysqli_query($connection_maghalat, "select sum from ejmali where article_code='$article_code' and level='ej3g1'");
            foreach ($query as $ej3g1) {
            }
            if ($ej2g1!=null and $ej3g1!=null){
                $avg = $sum + $ej2g1['sum'] + $ej3g1['sum'];
                mysqli_query($connection_maghalat, "update article set avg_ejmali_g1='$avg',ejmali1_g1_done=1 where id='$article_code'");
                if ($Mag_Article_Info['scientific_group_2']!='' and $Mag_Article_Info['scientific_group_2']!=null){
                    if ($ArticleInfo['avg_ejmali_g2']!=null and $ArticleInfo['avg_ejmali_g2']!=''){
                        mysqli_query($connection_maghalat, "update article set rate_status='تفصیلی' where id='$article_code'");
                    }
                }
            }
            mysqli_query($connection_maghalat, "update article set ejmali1_g1_done=1 where id='$article_code'");
            break;
        case 'ej2g1':
            $query = mysqli_query($connection_maghalat, "select sum from ejmali where article_code='$article_code' and level='ej1g1'");
            foreach ($query as $ej1g1) {
            }
            $query = mysqli_query($connection_maghalat, "select sum from ejmali where article_code='$article_code' and level='ej3g1'");
            foreach ($query as $ej3g1) {
            }
            if ($ej1g1!=null and $ej3g1!=null){
                $avg = $sum + $ej1g1['sum'] + $ej3g1['sum'];
                mysqli_query($connection_maghalat, "update article set avg_ejmali_g1='$avg',ejmali2_g1_done=1 where id='$article_code'");
                if ($Mag_Article_Info['scientific_group_2']!='' and $Mag_Article_Info['scientific_group_2']!=null){
                    if ($ArticleInfo['avg_ejmali_g2']!=null and $ArticleInfo['avg_ejmali_g2']!=''){
                        mysqli_query($connection_maghalat, "update article set rate_status='تفصیلی' where id='$article_code'");
                    }
                }
            }
            mysqli_query($connection_maghalat, "update article set ejmali2_g1_done=1 where id='$article_code'");
            break;
        case 'ej3g1':
            $query = mysqli_query($connection_maghalat, "select sum from ejmali where article_code='$article_code' and level='ej1g1'");
            foreach ($query as $ej1g1) {
            }
            $query = mysqli_query($connection_maghalat, "select sum from ejmali where article_code='$article_code' and level='ej2g1'");
            foreach ($query as $ej2g1) {
            }
            if ($ej1g1!=null and $ej2g1!=null){
                $avg = $sum + $ej1g1['sum'] + $ej2g1['sum'];
                mysqli_query($connection_maghalat, "update article set avg_ejmali_g1='$avg',ejmali3_g1_done=1 where id='$article_code'");
                if ($Mag_Article_Info['scientific_group_2']!='' and $Mag_Article_Info['scientific_group_2']!=null){
                    if ($ArticleInfo['avg_ejmali_g2']!=null and $ArticleInfo['avg_ejmali_g2']!=''){
                        mysqli_query($connection_maghalat, "update article set rate_status='تفصیلی' where id='$article_code'");
                    }
                }
            }
            mysqli_query($connection_maghalat, "update article set ejmali3_g1_done=1 where id='$article_code'");
            break;
        case 'ej1g2':
            $query = mysqli_query($connection_maghalat, "select sum from ejmali where article_code='$article_code' and level='ej2g2'");
            foreach ($query as $ej2g2) {
            }
            $query = mysqli_query($connection_maghalat, "select sum from ejmali where article_code='$article_code' and level='ej3g2'");
            foreach ($query as $ej3g2) {
            }
            if ($ej2g2!=null and $ej3g2!=null){
                $avg = $sum + $ej2g2['sum'] + $ej3g2['sum'];
                mysqli_query($connection_maghalat, "update article set avg_ejmali_g2='$avg',ejmali1_g2_done=1 where id='$article_code'");
                if ($ArticleInfo['avg_ejmali_g1']!=null and $ArticleInfo['avg_ejmali_g1']!=''){
                    mysqli_query($connection_maghalat, "update article set rate_status='تفصیلی' where id='$article_code'");
                }
            }
            mysqli_query($connection_maghalat, "update article set ejmali1_g2_done=1 where id='$article_code'");
            break;
        case 'ej2g2':
            $query = mysqli_query($connection_maghalat, "select sum from ejmali where article_code='$article_code' and level='ej1g2'");
            foreach ($query as $ej1g2) {
            }
            $query = mysqli_query($connection_maghalat, "select sum from ejmali where article_code='$article_code' and level='ej3g2'");
            foreach ($query as $ej3g2) {
            }
            if ($ej1g2!=null and $ej3g2!=null){
                $avg = $sum + $ej1g2['sum'] + $ej3g2['sum'];
                mysqli_query($connection_maghalat, "update article set avg_ejmali_g2='$avg',ejmali2_g2_done=1 where id='$article_code'");
                if ($ArticleInfo['avg_ejmali_g1']!=null and $ArticleInfo['avg_ejmali_g1']!=''){
                    mysqli_query($connection_maghalat, "update article set rate_status='تفصیلی' where id='$article_code'");
                }
            }
            mysqli_query($connection_maghalat, "update article set ejmali2_g2_done=1 where id='$article_code'");
            break;
        case 'ej3g2':
            $query = mysqli_query($connection_maghalat, "select sum from ejmali where article_code='$article_code' and level='ej1g2'");
            foreach ($query as $ej1g2) {
            }
            $query = mysqli_query($connection_maghalat, "select sum from ejmali where article_code='$article_code' and level='ej2g2'");
            foreach ($query as $ej2g2) {
            }
            if ($ej1g2!=null and $ej2g2!=null){
                $avg = $sum + $ej1g2['sum'] + $ej2g2['sum'];
                mysqli_query($connection_maghalat, "update article set avg_ejmali_g2='$avg',ejmali3_g2_done=1 where id='$article_code'");
                if ($ArticleInfo['avg_ejmali_g1']!=null and $ArticleInfo['avg_ejmali_g1']!=''){
                    mysqli_query($connection_maghalat, "update article set rate_status='تفصیلی' where id='$article_code'");
                }
            }
            mysqli_query($connection_maghalat, "update article set avg_ejmali_g2='$avg',ejmali3_g2_done=1 where id='$article_code'");
            break;
    }
    header("location: ../../../panel.php?EjSet");
}