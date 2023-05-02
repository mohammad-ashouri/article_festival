function displayrow(SelectionValue, trID) {
    var valuegroup = 'گروهی';
    if (SelectionValue == valuegroup) {
        document.getElementById("display_row_" + trID).style = '';
    } else {
        document.getElementById("display_row_" + trID).style.display = 'none';
    }
}