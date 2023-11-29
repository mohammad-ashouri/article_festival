document.getElementById("Proceedings_Search").onsubmit = function Search_Validate() {
    var festival_id = document.getElementById("festival_id");
    var scientific_group = document.getElementById("scientific_group");
    if (festival_id.value == 'انتخاب کنید') {
        alert('دوره را انتخاب کنید!');
        return false;
    } else if (scientific_group.value == 'انتخاب کنید') {
        alert('گروه علمی را انتخاب کنید!');
        return false;
    } else {
        return true;
    }
}

document.getElementById("showingJury").onclick = function () {
    showingJury.style.display = "none";
    showingCommittee.style.display = "none";
    jury.style.display='flex';
}

document.getElementById("showingCommittee").onclick = function () {
    showingJury.style.display = "none";
    showingCommittee.style.display = "none";
    var elements = document.getElementsByClassName('committee');
    for (var i = 0; i < elements.length; i++) {
        elements[i].style.display='flex';
    }

}

for (let i = 1; i <= 4; i++) {
    document.getElementById(`pro${i}`).onchange = function () {
        document.getElementById(`forPro${i}`).textContent = this.value;
        document.getElementById(`pro${i}DIV`).style.display = "none";
    }
}

for (let i = 1; i <= 8; i++) {
    document.getElementById(`com${i}`).onchange = function () {
        document.getElementById(`forPro${i}`).textContent = this.value;
        document.getElementById(`com${i}DIV`).style.display = "none";
    };
}
