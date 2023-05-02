document.getElementById("Proceedings_Search").onsubmit = function Search_Validate() {
    var festival_id = document.getElementById("festival_id");
    var scientific_group = document.getElementById("scientific_group");
    if (festival_id.value == 'انتخاب کنید') {
        alert ('دوره را انتخاب کنید!');
        return false;
    }else if (scientific_group.value == 'انتخاب کنید') {
        alert ('گروه علمی را انتخاب کنید!');
        return false;
    }else{
        return true;
    }
}