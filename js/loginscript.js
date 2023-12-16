function loginFormSubmit(event) {
    event.preventDefault(); // Prevent the default form submission
    console.log('Form submitted');

    // Add a console log to check serialized form data
    console.log($('#loginForm').serialize());

    $.ajax({
        url: 'PHP_Funktionen/loginfunction.php',
        method: 'POST',
        data: $('#loginForm').serialize(),
        dataType: 'json',
        success: function(response) {
            if (response && response.status === 'success') {
                console.log('Login successful');
                window.location.href = 'login_screen.php';
            } else {
                console.error('Login error:', response.message);
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', error);
        }
    });
}

function validateUsername() {
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

function validatePassword() {
    var nachname = document.getElementById("pass").value;
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
