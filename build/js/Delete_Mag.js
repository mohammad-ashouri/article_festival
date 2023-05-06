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

