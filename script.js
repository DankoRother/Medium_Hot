var InputUsername ="";
var InputEmail ="";
var InputPassword="";
var InputVorname="";
var InputNachname="";
var data1;
var data2;
var InputGeburtstag = new Date();
function loadNewContent() {

    event.preventDefault();
    loaddata();
    document.getElementById("registrationForm").innerHTML = `
    <form onsubmit="register()">
        <container class="flex">
        <input class="input" type="text" id="vorname" name="vorname" style="order: 6">
        <label class="label" for="vorname" style="order: 7">Vorname:</label>
        <input class="input" type="text" id="nachname" name="nachname" style="order: 4">
        <label class="label" for="nachname" style="order: 5">Nachname:</label>
        <input class="datum" type="date" id="geburtsdatum" name="geburtsdatum">
        <label class="label" for="geburtsdatum" style="order: 3">Geburtsdatum:</label>
        <button id="finalButton" class="first" onclick="register()" style="order: 1" disabled>Weiter</button>
        </container>
        <br>
    </form>
    <div class="errorHandlingMajor"> 
    <div class="errorHandlingMinor" id="vornameError" style="margin-top: 14%; order: 1">Vorname darf nicht leer sein</div>
    <div class="errorHandlingMinor" id="nachnameError" style="margin-top: 15%; order: 2; margin-right: 5%">Nachname darf nicht leer sein</div>
    <div class="errorHandlingMinor" id="geburtstagError" style="margin-top: 12%; margin-right: 5%; order: 3">Geben Sie ein gültiges Datum ein</div>
    </div>
    `;
    // You can include additional scripts or styles directly here if needed
    document.getElementById("vorname").addEventListener("input", updateSecondValidationStatus);
    document.getElementById("nachname").addEventListener("input", updateSecondValidationStatus);
    document.getElementById("geburtsdatum").addEventListener("input", updateSecondValidationStatus);
    console.log("loaded");
}
  // Function to check and update validation status

function loaddata() {
    InputUsername = document.getElementById("username").value;
    InputEmail = document.getElementById("email").value;
    InputPassword = document.getElementById("passwort").value;
     // Create a data object to send to the server
     data1 = {
        username: InputUsername,
        email: InputEmail,
        password: InputPassword,
    };
}
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
// document.getElementById("weiterButton").addEventListener("click", loadscript)

function updateSecondValidationStatus() {
    var vornameCondition = false;
    var nachnameCondition = false;
    var geburtstagCondition = false;
    // Get form input values
    var vorname = document.getElementById("vorname").value;
    var nachname = document.getElementById("nachname").value;
    var geburtstag = document.getElementById("geburtsdatum").value;
    var finalButton = document.getElementById("finalButton");

    // Get error div elements
    var vornameError = document.getElementById("vornameError");
    var nachnameError = document.getElementById("nachnameError");
    var geburtstagError = document.getElementById("geburtstagError");
    var vornameElement = document.getElementById("vorname");
    var nachnameElement = document.getElementById("nachname");
    var geburtstagElement = document.getElementById("geburtsdatum");

    // Validate vorname
    if (vorname === "") {
        vornameError.style.color = "#ff974d";
        vornameCondition = false;
        vornameElement.style.borderColor = "#ff974d";
    } else {
        vornameError.style.color = "#0088a9";
        vornameElement.style.borderColor = "#0088a9";
        vornameCondition = true;
    }

    // Validate nachname
    // Assuming nachname should not be empty, adjust as needed
    if (nachname === "") {
        nachnameError.style.color = "#ff974d";
        nachnameElement.style.borderColor = "#ff974d";
        nachnameCondition = false;
    } else {
        nachnameError.style.color = "#0088a9";
        nachnameElement.style.borderColor = "#0088a9";
        nachnameCondition = true;
    }

    // Validate geburtstag
    // Add your validation logic for geburtstag as needed
    // For example, checking if it's a valid date
    var minDate = new Date('1900-01-01');
    var maxDate = new Date('2024-12-31');

    if (geburtstag < minDate || geburtstag > maxDate) {
        console.log("abc");
        geburtstagError.style.color = "#ff974d";
        geburtstagElement.style.borderColor = "#ff974d";
        geburtstagCondition = false;
    } else {
        geburtstagError.style.color = "#0088a9";
        geburtstagElement.style.borderColor = "#0088a9";
        geburtstagCondition = true;
    }

    if (vornameCondition && nachnameCondition && geburtstagCondition) {
        finalButton.removeAttribute("disabled", "true");
    } else {
        finalButton.setAttribute("disabled", "true");
    }
}

function register() {
    event.preventDefault();
    InputVorname = document.getElementById("vorname").value;
    InputNachname = document.getElementById("nachname").value;
    InputGeburtstag = document.getElementById("geburtsdatum").value;
    data2 = {
        vorname: document.getElementById("vorname").value,
        nachname: document.getElementById("nachname").value,
        geburtsdatum: document.getElementById("geburtsdatum").value
    };

    var data = {
        data1,
        data2
    };
    // Send data to the server using AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "datainsert.php", true);
    xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xhr.onload = function () {
        if (xhr.status == 200) {
            console.log(xhr.responseText);
        }
    };
    xhr.send(JSON.stringify(data));
}
