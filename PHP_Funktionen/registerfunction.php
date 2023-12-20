<?php
session_start();
include("../dbConfig.php");

if (isset($_POST)) {
    $usernameInput = $_POST['username'];
    $emailInput = $_POST['email'];
    $passwordInput = password_hash($_POST['passwort'], PASSWORD_DEFAULT);
    $vornameInput = $_POST['vorname'];
    $nachnameInput = $_POST['nachname'];
    $geburtstagInput = $_POST['geburtsdatum'];

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
            // Redirect to registrationresult.php with status
            $status = '';

            if ($emailExists && $usernameExists) {
                $status = 'both_exist';
            } elseif ($emailExists) {
                $status = 'email_exists';
            } elseif ($usernameExists) {
                $status = 'username_exists';
            }

            $response = ['status' => 'error', 'message' => $status];
            error_log(json_encode($response));
            echo json_encode($response);
            exit();
        } else {
            // Insert data into the users table using prepared statement
            $stmt = $conn->prepare("INSERT INTO user (username, email, password, age, first_name, last_name) VALUES (?, ?, ?, ?, ?, ?)");

            // Bind parameters
            $stmt->bindParam(1, $usernameInput);
            $stmt->bindParam(2, $emailInput);
            $stmt->bindParam(3, $passwordInput);
            $stmt->bindParam(4, $geburtstagInput);
            $stmt->bindParam(5, $vornameInput);
            $stmt->bindParam(6, $nachnameInput);

            // Execute the statement
            if ($stmt->execute()) {
                $response = ['status' => 'success'];
                error_log(json_encode($response));
                echo json_encode($response);
                $stmt2 = $conn->prepare("SELECT userId FROM user WHERE username = :username");
                $stmt2->bindParam(':username', $usernameInput);
                $stmt2->execute();
                $user = $stmt2->fetch(PDO::FETCH_ASSOC);
                if ($user) {
                    // Assuming userId is an integer; change the type accordingly if it's different
                    $_SESSION['logged_in_userID'] = (int) $user['userId'];
                } else {
                    // Handle the case when the username is not found
                    $_SESSION['logged_in_userID'] = null;
                }
                exit();
            } else {
                $response = ['status' => 'error', 'message' => 'Error inserting data'];
                error_log(json_encode($response));
                echo json_encode($response);
                exit();
            }

            // Close the statement
            $stmt->closeCursor();
        }
    } catch (PDOException $e) {
        $response = ['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()];
        error_log(json_encode($response));
    } finally {
        // Close the statements and the database connection
        $stmtEmail->closeCursor();
        $stmtUsername->closeCursor();
        $conn = null;
    }
}
?>