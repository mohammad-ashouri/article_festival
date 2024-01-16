document.getElementById("Rater_Fee").onsubmit = function () {
    if (festival_id.value == 'انتخاب کنید') {
        alert('دوره را انتخاب کنید!');
        return false;
    }
    else {
        return true;
    }
}
document.getElementById("set-rater-fee").onsubmit = function () {
    if (festival_id.value == 'انتخاب کنید') {
        alert('دوره را انتخاب کنید!');
        return false;
    }
    else if (ejmali.value==''){
        alert('تعرفه ارزیابی اجمالی را وارد کنید!');
        return false;
    }
    else if (tafsili.value==''){
        alert('تعرفه ارزیابی تفصیلی را وارد کنید!');
        return false;
    }
    else {
        return true;
    }
}