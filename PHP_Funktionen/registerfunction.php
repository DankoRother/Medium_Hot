
<script src="../script.js"></script>
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
            hideSecondShowFirst();
            // Email or username already exists
            if ($emailExists) {
                changeInputValue(emailInput, "E-Mail ist bereits vergeben");
            }
            if($usernameExists) {
                changeInputValue(usernameInput, "Username ist bereits vergeben");
            }
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