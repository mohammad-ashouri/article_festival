<?php include_once __DIR__ . '/../../config/connection.php'; ?>
<?php
session_start();
$mag_name = $_GET['magname'];
$mag_info_ids = array();
$query = mysqli_query($connection_mag, "select * from mag_info where name='$mag_name' order by id desc");

while ($row = mysqli_fetch_assoc($query)) {
    $mag_info_ids[] = $row;
}
echo "<option selected disabled>انتخاب کنید</option>";
foreach ($mag_info_ids as $row) {
    $ids = $row['id'];
    $query = mysqli_query($connection_mag, "select * from mag_versions where mag_info_id='$ids' and article_submitted=1 order by publication_year asc, publication_number asc, id asc");
    foreach ($query as $versions) {
        echo "<option value=" . $versions['id'] . ">" . 'شماره ' . $versions['publication_number'] . ' - سال ' . $versions['publication_year'] . "</option>";
    }
}

mysqli_close($connection_mag);
session_abort();
?>