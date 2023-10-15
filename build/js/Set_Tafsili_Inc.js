function searchTable() {
    var input1, input2, filter1, filter2, table, tr, td1, td2, i;
    input1 = document.getElementById("searchInput1");
    input2 = document.getElementById("searchInput2");
    filter1 = input1.value.toUpperCase();
    filter2 = input2.value.toUpperCase();
    table = document.querySelector("table");
    tr = table.querySelectorAll("tbody tr");

    for (i = 0; i < tr.length; i++) {
        td1 = tr[i].getElementsByTagName("td")[3];
        td2 = tr[i].getElementsByTagName("td")[4];
        if (td1 && td2) {
            var showRow = true;

            if (filter1 !== "" && td1.textContent.toUpperCase().indexOf(filter1) === -1) {
                showRow = false;
            }

            if (filter2 !== "" && td2.textContent.toUpperCase().indexOf(filter2) === -1) {
                showRow = false;
            }

            if (filter1 === "" && filter2 === "") {
                showRow = true;
            }

            if (showRow) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

function SetTafsiliRater1(coderater, codeasar) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

        }
    }
    xmlhttp.open("GET", "build/ajax/Set_Tafsili/Rater1.php?coderater=" + coderater + "&codeasar=" + codeasar, true);
    xmlhttp.send();
    codeasar = null;
    coderater = null;
}

function SetTafsiliRater2(coderater, codeasar) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

        }
    }
    xmlhttp.open("GET", "build/ajax/Set_Tafsili/Rater2.php?coderater=" + coderater + "&codeasar=" + codeasar, true);
    xmlhttp.send();
    codeasar = null;
    coderater = null;
}

function SetTafsiliRater3(coderater, codeasar) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

        }
    }
    xmlhttp.open("GET", "build/ajax/Set_Tafsili/Rater3.php?coderater=" + coderater + "&codeasar=" + codeasar, true);
    xmlhttp.send();
    codeasar = null;
    coderater = null;
}