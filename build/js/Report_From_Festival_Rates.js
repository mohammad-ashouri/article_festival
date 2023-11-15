$('#change-rate-status').click(function (e) {
    e.preventDefault();
    $.ajax({
        url: "build/ajax/ChangeRateInfos.php",
        type: "POST",
        data: {
            id: $('.changeratestatus').data('article-id'),
            work: $('.changeratestatus').data('work')
        },
        success: function (response) {
            if(response!==false){
                alert('با موفقیت انجام شد.');
                location.reload();
            }else{
                alert('عملیات با خطا مواجه شد!')
            }
        }
    })
});