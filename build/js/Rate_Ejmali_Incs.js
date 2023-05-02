function sum() {
    var r1 = parseFloat(document.getElementById('r1').value);
    var r2 = parseFloat(document.getElementById('r2').value);
    var r3 = parseFloat(document.getElementById('r3').value);
    var r4 = parseFloat(document.getElementById('r4').value);
    if (isNaN(r1)) {
        r1 = 0;
    }
    if (isNaN(r2)) {
        r2 = 0;
    }
    if (isNaN(r3)) {
        r3 = 0;
    }
    if (isNaN(r4)) {
        r4 = 0;
    }
    sumr = r1 + r2 + r3 + r4;
    document.getElementById('sum').innerText = sumr;
}

function CheckEjmaliForm() {
    var r1 = document.getElementById('r1').value;
    var r2 = document.getElementById('r2').value;
    var r3 = document.getElementById('r3').value;
    var r4 = document.getElementById('r4').value;
    if (r1 < 0 || r1 > 4) {
        alert('مقدار ردیف 1 نامعتبر است.');
        return false;
    } else if (r2 < 0 || r2 > 4) {
        alert('مقدار ردیف 2 نامعتبر است.');
        return false;
    } else if (r3 < 0 || r3 > 4) {
        alert('مقدار ردیف 3 نامعتبر است.');
        return false;
    } else if (r4 < 0 || r4 > 4) {
        alert('مقدار ردیف 4 نامعتبر است.');
        return false;
    } else {
        return true;
    }
}