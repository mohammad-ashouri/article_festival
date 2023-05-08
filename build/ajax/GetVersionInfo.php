<?php include_once __DIR__ . '/../../config/connection.php';
session_start();
if ($_SESSION['head'] == 4 or $_SESSION['head'] == 3) {
    $version_id = $_GET['id'];
    $Mag = mysqli_query($connection_mag, 'select * from mag_versions where id=' . $version_id);
    foreach ($Mag as $version_info) {
    }
    header('Content-Type: application/json');
    echo json_encode([
        'mag_versions_id' => $version_info['id'] ,
        'mag_info_id' => $version_info['mag_info_id'] ,
        'publication_period_year' => $version_info['publication_period_year'] ,
        'publication_period_number'=>$version_info['publication_period_number'],
        'publication_number'=>$version_info['publication_number'],
        'publication_year'=>$version_info['publication_year'],
        'number_of_pages'=>$version_info['number_of_pages'],
        'number_of_articles'=>$version_info['number_of_articles'],
        'file_url'=>$version_info['file_url'],
        'cover_url'=>$version_info['cover_url'],
        ]);}
?>