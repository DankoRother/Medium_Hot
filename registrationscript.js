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


/*
function loadIntoPHP() {
    var vornameInput = loadInput("vorname");
    var nachnameInput = loadInput("nachname");
    var geburtsdatumInput = loadInput("geburtsdatum");

    // Make an AJAX request to the server with the data
    $.ajax({
        type: 'POST',
        url: 'login.php',
        data: {
            submit: true,
            usernameInput: usernameInput,
            emailInput: emailInput,
            passwordInput: passwordInput,
            vornameInput: vornameInput,
            nachnameInput: nachnameInput,
            geburtsdatumInput: geburtsdatumInput
        },
        success: function(response) {
            // Extract JSON part of the response
            var jsonStartIndex = response.indexOf('{');
            var jsonEndIndex = response.lastIndexOf('}');
            
            if (jsonStartIndex !== -1 && jsonEndIndex !== -1) {
                var jsonResponse = response.substring(jsonStartIndex, jsonEndIndex + 1);

                try {
                    var parsedJson = JSON.parse(jsonResponse);
                    console.log(parsedJson);
                } catch (error) {
                    console.error('Error parsing JSON response:', error);
                }
            } else {
                console.error('Invalid JSON response:', response);
            }
        },
    });
}

function loadNewContent() {
    event.preventDefault();
    // Assuming loadInput is a JavaScript function
    usernameInput = loadInput("username");
    emailInput = loadInput("email");
    // hash password
    passwordInput = hashPassword();
    // Form elements
    var formContent = `
        <form onsubmit="event.preventDefault(); loadIntoPHP()"  method="POST" name="submit">
            <container class="flex">
                <input class="input" type="text" id="vorname" name="vorname" style="order: 6">
                <label class="label" for="vorname" style="order: 7">Vorname:</label>
                <input class="input" type="text" id="nachname" name="nachname" style="order: 4">
                <label class="label" for="nachname" style="order: 5">Nachname:</label>
                <input class="datum" type="date" id="geburtsdatum" name="geburtsdatum">
                <label class="label" for="geburtsdatum" style="order: 3">Geburtsdatum:</label>
                <input id="finalButton" class="first" type="submit" style="order: 1 name="submit"" disabled>Weiter</button>
            </container>
            <br>
        </form>
    `;

    // Error handling elements
    var errorHandlingContent = `
        <div class="errorHandlingMajor"> 
            <div class="errorHandlingMinor" id="vornameError" style="margin-top: 14%; order: 1">Vorname darf nicht leer sein</div>
            <div class="errorHandlingMinor" id="nachnameError" style="margin-top: 15%; order: 2; margin-right: 5%">Nachname darf nicht leer sein</div>
            <div class="errorHandlingMinor" id="geburtstagError" style="margin-top: 12%; margin-right: 5%; order: 3">Geben Sie ein gültiges Datum ein</div>
        </div>
    `;

    // Update the registrationForm content
    document.getElementById("registrationForm").innerHTML = formContent + errorHandlingContent;

    // Add event listeners for input event
    document.getElementById("vorname").addEventListener("input", validateVorname);
    document.getElementById("nachname").addEventListener("input", validateNachname);
    document.getElementById("geburtsdatum").addEventListener("keyup", validateGeburtsdatum);

    // Assign secondButtonId after updating the DOM
    secondButtonId = document.getElementById("finalButton");
    console.log("loaded");
}

//needed for registration and login, so separate function to hash password
function hashPassword() {
    var password = loadInput("passwort");

    // Create a synchronous XMLHttpRequest
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'hashpassword.php', false); // Third parameter set to false for synchronous request
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    // Send the password as a POST parameter
    xhr.send('password=' + encodeURIComponent(password));

    // Check the status and parse the response
    if (xhr.status === 200) {
        try {
            var response = JSON.parse(xhr.responseText);
            console.log('Response:', response);

            if (response.status === 'success') {
                // Use the hashed password returned from the server
                console.log('Hashed Password:', response.hashedPassword);
                return response.hashedPassword;
            } else {
                // Handle other cases (if needed)
                console.error('Error:', response.message);
                return null;
            }
        } catch (error) {
            // Handle JSON parsing error (if needed)
            console.error('JSON Parsing Error:', error);
            return null;
        }
    } else {
        // Handle HTTP error (if needed)
        console.error('HTTP Error:', xhr.status, xhr.statusText);
        return null;
    }
}

*/