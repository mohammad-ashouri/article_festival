function countWords(article_body, ShowID) {
    var count = 0;
    var split = article_body.split(' ');
    for (var i = 0; i < split.length; i++) {
        if (split[i] != "") {
            count++;
        }
    }
    document.getElementById("show_" + ShowID).innerHTML = count + '/250';
    if (count >= 251) {
        alert("چکیده بیشتر از 250 کلمه می باشد");
        document.getElementById('article_body_'+ShowID).value = "";
        document.getElementById("show_" + ShowID).innerHTML = '0/250';

    }
    function eraseText(ShowID) {

    }
}

