// Function to validate input based on the type of data being edited
function validateInput(currentEdittedData) {
    // Prevent the default form submission
    event.preventDefault();

    // Get the relevant elements
    var edittedDataElement = document.getElementById(currentEdittedData);
    var inputtedData = edittedDataElement.value;
    var submitButton = document.getElementById("submit" + currentEdittedData);
    submitButton.disabled = true;

    // Validate based on the type of data being edited
    if (currentEdittedData == "passwort") {
        if (inputtedData.length < 8 || inputtedData.length > 50) {
            edittedDataElement.style.borderColor = "#ff974d";
        } else {
            edittedDataElement.style.borderColor = "#0088a9";
            submitButton.disabled = false;
        }
    } else if (currentEdittedData === "email") {
        // Additional validation for maximum length and email format
        if (inputtedData.length > 32 || !/^.+@.+\..{2,3}$/.test(inputtedData)) {
            edittedDataElement.style.borderColor = "#ff974d";
        } else {
            edittedDataElement.style.borderColor = "#0088a9";
            submitButton.disabled = false;
        }
    } else {
        if (inputtedData.length == 0 || inputtedData.length > 32) {
            edittedDataElement.style.borderColor = "#ff974d";
        } else {
            edittedDataElement.style.borderColor = "#0088a9";
            submitButton.disabled = false;
        }
    }
}

// Function to handle editing data
function editData(edittableData) {
    // Prevent the default form submission
    event.preventDefault();

    // Get relevant elements
    var backButton = document.getElementById("backButton");
    var inputElement = document.getElementById(edittableData);
    var dataDisplayElement = document.getElementById(edittableData + "Data");
    var buttonElement = document.getElementById("edit" + edittableData);
    var buttonSubmitElement = document.getElementById("submit" + edittableData);
    var otherEditButtons = document.querySelectorAll('input[type=submit]:not(#' + edittableData + ')');
    currentEdittedData = edittableData;

    // Add input event listener for real-time validation
    inputElement.addEventListener('input', function() {
        validateInput(currentEdittedData);
    });

    // Disable other edit buttons
    otherEditButtons.forEach(function(button) {
        button.disabled = true;
    });

    // Display relevant elements
    inputElement.style.display = "block";
    dataDisplayElement.style.display = "none";
    buttonElement.style.display = "none";
    buttonSubmitElement.style.display = "block";
    backButton.style.display = "block";
    backButton.disabled = false;
}

// Global variable to store the currently edited data
var currentEdittedData;

// Function to go back to the original display
function back(event) {
    // Get relevant elements for the current edited data
    var currentInputElement = document.getElementById(currentEdittedData);
    var currentDisplayElement = document.getElementById(currentEdittedData + "Data");
    var currentEditButton = document.getElementById("edit" + currentEdittedData);
    var currentSubmitButton = document.getElementById("submit" + currentEdittedData);

    // Prevent the default form submission
    event.preventDefault();

    // Get the back button
    var backButton = document.getElementById("backButton");

    // Enable all edit buttons
    var editButtons = document.querySelectorAll('input[type=submit]');
    editButtons.forEach(function(button) {
        button.disabled = false;
    });

    // Display relevant elements
    currentEditButton.style.display = "block";
    currentSubmitButton.style.display = "none";
    backButton.style.display = "none";
    currentDisplayElement.style.display = "block";
    currentInputElement.style.display = "none";
}
// edittedField and changedData needed to keep submitFinal working across the two functions
var edittedField;
var changedData;
function submitFinal(event){
    event.preventDefault();
    var passwordForValidation = document.getElementById('submitpasswortcheck').value;
    // Make an AJAX request to the server
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "PHP_Funktionen/editAccount.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Prepare the data to send to the server
    var data = "field=" + edittedField + "&value=" + encodeURIComponent(changedData) + "&validationPassword=" + encodeURIComponent(passwordForValidation);
    // Send the request
    xhr.send(data);

    // Handle the server response
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Handle the response from the server
            console.log(xhr.responseText);
    
            // Check if the response indicates an error
            if (xhr.responseText.includes("bereits vergeben")) {
                // Add code here to inform the user about the specific error
                alert(xhr.responseText);
                window.location.href = "/medium_hot/myAccount.php";
            } else if(xhr.responseText.includes("Falsches")) {
                alert("Falsches Passwort!");
                window.location.href = "/medium_hot/myAccount.php";
            } else {
                // Add code here for a successful update
                alert("Account wurde erfolgreich bearbeitet!");
                window.location.href = "/medium_hot/myAccount.php";
            }
        }
    };
}
// Function to submit the edited data to the server
function submitData(edittableData) {
    // Prevent the default form submission
    event.preventDefault();

    // Map the edittableData to the corresponding field in the server
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

    // Get the input element and the changed data
    var inputElement = document.getElementById(edittableData);
    changedData = inputElement.value;
    //Show only Password Check
    showPasswordCheck();
}

function showPasswordCheck() {
    // Hide all table rows
    var finalSubmitElement = document.getElementById('finalSubmit');
    finalSubmitElement.disabled = false;
    var tableRows = document.querySelectorAll('table tr');
    tableRows.forEach(function(row) {
        row.style.display = 'none';
    });

    // Show the row with id "passwordCheck"
    var passwordCheckRow = document.getElementById('passwordCheck');
    if (passwordCheckRow) {
        passwordCheckRow.style.display = 'table-row';
    }
}