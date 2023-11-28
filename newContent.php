<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">       
    <title></title>                                                         <!-- Standart HTML Settings -->
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/login.css">      
</head>

    <form>
        <container class="flex">
        <input class="input" type="text" id="vorname" name="vorname" style="order: 6">
        <label class="label" for="vorname" style="order: 7">Vorname:</label>
        <input class="input" type="text" id="nachname" name="nachname" style="order: 4">
        <label class="label" for="nachname" style="order: 5">Nachname:</label>
        <input class="input" type="text" id="geburtsdatum" name="geburtsdatum" style="order: 2">
        <label class="label" for="Geburtsdatum" style="order: 3">Geburtsdatum:</label>
        <button id="weiterButton" class="first" onclick="loadNewContent()" style="order: 1" disabled>Weiter</button>
        </container>
        <br>
    </form>
    <div class="errorHandlingMajor"> 
    <div class="errorHandlingMinor" id="error1" style="margin-top: 14%; order: 1">Vorname darf nicht leer sein</div>
    <div class="errorHandlingMinor" id="error2" style="margin-top: 15%; order: 2; margin-right: 5%">Nachname darf nicht leer sein</div>
    <div class="errorHandlingMinor" id="error3" style="margin-top: 12%; margin-right: 5%; order: 3">Geben Sie ein gültiges Datum ein</div>
    </div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $passwort = isset($_POST['passwort']) ? $_POST['passwort'] : '';

    // Now you can use $username, $email, and $passwort as needed
    // For example, you can echo them:
    echo "Username: $username, Email: $email, Passwort: $passwort";
}
?>
</html>