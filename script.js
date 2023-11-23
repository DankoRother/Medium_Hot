function submitForm(event) {
    // Prevent the default form submission
    event.preventDefault();

    // Get form data
    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var passwort = document.getElementById("passwort").value;

    // Create FormData object and append form data
    var formData = new FormData();
    formData.append("username", username);
    formData.append("email", email);
    formData.append("passwort", passwort);

    // Create an XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Open a POST request to newContent.php
    xhr.open("POST", "newContent.php", true);

    // Set up the onload function
    xhr.onload = function () {
        if (xhr.status == 200) {
            // ContentContainer replace or update logic goes here
            document.getElementById("contentContainer").innerHTML = xhr.responseText;
        }
    };

    // Send the form data
    xhr.send(formData);
}