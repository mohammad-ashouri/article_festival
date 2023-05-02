<?php
session_start();
include_once __DIR__.'/../../../config/connection.php';

//echo '<pre>';
//print_r($_POST);
//echo '</pre>';

if (isset($_POST['Add_Journal']) and isset($_POST['name']) and isset($_SESSION['id'])){
    $name=$_POST['name'];

    //check for name exists
    $query=mysqli_query($connection_mag,"select name from mag_info where name='$name'");
    foreach ($query as $IfNameIsExists){}

    if (empty($IfNameIsExists)){
        $adder=$_SESSION['id'];
        $science_rank=$_POST['science_rank'];
        $scientific_group=implode('/',$_POST['scientific_group']);
        $international_position=implode('/',$_POST['international_position']);
        $type=$_POST['type'];
        $publication_period=$_POST['publication_period'];
        $ISSN=$_POST['ISSN'];
        $mag_state=$_POST['mag_state'];
        $mag_city=$_POST['mag_city'];
        $mag_address=$_POST['mag_address'];
        $mag_phone=$_POST['mag_phone'];
        $mag_fax=$_POST['mag_fax'];
        $mag_email=$_POST['mag_email'];
        $mag_website=$_POST['mag_website'];
        $concessionaire_type=$_POST['concessionaire_type'];
        $concessionaire=$_POST['concessionaire'];

        $responsible_manager_owner_subject=$_POST['responsible_manager_owner_subject'];
        $responsible_manager_owner_name=$_POST['responsible_manager_owner_name'];
        $responsible_manager_owner_family=$_POST['responsible_manager_owner_family'];
        $responsible_manager_owner_degree=$_POST['responsible_manager_owner_degree'];
        $responsible_manager_owner_phone=$_POST['responsible_manager_owner_phone'];
        $responsible_manager_owner_mobile=$_POST['responsible_manager_owner_mobile'];
        $responsible_manager_owner_address=$_POST['responsible_manager_owner_address'];

        $chief_editor_subject=$_POST['chief_editor_subject'];
        $chief_editor_name=$_POST['chief_editor_name'];
        $chief_editor_family=$_POST['chief_editor_family'];
        $chief_editor_degree=$_POST['chief_editor_degree'];
        $chief_editor_phone=$_POST['chief_editor_phone'];
        $chief_editor_mobile=$_POST['chief_editor_mobile'];
        $chief_editor_address=$_POST['chief_editor_address'];

        $administration_manager_subject=$_POST['administration_manager_subject'];
        $administration_manager_name=$_POST['administration_manager_name'];
        $administration_manager_family=$_POST['administration_manager_family'];
        $administration_manager_degree=$_POST['administration_manager_degree'];
        $administration_manager_phone=$_POST['administration_manager_phone'];
        $administration_manager_mobile=$_POST['administration_manager_mobile'];
        $administration_manager_address=$_POST['administration_manager_address'];

        //Insert Into mag_admins
        mysqli_query($connection_mag,"insert into mag_admins (concessionaire,concessionaire_type,responsible_manager_owner_name,responsible_manager_owner_family,responsible_manager_owner_subject,
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
        $query=mysqli_query($connection_mag,"select max(id) from mag_admins");
        foreach ($query as $LastAdminID){}
        $LastAdminID=$LastAdminID['max(id)'];

        $query="insert into mag_info (admin_id,name,science_rank,scientific_group,international_position,mag_type,ISSN,publication_period,adder,date_added)
                values ('$LastAdminID','$name','$science_rank','$scientific_group','$international_position','$type','$ISSN','$publication_period','$adder','$datewithtime')";
        mysqli_query($connection_mag,$query);
        header("Location: ../../../mag_manager.php?MagAdded=$name");
    }
    else{
        header("Location: ../../../mag_manager.php?NameExists='$name");
    }
}
else{
    header("Location: ../../../index.php?WrongOperation");
}

