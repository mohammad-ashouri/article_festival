<?php include_once __DIR__ . '/../../config/connection.php'; ?>
<?php
session_start();
$mag_id = $_GET['magid'];
$query = mysqli_query($connection_mag, "select * from mag_versions where mag_info_id='$mag_id' order by id desc");
foreach ($query as $version_info) {}
echo "<option selected disabled>انتخاب کنید</option>";
foreach ($query as $version_info) {
    echo "<option value=" . $version_info['id'] . ">" . 'شماره' . $version_info['publication_number'] . ' - سال' . $version_info['publication_year'] . "</option>";
}
mysqli_close($connection_mag);
session_abort();
?>