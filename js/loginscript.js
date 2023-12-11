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
                window.location.href = 'home.php';
            } else {
                console.error('Login error:', response.message);
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', error);
        }
    });
}
