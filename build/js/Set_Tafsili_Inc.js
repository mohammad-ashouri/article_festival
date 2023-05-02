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