<?php
session_start();

// Check if the user is logged in, if not, redirect them to the login page
if (!isset($_SESSION['logged_in_userID'])) {
    header("Location: login.php");
    exit();
}

// Assuming you have a database connection named $conn
include 'dbConfig.php'; // Include your database connection file

// Retrieve user information from the database
$loggedInUserId = $_SESSION['logged_in_userID'];

// Prepare and execute a SELECT query
$stmt = $conn->prepare("SELECT username, email, age, first_name, last_name FROM user WHERE userId = ?");
$stmt->bindParam(1, $loggedInUserId);
$stmt->execute();

// Fetch the result
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if the result is not empty
if ($result) {
    $loggedInUsername = $result['username'];
    $loggedInEmail = $result['email'];
    $loggedInAge = $result['age'];
    $loggedInFirstName = $result['first_name'];
    $loggedInLastName = $result['last_name'];
} else {
    // Handle the case where user information is not found in the database
    // You might want to redirect or display an error message
    // For now, let's set default values
    $loggedInEmail = '';
    $loggedInAge = '';
    $loggedInFirstName = '';
    $loggedInLastName = '';
}

?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">       
    <title>My Account</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/myAccount.css">      
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> 

    <!-- Add any additional head content from your registration page -->

</head>
<body>
    <?php include 'header.php' ?>
    <br>
    <br>
    <br>
    <br>
    <div align="center">
        <h1 class="register"> Mein Konto </h1><br>
    </div>
    <br>
    <div class="roundedcorners" id="roundedcorners">
    <form method="POST"  id="registrationForm" onsubmit="submitForm(event)">
        <container style="display: flex; flex-direction: row; order: 1">
        <container class="flexLeft">
        <input class="input" type="text" id="username" name="username" style="order: 5" disabled>
        <label class="label" for="username" style="order: 6">Username:</label>
        <input class="input" type="text" id="email" name="email" style="order: 3">
        <label class="label" for="email" style="order: 4">E-Mail:</label>
        <input class="input" type="text" id="passwort" name="passwort" style="order: 1">
        <label class="label" for="passwort" style="order: 2">Passwort:</label>
        </container>
        <container class="flexRight">
                <input class="input" type="text" id="vorname" name="vorname" style="order: 6">
                <label class="label" for="vorname" style="order: 7;">Vorname:</label>
                <input class="input" type="text" id="nachname" name="nachname" style="order: 4;" >
                <label class="label" for="nachname" style="order: 5;">Nachname:</label>
                <input class="datum" type="date" id="geburtsdatum" name="geburtsdatum" style="order: 2;">
                <label class="label" for="geburtsdatum" style="order: 3;">Geburtsdatum:</label>
    </container>
    </container>
    <input id="submitButton" class="account" type="submit" style="order: 2;" name="submit" value="Bearbeiten" disabled>    
    <br>
    </form>
    </div>

    <!-- Add additional content or links as needed -->

    <?php include 'footer.php' ?>
</body>
</html>
