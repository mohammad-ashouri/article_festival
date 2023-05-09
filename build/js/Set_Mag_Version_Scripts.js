document.getElementById("cover_url").onchange = function change_cover_url_label() {
    var cover_url_label = document.getElementById("cover_url_label");
    if (cover_url.value.length !== 0) {
        cover_url_label.innerHTML = this.value.replace(/.*[\/\\]/, '');
    }
}
document.getElementById("file_url").onchange = function change_file_url_label() {
    var file_url_label = document.getElementById("file_url_label");
    if (file_url.value.length !== 0) {
        file_url_label.innerHTML = this.value.replace(/.*[\/\\]/, '');
    }
}

document.getElementById("editedCoverUrl2").onchange = function change_cover_url_label() {
    var cover_url_label = document.getElementById("editedCoverUrl2_label");
    if (editedCoverUrl2.value.length !== 0) {
        cover_url_label.innerHTML = this.value.replace(/.*[\/\\]/, '');
    }
}
document.getElementById("editedFileUrl2").onchange = function change_file_url_label() {
    var file_url_label = document.getElementById("editedFileUrl2_label");
    if (editedCoverUrl2.value.length !== 0) {
        file_url_label.innerHTML = this.value.replace(/.*[\/\\]/, '');
    }
}

function sub_mag_version() {
    var mag_name = document.getElementById("mag_name");
    var publication_period_year = document.getElementById("publication_period_year");
    var publication_period_number = document.getElementById("publication_period_number");
    var publication_number = document.getElementById("publication_number");
    var publication_year = document.getElementById("publication_year");
    var number_of_pages = document.getElementById("number_of_pages");
    var number_of_articles = document.getElementById("number_of_articles");
    var cover_url = document.getElementById("cover_url");
    var file_url = document.getElementById("file_url");
    if (mag_name.value === 'انتخاب کنید') {
        alert("نام نشریه را انتخاب کنید ");
        mag_name.style.backgroundColor = 'yellow';
        return false;
    } else if (publication_period_year.value === '') {
        alert("شماره دوره انتشار را وارد کنید. ");
        publication_period_year.style.backgroundColor = 'yellow';
        return false;
    } else if (publication_period_number.value === '') {
        alert("شماره دوره نشریه در سال را وارد کنید. ");
        publication_period_number.style.backgroundColor = 'yellow';
        return false;
    } else if (publication_number.value === '') {
        alert("شماره نسخه نشریه را وارد کنید. ");
        publication_number.style.backgroundColor = 'yellow';
        return false;
    } else if (publication_year.value < 1380 || publication_year.value >= 1410) {
        alert(" تاریخ انتشار نامعتبر است ");
        publication_year.style.backgroundColor = 'yellow';
        return false;
    } else if (publication_year.value === '') {
        alert("تاریخ انتشار را وارد کنید. ");
        publication_year.style.backgroundColor = 'yellow';
        return false;
    } else if (number_of_pages.value === '') {
        alert("شمارگان صفحه را وارد کنید. ");
        number_of_pages.style.backgroundColor = 'yellow';
        return false;
    } else if (number_of_articles.value === '') {
        alert("تعداد مقالات در نشریه را وارد کنید. ");
        number_of_articles.style.backgroundColor = 'yellow';
        return false;
    } else if (cover_url.value === '') {
        alert("فایل جلد مقاله را انتخاب کنید. ");
        return false;
    } else if (file_url.value === '') {
        alert("فایل مقاله را انتخاب کنید. ");
        return false;
    } else {
        return true;
    }
}

document.getElementById("search_form").onsubmit = function search() {
    var mag_id = document.getElementById("mag_id");
    if (mag_id.value === 'انتخاب کنید') {
        alert("لطفا نسخه نشریه را انتخاب نمایید");
        return false;
    } else {
        return true;
    }
}