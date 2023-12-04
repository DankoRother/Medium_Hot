<?php
// Include the database configuration file
include('dbConfig.php');

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Retrieve data from the POST request
    $usernameInput = isset($_POST['usernameInput']) ? $_POST['usernameInput'] : null;
    $emailInput = isset($_POST['emailInput']) ? $_POST['emailInput'] : null;
    $passwordInput = isset($_POST['passwordInput']) ? $_POST['passwordInput'] : null;
    $vornameInput = isset($_POST['vornameInput']) ? $_POST['vornameInput'] : null;
    $nachnameInput = isset($_POST['nachnameInput']) ? $_POST['nachnameInput'] : null;
    $geburtsdatumInput = isset($_POST['geburtsdatumInput']) ? $_POST['geburtsdatumInput'] : null;

    try {
        // Create a PDO database connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insert data into the users table using prepared statement
        $stmt = $conn->prepare("INSERT INTO users (username, email, password, vorname, nachname, geburtsdatum) VALUES (?, ?, ?, ?, ?, ?)");

        // Bind parameters
        $stmt->bindParam(1, $usernameInput);
        $stmt->bindParam(2, $emailInput);
        $stmt->bindParam(3, $passwordInput);
        $stmt->bindParam(4, $vornameInput);
        $stmt->bindParam(5, $nachnameInput);
        $stmt->bindParam(6, $geburtsdatumInput);

        // Execute the statement
        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Data inserted successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error inserting data']);
        }

        // Close the statement and the database connection
        $stmt->closeCursor();
        $conn = null;
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    // If it's not a POST request, handle accordingly
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
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
<h1> Registrierung </h1><br>
</div>
<br>
<br>
<br>
<div class="roundedcorners" id="registrationForm">
    <form onsubmit="loadNewContent()" method="POST">
        <container class="flex">
        <input class="input" type="text" id="username" name="username" style="order: 6">
        <label class="label" for="Username" style="order: 7">Username:</label>
        <input class="input" type="text" id="email" name="email" style="order: 4">
        <label class="label" for="email" style="order: 5">E-Mail:</label>
        <input class="input" type="text" id="passwort" name="passwort" style="order: 2">
        <label class="label" for="passwort" style="order: 3">Passwort:</label>
        <button id="weiterButton" class="first" onclick="loadNewContent()" style="order: 1" disabled>Weiter</button>
        </container>
        <br>
    </form>
    <div class="errorHandlingMajor"> 
    <div class="errorHandlingMinor" id="error1" style="margin-top: 14%; order: 1">Username darf nicht leer sein</div>
    <div class="errorHandlingMinor" id="error2" style="margin-top: 12%; order: 2; margin-right: 5%">Geben Sie eine gültige E-Mail ein</div>
    <div class="errorHandlingMinor" id="error3" style="margin-top: 6%; order: 3">Passwort muss mindestens 8 Zeichen haben</div>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<!-- 
<form onsubmit="registerphp()" style="order: 6; width: 0px; height: 0px; margin: 0px; padding: 0px;">
    <container class="flex" style="order: 6; width: 0px; height: 0px; margin: 0px; padding: 0px;">
        <input class="input" type="text" id="vorname" name="vorname" style="order: 6; width: 0px; height: 0px; margin: 0px; padding: 0px;">
        <label class="label" for="vorname" style="order: 7; width: 0px; height: 0px; margin: 0px; padding: 0px;">Vorname:</label>
        <input class="input" type="text" id="nachname" name="nachname" style="order: 4; width: 0px; height: 0px; margin: 0px; padding: 0px;">
        <label class="label" for="nachname" style="order: 5; width: 0px; height: 0px; margin: 0px; padding: 0px;">Nachname:</label>
        <input class="datum" type="date" id="geburtsdatum" name="geburtsdatum" style="width: 0px; height: 0px; margin: 0px; padding: 0px;">
        <label class="label" for="geburtsdatum" style="order: 3; width: 0px; height: 0px; margin: 0px; padding: 0px;">Geburtsdatum:</label>
        <button id="finalButton" class="first" onclick="registerphp()" style="order: 1; width: 0px; height: 0px; margin: 0px; padding: 0px;" disabled>Weiter</button>
    </container>
    <br>
</form>
<div class="errorHandlingMajor" style="order: 6; width: 0px; height: 0px; margin: 0px; padding: 0px;"> 
    <div class="errorHandlingMinor" id="vornameError" style="margin-top: 14%; order: 1; width: 0px; height: 0px; margin: 0px; padding: 0px;">Vorname darf nicht leer sein</div>
    <div class="errorHandlingMinor" id="nachnameError" style="margin-top: 15%; order: 2; margin-right: 5%; width: 0px; height: 0px; margin: 0px; padding: 0px;">Nachname darf nicht leer sein</div>
    <div class="errorHandlingMinor" id="geburtstagError" style="margin-top: 12%; margin-right: 5%; order: 3; width: 0px; height: 0px; margin: 0px; padding: 0px;">Geben Sie ein gültiges Datum ein</div>
</div>
-->
<script src="script.js"></script> 
<?php include 'footer.php'?>
</body>


</html>
