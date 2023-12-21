<?php
// Start the session
session_start();

// Check if the user is logged in, if not, redirect them to the login page
if (!isset($_SESSION['logged_in_userID'])) {
    if ($_SESSION['logged_in_userID'] == 0) {
        header("Location: login.php");
        exit();
    }
}

// Include your database connection file
include 'dbConfig.php';

// Retrieve user information from the database
$loggedInUserId = $_SESSION['logged_in_userID'];

// Prepare and execute the SELECT query to get the account data
$stmt = $conn->prepare("SELECT username, email, password, age, first_name, last_name FROM user WHERE userId = ?");
$stmt->bindParam(1, $loggedInUserId);
$stmt->execute();

// Fetch the result
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if the result is not empty
if ($result) {
    $loggedInUsername = $result['username'];
    $loggedInEmail = $result['email'];
    $loggedInPassword = $result['password'];
    $loggedInBirthday = $result['age'];
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
<html lang="en">
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
        <!--Structured in a table to make each element (data labels, data/input elements and buttons) appear in a straight line without needing to worry about margins-->
            <table>
                <!-- Username -->
                <tr>
                    <td class="firstTd">
                        <label class="label">Username:</label>
                    </td>
                    <td class="secondTd">
                        <h3 class="accountData" id="usernameData"><?php echo($loggedInUsername);?></h3>
                        <input class="input" type="text" id="username" name="username" style="display: none" placeholder="<?php echo($loggedInUsername); ?>">
                    </td>
                    <td class="thirdTd">
                        <input type="submit" class="editButton" id="editusername" onclick="editData('username')" value="Bearbeiten">
                        <input type="submit" class="submitButton" id="submitusername" onclick="submitData('username')" value="Absenden" disabled>
                    </td>
                </tr>
                <tr>
                    <td class="firstTd">
                        <label class="label">E-Mail:</label>
                    </td>
                    <td class="secondTd">
                        <h3 class="accountData" id="emailData"><?php echo($loggedInEmail);?></h3>
                        <input class="input" type="text" id="email" name="email" style="display: none" placeholder="<?php echo($loggedInEmail); ?>">
                    </td>
                    <td class="thirdTd">
                        <input type="submit" class="editButton" id="editemail" onclick="editData('email')" value="Bearbeiten">
                        <input type="submit" class="submitButton" id="submitemail" onclick="submitData('email')" value="Absenden" disabled>
                    </td>
                </tr>
                <tr>
                    <td class="firstTd">
                        <label class="label">Passwort:</label>
                    </td>
                    <td class="secondTd">
                        <h3 class="accountData" id="passwortData">*********</h3>
                        <input class="input" type="text" id="passwort" name="passwort" style="display: none">
                            </td>
                    <td class="thirdTd">
                        <input type="submit" class="editButton" id="editpasswort" onclick="editData('passwort')" value="Bearbeiten">
                        <input type="submit" class="submitButton" id="submitpasswort" onclick="submitData('passwort')" value="Absenden" disabled>
                    </td>
                </tr>
                <tr>
                    <td class="firstTd">
                        <label class="label">Vorname:</label>
                    </td>
                    <td class="secondTd">
                        <h3 class="accountData" id="vornameData"><?php echo($loggedInFirstName);?></h3>
                        <input class="input" type="text" id="vorname" name="vorname" style="display: none" placeholder="<?php echo($loggedInFirstName); ?>">
                    </td>
                    <td class="thirdTd">
                        <input type="submit" class="editButton" id="editvorname" onclick="editData('vorname')" value="Bearbeiten">
                        <input type="submit" class="submitButton" id="submitvorname" onclick="submitData('vorname')" value="Absenden" disabled>
                    </td>
                </tr>
                <tr>
                    <td class="firstTd">
                        <label class="label">Nachname:</label>
                    </td>
                    <td class="secondTd">
                        <h3 class="accountData" id="nachnameData"><?php echo($loggedInLastName);?></h3>
                        <input class="input" type="text" id="nachname" name="nachname" style="display: none" placeholder="<?php echo($loggedInLastName); ?>">
                    </td>
                    <td class="thirdTd">
                        <input type="submit" class="editButton" id="editnachname" onclick="editData('nachname')" value="Bearbeiten">
                        <input type="submit" class="submitButton" id="submitnachname" onclick="submitData('nachname')" value="Absenden" disabled>
                    </td>
                </tr>
                <tr>
                    <td class="firstTd">
                        <label class="label">Geburtsdatum:</label>
                    </td>
                    <td class="secondTd">
                        <h3 class="accountData" id="birthdayData"><?php echo($loggedInBirthday);?></h3>
                    </td>
                    <td class="thirdTd"><input type="submit" class="submitButton" id="backButton" onclick="back(event)" value="Zurück"></td>
                </tr>
            </table>
            <br>
        </form>
    </div>
    <!-- Add additional content or links as needed -->
    <script src="js/myAccount.js"></script> 
    <?php include 'footer.php' ?>
</body>
</html>
