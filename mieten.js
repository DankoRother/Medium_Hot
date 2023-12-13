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
function handleBooking() {
    console.log("Function is called");  // Check if this is printed in the console

    var errorMessage = "<?php echo isset($errorMessage) ? $errorMessage : ''; ?>";
    console.log("Error message: " + errorMessage);  // Check the error message

    // Überprüfe, ob eine Fehlermeldung vorhanden ist
    if (errorMessage !== "") {
        // Zeige eine Alert-Box mit der Fehlermeldung an
        alert(errorMessage);
    } else {
        // Führe den Ajax-Request durch, um den INSERT-Befehl aufzurufen
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "PHP_Funktionen/insert_booking.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
        // Sende die Session-Variablen als Daten im POST-Request
        var data = "start_date=" + encodeURIComponent("<?php echo $start_date; ?>") +
                "&end_date=" + encodeURIComponent("<?php echo $end_date; ?>") +
                "&userID=" + encodeURIComponent("<?php echo $userID; ?>") +
                "&carLocationID=" + encodeURIComponent("<?php echo $carLocationID; ?>");

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Hier kannst du weitere Aktionen nach erfolgreichem INSERT durchführen
                alert(xhr.responseText);
            }
        };
        xhr.send(data);
    }
}
