function ChangeTabs(TabID) {
    var Tab1=document.getElementById('tab1');
    var Tab2=document.getElementById('tab2');
    var Tab3=document.getElementById('tab3');
    var TabActive=document.getElementById(TabID);
    var tab_1=document.getElementById('tab_1');
    var tab_2=document.getElementById('tab_2');
    var tab_3=document.getElementById('tab_3');
    Tab1.style.color='#6c757d';
    Tab1.style.backgroundColor='white';
    Tab2.style.color='#6c757d';
    Tab2.style.backgroundColor='white';
    Tab3.style.color='#6c757d';
    Tab3.style.backgroundColor='white';
    Tab1.className='nav-link';
    Tab2.className='nav-link';
    Tab3.className='nav-link';
    TabActive.className='nav-link active';
    TabActive.style.backgroundColor= '#007bff';
    TabActive.style.color= 'white';
    if (TabID=='tab1'){
        tab_1.className="tab-pane active";
        tab_2.className="tab-pane";
        tab_3.className="tab-pane";
    }
    else if (TabID=='tab2'){
        tab_1.className="tab-pane";
        tab_3.className="tab-pane";
        tab_2.className="tab-pane active";
    }
    else if (TabID=='tab3'){
        tab_1.className="tab-pane";
        tab_2.className="tab-pane";
        tab_3.className="tab-pane active";
    }

}
function Check_Fields() {
    var name = document.getElementById('name');
    var science_rank = document.getElementById('science_rank');
    var scientific_group = document.getElementById('scientific_group');
    var international_position = document.getElementById('international_position');
    var type = document.getElementById('type');
    var publication_period = document.getElementById('publication_period');
    var ISSN = document.getElementById('ISSN');
    var mag_state = document.getElementById('mag_state');
    var mag_city = document.getElementById('mag_city');
    var mag_address = document.getElementById('mag_address');
    var mag_phone = document.getElementById('mag_phone');
    var mag_email = document.getElementById('mag_email');
    var concessionaire_type = document.getElementById('concessionaire_type');
    var concessionaire = document.getElementById('concessionaire');
    var responsible_manager_owner_subject = document.getElementById('responsible_manager_owner_subject');
    var responsible_manager_owner_name = document.getElementById('responsible_manager_owner_name');
    var responsible_manager_owner_family= document.getElementById('responsible_manager_owner_family');
    var responsible_manager_owner_degree = document.getElementById('responsible_manager_owner_degree');
    var responsible_manager_owner_phone = document.getElementById('responsible_manager_owner_phone');
    var responsible_manager_owner_mobile = document.getElementById('responsible_manager_owner_mobile');
    var chief_editor_subject = document.getElementById('chief_editor_subject');
    var chief_editor_name = document.getElementById('chief_editor_name');
    var chief_editor_family = document.getElementById('chief_editor_family');
    var chief_editor_degree = document.getElementById('chief_editor_degree');
    var chief_editor_phone = document.getElementById('chief_editor_phone');
    var chief_editor_mobile = document.getElementById('chief_editor_mobile');
    var administration_manager_subject = document.getElementById('administration_manager_subject');
    var administration_manager_name = document.getElementById('administration_manager_name');
    var administration_manager_family = document.getElementById('administration_manager_family');
    var administration_manager_degree = document.getElementById('administration_manager_degree');
    var administration_manager_phone = document.getElementById('administration_manager_phone');
    var administration_manager_mobile = document.getElementById('administration_manager_mobile');

    if (name.value===''){
        alert('نام نشریه وارد نشده است');
        name.style.backgroundColor='yellow';
        return false;
    }
    else if(science_rank.value==='انتخاب کنید'){
        alert('رتبه علمی نشریه انتخاب نشده است');
        science_rank.style.backgroundColor='yellow';
        return false;
    }else if(scientific_group.value==='انتخاب کنید'){
        alert('گروه علمی نشریه انتخاب نشده است');
        scientific_group.style.backgroundColor='yellow';
        return false;
    }else if(international_position.value==='انتخاب کنید'){
        alert('جایگاه بین المللی نشریه انتخاب نشده است');
        international_position.style.backgroundColor='yellow';
        return false;
    }else if(type.value==='انتخاب کنید'){
        alert('نوع نشریه نشده است');
        type.style.backgroundColor='yellow';
        return false;
    }else if(publication_period.value==='انتخاب کنید'){
        alert('دوره انتشار انتخاب نشده است');
        publication_period.style.backgroundColor='yellow';
        return false;
    }else if(ISSN.value===''){
        alert('شاپا وارد نشده است');
        ISSN.style.backgroundColor='yellow';
        return false;
    }else if(mag_state.value===''){
        alert('استان وارد نشده است');
        mag_state.style.backgroundColor='yellow';
        return false;
    }else if(mag_city.value===''){
        alert('شهر وارد نشده است');
        mag_city.style.backgroundColor='yellow';
        return false;
    }else if(mag_address.value===''){
        alert('آدرس وارد نشده است');
        mag_address.style.backgroundColor='yellow';
        return false;
    }else if(mag_phone.value===''){
        alert('شماره ثابت وارد نشده است');
        mag_phone.style.backgroundColor='yellow';
        return false;
    }else if(mag_email.value===''){
        alert('ایمیل وارد نشده است');
        mag_email.style.backgroundColor='yellow';
        return false;
    }else if(concessionaire_type.value==='انتخاب کنید'){
        alert('نوع کاربری صاحب امتیاز وارد نشده است');
        concessionaire_type.style.backgroundColor='yellow';
        return false;
    }else if(concessionaire.value===''){
        alert('اطلاعات صاحب امتیاز وارد نشده است');
        concessionaire.style.backgroundColor='yellow';
        return false;
    }else if(responsible_manager_owner_subject.value==='انتخاب کنید'){
        alert('عنوان مدیر مسئول انتخاب نشده است');
        responsible_manager_owner_subject.style.backgroundColor='yellow';
        return false;
    }else if(responsible_manager_owner_name.value===''){
        alert('نام مدیر مسئول وارد نشده است');
        responsible_manager_owner_name.style.backgroundColor='yellow';
        return false;
    }else if(responsible_manager_owner_family.value===''){
        alert('نام خانوادگی مدیر مسئول وارد نشده است');
        responsible_manager_owner_family.style.backgroundColor='yellow';
        return false;
    }else if(responsible_manager_owner_degree.value==='انتخاب کنید'){
        alert('مدرک علمی مدیر مسئول انتخاب نشده است');
        responsible_manager_owner_degree.style.backgroundColor='yellow';
        return false;
    }else if(responsible_manager_owner_phone.value===''){
        alert('تلفن همراه مدیر مسئول وارد نشده است');
        responsible_manager_owner_phone.style.backgroundColor='yellow';
        return false;
    }else if(responsible_manager_owner_mobile.value===''){
        alert('تلفن همراه مدیر مسئول وارد نشده است');
        responsible_manager_owner_mobile.style.backgroundColor='yellow';
        return false;
    }else if(chief_editor_subject.value==='انتخاب کنید'){
        alert('عنوان سردبیر انتخاب نشده است');
        chief_editor_subject.style.backgroundColor='yellow';
        return false;
    }else if(chief_editor_name.value===''){
        alert('نام سردبیر وارد نشده است');
        chief_editor_name.style.backgroundColor='yellow';
        return false;
    }else if(chief_editor_family.value===''){
        alert('نام خانوادگی سردبیر وارد نشده است');
        chief_editor_family.style.backgroundColor='yellow';
        return false;
    }else if(chief_editor_degree.value==='انتخاب کنید'){
        alert('مدرک سردبیر انتخاب نشده است');
        chief_editor_degree.style.backgroundColor='yellow';
        return false;
    }else if(chief_editor_phone.value===''){
        alert('شماره ثابت سردبیر وارد نشده است');
        chief_editor_phone.style.backgroundColor='yellow';
        return false;
    }else if(chief_editor_mobile.value===''){
        alert('شماره همراه سردبیر وارد نشده است');
        chief_editor_mobile.style.backgroundColor='yellow';
        return false;
    }else if(administration_manager_subject.value==='انتخاب کنید'){
        alert('عنوان مدیر اجرایی وارد نشده است');
        administration_manager_subject.style.backgroundColor='yellow';
        return false;
    }else if(administration_manager_name.value===''){
        alert('نام مدیر اجرایی وارد نشده است');
        administration_manager_name.style.backgroundColor='yellow';
        return false;
    }else if(administration_manager_family.value===''){
        alert('نام خانوادگی مدیر اجرایی وارد نشده است');
        administration_manager_family.style.backgroundColor='yellow';
        return false;
    }else if(administration_manager_degree.value==='انتخاب کنید'){
        alert('مدرک مدیر اجرایی انتخاب نشده است');
        administration_manager_degree.style.backgroundColor='yellow';
        return false;
    }else if(administration_manager_phone.value===''){
        alert('شماره ثابت مدیر اجرایی وارد نشده است');
        administration_manager_phone.style.backgroundColor='yellow';
        return false;
    }else if(administration_manager_mobile.value===''){
        alert('شماره همراه مدیر اجرایی وارد نشده است');
        administration_manager_mobile.style.backgroundColor='yellow';
        return false;
    }
    else{
        return true;
    }
}
function getInfo(id) {
    $.ajax({
        url: "./build/ajax/GetMagAllInfo.php",
        type: "GET",
        data: {
            id: id,
            name: ''
        },
        success: function (response) {
            //Mag_Info
            $("#editedName").val(response.name);
            $("#postID").val(response.id);
            $("#editedScienceRank").val(response.science_rank).trigger('change');
            $("#editedScientificGroup").val(response.scientific_group.split('/')).trigger('change');
            $("#editedInternationalPosition").val(response.international_position.split('/')).trigger('change');
            $("#editedMagType").val(response.mag_type).trigger('change');
            $("#editedPublicationPeriod").val(response.publication_period).trigger('change');
            $("#editedISSN").val(response.ISSN);
            $("#editedMagState").val(response.mag_state);
            $("#editedMagCity").val(response.mag_city);
            $("#editedMagAddress").val(response.mag_address);
            $("#editedMagPhone").val(response.mag_phone);
            $("#editedMagFax").val(response.mag_fax);
            $("#editedMagEmail").val(response.mag_email);
            $("#editedWebsite").val(response.mag_website);
            $("#editedConcessionaireType").val(response.concessionaire_type).trigger('change');
            $("#editedConcessionaire").val(response.concessionaire).trigger('change');

            //responsible_manager_owner
            $("#editedResponsibleManagerOwnerSubject").val(response.responsible_manager_owner_subject).trigger('change');
            $("#editedResponsibleManagerOwnerName").val(response.responsible_manager_owner_name);
            $("#editedResponsibleManagerOwnerFamily").val(response.responsible_manager_owner_family);
            $("#editedResponsibleManagerOwnerDegree").val(response.responsible_manager_owner_degree).trigger('change');
            $("#editedResponsibleManagerOwnerPhone").val(response.responsible_manager_owner_phone);
            $("#editedResponsibleManagerOwnerMobile").val(response.responsible_manager_owner_mobile);
            $("#editedResponsibleManagerOwnerAddress").val(response.responsible_manager_owner_address);

            //responsible_manager_owner
            $("#editedChiefEditorSubject").val(response.chief_editor_subject).trigger('change');
            $("#editedChiefEditorName").val(response.chief_editor_name);
            $("#editedChiefEditorFamily").val(response.chief_editor_family);
            $("#editedChiefEditorDegree").val(response.chief_editor_degree).trigger('change');
            $("#editedChiefEditorPhone").val(response.chief_editor_phone);
            $("#editedChiefEditorMobile").val(response.chief_editor_mobile);
            $("#editedChiefEditorAddress").val(response.chief_editor_address);

            //administration_manager
            $("#editedAdministrationManagerSubject").val(response.administration_manager_subject).trigger('change');
            $("#editedAdministrationManagerName").val(response.administration_manager_name);
            $("#editedAdministrationManagerFamily").val(response.administration_manager_family);
            $("#editedAdministrationManagerDegree").val(response.administration_manager_degree).trigger('change');
            $("#editedAdministrationManagerPhone").val(response.administration_manager_phone);
            $("#editedAdministrationManagerMobile").val(response.administration_manager_mobile);
            $("#editedAdministrationManagerAddress").val(response.administration_manager_address);
        }
    });
}
document.getElementById('Mag-Search').onkeyup=function (){
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("Mag-Search");
    filter = input.value.toUpperCase();
    table = document.getElementById("Mag-Table");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}





document.getElementById("deleteMag").addEventListener("click", function () {
    var magId = this.getAttribute("data-mag-id");
    if (confirm(" نشریه انتخاب شده" +
        " پس از تایید شما حذف شده و دیگر قابل استفاده نمی باشد. آیا تایید می کنید؟")) {
        $.ajax({
            url: "build/php/inc/Delete_Journal.php",
            type: "POST",
            data: {
                id: magId,
            },
            success: function (response) {
                alert('نشریه انتخاب شده با موفقیت حذف شد');
                location.reload();
            }
        });
    }
});

