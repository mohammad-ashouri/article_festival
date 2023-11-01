<?php include_once '../../config/connection.php';
session_start();

if ($_SESSION['head'] == 4 or $_SESSION['head'] == 3) {
    $postID = $_GET['id'];
    $rateLevel = $_GET['level'];
    $rateType = $_GET['form'];
    switch ($rateType) {
        case 'ejmali':
            $query = mysqli_query($connection_maghalat, "select * from ejmali where article_code='$postID' and level='$rateLevel'");
            foreach ($query as $rateInfo) {
            }

            $rater = $rateInfo['rater'];
            $query = mysqli_query($connection_maghalat, "select name,family from users where id='$rater'");
            foreach ($query as $raterInfo) {
            }

            $query = mysqli_query($connection_mag, "select subject from mag_articles where id='$postID'");
            foreach ($query as $articleInfo) {
            }

            switch ($rateLevel){
                case 'ej1g1':
                    $rateSubject='اجمالی اول - گروه اول';
                    break;
                case 'ej2g1':
                    $rateSubject='اجمالی دوم - گروه اول';
                    break;
                case 'ej3g1':
                    $rateSubject='اجمالی سوم - گروه اول';
                    break;
                case 'ej1g2':
                    $rateSubject='اجمالی اول - گروه دوم';
                    break;
                case 'ej2g2':
                    $rateSubject='اجمالی دوم - گروه دوم';
                    break;
                case 'ej3g2':
                    $rateSubject='اجمالی سوم - گروه دوم';
                    break;
            }
            if ($raterInfo and $raterInfo and $articleInfo) {
                header('Content-Type: application/json');
                echo json_encode([
                    'title' => $articleInfo['subject'],
                    'r1' => $rateInfo['r1'],
                    'r2' => $rateInfo['r2'],
                    'r3' => $rateInfo['r3'],
                    'r4' => $rateInfo['r4'],
                    'sum' => $rateInfo['sum'],
                    'rateSubject' => $rateSubject,
                    'rater' => $raterInfo['name'] . ' ' . $raterInfo['family'],
                ]);
            }
            break;
        case 'tafsili':
            $query = mysqli_query($connection_maghalat, "select * from tafsili where article_id='$postID' and type='$rateLevel'");
            foreach ($query as $rateInfo) {
            }

            $rater = $rateInfo['rater'];
            $query = mysqli_query($connection_maghalat, "select name,family from users where id='$rater'");
            foreach ($query as $raterInfo) {
            }

            $query = mysqli_query($connection_mag, "select subject from mag_articles where id='$postID'");
            foreach ($query as $articleInfo) {
            }

            switch ($rateLevel){
                case 'ta1':
                    $rateSubject='تفصیلی اول';
                    break;
                case 'ta2':
                    $rateSubject='تفصیلی دوم';
                    break;
                case 'ta3':
                    $rateSubject='تفصیلی سوم';
                    break;
            }
            if ($raterInfo and $raterInfo and $articleInfo) {
                header('Content-Type: application/json');
                echo json_encode([
                    'title' => $articleInfo['subject'],
                    'r1' => $rateInfo['r1'],
                    'r2' => $rateInfo['r2'],
                    'r3' => $rateInfo['r3'],
                    'r4' => $rateInfo['r4'],
                    'r5' => $rateInfo['r5'],
                    'r6' => $rateInfo['r6'],
                    'r7' => $rateInfo['r7'],
                    'r8' => $rateInfo['r8'],
                    'r9_1' => $rateInfo['r9_1'],
                    'r9_2' => $rateInfo['r9_2'],
                    'r1_comment' => $rateInfo['r1_comment'],
                    'r2_comment' => $rateInfo['r2_comment'],
                    'r3_comment' => $rateInfo['r3_comment'],
                    'r4_comment' => $rateInfo['r4_comment'],
                    'r5_comment' => $rateInfo['r5_comment'],
                    'r6_comment' => $rateInfo['r6_comment'],
                    'r7_comment' => $rateInfo['r7_comment'],
                    'r8_comment' => $rateInfo['r8_comment'],
                    'r9_1_comment' => $rateInfo['r9_1_comment'],
                    'r9_2_comment' => $rateInfo['r9_2_comment'],
                    'general_comment' => $rateInfo['general_comment'],
                    'sum' => $rateInfo['sum'],
                    'rateSubject' => $rateSubject,
                    'rater' => $raterInfo['name'] . ' ' . $raterInfo['family'],
                ]);
            }
            break;
    }
//    mysqli_close($connection_maghalat);
//    session_abort();
}
?>