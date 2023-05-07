const updateJournal = document.querySelector('#updateJournal');
updateJournal.addEventListener('click', function () {
    var name = $("#editedName").val();
    var science_rank = $("#editedScienceRank").val();
    var scientific_group = $("#editedScientificGroup").val();
    var international_position = $("#editedInternationalPosition").val();
    var type = $("#editedMagType").val();
    var publication_period = $("#editedPublicationPeriod").val();
    var ISSN = $("#editedISSN").val();
    var mag_state = $("#editedMagState").val();
    var mag_city = $("#editedMagCity").val();
    var mag_address = $("#editedMagAddress").val();
    var mag_phone = $("#editedMagPhone").val();
    var mag_email = $("#editedMagEmail").val();
    var concessionaire_type = $("#editedConcessionaireType").val();
    var concessionaire = $("#editedConcessionaire").val();
    var responsible_manager_owner_subject = $("#editedResponsibleManagerOwnerSubject").val();
    var responsible_manager_owner_name = $("#editedResponsibleManagerOwnerName").val();
    var responsible_manager_owner_family = $("#editedResponsibleManagerOwnerFamily").val();
    var responsible_manager_owner_degree = $("#editedResponsibleManagerOwnerDegree").val();
    var responsible_manager_owner_phone = $("#editedResponsibleManagerOwnerPhone").val();
    var responsible_manager_owner_mobile = $("#editedResponsibleManagerOwnerMobile").val();
    var chief_editor_subject = $("#editedChiefEditorSubject").val();
    var chief_editor_name = $("#editedChiefEditorName").val();
    var chief_editor_family = $("#editedChiefEditorFamily").val();
    var chief_editor_degree = $("#editedChiefEditorDegree").val();
    var chief_editor_phone = $("#editedChiefEditorPhone").val();
    var chief_editor_mobile = $("#editedChiefEditorMobile").val();
    var administration_manager_subject = $("#editedAdministrationManagerSubject").val();
    var administration_manager_name = $("#editedAdministrationManagerName").val();
    var administration_manager_family = $("#editedAdministrationManagerFamily").val();
    var administration_manager_degree = $("#editedAdministrationManagerDegree").val();
    var administration_manager_phone = $("#editedAdministrationManagerPhone").val();
    var administration_manager_mobile = $("#editedAdministrationManagerMobile").val();

    console.log(scientific_group);
    if (name === '') {
        alert('نام نشریه وارد نشده است');
        return false;
    } else if (science_rank === 'انتخاب کنید' || science_rank===null) {
        alert('رتبه علمی نشریه انتخاب نشده است');
        return false;
    }
    else if (scientific_group ===  'انتخاب کنید' || scientific_group===null || scientific_group.length===0) {
        alert('گروه علمی نشریه انتخاب نشده است');
        return false;
    }
    else if (international_position === 'انتخاب کنید' || international_position===null || international_position.length===0) {
        alert('جایگاه بین المللی نشریه انتخاب نشده است');
        return false;
    } else if (type === 'انتخاب کنید') {
        alert('نوع نشریه نشده است');
        return false;
    } else if (publication_period === 'انتخاب کنید') {
        alert('دوره انتشار انتخاب نشده است');
        return false;
    } else if (ISSN === '') {
        alert('شاپا وارد نشده است');
        return false;
    } else if (mag_state === '') {
        alert('استان وارد نشده است');
        return false;
    } else if (mag_city === '') {
        alert('شهر وارد نشده است');
        return false;
    } else if (mag_address === '') {
        alert('آدرس وارد نشده است');
        return false;
    } else if (mag_phone === '') {
        alert('شماره ثابت وارد نشده است');
        return false;
    } else if (mag_email === '') {
        alert('ایمیل وارد نشده است');
        return false;
    } else if (concessionaire_type === 'انتخاب کنید') {
        alert('نوع کاربری صاحب امتیاز وارد نشده است');
        return false;
    } else if (concessionaire === '') {
        alert('اطلاعات صاحب امتیاز وارد نشده است');
        return false;
    } else if (responsible_manager_owner_subject === 'انتخاب کنید') {
        alert('عنوان مدیر مسئول انتخاب نشده است');
        return false;
    } else if (responsible_manager_owner_name === '') {
        alert('نام مدیر مسئول وارد نشده است');
        return false;
    } else if (responsible_manager_owner_family === '') {
        alert('نام خانوادگی مدیر مسئول وارد نشده است');
        return false;
    } else if (responsible_manager_owner_degree === 'انتخاب کنید') {
        alert('مدرک علمی مدیر مسئول انتخاب نشده است');
        return false;
    } else if (responsible_manager_owner_phone === '') {
        alert('تلفن همراه مدیر مسئول وارد نشده است');
        return false;
    } else if (responsible_manager_owner_mobile === '') {
        alert('تلفن همراه مدیر مسئول وارد نشده است');
        return false;
    } else if (chief_editor_subject === 'انتخاب کنید') {
        alert('عنوان سردبیر انتخاب نشده است');
        return false;
    } else if (chief_editor_name === '') {
        alert('نام سردبیر وارد نشده است');
        return false;
    } else if (chief_editor_family === '') {
        alert('نام خانوادگی سردبیر وارد نشده است');
        return false;
    } else if (chief_editor_degree === 'انتخاب کنید') {
        alert('مدرک سردبیر انتخاب نشده است');
        return false;
    } else if (chief_editor_phone === '') {
        alert('شماره ثابت سردبیر وارد نشده است');
        return false;
    } else if (chief_editor_mobile === '') {
        alert('شماره همراه سردبیر وارد نشده است');
        return false;
    } else if (administration_manager_subject === 'انتخاب کنید') {
        alert('عنوان مدیر اجرایی وارد نشده است');
        return false;
    } else if (administration_manager_name === '') {
        alert('نام مدیر اجرایی وارد نشده است');
        return false;
    } else if (administration_manager_family === '') {
        alert('نام خانوادگی مدیر اجرایی وارد نشده است');
        return false;
    } else if (administration_manager_degree === 'انتخاب کنید') {
        alert('مدرک مدیر اجرایی انتخاب نشده است');
        return false;
    } else if (administration_manager_phone === '') {
        alert('شماره ثابت مدیر اجرایی وارد نشده است');
        return false;
    } else if (administration_manager_mobile === '') {
        alert('شماره همراه مدیر اجرایی وارد نشده است');
        return false;
    } else {
        if (confirm("اطلاعات قبلی در مورد نشریه '" +
            $("#editedName").val() +
            "' پس از تایید شما دیگر قابل استفاده نمی باشد." +
            "ضمنا اطلاعات نشریه نسخه هایی که وارد شده اند تغییر نخواهد کرد." +
            "\n" +
            " آیا تایید می کنید؟")) {
            $.ajax({
                url: "build/php/inc/EditJournal.php",
                type: "POST",
                data: {
                    //Mag_Info
                    editedName: name,
                    postID: $("#postID").val(),
                    editedScienceRank: science_rank,
                    editedScientificGroup: scientific_group,
                    editedInternationalPosition: international_position,
                    editedMagType: type,
                    editedPublicationPeriod: publication_period,
                    editedISSN: ISSN,
                    editedMagState: mag_state,
                    editedMagCity: mag_city,
                    editedMagAddress: mag_address,
                    editedMagPhone: mag_phone,
                    editedMagFax: $("#editedMagFax").val(),
                    editedMagEmail: mag_email,
                    editedWebsite: $("#editedWebsite").val(),
                    editedConcessionaireType: concessionaire_type,
                    editedConcessionaire: concessionaire,

                    //responsible_manager_owner
                    editedResponsibleManagerOwnerSubject: responsible_manager_owner_subject,
                    editedResponsibleManagerOwnerName: responsible_manager_owner_name,
                    editedResponsibleManagerOwnerFamily: responsible_manager_owner_family,
                    editedResponsibleManagerOwnerDegree: responsible_manager_owner_degree,
                    editedResponsibleManagerOwnerPhone: responsible_manager_owner_phone,
                    editedResponsibleManagerOwnerMobile: responsible_manager_owner_mobile,
                    editedResponsibleManagerOwnerAddress: $("#editedResponsibleManagerOwnerAddress").val(),

                    //responsible_manager_owner
                    editedChiefEditorSubject: chief_editor_subject,
                    editedChiefEditorName: chief_editor_name,
                    editedChiefEditorFamily: chief_editor_family,
                    editedChiefEditorDegree: chief_editor_degree,
                    editedChiefEditorPhone: chief_editor_phone,
                    editedChiefEditorMobile: chief_editor_mobile,
                    editedChiefEditorAddress: $("#editedChiefEditorAddress").val(),

                    //administration_manager
                    editedAdministrationManagerSubject: administration_manager_subject,
                    editedAdministrationManagerName: administration_manager_name,
                    editedAdministrationManagerFamily: administration_manager_family,
                    editedAdministrationManagerDegree: administration_manager_degree,
                    editedAdministrationManagerPhone: administration_manager_phone,
                    editedAdministrationManagerMobile: administration_manager_mobile,
                    editedAdministrationManagerAddress: $("#editedAdministrationManagerAddress").val(),
                },
                success: function (response) {
                    alert('نشریه انتخاب شده با موفقیت ویرایش شد');
                    location.reload();
                }
            });
        }
    }

});
