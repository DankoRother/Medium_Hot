document.getElementById("username").addEventListener("input", validateUsername);
document.getElementById("email").addEventListener("input", validateEmail);
document.getElementById("passwort").addEventListener("input", validatePassword);
document.getElementById("vorname").addEventListener("input", validateVorname);
document.getElementById("nachname").addEventListener("input", validateNachname);
document.getElementById("geburtsdatum").addEventListener("keyup", validateGeburtsdatum);
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

function changeInputValue(inputId, newValue) {
    // Get the input element by ID
    var inputElement = document.getElementById(inputId);

    // Check if the input element exists
    if (inputElement) {
        // Set the value of the input element
        inputElement.value = newValue;
    } else {
        console.error('Input element with ID ' + inputId + ' not found.');
    }
}

function hideFirstShowSecond() {
    var geburtsdatumElement = document.getElementById("geburtsdatum");
    document.getElementById("weiterButton").style.display = 'none';
    secondButtonId.style.display = 'block';
    geburtsdatumElement.style.display = 'block';
    document.getElementById("firstErrors").style.display = 'none';
    document.getElementById("secondErrors").style.display = 'block';
    document.getElementById("backButton").style.display = 'block';
    //document.getElementById("backButtonText").style.display = 'block';
    // Hide "Username, E-Mail, and Passwort" labels, inputs, and errorhandlers
    document.querySelectorAll('.label[for^="username"], .input[name="username"], .label[for^="email"], .input[name="email"], .label[for^="passwort"], .input[name="passwort"], .errorHandlingMajor#firstErrors .button[name="weiterButton"]').forEach(function (element){
        element.style.display = 'none';
    });
    // Unhide "Vorname, Nachname, and Geburtsdatum" labels, inputs, and errorhandlers
    document.querySelectorAll('.label[for^="vorname"], .input[name="vorname"], .label[for^="nachname"], .input[name="nachname"], .label[for^="geburtsdatum"], .input.date[name="geburtsdatum"], .errorHandlingMajor#secondErrors .button[name="submitButton"]').forEach(function (element) {
        element.style.display = 'block';
    });
}

function hideSecondShowFirst() {
    var geburtsdatumElement = document.getElementById("geburtsdatum");
    document.getElementById("weiterButton").style.display = 'block';
    secondButtonId.style.display = 'none';  // Corrected this line
    geburtsdatumElement.style.display = 'none';
    document.getElementById("firstErrors").style.display = 'block';
    document.getElementById("secondErrors").style.display = 'none';
    document.getElementById("backButton").style.display = 'none';

    // Hide "Username, E-Mail, and Passwort" labels, inputs, and errorhandlers
    document.querySelectorAll('.label[for^="username"], .input[name="username"], .label[for^="email"], .input[name="email"], .label[for^="passwort"], .input[name="passwort"], .errorHandlingMajor#firstErrors .button[name="weiterButton"]').forEach(function (element){
        element.style.display = 'block';
    });

    // Unhide "Vorname, Nachname, and Geburtsdatum" labels, inputs, and errorhandlers
    document.querySelectorAll('.label[for^="vorname"], .input[name="vorname"], .label[for^="nachname"], .input[name="nachname"], .label[for^="geburtsdatum"], .input.date[name="geburtsdatum"], .errorHandlingMajor#secondErrors .button[name="submitButton"]').forEach(function (element) {
        element.style.display = 'none';
    });
}

function loadInput(inputElement) {
    var element = document.getElementById(inputElement);
    if (element) {
        return element.value;
    } else {
        console.error("Element with ID '" + inputElement + "' not found.");
        return null;
    }
}


function validateUsername() {
    var username = document.getElementById("username").value;
    var errorElement = document.getElementById("error1");
    var usernameElement = document.getElementById("username");
    
    if (username === "") {
        errorElement.style.color = "#ff974d";
        condition1 = false;
        usernameElement.style.borderColor = "#ff974d";
    } else {
        errorElement.style.color = "#0088a9";
        usernameElement.style.borderColor = "#0088a9";
        condition1 = true;
    }
    enablebutton();
}

function validateEmail() {
    var email = document.getElementById("email").value;
    var errorElement = document.getElementById("error2");
    var emailElement = document.getElementById("email");

    if (!/^.+@.+\..{2,3}$/.test(email)) {
        errorElement.style.color = "#ff974d";
        emailElement.style.borderColor = "#ff974d";
        condition2 = false;
    } else {
        errorElement.style.color = "#0088a9";
        emailElement.style.borderColor = "#0088a9";
        condition2 = true;
    }
    enablebutton();
}
function validatePassword() {
    var password = document.getElementById("passwort").value;
    var errorElement = document.getElementById("error3");
    var passwordElement = document.getElementById("passwort");

    if (password.length < 8) {
        errorElement.style.color = "#ff974d";
        passwordElement.style.borderColor = "#ff974d";
        condition3 = false;
    } else {
        errorElement.style.color = "#0088a9";
        passwordElement.style.borderColor = "#0088a9";
        condition3 = true;
    }
    enablebutton();
}

function enablebutton() {
    if(condition1 && condition2 && condition3) {
    firstButtonId.disabled = false;
}
else{
    firstButtonId.disabled = true;
}
}

function validateVorname() {
    var vorname = document.getElementById("vorname").value;
    var errorElement = document.getElementById("vornameError");
    var vornameElement = document.getElementById("vorname");

    if (vorname === "") {
        errorElement.style.color = "#ff974d";
        vornameCondition = false;
        vornameElement.style.borderColor = "#ff974d";
    } else {
        errorElement.style.color = "#0088a9";
        vornameElement.style.borderColor = "#0088a9";
        vornameCondition = true;
    }
    enablesecondbutton();
}

function validateNachname() {
    var nachname = document.getElementById("nachname").value;
    var errorElement = document.getElementById("nachnameError");
    var nachnameElement = document.getElementById("nachname");

    if (nachname === "") {
        errorElement.style.color = "#ff974d";
        nachnameCondition = false;
        nachnameElement.style.borderColor = "#ff974d";
    } else {
        errorElement.style.color = "#0088a9";
        nachnameElement.style.borderColor = "#0088a9";
        nachnameCondition = true;
    }
    enablesecondbutton();
}

function validateGeburtsdatum() {
    var geburtsdatum = "";
    geburtsdatum = document.getElementById("geburtsdatum").value;
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

function enablesecondbutton() {
    if(vornameCondition && nachnameCondition && geburtstagCondition) {
    secondButtonId.disabled = false;
}
else{
    secondButtonId.disabled = true;
}
}

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
                window.location.href = 'registrationresult.php?status=success'; // Redirect on success
            } else {
                console.error('AJAX error: Unexpected response', response);
                // Check for specific error messages and redirect accordingly
                if (response && response.message == 'email_exists') {
                    window.location.href = 'registrationresult.php?status=email_exists';
                } else if (response && response.message == 'username_exists') {
                    window.location.href = 'registrationresult.php?status=username_exists';
                } else if (response && response.message == 'both_exist') {
                    window.location.href = 'registrationresult.php?status=both_exist';
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