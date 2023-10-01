document.getElementById('search').oninput= function () {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("search");
    filter = input.value.toUpperCase();
    table = document.getElementById("usersTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[2];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
};


function getInfo(id) {
    $.ajax({
        url: "build/ajax/GetUserInfo.php",
        type: "GET",
        data: {
            id: id,
        },
        success: function (response) {
            //User Info
            $("#editedID").val(response.id);
            $("#editedName").val(response.name);
            $("#editedFamily").val(response.family);
            $("#editedNationalCode").text(response.national_code);
        }
    })
}
