function show_hide() {
    var x = document.getElementById("filter2");
    var chevronIcon = document.getElementById("chevron");

    if (x && chevronIcon) {
        if (x.style.display === "none") {
            x.style.display = "block";
            chevronIcon.classList.remove('fa-chevron-down');
            chevronIcon.classList.add('fa-chevron-up');
        } else {
            x.style.display = "none";
            chevronIcon.classList.remove('fa-chevron-up');
            chevronIcon.classList.add('fa-chevron-down');
        }

        localStorage.setItem('filterBarStatus', x.style.display);
    }
}

window.onload = function () {
    var x = document.getElementById('filter2');
    var storedStatus = localStorage.getItem('filterBarStatus');

    if (storedStatus) {
        x.style.display = storedStatus;
    }
}

function validatePrice(input) {
    if (input.value < 0) {
        input.setCustomValidity('Der eingegebe Preis darf nicht kleiner Null sein.');
    } else {
        input.setCustomValidity('');
    }
}


function showHideRow(rowId) {
    var hiddenRow = document.getElementById(rowId);
    if (hiddenRow.style.display === 'none') {
        hiddenRow.style.display = 'table-row';
    } else {
        hiddenRow.style.display = 'none';
    }
}