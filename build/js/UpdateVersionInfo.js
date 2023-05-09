const updateVersion = document.querySelector('#updateVersion');
updateVersion.addEventListener('click', function () {
    var publication_period_year = $('#editedPublicationPeriodYear').val();
    var publication_period_number = $('#editedPublicationPeriodNumber').val();
    var publication_number = $('#editedPublicationNumber').val();
    var publication_year = $('#editedPublicationYear').val();
    var number_of_pages = $('#editedNumberOfPages').val();
    var number_of_articles = $('#editedNumberOfArticles').val();
    if (publication_period_year === '') {
        alert("شماره دوره انتشار را وارد کنید. ");
        return false;
    } else if (publication_period_number === '') {
        alert("شماره دوره نشریه در سال را وارد کنید. ");
        return false;
    } else if (publication_number === '') {
        alert("شماره نسخه نشریه را وارد کنید. ");
        return false;
    } else if (publication_year < 1360) {
        alert(" تاریخ انتشار نامعتبر است ");
        return false;
    } else if (publication_year === '') {
        alert("تاریخ انتشار را وارد کنید. ");
        return false;
    } else if (number_of_pages === '') {
        alert("شمارگان صفحه را وارد کنید. ");
        return false;
    } else if (number_of_articles === '') {
        alert("تعداد مقالات در نشریه را وارد کنید. ");
        return false;
    } else {
        if (confirm("اطلاعات قبلی در مورد نسخه انتخاب شده" +
            " پس از تایید شما دیگر قابل استفاده نمی باشد. آیا تایید می کنید؟")) {
            var formData = new FormData();

            formData.append('editedVersionID', $('#editedVersionID').val())
            formData.append('editedPublicationPeriodYear', publication_period_year);
            formData.append('editedPublicationPeriodNumber', publication_period_number);
            formData.append('editedPublicationNumber', publication_number);
            formData.append('editedPublicationYear', publication_year);
            formData.append('editedNumberOfPages', number_of_pages);
            formData.append('editedNumberOfArticles', number_of_articles);

            var editedCoverUrl2 = $('#editedCoverUrl2')[0].files[0];
            formData.append('editedCoverUrl2', editedCoverUrl2);
            var editedFileUrl2 = $('#editedFileUrl2')[0].files[0];
            formData.append('editedFileUrl2', editedFileUrl2);

            $.ajax({
                url: "build/php/inc/EditVersion.php",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    console.log(response);
                    alert('نسخه نشریه انتخاب شده با موفقیت ویرایش شد');
                    location.reload();
                }
            });
        }
    }

});
