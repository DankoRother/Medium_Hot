function validateInput(edittableData) {
    event.preventDefault();
    var edittedDataElement = document.getElementById(edittableData);
    var inputtedData = edittedDataElement.value;
    var submitButton = document.getElementById("submit" + edittableData);
    if (edittableData === "passwort") {
        if (inputtedData.length < 8 || inputtedData.length > 50) {
            edittedDataElement.style.borderColor = "#ff974d";
            submitButton.disabled = true;
        } else {
            edittedDataElement.style.borderColor = "#0088a9";
            submitButton.disabled = false;
        }
    } else if(edittableData === "email"){
        var email = document.getElementById("email").value;
        var errorElement = document.getElementById("error2");
        var emailElement = document.getElementById("email");
    
        // Additional validation for maximum length
        if (inputtedData.length > 32) {
            edittedDataElement.style.borderColor = "#ff974d";
            submitButton.disabled = true;
        } else {
            if (!/^.+@.+\..{2,3}$/.test(inputtedData)) {
                edittedDataElement.style.borderColor = "#0088a9";
                submitButton.disabled = false;
            } else {
                edittedDataElement.style.borderColor = "#0088a9";
                submitButton.disabled = false;
            }
        }
        enablebutton();
    } {
        if (inputtedData.length > 32) {
            edittedDataElement.style.borderColor = "#ff974d";
            submitButton.disabled = true;
        } else {
            edittedDataElement.style.borderColor = "#0088a9";
            editCondition = true;
            submitButton.disabled = false;
        }
    }
}

function editData(edittableData) {
    event.preventDefault();
    var backButton = document.getElementById("backButton");
    var inputElement = document.getElementById(edittableData);
    var dataDisplayElement = document.getElementById(edittableData + "Data");
    var buttonElement = document.getElementById("edit" + edittableData);
    var buttonSubmitElement = document.getElementById("submit" + edittableData);
    var otherEditButtons = document.querySelectorAll('input[type=submit]:not(#' + edittableData + ')');
    currentEdittedData = edittableData;
    inputElement.addEventListener('input', function() {
        validateInput(edittableData);
    });

    otherEditButtons.forEach(function(button) {
        button.disabled = true;
    });
    buttonSubmitElement.disabled = false;        
    inputElement.style.display = "block";
    dataDisplayElement.style.display = "none";
    buttonElement.style.display = "none";
    buttonSubmitElement.style.display = "block";
    backButton.style.display = "block";
    backButton.disabled = false;
}
var currentEdittedData;
function back(event){
    var currentInputElement = document.getElementById(currentEdittedData);
    var currentDisplayElement = document.getElementById(currentEdittedData + "Data");
    var currentEditButton = document.getElementById("edit" + currentEdittedData);
    var currentSubmitButton = document.getElementById("submit" + currentEdittedData);
    event.preventDefault();
    var backButton = document.getElementById("backButton");
    var editButtons = document.querySelectorAll('input[type=submit]');
    editButtons.forEach(function(button) {
        button.disabled = false;
    });
    currentEditButton.style.display = "block";
    currentSubmitButton.style.display = "none";
    backButton.style.display = "none";
    currentDisplayElement.style.display = "block";
    currentInputElement.style.display = "none";
}
function submitData(edittableData) {
    event.preventDefault();
    var edittedField;
    
    if (edittableData === "username") {
        edittedField = "username";
    } else if (edittableData === "email") {
        edittedField = "email";
    } else if (edittableData === "passwort") {
        edittedField = "password";
    } else if (edittableData === "vorname") {
        edittedField = "first_name";
    } else if (edittableData === "nachname") {
        edittedField = "last_name";
    } else if (edittableData === "geburtstag") {
        edittedField = "age";
    }

    var inputElement = document.getElementById(edittableData);
    var changedData = inputElement.value;

    // Make an AJAX request to the server
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "PHP_Funktionen/editAccount.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Prepare the data to send to the server
    var data = "field=" + edittedField + "&value=" + encodeURIComponent(changedData);

    // Send the request
    xhr.send(data);

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Handle the response from the server
            console.log(xhr.responseText);
    
            // Check if the response indicates an error
            if (xhr.responseText.includes("bereits vergeben")) {
                // Add code here to inform the user about the specific error
                alert(xhr.responseText);
            } else {
                // Add code here for a successful update
                alert("Account wurde erfolgreich bearbeitet!");
                window.location.href = "myAccount.php";
            }
        }
    };
}
