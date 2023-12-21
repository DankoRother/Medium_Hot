function loginFormSubmit(event) {
    event.preventDefault(); // Prevent the default form submission
    console.log('Form submitted');

    // Add a console log to check serialized form data
    console.log($('#loginForm').serialize());

    $.ajax({
        url: 'PHP_Funktionen/loginfunction.php', // Corrected URL
        method: 'POST',
        data: $('#loginForm').serialize(),
        dataType: 'json',
        success: function(response) {
            if (response && response.status === 'success') {
                console.log('Login successful');
                // Access the selected_car_id from the response
                var selectedCarId = response.selected_car_id;
                
                document.getElementById("error").textContent = "Erfolgreich eingelogt! Weiterleitung...";
                document.getElementById("error").style.color = "#0088a9";
                document.getElementById("error").style.marginLeft = "1%";
                document.getElementById("loginButton").style.marginTop = "10%";

                setTimeout(function() {
                    // Redirect to another page
                    if(selectedCarId > 0) {
                        window.location.href = 'produktdetails.php';
                    } else {
                        window.location.href = 'home.php';
                    }
                }, 700);
            } else {
                console.error('Login error:', response.message);
                if (response.message == "Incorrect username or password") {
                    document.getElementById("error").textContent = " Logindaten stimmen nicht überein!";
                    document.getElementById("loginButton").style.marginTop = "10%";
                }
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', error);
        }
    });
}

// Event listeners for input validation
document.getElementById("loginUsername").addEventListener("input", validateUsername);
document.getElementById("loginPassword").addEventListener("input", validatePassword);

function validateUsername() {
    var usernameInput = document.getElementById("loginUsername").value;
    var usernameElement = document.getElementById("loginUsername");
    document.getElementById("error").textContent="";
    document.getElementById("loginButton").style.marginTop = "18.5%";
    if (usernameInput === "") {
        usernameCondition = false;
        usernameElement.style.borderColor = "#ff974d";
    } else {
        usernameElement.style.borderColor = "#0088a9";
        usernameCondition = true;
    }
    enableLogin();
}

function validatePassword() {
    var passwordInput = document.getElementById("loginPassword").value;
    var passwordElement = document.getElementById("loginPassword");
    document.getElementById("error").textContent="";
    document.getElementById("loginButton").style.marginTop = "18.5%";
    if (passwordInput === "") {
        passwordCondition = false;
        passwordElement.style.borderColor = "#ff974d";
    } else {
        passwordElement.style.borderColor = "#0088a9";
        passwordCondition = true;
    }
    enableLogin();
}

var loginButtonId = document.getElementById("loginButton");

function enableLogin() {
    if(usernameCondition && passwordCondition) {
        loginButtonId.disabled = false;
    } else {
        loginButtonId.disabled = true;
    }
}
