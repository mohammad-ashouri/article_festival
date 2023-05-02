function sum() {
    var r1 = parseFloat(document.getElementById('r1').value);
    var r2 = parseFloat(document.getElementById('r2').value);
    var r3 = parseFloat(document.getElementById('r3').value);
    var r4 = parseFloat(document.getElementById('r4').value);
    var r5 = parseFloat(document.getElementById('r5').value);
    var r6 = parseFloat(document.getElementById('r6').value);
    var r7 = parseFloat(document.getElementById('r7').value);
    var r8 = parseFloat(document.getElementById('r8').value);
    var r9 = parseFloat(document.getElementById('r9').value);
    var r10 = parseFloat(document.getElementById('r10').value);
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
    if (isNaN(r5)) {
        r5 = 0;
    }
    if (isNaN(r6)) {
        r6 = 0;
    }
    if (isNaN(r7)) {
        r7 = 0;
    }
    if (isNaN(r8)) {
        r8 = 0;
    }
    if (isNaN(r9)) {
        r9 = 0;
    }
    if (isNaN(r10)) {
        r10 = 0;
    }
    var sum = r1 + r2 + r3 + r4 + r5 + r6 + r7 + r8 + r9 + r10;
    document.getElementById('sum').innerText = sum;
}

function CheckTafsiliForm(r1_from, r1_to, r2_from, r2_to, r3_from, r3_to, r4_from, r4_to, r5_from, r5_to, r6_from, r6_to, r7_from, r7_to, r8_from, r8_to, r9_from, r9_to, r10_from, r10_to) {
    var r1 = document.getElementById('r1').value;
    var r2 = document.getElementById('r2').value;
    var r3 = document.getElementById('r3').value;
    var r4 = document.getElementById('r4').value;
    var r5 = document.getElementById('r5').value;
    var r6 = document.getElementById('r6').value;
    var r7 = document.getElementById('r7').value;
    var r8 = document.getElementById('r8').value;
    var r9 = document.getElementById('r9').value;
    var r10 = document.getElementById('r10').value;
    var general_comment = document.getElementById('general_comment').value;
    if (r1 < r1_from || r1 > r1_to) {
        alert('مقدار ردیف 1 نامعتبر است.');
        return false;
    } else if (r2 < r2_from || r2 > r2_to) {
        alert('مقدار ردیف 2 نامعتبر است.');
        return false;
    } else if (r3 < r3_from || r3 > r3_to) {
        alert('مقدار ردیف 3 نامعتبر است.');
        return false;
    } else if (r4 < r4_from || r4 > r4_to) {
        alert('مقدار ردیف 4 نامعتبر است.');
        return false;
    } else if (r5 < r5_from || r5 > r5_to) {
        alert('مقدار ردیف 5 نامعتبر است.');
        return false;
    } else if (r6 < r6_from || r6 > r6_to) {
        alert('مقدار ردیف 6 نامعتبر است.');
        return false;
    } else if (r7 < r7_from || r7 > r7_to) {
        alert('مقدار ردیف 7 نامعتبر است.');
        return false;
    } else if (r8 < r8_from || r8 > r8_to) {
        alert('مقدار ردیف 8 نامعتبر است.');
        return false;
    } else if (r9 < r9_from || r9 > r9_to) {
        alert('مقدار ردیف 9 نامعتبر است.');
        return false;
    } else if (r10 < r10_from || r10 > r10_to) {
        alert('مقدار ردیف 10 نامعتبر است.');
        return false;
    } else if (isNaN(r1)) {
        alert('مقدار ردیف 1 نامعتبر است.');
        return false;
    } else if (isNaN(r2)) {
        alert('مقدار ردیف 2 نامعتبر است.');
        return false;
    } else if (isNaN(r3)) {
        alert('مقدار ردیف 3 نامعتبر است.');
        return false;
    } else if (isNaN(r4)) {
        alert('مقدار ردیف 4 نامعتبر است.');
        return false;
    } else if (isNaN(r5)) {
        alert('مقدار ردیف 5 نامعتبر است.');
        return false;
    } else if (isNaN(r6)) {
        alert('مقدار ردیف 6 نامعتبر است.');
        return false;
    } else if (isNaN(r7)) {
        alert('مقدار ردیف 7 نامعتبر است.');
        return false;
    } else if (isNaN(r8)) {
        alert('مقدار ردیف 8 نامعتبر است.');
        return false;
    } else if (isNaN(r9)) {
        alert('مقدار ردیف 9 نامعتبر است.');
        return false;
    } else if (isNaN(r10)) {
        alert('مقدار ردیف 10 نامعتبر است.');
        return false;
    } else if (general_comment == '') {
        alert('اظهار نظر کلی وارد نشده است.');
        return false;
    } else {
        return confirm ("آیا از صحت اطلاعات وارد شده مطمئن هستید؟");
    }
}