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
                $("#r1Ejmali").val(response.r1);
                $("#r2Ejmali").val(response.r2);
                $("#r3Ejmali").val(response.r3);
                $("#r4Ejmali").val(response.r4);
                $("#sumEjmali").text(response.sum);
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
                $("#r1Tafsili").val(response.r1);
                $("#r2Tafsili").val(response.r2);
                $("#r3Tafsili").val(response.r3);
                $("#r4Tafsili").val(response.r4);
                $("#r5Tafsili").val(response.r5);
                $("#r6Tafsili").val(response.r6);
                $("#r7Tafsili").val(response.r7);
                $("#r8Tafsili").val(response.r8);
                $("#r9Tafsili").val(response.r9_1);
                $("#r10Tafsili").val(response.r9_2);
                $("#description_1Tafsili").val(response.r1_comment);
                $("#description_2Tafsili").val(response.r2_comment);
                $("#description_3Tafsili").val(response.r3_comment);
                $("#description_4Tafsili").val(response.r4_comment);
                $("#description_5Tafsili").val(response.r5_comment);
                $("#description_6Tafsili").val(response.r6_comment);
                $("#description_7Tafsili").val(response.r7_comment);
                $("#description_8Tafsili").val(response.r8_comment);
                $("#description_9Tafsili").val(response.r9_1_comment);
                $("#description_10Tafsili").val(response.r9_2_comment);
                $("#general_commentTafsili").val(response.general_comment);
                $("#sumTafsili").text(response.sum);
                $("#titleTafsili").text(response.title);
                $("#raterTafsili").text('ارزیابی شده توسط استاد ' + response.rater);
                $("#rateSubjectTafsili").text(response.rateSubject);
            }
        })
    });
});
