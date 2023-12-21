// Event listeners for input validation
document.getElementById("username").addEventListener("input", validateUsername);
document.getElementById("email").addEventListener("input", validateEmail);
document.getElementById("passwort").addEventListener("input", validatePassword);
document.getElementById("vorname").addEventListener("input", validateVorname);
document.getElementById("nachname").addEventListener("input", validateNachname);
document.getElementById("geburtsdatum").addEventListener("keyup", validateGeburtsdatum);

// Variables to store input conditions and values
var firstButtonId = document.getElementById("weiterButton");
var secondButtonId = document.getElementById("submitButton");
var condition1;
var condition2;
var condition3;
var vornameCondition;
var nachnameCondition;
var geburtstagCondition;
var usernameInput;
var emailInput;
var passwordInput;
var vornameInput;
var nachnameInput;
var geburtsdatumInput;
var inputElement = "";

// Function to change the value of an input element
function changeInputValue(inputId, newValue) {
    var inputElement = document.getElementById(inputId);

    if (inputElement) {
        inputElement.value = newValue;
    } else {
        console.error('Input element with ID ' + inputId + ' not found.');
    }
}

// Function to switch from the first step to the second step of the registration form
function hideFirstShowSecond() {
    var geburtsdatumElement = document.getElementById("geburtsdatum");
    document.getElementById("weiterButton").style.display = 'none';
    secondButtonId.style.display = 'block';
    geburtsdatumElement.style.display = 'block';
    document.getElementById("firstErrors").style.display = 'none';
    document.getElementById("secondErrors").style.display = 'block';
    document.getElementById("backButton").style.display = 'block';

    // Hide "Username, E-Mail, and Passwort" labels, inputs, and error handlers
    document.querySelectorAll('.label[for^="username"], .input[name="username"], .label[for^="email"], .input[name="email"], .label[for^="passwort"], .input[name="passwort"], .errorHandlingMajor#firstErrors .button[name="weiterButton"]').forEach(function (element){
        element.style.display = 'none';
    });

    // Unhide "Vorname, Nachname, and Geburtsdatum" labels, inputs, and error handlers
    document.querySelectorAll('.label[for^="vorname"], .input[name="vorname"], .label[for^="nachname"], .input[name="nachname"], .label[for^="geburtsdatum"], .input.date[name="geburtsdatum"], .errorHandlingMajor#secondErrors .button[name="submitButton"]').forEach(function (element) {
        element.style.display = 'block';
    });
}

// Function to switch from the second step back to the first step of the registration form
function hideSecondShowFirst() {
    var geburtsdatumElement = document.getElementById("geburtsdatum");
    document.getElementById("weiterButton").style.display = 'block';
    secondButtonId.style.display = 'none';
    geburtsdatumElement.style.display = 'none';
    document.getElementById("firstErrors").style.display = 'block';
    document.getElementById("secondErrors").style.display = 'none';
    document.getElementById("backButton").style.display = 'none';

    // Hide "Username, E-Mail, and Passwort" labels, inputs, and error handlers
    document.querySelectorAll('.label[for^="username"], .input[name="username"], .label[for^="email"], .input[name="email"], .label[for^="passwort"], .input[name="passwort"], .errorHandlingMajor#firstErrors .button[name="weiterButton"]').forEach(function (element){
        element.style.display = 'block';
    });

    // Unhide "Vorname, Nachname, and Geburtsdatum" labels, inputs, and error handlers
    document.querySelectorAll('.label[for^="vorname"], .input[name="vorname"], .label[for^="nachname"], .input[name="nachname"], .label[for^="geburtsdatum"], .input.date[name="geburtsdatum"], .errorHandlingMajor#secondErrors .button[name="submitButton"]').forEach(function (element) {
        element.style.display = 'none';
    });
}

// Function to load the value of an input element
function loadInput(inputElement) {
    var element = document.getElementById(inputElement);
    if (element) {
        return element.value;
    } else {
        console.error("Element with ID '" + inputElement + "' not found.");
        return null;
    }
}
// Function to validate the username input
function validateUsername() {
    var username = document.getElementById("username").value;
    var errorElement = document.getElementById("error1");
    var usernameElement = document.getElementById("username");

    // Additional validation for maximum length
    if (username.length > 32) {
        errorElement.textContent = "Username darf maximal 32 Zeichen haben";
        errorElement.style.color = "#ff974d";
        usernameElement.style.borderColor = "#ff974d";
        condition1 = false;
    } else if (document.getElementById("error2").style.marginTop !== "12%") {
        document.getElementById("error2").style.marginTop = "15%";
    } else if (username === "") {
        errorElement.textContent = "Username darf nicht leer sein";
        errorElement.style.color = "#ff974d";
        usernameElement.style.borderColor = "#ff974d";
        condition1 = false;
    } else {
        errorElement.style.color = "#0088a9";
        usernameElement.style.borderColor = "#0088a9";
        condition1 = true;
    }
    enablebutton();
}

// Function to validate the email input
function validateEmail() {
    var email = document.getElementById("email").value;
    var errorElement = document.getElementById("error2");
    var emailElement = document.getElementById("email");

    // Additional validation for maximum length
    if (email.length > 32) {
        errorElement.textContent = "Email darf maximal 32 Zeichen haben";
        errorElement.style.color = "#ff974d";
        emailElement.style.borderColor = "#ff974d";
        condition2 = false;
    } else {
        document.getElementById("error2").style.marginTop = "12%";
        document.getElementById("error3").style.marginTop = "8%";
        document.getElementById("error2").textContent = "Geben Sie eine gültige E-Mail ein";

        if (!/^.+@.+\..{2,3}$/.test(email)) {
            errorElement.style.color = "#ff974d";
            emailElement.style.borderColor = "#ff974d";
            condition2 = false;
        } else {
            errorElement.style.color = "#0088a9";
            emailElement.style.borderColor = "#0088a9";
            condition2 = true;
        }
    }
    enablebutton();
}

