const table = document.getElementById('report_from_rates');
const rows = Array.from(table.tBodies[0].getElementsByTagName('tr'));

const getColumnIndex = (headerRow, columnName) => {
    const headers = Array.from(headerRow.getElementsByTagName('th'));
    return headers.findIndex(header => header.textContent.trim() === columnName);
};

const compareText = (a, b, columnIndex) => {
    const textA = a.cells[columnIndex].textContent.trim();
    const textB = b.cells[columnIndex].textContent.trim();
    return textA.localeCompare(textB);
};

const sortTable = (columnName) => {
    const columnIndex = getColumnIndex(table.querySelector('thead tr'), columnName);
    rows.sort((a, b) => compareText(a, b, columnIndex));
    rows.forEach((row, index) => {
        table.tBodies[0].appendChild(row);
        row.cells[0].textContent = index + 1; // Update row number
    });
};

table.querySelector('thead tr').addEventListener('click', (event) => {
    if (event.target.tagName === 'TH') {
        sortTable(event.target.textContent);
    }
});


// ------------------------------------------------------------------------------------------------
// Report from points scripts
$(document).ready(function () {
    function convertToPersianNumber(number) {
        const persianDigits = [
            '۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'
        ];

        return String(number).replace(/\d/g, function (match) {
            return persianDigits[parseInt(match)];
        });
    }

    $('.ejmaliModal').click(function () {
        $('#ejmaliModal').modal('toggle');
    });

    $('.getEjmaliPoint').click(function () {
        $.ajax({
            url: "build/ajax/GetRateInfo.php",
            type: "GET",
            data: {
                id: $(this).data('post-id'),
                level: $(this).data('rate-level'),
                form: $(this).data('rate-type')
            },
            success: function (response) {
                $("#r1Ejmali").text(convertToPersianNumber(response.r1));
                $("#r2Ejmali").text(convertToPersianNumber(response.r2));
                $("#r3Ejmali").text(convertToPersianNumber(response.r3));
                $("#r4Ejmali").text(convertToPersianNumber(response.r4));
                $("#sumEjmali").text(convertToPersianNumber(response.sum));
                $("#title").text(response.title);
                $("#rater").text('ارزیابی شده توسط استاد ' + response.rater);
                $("#rateSubject").text(response.rateSubject);
            }
        })
    });

    $('.getTafsiliPoint').click(function () {
        $.ajax({
            url: "build/ajax/GetRateInfo.php",
            type: "GET",
            data: {
                id: $(this).data('post-id'),
                level: $(this).data('rate-level'),
                form: $(this).data('rate-type')
            },
            success: function (response) {
                $("#r1Tafsili").text(response.r1);
                $("#r2Tafsili").text(response.r2);
                $("#r3Tafsili").text(response.r3);
                $("#r4Tafsili").text(response.r4);
                $("#r5Tafsili").text(response.r5);
                $("#r6Tafsili").text(response.r6);
                $("#r7Tafsili").text(response.r7);
                $("#r8Tafsili").text(response.r8);
                $("#r9Tafsili").text(response.r9_1);
                $("#r10Tafsili").text(response.r9_2);
                if (response.r1_comment != '' && response.r1_comment != null) {
                    $("#description_1Tafsili").text(response.r1_comment);
                } else {
                    $("#description_1Tafsili").text('ندارد');
                }
                if (response.r2_comment != '' && response.r2_comment != null) {
                    $("#description_2Tafsili").text(response.r2_comment);
                } else {
                    $("#description_2Tafsili").text('ندارد');
                }
                if (response.r3_comment != '' && response.r3_comment != null) {
                    $("#description_3Tafsili").text(response.r3_comment);
                } else {
                    $("#description_3Tafsili").text('ندارد');
                }
                if (response.r4_comment != '' && response.r4_comment != null) {
                    $("#description_4Tafsili").text(response.r4_comment);
                } else {
                    $("#description_4Tafsili").text('ندارد');
                }
                if (response.r5_comment != '' && response.r5_comment != null) {
                    $("#description_5Tafsili").text(response.r5_comment);
                } else {
                    $("#description_5Tafsili").text('ندارد');
                }
                if (response.r6_comment != '' && response.r6_comment != null) {
                    $("#description_6Tafsili").text(response.r6_comment);
                } else {
                    $("#description_6Tafsili").text('ندارد');
                }
                if (response.r7_comment != '' && response.r7_comment != null) {
                    $("#description_7Tafsili").text(response.r7_comment);
                } else {
                    $("#description_7Tafsili").text('ندارد');
                }
                if (response.r8_comment != '' && response.r8_comment != null) {
                    $("#description_8Tafsili").text(response.r8_comment);
                } else {
                    $("#description_8Tafsili").text('ندارد');
                }
                if (response.r9_1_comment != '' && response.r9_1_comment != null) {
                    $("#description_9Tafsili").text(response.r9_1_comment);
                } else {
                    $("#description_9Tafsili").text('ندارد');
                }
                if (response.r9_2_comment != '' && response.r9_2_comment != null) {
                    $("#description_10Tafsili").text(response.r9_2_comment);
                } else {
                    $("#description_10Tafsili").text('ندارد');
                }
                $("#general_commentTafsili").text(response.general_comment);
                $("#sumTafsili").text(response.sum);
                $("#titleTafsili").text(response.title);
                $("#raterTafsili").text('ارزیابی شده توسط استاد ' + response.rater);
                $("#rateSubjectTafsili").text(response.rateSubject);
            }
        })
    });
});
