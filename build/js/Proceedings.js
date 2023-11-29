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

document.getElementById("pro1").onchange = function () {
    forPro1.textContent = this.value;
    pro1DIV.style.display = "none";
}
document.getElementById("pro2").onchange = function () {
    forPro2.textContent = this.value;
    pro2DIV.style.display = "none";
}
document.getElementById("pro3").onchange = function () {
    forPro3.textContent = this.value;
    pro3DIV.style.display = "none";
}
document.getElementById("pro4").onchange = function () {
    forPro4.textContent = this.value;
    pro4DIV.style.display = "none";
}