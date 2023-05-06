<?php
include_once __DIR__ . '/../../../config/connection.php';
session_start();
if ($_SESSION['head'] == 3 or $_SESSION['head']==4) {
    $postID = $_POST['postID'];
    $adder = $_SESSION['id'];

    mysqli_query($connection_mag, "update mag_info set active=0,deleted=1,editor='$adder',edited_date='$datewithtime' where id=$postID");

    $name = $_POST['editedName'];
    $science_rank = $_POST['editedScienceRank'];
    $scientific_group = implode('/', $_POST['editedScientificGroup']);
    $international_position = implode('/', $_POST['editedInternationalPosition']);
    $type = $_POST['editedMagType'];
    $publication_period = $_POST['editedPublicationPeriod'];
    $ISSN = $_POST['editedISSN'];
    $mag_state = $_POST['editedMagState'];
    $mag_city = $_POST['editedMagCity'];
    $mag_address = $_POST['editedMagAddress'];
    $mag_phone = $_POST['editedMagPhone'];
    $mag_fax = $_POST['editedMagFax'];
    $mag_email = $_POST['editedMagEmail'];
    $mag_website = $_POST['editedWebsite'];
    $concessionaire_type = $_POST['editedConcessionaireType'];
    $concessionaire = $_POST['editedConcessionaire'];

    $responsible_manager_owner_subject = $_POST['editedResponsibleManagerOwnerSubject'];
    $responsible_manager_owner_name = $_POST['editedResponsibleManagerOwnerName'];
    $responsible_manager_owner_family = $_POST['editedResponsibleManagerOwnerFamily'];
    $responsible_manager_owner_degree = $_POST['editedResponsibleManagerOwnerDegree'];
    $responsible_manager_owner_phone = $_POST['editedResponsibleManagerOwnerPhone'];
    $responsible_manager_owner_mobile = $_POST['editedResponsibleManagerOwnerMobile'];
    $responsible_manager_owner_address = $_POST['editedResponsibleManagerOwnerAddress'];

    $chief_editor_subject = $_POST['editedChiefEditorSubject'];
    $chief_editor_name = $_POST['editedChiefEditorName'];
    $chief_editor_family = $_POST['editedChiefEditorFamily'];
    $chief_editor_degree = $_POST['editedChiefEditorDegree'];
    $chief_editor_phone = $_POST['editedChiefEditorPhone'];
    $chief_editor_mobile = $_POST['editedChiefEditorMobile'];
    $chief_editor_address = $_POST['editedChiefEditorAddress'];

    $administration_manager_subject = $_POST['editedAdministrationManagerSubject'];
    $administration_manager_name = $_POST['editedAdministrationManagerName'];
    $administration_manager_family = $_POST['editedAdministrationManagerFamily'];
    $administration_manager_degree = $_POST['editedAdministrationManagerDegree'];
    $administration_manager_phone = $_POST['editedAdministrationManagerPhone'];
    $administration_manager_mobile = $_POST['editedAdministrationManagerMobile'];
    $administration_manager_address = $_POST['editedAdministrationManagerAddress'];

//Insert Into mag_admins
    mysqli_query($connection_mag, "insert into mag_admins (concessionaire,concessionaire_type,responsible_manager_owner_name,responsible_manager_owner_family,responsible_manager_owner_subject,
                                           responsible_manager_owner_degree,responsible_manager_owner_phone,responsible_manager_owner_mobile,responsible_manager_owner_address,
                                            chief_editor_name,chief_editor_family,chief_editor_subject,chief_editor_degree,chief_editor_phone,chief_editor_mobile,chief_editor_address,
                                            administration_manager_name,administration_manager_family,administration_manager_subject,administration_manager_degree,administration_manager_phone,
                                            administration_manager_mobile,administration_manager_address,mag_phone,mag_fax,mag_state,mag_city,mag_address,mag_email,mag_website,
                                            adder,add_date) values ('$concessionaire','$concessionaire_type','$responsible_manager_owner_name','$responsible_manager_owner_family','$responsible_manager_owner_subject',
                                        '$responsible_manager_owner_degree','$responsible_manager_owner_phone','$responsible_manager_owner_mobile','$responsible_manager_owner_address',
                                        '$chief_editor_name','$chief_editor_family','$chief_editor_subject','$chief_editor_degree','$chief_editor_phone','$chief_editor_mobile','$chief_editor_address',
                                        '$administration_manager_name','$administration_manager_family','$administration_manager_subject','$administration_manager_degree','$administration_manager_phone',
                                        '$administration_manager_mobile','$administration_manager_address','$mag_phone','$mag_fax','$mag_state','$mag_city','$mag_address','$mag_email','$mag_website',
                                        '$adder','$datewithtime')");

//select last admin id
    $query = mysqli_query($connection_mag, "select max(id) from mag_admins");
    foreach ($query as $LastAdminID) {
    }
    $LastAdminID = $LastAdminID['max(id)'];

    $query = "insert into mag_info (admin_id,name,science_rank,scientific_group,international_position,mag_type,ISSN,publication_period,adder,date_added)
                values ('$LastAdminID','$name','$science_rank','$scientific_group','$international_position','$type','$ISSN','$publication_period','$adder','$datewithtime')";
    mysqli_query($connection_mag, $query);
}