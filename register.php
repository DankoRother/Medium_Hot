<?php
include("dbConfig.php");
if(isset($_POST)) {
    error_log("abcdefg");
    $usernameInput = $_POST['username'];
    $emailInput = $_POST['email'];
    $passwordInput = $_POST['passwort'];
    $vornameInput= $_POST['vorname'];
    $nachnameInput = $_POST['nachname'];
    $geburtstagInput = $_POST['geburtsdatum'];
    $loggedIn = "1";
    // Do something with the data
    try {
        // Create a PDO database connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Check if email or username already exists
        $stmtEmail = $conn->prepare("SELECT COUNT(*) FROM user WHERE email = ?");
        $stmtEmail->execute([$emailInput]);
        $emailExists = $stmtEmail->fetchColumn() > 0;

        $stmtUsername = $conn->prepare("SELECT COUNT(*) FROM user WHERE username = ?");
        $stmtUsername->execute([$usernameInput]);
        $usernameExists = $stmtUsername->fetchColumn() > 0;

        if ($emailExists || $usernameExists) {
            // Email or username already exists
            error_log(json_encode(['status' => 'error', 'message' => 'Email or username already exists']));
        } else {
            // Insert data into the users table using prepared statement
            $stmt = $conn->prepare("INSERT INTO user (username, email, password, age, first_name, last_name, logged_in) VALUES (?, ?, ?, ?, ?, ?, ?)");

            // Bind parameters
            $stmt->bindParam(1, $usernameInput);
            $stmt->bindParam(2, $emailInput);
            $stmt->bindParam(3, $passwordInput);
            $stmt->bindParam(4, $geburtstagInput);
            $stmt->bindParam(5, $vornameInput);
            $stmt->bindParam(6, $nachnameInput);
            $stmt->bindParam(7, $loggedIn);

            // Execute the statement
            if ($stmt->execute()) {
                error_log(json_encode(['status' => 'success', 'message' => 'Data inserted successfully']));
            } else {
                error_log(json_encode(['status' => 'error', 'message' => 'Error inserting data']));
            }

            // Close the statement
            $stmt->closeCursor();
        }
        // Close the statements and the database connection
        $stmtEmail->closeCursor();
        $stmtUsername->closeCursor();
        $conn = null;
    } catch (PDOException $e) {
        error_log(json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]));
    }
}
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">       
    <title>Sign Up</title>                                                         <!-- Standart HTML Settings -->
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/login.css">      
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> 
</head>
<body>
<?php include 'header.php'?>            
<br>
<br>
<br>
<br>
<div align="center" class="dividiediv">
<h1> Registrieren </h1><br>
<a href="login.php">Anmelden</a>
</div>
<br>
<br>
<div class="roundedcorners" id="roundedcorners">
<form method="POST"  id="registrationForm" onsubmit="submitForm(event)">
    <container class="flex">
        <input class="input" type="text" id="username" name="username" style="order: 6">
            <label class="label" for="username" style="order: 7">Username:</label>
        <input class="input" type="text" id="email" name="email" style="order: 4">
            <label class="label" for="email" style="order: 5">E-Mail:</label>
        <input class="input" type="text" id="passwort" name="passwort" style="order: 2">
            <label class="label" for="passwort" style="order: 3">Passwort:</label>
        <input type="button" id="weiterButton" class="first" onclick="hideFirstShowSecond()" style="order: 1" value="Weiter" disabled>
                <input class="input" type="text" id="vorname" name="vorname" style="order: 6; display: none">
                    <label class="label" for="vorname" style="order: 7; display: none" hidden>Vorname:</label>
                <input class="input" type="text" id="nachname" name="nachname" style="order: 4; display: none" >
                    <label class="label" for="nachname" style="order: 5; display: none" hidden>Nachname:</label>
                <input class="datum" type="date" id="geburtsdatum" name="geburtsdatum" style="display: none; order: 2;">
                    <label class="label" for="geburtsdatum" style="order: 3; display: none">Geburtsdatum:</label>
                    <input id="submitButton" class="final" type="submit" style="order: 1; display: none" name="submit" value="Registrieren" disabled>
    </container>
    <br>
    </form>
    <div class="errorHandlingMajor" id="firstErrors" style="display: block"> 
        <div class="errorHandlingMinor" id="error1" style="margin-top: 14%; order: 1;">Username darf nicht leer sein</div>
        <div class="errorHandlingMinor" id="error2" style="margin-top: 12%; order: 2; margin-right: 5%;">Geben Sie eine gültige E-Mail ein</div>
        <div class="errorHandlingMinor" id="error3" style="margin-top: 6%; order: 3;">Passwort muss mindestens 8 Zeichen haben</div>
    </div>
    <div class="errorHandlingMajor" id="secondErrors" style="display:none"> 
            <div class="errorHandlingMinor" id="vornameError" style="margin-top: 14%; order: 1;" >Vorname darf nicht leer sein</div>
            <div class="errorHandlingMinor" id="nachnameError" style="margin-top: 15%; order: 2; margin-right: 5%;" >Nachname darf nicht leer sein</div>
            <div class="errorHandlingMinor" id="geburtstagError" style="margin-top: 12%; margin-right: 5%; order: 3;" >Geben Sie ein gültiges Datum ein</div>
            <input type="button" id="backButton" class="back" onclick="hideSecondShowFirst()" value="Zurück" style="display: none">
    </div>
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<script src="script.js"></script> 
<?php include 'footer.php'?>
</body>


</html>
