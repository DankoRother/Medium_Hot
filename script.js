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
    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Configure it to make a GET request to newContent.php
    xhr.open("GET", "newContent.php", true);

    // Define the function to handle the response
    xhr.onload = function () {
        if (xhr.status == 200) {
            // Update the content of the 'registrationForm' div with the response
            document.getElementById("registrationForm").innerHTML = xhr.responseText;
            
            // Reattach the event listeners after updating the content
            document.getElementById("username").addEventListener("input", updateValidationStatus);
            document.getElementById("email").addEventListener("input", updateValidationStatus);
            document.getElementById("passwort").addEventListener("input", updateValidationStatus);
        }
    }

    // Send the request
    xhr.send();
}
  // Function to check and update validation status
 // Function to check and update validation status
function updateValidationStatus() {
    var condition1 = false;
    var condition2 = false;
    var condition3 = false;
    // Get form input values
    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("passwort").value;
    var button = document.getElementById("weiterButton")

    // Get error div elements
    var error1 = document.getElementById("error1");
    var error2 = document.getElementById("error2");
    var error3 = document.getElementById("error3");
    var usernameElement = document.getElementById("username");
    var emailElement = document.getElementById("email");
    var passwordElement = document.getElementById("passwort");
    var vornameElement = document.getElementById("vorname");

    // Validate username
    if (username === "") {
        error1.style.color = "#ff974d";
        condition1 = false;
        usernameElement.style.borderColor = "#ff974d";
    } else {
        error1.style.color = "#0088a9";
        usernameElement.style.borderColor = "#0088a9";
        condition1 = true;
    }

    // Validate email
    if (!/^.+@.+\..{2,3}$/.test(email)) {
        error2.style.color = "#ff974d";
        emailElement.style.borderColor = "#ff974d";
        condition2 = false;
    } else {
        error2.style.color = "#0088a9";
        emailElement.style.borderColor = "#0088a9";
        condition2 = true;
    }

    // Validate password
    if (password.length < 8) {
        error3.style.color = "#ff974d";
        passwordElement.style.borderColor = "#ff974d";
        condition3 = false;
    } else {
        error3.style.color = "#0088a9";
        passwordElement.style.borderColor = "#0088a9";
        condition3 = true;
    }
    if(condition1 == true && condition2 == true && condition3 == true) {
        button.removeAttribute("disabled", "true");
    }
    else {
        button.setAttribute("disabled", "true");
    }
}

// Add event listeners for input event
document.getElementById("username").addEventListener("input", updateValidationStatus);
document.getElementById("email").addEventListener("input", updateValidationStatus);
document.getElementById("passwort").addEventListener("input", updateValidationStatus);

