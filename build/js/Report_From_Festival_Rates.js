$('.change-rate-status').submit(function (e) {
    if (confirm('این اثر به مرحله تفصیلی سوم راه پیدا خواهد کرد. آیا مطمئن هستید؟')) {
        e.preventDefault();
        $.ajax({
            url: "build/ajax/ChangeRateInfos.php",
            type: "POST",
            data: {
                id: $(this).data('article-id'),
                work: $(this).data('work')
            },
            success: function (response) {
                if (response !== false) {
                    alert('با موفقیت انجام شد.');
                    location.reload();
                } else {
                    alert('عملیات با خطا مواجه شد!');
                }
            }
        })
    }
});