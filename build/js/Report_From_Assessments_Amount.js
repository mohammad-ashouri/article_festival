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
    document.getElementById("get-report").onsubmit = function () {
        if (rate_type.value == '') {
            alert('نوع ارزیابی را انتخاب کنید!');
            return false;
        } else if (festival_id.value == '') {
            alert('دوره را انتخاب کنید!');
            return false;
        } else {
            return true;
        }
    }
});
