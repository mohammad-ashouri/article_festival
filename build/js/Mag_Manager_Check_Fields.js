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