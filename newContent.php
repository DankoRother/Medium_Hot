<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">       
    <title></title>                                                         <!-- Standart HTML Settings -->
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/login.css">      
</head>
<form action="login.php" method="post"> 
    <container class="flex">
            <input class="input1" type="text" id="vorname" name="vorname">
            <label class="label1" for="vorname">Vorname:</label>
            <input class="input2"  type="text" id="nachname" name="nachname">
            <label class="label2" for="nachname">Nachname:</label>
            <input class="input3"  type="text" id="geburtsdatum" name="geburtsdatum">
            <label class="label3" for="geburtsdatum">Geburtsdatum:</label>
            <input type="submit" name="submit" value="Submit" class="final">
    </container>
    <br>
</form>

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