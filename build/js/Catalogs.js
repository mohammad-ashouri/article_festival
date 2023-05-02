document.getElementById("Special_Type_Form").onsubmit = function Validate_Special_Type(){
    var Special_Type=document.getElementById('Special_Type');
    if (Special_Type.value==''){
        alert ('بخش ویژه را وارد کنید.');
        return false;
    }else{
        return true;
    }
};

document.getElementById("Disable_Special_Type_Form").onsubmit = function Validate_Special_Type(){
    var Disable_Special_Type=document.getElementById('Disable_Special_Type');
    if (Disable_Special_Type.value=='انتخاب کنید'){
        alert ('بخش ویژه را انتخاب کنید');
        return false;
    }else{
        return true;
    }
};

document.getElementById("Enable_Special_Type_Form").onsubmit = function Validate_Special_Type(){
    var Enable_Special_Type=document.getElementById('Enable_Special_Type');
    if (Enable_Special_Type.value=='انتخاب کنید'){
        alert ('بخش ویژه را انتخاب کنید');
        return false;
    }else{
        return true;
    }
};

document.getElementById("Service_Location_Form").onsubmit = function Validate_Service_Location(){
    var Service_Location=document.getElementById('Service_Location');
    if (Service_Location.value==''){
        alert ('محل خدمت را وارد کنید.');
        return false;
    }else{
        return true;
    }
};

document.getElementById("Disable_Service_Location_Form").onsubmit = function Validate_Service_Location(){
    var Disable_Service_Location=document.getElementById('Disable_Service_Location');
    if (Disable_Service_Location.value=='انتخاب کنید'){
        alert ('محل خدمت را انتخاب کنید');
        return false;
    }else{
        return true;
    }
};

document.getElementById("Enable_Service_Location_Form").onsubmit = function Validate_Service_Location(){
    var Enable_Service_Location=document.getElementById('Enable_Service_Location');
    if (Enable_Service_Location.value=='انتخاب کنید'){
        alert ('محل خدمت را انتخاب کنید');
        return false;
    }else{
        return true;
    }
};

document.getElementById("Scientific_Committee_Form").onsubmit = function Validate_Scientific_Committee(){
    var Scientific_Committee_Subject=document.getElementById('Scientific_Committee_Subject');
    var Scientific_Committee_Name=document.getElementById('Scientific_Committee_Name');
    var Scientific_Committee_Family=document.getElementById('Scientific_Committee_Family');
    var Scientific_Committee_National_Code=document.getElementById('Scientific_Committee_National_Code');
    var Scientific_Committee_Position=document.getElementById('Scientific_Committee_Position');
    if (Scientific_Committee_Subject.value=='عنوان را انتخاب کنید'){
        alert ('عنوان را انتخاب کنید');
        return false;
    }else if (Scientific_Committee_Name.value==''){
        alert ('نام را وارد کنید');
        return false;
    }else if (Scientific_Committee_Family.value==''){
        alert ('نام خانوادگی را وارد کنید');
        return false;
    }else if (Scientific_Committee_National_Code.value==''){
        alert ('کد ملی را وارد کنید');
        return false;
    }else if (Scientific_Committee_Position.value=='سمت را انتخاب کنید'){
        alert ('سمت را انتخاب کنید');
        return false;
    }else{
        return true;
    }
};

document.getElementById("Disable_Scientific_Committee_Form").onsubmit = function Validate_Scientific_Committee(){
    var Disable_Scientific_Committee=document.getElementById('Disable_Scientific_Committee');
    if (Disable_Scientific_Committee.value=='کاربر را انتخاب کنید'){
        alert ('کاربر را انتخاب کنید');
        return false;
    }else{
        return true;
    }
};

document.getElementById("Enable_Scientific_Committee_Form").onsubmit = function Validate_Scientific_Committee(){
    var Enable_Scientific_Committee=document.getElementById('Enable_Scientific_Committee');
    if (Enable_Scientific_Committee.value=='کاربر را انتخاب کنید'){
        alert ('کاربر را انتخاب کنید');
        return false;
    }else{
        return true;
    }
};