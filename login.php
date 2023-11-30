<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">       
    <title>Sign Up</title>                                                         <!-- Standart HTML Settings -->
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/login.css">      
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> 
    <?php
        $servername = "localhost";
        $username = "Danko1";
        $password = "031520";
        $dbname = "CarSBA";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        ?>
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
    <form onsubmit="loadNewContent()">
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
<?php
// Function to sanitize input and prevent SQL injection
function sanitizeInput($input) {
    global $conn;
    return mysqli_real_escape_string($conn, $input);
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize
    $userrnameinput = sanitizeInput($_POST['username']);
    $emailinput = sanitizeInput($_POST['email']);
    $passwordinput = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password
}
}
?>  
<?php include 'footer.php'?>
</body>
<script src="script.js"></script> 

</html>
