document.getElementById("deleteVersion").addEventListener("click", function () {
    var versionId = this.getAttribute("data-version-id");
    if (confirm(
        "نسخه نشریه انتخاب شده" +
        " پس از تایید شما حذف شده و دیگر قابل استفاده نمی باشد. آیا تایید می کنید؟")) {
        $.ajax({
            url: "build/php/inc/Delete_Version.php",
            type: "POST",
            data: {
                id: versionId,
            },
            success: function (response) {
                alert('نشریه انتخاب شده با موفقیت حذف شد');
            }
        });
    }
});

