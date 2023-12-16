<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="CSS/login.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    <?php include 'header.php' ?>
    <?php 
    if (isset($_SESSION['logged_in_userID']) && $_SESSION['logged_in_userID'] > 0) {
        echo('<br>
        <br>
        <br>
        <br>
        <div align="center" class="dividiediv">
            <h1> Anmeldung </h1><br>
            <a href="register.php">Registrieren</a>
        </div>
        <br>
        <br>
        <div class="roundedcorners" id="roundedcorners" style="height: 140px">
            <h3>Bereits angemeldet</h3>
        </div>
        <br>
        <br>');
        echo('<script> setTimeout(function() {
            window.location.href = "home.php";
            }, 2000); </script>');
    }
    else {
        echo '
            <br>
            <br>
            <br>
            <br>
            <div align="center">
                <h1> Anmelden </h1><br>
                <a href="register.php">Registrieren</a>
            </div>
            <br>
            <br>
            <div class="roundedcorners" id="roundedcorners">
                <form method="POST" id="loginForm" onsubmit="loginFormSubmit(event)">
                <container class="flex">
                    <input class="input" type="text" id="loginUsername" name="loginUsername" style="order: 4">
                    <label class="label" for="loginUsername" style="order: 5">Username:</label>
                    <input class="input" type="text" id="loginPassword" name="loginPassword" style="order: 2">
                    <label class="label" for="loginPassword" style="order: 3">Passwort:</label>
                    <input class="login" type="submit" name="submit" value="Anmelden" style="order: 1">
                    <br>
                </container>
                </form>
            </div>
            <br>
            <br>';
    }
    ?>
    <?php include 'footer.php' ?>
    <script src="js/loginscript.js"></script>
</body>
</html>
