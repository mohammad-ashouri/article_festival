function sortingG1(articleID,groupID){
    $.ajax({
        url: "build/php/inc/sorting.php",
        type: "POST",
        data: {
            work:"sortG1",
            articleID: articleID,
            groupID: groupID
        },
        success: function (response) {
            console.log(response);
            if (response==='err'){
                alert('خطا در ثبت گونه بندی.');
            }
        }
    });
}

function sortingG2(articleID,groupID){
    $.ajax({
        url: "build/php/inc/sorting.php",
        type: "POST",
        data: {
            work:"sortG2",
            articleID: articleID,
            groupID: groupID
        },
        success: function (response) {
            console.log(response);
            if (response==='err'){
                alert('خطا در ثبت گونه بندی.');
            }
        }
    });
}

var buttons = document.getElementsByClassName('btn btn-block btn-success forApprove');

for (var i = 0; i < buttons.length; i++) {
    buttons[i].addEventListener('click', function() {
        var value = this.value;
        if (confirm('در صورت تایید، این مقاله به فهرست صورتجلسه اضافه خواهند شد. آیا مطمئن هستید؟')){
            var ids=this.id;
            ids.hidden=false;
            // $.ajax({
            //     url: "build/php/inc/sorting.php",
            //     type: "POST",
            //     data: {
            //         work:"approveSort",
            //         articleID: value
            //     },
            //     success: function (response) {
            //         console.log(response);
            //         this.id.hidden=true;
            //         if (response==='err'){
            //             alert('خطا در تایید.');
            //         }
            //     }
            // });
        }
    });
}