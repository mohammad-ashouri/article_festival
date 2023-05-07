<?php
echo $_POST['editedMagInfoId'];
//include_once __DIR__ . '/../../../config/connection.php';
//session_start();
//if ($_SESSION['head'] == 3 or $_SESSION['head']==4) {
//    $postID = $_POST['postID'];
//    $adder = $_SESSION['id'];
//
//    mysqli_query($connection_mag, "update mag_info set active=0,deleted=1,editor='$adder',edited_date='$datewithtime' where id=$postID");
//
//    $name = $_POST['editedName'];
//    $science_rank = $_POST['editedScienceRank'];
//    $scientific_group = implode('/', $_POST['editedScientificGroup']);
//    $international_position = implode('/', $_POST['editedInternationalPosition']);
//    $type = $_POST['editedMagType'];
//    $publication_period = $_POST['editedPublicationPeriod'];
//    $ISSN = $_POST['editedISSN'];
//    $mag_state = $_POST['editedMagState'];
//    $mag_city = $_POST['editedMagCity'];
//    $mag_address = $_POST['editedMagAddress'];
//    $mag_phone = $_POST['editedMagPhone'];
//    $mag_fax = $_POST['editedMagFax'];
//    $mag_email = $_POST['editedMagEmail'];
//    $mag_website = $_POST['editedWebsite'];
//    $concessionaire_type = $_POST['editedConcessionaireType'];
//    $concessionaire = $_POST['editedConcessionaire'];
//
//
//    $query = "insert into mag_info (admin_id,name,science_rank,scientific_group,international_position,mag_type,ISSN,publication_period,adder,date_added)
//                values ('$LastAdminID','$name','$science_rank','$scientific_group','$international_position','$type','$ISSN','$publication_period','$adder','$datewithtime')";
//    mysqli_query($connection_mag, $query);
//}