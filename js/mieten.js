// Function to show or hide the filter section
function show_hide() {
    // Get the filter section and chevron icon by their respective IDs
    var x = document.getElementById("filter2");
    var chevronIcon = document.getElementById("chevron");

    // Check if the elements exist
    if (x && chevronIcon) {
        // Toggle the display property of the filter section
        if (x.style.display === "none") {
            x.style.display = "block";
            // Change chevron icon to "up" when the filter section is displayed
            chevronIcon.classList.remove('fa-chevron-down');
            chevronIcon.classList.add('fa-chevron-up');
        } else {
            x.style.display = "none";
            // Change chevron icon to "down" when the filter section is hidden
            chevronIcon.classList.remove('fa-chevron-up');
            chevronIcon.classList.add('fa-chevron-down');
        }

        // Save the display status to localStorage
        localStorage.setItem('filterBarStatus', x.style.display);
    }
}

// Function to set the initial display status of the filter section based on localStorage
window.onload = function () {
    var x = document.getElementById('filter2');
    var storedStatus = localStorage.getItem('filterBarStatus');

    // If a status is stored, set the display property accordingly
    if (storedStatus) {
        x.style.display = storedStatus;
    }
}

// Function to validate the input value for price
function validatePrice(input) {
    // Check if the price is less than 0 and set custom validity message accordingly
    if (input.value < 0) {
        input.setCustomValidity('Der eingegebene Preis darf nicht kleiner Null sein.');
    } else {
        input.setCustomValidity('');
    }
}

// Function to show or hide a table row by its ID
function showHideRow(rowId) {
    var hiddenRow = document.getElementById(rowId);
    // Toggle the display property of the table row
    if (hiddenRow.style.display === 'none') {
        hiddenRow.style.display = 'table-row';
    } else {
        hiddenRow.style.display = 'none';
    }
}