// Function to validate the Vorname input
function validateVorname() {
    var vorname = document.getElementById("vorname").value;
    var errorElement = document.getElementById("vornameError");
    var vornameElement = document.getElementById("vorname");

    // Additional validation for maximum length
    if (vorname.length > 32) {
        errorElement.textContent = "Vorname darf maximal 32 Zeichen haben";
        errorElement.style.color = "#ff974d";
        vornameElement.style.borderColor = "#ff974d";
        vornameCondition = false;
    } else if (vorname === "") {
        errorElement.textContent = "Vorname darf nicht leer sein";
        errorElement.style.color = "#ff974d";
        vornameElement.style.borderColor = "#ff974d";
        vornameCondition = false;
    } else {
        errorElement.style.color = "#0088a9";
        vornameElement.style.borderColor = "#0088a9";
        vornameCondition = true;
    }
    enablesecondbutton();
}

// Function to validate the Nachname input
function validateNachname() {
    var nachname = document.getElementById("nachname").value;
    var errorElement = document.getElementById("nachnameError");
    var nachnameElement = document.getElementById("nachname");

    // Additional validation for maximum length
    if (nachname.length > 32) {
        errorElement.textContent = "Nachname darf maximal 32 Zeichen haben";
        errorElement.style.color = "#ff974d";
        nachnameElement.style.borderColor = "#ff974d";
        nachnameCondition = false;
    } else if (nachname === "") {
        errorElement.textContent = "Nachname darf nicht leer sein";
        errorElement.style.color = "#ff974d";
        nachnameElement.style.borderColor = "#ff974d";
        nachnameCondition = false;
    } else {
        errorElement.style.color = "#0088a9";
        nachnameElement.style.borderColor = "#0088a9";
        nachnameCondition = true;
    }
    enablesecondbutton();
}

// Function to validate the Geburtsdatum input
function validateGeburtsdatum() {
    var geburtsdatum = document.getElementById("geburtsdatum").value;
    var errorElement = document.getElementById("geburtstagError");
    var geburtsdatumElement = document.getElementById("geburtsdatum");

    // Add your validation logic for geburtsdatum as needed
    // For example, checking if it's a valid date
    var minDate = new Date('1900-01-01');
    var maxDate = new Date('2024-12-31');

    if (/^(19\d{2}|20[0-1][0-9]|202[0-4])-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/.test(geburtsdatum)) {
        errorElement.style.color = "#0088a9";
        geburtsdatumElement.style.borderColor = "#0088a9";
        geburtstagCondition = true;
    } else {
        errorElement.style.color = "#ff974d";
        geburtstagCondition = false;
        geburtsdatumElement.style.borderColor = "#ff974d";
    }

    enablesecondbutton();
}

// Function to enable or disable the second button based on input conditions
function enablesecondbutton() {
    if (vornameCondition && nachnameCondition && geburtstagCondition) {
        secondButtonId.disabled = false;
    } else {
        secondButtonId.disabled = true;
    }
}

// Function to submit the form data via AJAX
function submitForm(event) {
    event.preventDefault(); // Prevent the default form submission

    $.ajax({
        url: 'php_funktionen/registerfunction.php', // Corrected URL
        method: 'POST',
        data: $('#registrationForm').serialize(),
        dataType: 'json', // Specify that the expected response is JSON
        success: function(response) {
            if (response && response.status === 'success') {
                console.log('Data inserted successfully');
                document.getElementById("vornameError").style.color = "rgb(0, 0, 0, 0)";
                document.getElementById("geburtstagError").style.color = "rgb(0, 0, 0, 0)";
                document.getElementById("nachnameError").style.color = "#0088a9";
                document.getElementById("nachnameError").style.textAlign = "center";
                document.getElementById("nachnameError").textContent = "Erfolgreich Registriert!...";
                setTimeout(function() {
                    window.location.href = 'home.php'; // Redirect on success
                }, 1200);

            } else {
                console.error('AJAX error: Unexpected response', response);
                // Check for specific error messages and redirect accordingly
                if (response && response.message == 'email_exists') {
                    hideSecondShowFirst();
                    document.getElementById("error2").textContent = "E-Mail existiert bereits <br>";
                    document.getElementById("error2").style.color = "#ff974d";
                    document.getElementById("error3").style.marginTop = "13%";
                    document.getElementById("email").style.borderColor = "#ff974d";
                } else if (response && response.message == 'username_exists') {
                    hideSecondShowFirst();
                    document.getElementById("error1").textContent = "Username existiert bereits";
                    document.getElementById("error1").style.color = "#ff974d";
                    document.getElementById("username").style.borderColor = "#ff974d";
                    document.getElementById("error2").style.marginTop = "17%";
                } else if (response && response.message == 'both_exist') {
                    hideSecondShowFirst();
                    document.getElementById("error2").textContent = "E-Mail existiert bereits <br>";
                    document.getElementById("error2").style.color = "#ff974d";
                    document.getElementById("error2").style.marginTop = "17%";
                    document.getElementById("error3").style.marginTop = "13%";
                    document.getElementById("error1").textContent = "Username existiert bereits";
                    document.getElementById("error1").style.color = "#ff974d";
                    document.getElementById("username").style.borderColor = "#ff974d";
                    document.getElementById("error2").textContent = "E-Mail existiert bereits";
                    document.getElementById("error2").style.color = "#ff974d";
                    document.getElementById("email").style.borderColor = "#ff974d";

                } else {
                    console.error('Unknown error:', response);
                }
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX error:', status, error);
        }
    });
}
