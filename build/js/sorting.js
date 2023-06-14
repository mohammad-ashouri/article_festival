function sortingG1(articleID, groupID) {
    $.ajax({
        url: "build/php/inc/sorting.php",
        type: "POST",
        data: {
            work: "sortG1",
            articleID: articleID,
            groupID: groupID
        },
        success: function (response) {
            console.log(response);
            if (response === 'err') {
                alert('خطا در ثبت گونه بندی.');
            }
        }
    });
}

function sortingG2(articleID, groupID) {
    $.ajax({
        url: "build/php/inc/sorting.php",
        type: "POST",
        data: {
            work: "sortG2",
            articleID: articleID,
            groupID: groupID
        },
        success: function (response) {
            console.log(response);
            if (response === 'err') {
                alert('خطا در ثبت گونه بندی.');
            }
        }
    });
}

var buttons = document.getElementsByClassName('btn btn-block btn-warning forApprove');

for (var i = 0; i < buttons.length; i++) {
    (function (index) {
        buttons[index].addEventListener('click', function () {
            var rowNumber = index + 1;
            this.remove();
            var button = document.createElement('button');
            button.innerText = 'تایید شد';
            button.classList.add('btn', 'btn-block', 'btn-success');
            var container = document.getElementById('buttonTD' + rowNumber);
            container.classList.add('text-center');
            container.appendChild(button);

            var groupSelect1=document.getElementById('groupSelect1_'+rowNumber);
            var labelG1 = document.createElement('label');
            labelG1.innerText=groupSelect1.options[groupSelect1.selectedIndex].text;
            var group1TD = document.getElementById('group1TD_' + rowNumber);
            group1TD.appendChild(labelG1);

            var groupSelect2=document.getElementById('groupSelect2_'+rowNumber);
            var labelG2 = document.createElement('label');
            labelG2.innerText=groupSelect2.options[groupSelect2.selectedIndex].text;
            var group2TD = document.getElementById('group2TD_' + rowNumber);
            if (groupSelect2.value!==null && groupSelect2.value!=='' && groupSelect2.value!=='انتخاب کنید') {
                group2TD.appendChild(labelG2);
            }

            groupSelect1.remove();
            groupSelect2.remove();

            var articleID = this.value;
            $.ajax({
                url: "build/php/inc/Sorting.php",
                type: "POST",
                data: {
                    work:"approveSort",
                    articleID: articleID
                },
                success: function (response) {
                    console.log(response);
                    if (response==='err'){
                        alert('خطا در تایید.');
                    }
                }
            });
        });
    })(i);
}

// for (var i = 0; i < buttons.length; i++) {
//     buttons[i].addEventListener('click', function() {
//         var rowNumber = i + 1;
//         alert('شماره ردیف: ' + rowNumber);
//         var value = this.value;
//         // if (confirm('در صورت تایید، این مقاله به فهرست صورتجلسه اضافه خواهند شد. آیا مطمئن هستید؟')){
//         //     this.style.display="none";
//         // var button = document.createElement('button');
//         // button.innerText = 'متن دکمه';
//         // button.classList.add('btn', 'btn-block', 'btn-success');
//         // var container = document.getElementById('td'+this.id);
//         // container.appendChild(button);
//             // $.ajax({
//             //     url: "build/php/inc/Sorting.php",
//             //     type: "POST",
//             //     data: {
//             //         work:"approveSort",
//             //         articleID: value
//             //     },
//             //     success: function (response) {
//             //         console.log(response);
//             //         this.id.hidden=true;
//             //         if (response==='err'){
//             //             alert('خطا در تایید.');
//             //         }
//             //     }
//             // });
//         // }
//     });
// }