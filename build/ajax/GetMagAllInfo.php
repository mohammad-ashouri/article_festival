<?php include_once __DIR__ . '/../../config/connection.php';
session_start();
if ($_SESSION['head'] == 4 or $_SESSION['head'] == 3) {
    $mag_id = $_GET['id'];
    $Mag = mysqli_query($connection_mag, 'select * from mag_info where id=' . $mag_id);
    foreach ($Mag as $mag_info) {
    }
    $admin_id=$mag_info['admin_id'];
    $Admin = mysqli_query($connection_mag, 'select * from mag_admins where id=' . $admin_id);
    foreach ($Admin as $admin_info) {
    }
    header('Content-Type: application/json');
    echo json_encode([
        'id' => $mag_info['id'] ,
        'name' => $mag_info['name'] ,
        'science_rank'=>$mag_info['science_rank'],
        'scientific_group'=>$mag_info['scientific_group'],
        'international_position'=>$mag_info['international_position'],
        'mag_type'=>$mag_info['mag_type'],
        'publication_period'=>$mag_info['publication_period'],
        'ISSN'=>$mag_info['ISSN'],
        'mag_state'=>$admin_info['mag_state'],
        'mag_city'=>$admin_info['mag_city'],
        'mag_address'=>$admin_info['mag_address'],
        'mag_phone'=>$admin_info['mag_phone'],
        'mag_fax'=>$admin_info['mag_fax'],
        'mag_email'=>$admin_info['mag_email'],
        'mag_website'=>$admin_info['mag_website'],
        'concessionaire_type'=>$admin_info['concessionaire_type'],
        'concessionaire'=>$admin_info['concessionaire'],

        'responsible_manager_owner_subject'=>$admin_info['responsible_manager_owner_subject'],
        'responsible_manager_owner_name'=>$admin_info['responsible_manager_owner_name'],
        'responsible_manager_owner_family'=>$admin_info['responsible_manager_owner_family'],
        'responsible_manager_owner_degree'=>$admin_info['responsible_manager_owner_degree'],
        'responsible_manager_owner_phone'=>$admin_info['responsible_manager_owner_phone'],
        'responsible_manager_owner_mobile'=>$admin_info['responsible_manager_owner_mobile'],
        'responsible_manager_owner_address'=>$admin_info['responsible_manager_owner_address'],

        'chief_editor_subject'=>$admin_info['chief_editor_subject'],
        'chief_editor_name'=>$admin_info['chief_editor_name'],
        'chief_editor_family'=>$admin_info['chief_editor_family'],
        'chief_editor_degree'=>$admin_info['chief_editor_degree'],
        'chief_editor_phone'=>$admin_info['chief_editor_phone'],
        'chief_editor_mobile'=>$admin_info['chief_editor_mobile'],
        'chief_editor_address'=>$admin_info['chief_editor_address'],

        'administration_manager_subject'=>$admin_info['administration_manager_subject'],
        'administration_manager_name'=>$admin_info['administration_manager_name'],
        'administration_manager_family'=>$admin_info['administration_manager_family'],
        'administration_manager_degree'=>$admin_info['administration_manager_degree'],
        'administration_manager_phone'=>$admin_info['administration_manager_phone'],
        'administration_manager_mobile'=>$admin_info['administration_manager_mobile'],
        'administration_manager_address'=>$admin_info['administration_manager_address'],
        ]);}
?>