const updateVersion = document.querySelector('#updateVersion');
updateVersion.addEventListener('click', function () {
    if (confirm("اطلاعات قبلی در مورد نسخه انتخاب شده" +
        " پس از تایید شما دیگر قابل استفاده نمی باشد. آیا تایید می کنید؟")) {
        var formData = new FormData();

        formData.append('editedVersionID',$('#editedVersionID').val())
        formData.append('editedPublicationPeriodYear', $('#editedPublicationPeriodYear').val());
        formData.append('editedPublicationPeriodNumber', $('#editedPublicationPeriodNumber').val());
        formData.append('editedPublicationNumber', $('#editedPublicationNumber').val());
        formData.append('editedPublicationYear', $('#editedPublicationYear').val());
        formData.append('editedNumberOfPages', $('#editedNumberOfPages').val());
        formData.append('editedNumberOfArticles', $('#editedNumberOfArticles').val());

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
                // alert('نشریه انتخاب شده با موفقیت ویرایش شد');
                // location.reload();
            }
        });
    }
});
