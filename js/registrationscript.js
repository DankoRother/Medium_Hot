
document.getElementById("username").addEventListener("input", validateUsername);
document.getElementById("email").addEventListener("input", validateEmail);
document.getElementById("passwort").addEventListener("input", validatePassword);
document.getElementById("vorname").addEventListener("input", validateVorname);
document.getElementById("nachname").addEventListener("input", validateNachname);
document.getElementById("geburtstag").addEventListener("input", validateGeburtsdatum);
document.getElementById("geburtstag").addEventListener("change", validateGeburtsdatum);
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
    var geburtsdatumElement = document.getElementById("geburtstag");
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
    document.querySelectorAll('.label[for^="vorname"], .input[name="vorname"], .label[for^="nachname"], .input[name="nachname"], .label[for^="geburtstag"], .input[name="geburtstag"], .errorHandlingMajor#secondErrors .button[name="submitButton"]').forEach(function (element) {
        element.style.display = 'block';
    });
}

function hideSecondShowFirst() {
    var geburtsdatumElement = document.getElementById("geburtstag");
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
    document.querySelectorAll('.label[for^="vorname"], .input[name="vorname"], .label[for^="nachname"], .input[name="nachname"], .label[for^="geburtstag"], .input[name="geburtstag"], .errorHandlingMajor#secondErrors .button[name="submitButton"]').forEach(function (element) {
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
// Function to validate the username input
function validateUsername() {
    var username = document.getElementById("username").value;
    var errorElement = document.getElementById("error1");
    var usernameElement = document.getElementById("username");
    if (document.getElementById("error2").style.marginTop !== "12%") {
        document.getElementById("error2").style.marginTop = "15%";
    }
    // Additional validation for maximum length
    if (username.length > 32) {
        errorElement.textContent = "Username darf maximal 32 Zeichen haben";
        errorElement.style.color = "#ff974d";
        usernameElement.style.borderColor = "#ff974d";
        condition1 = false;
    } else if (username === "") {
        errorElement.textContent = "Username darf nicht leer sein";
        errorElement.style.color = "#ff974d";
        usernameElement.style.borderColor = "#ff974d";
        condition1 = false;
    } else {
        errorElement.textContent = "Username darf nicht leer sein";
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

function validateGeburtsdatum() {
    var geburtsdatum = document.getElementById("geburtstag").value;
    var errorElement = document.getElementById("geburtstagError");
    var geburtsdatumElement = document.getElementById("geburtstag");

    // Add your validation logic for geburtsdatum as needed
    // For example, checking if it's a valid date
    var minDate = new Date('1900-01-01');
    var maxDate = new Date('2024-12-31');

    // Adjusted regular expression to match "dd.mm.yy" format
    if (/^(0[1-9]|[12][0-9]|3[01])\.(0[1-9]|1[0-2])\.\d{4}$/.test(geburtsdatum)) {
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
                document.getElementById("vornameError").style.color="rgb(0, 0, 0, 0)";
                document.getElementById("geburtstagError").style.color="rgb(0, 0, 0, 0)";
                document.getElementById("nachnameError").style.color="#0088a9";
                document.getElementById("nachnameError").style.textAlign="center";
                document.getElementById("nachnameError").textContent="Erfolgreich Registriert!..."
                setTimeout(function() {
                    window.location.href = 'home.php'; // Redirect on success
            }, 1200);

            } else {
                console.error('AJAX error: Unexpected response', response);
                // Check for specific error messages and redirect accordingly
                if (response && response.message == 'email_exists') {
                    hideSecondShowFirst();
                    document.getElementById("error2").textContent="E-Mail existiert bereits";
                    document.getElementById("error2").style.color="#ff974d";
                    document.getElementById("error3").style.marginTop="13%";
                    document.getElementById("email").style.borderColor="#ff974d";
                } else if (response && response.message == 'username_exists') {
                    hideSecondShowFirst();
                    document.getElementById("error1").textContent="Username existiert bereits";
                    document.getElementById("error1").style.color="#ff974d"
                    document.getElementById("username").style.borderColor="#ff974d";
                    document.getElementById("error2").style.marginTop="17%";
                } else if (response && response.message == 'both_exist') {
                    hideSecondShowFirst();
                    document.getElementById("error2").textContent="E-Mail existiert bereits <br>";
                    document.getElementById("error2").style.color="#ff974d";
                    document.getElementById("error2").style.marginTop="17%";
                    document.getElementById("error3").style.marginTop="13%";
                    document.getElementById("error1").textContent="Username existiert bereits";
                    document.getElementById("error1").style.color="#ff974d"
                    document.getElementById("username").style.borderColor="#ff974d";
                    document.getElementById("error2").textContent="E-Mail existiert bereits";
                    document.getElementById("error2").style.color="#ff974d"
                    document.getElementById("email").style.borderColor="#ff974d";
                } else if (response && response.status === 'error') {
                    console.error('Database Error:', response.message);
                    // Handle the database error, e.g., display an error message to the user
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