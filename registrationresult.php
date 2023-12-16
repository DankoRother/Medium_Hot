<?php
session_start();
$status = isset($_GET['status']) ? $_GET['status'] : '';

if ($status === 'email_exists') {
    $message = "E-Mail is already in use.";
} elseif ($status === 'username_exists') {
    $message = "Username is already in use.";
} elseif ($status === 'both_exist') {
    $message = "Both E-Mail and Username are already in use.";
} else {
    $message = "Registration successful.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Result</title>
    <link rel="stylesheet" href="CSS/registrationresult.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="script.js"></script>
    <script>         // Set the delay time in milliseconds (e.g., 5000 milliseconds = 5 seconds)
        var delayTime = 2000;

        // Use setTimeout to redirect after the specified delay
        setTimeout(function() {
            // Replace 'https://example.com/new-page' with the URL you want to redirect to
            window.location.href = 'register.php';
        }, delayTime);
        </script>    
</head>
<body>
    <?php include 'header.php' ?>
    <br>
    <br>
    <br>
    <br>
    <div align="center" class="dividiediv">
        <h1> Registrierungsergebnis </h1><br>
        <a href="login.php">Anmelden</a>
    </div>
    <br>
    <br>
    <div class="roundedcorners" id="roundedcorners">
        <h3 style=""><?php echo $message; ?></h3>
    </div>
    <br>
    <br>
    <?php include 'footer.php' ?>
</body>
</html>
