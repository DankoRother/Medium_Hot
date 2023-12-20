<?php
include("../dbConfig.php");
session_start();

// Add content type header
header('Content-Type: application/json');

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loginUsername = $_POST['loginUsername'];
    $loginPassword = $_POST['loginPassword']; // Remove password hashing during login

    // Create a PDO database connection with error handling
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die(json_encode(['status' => 'error', 'message' => 'Connection failed: ' . $e->getMessage()]));
    }

    // Check if the username exists in the database
    $stmt = $conn->prepare("SELECT userId, password FROM user WHERE username = :username");
    $stmt->bindValue(':username', $loginUsername);
    $stmt->execute();

    // Fetch the row as an associative array
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($loginPassword, $user['password'])) {
        // Password is correct
        $_SESSION['logged_in_userID'] = $user['userId'];    
        // Add this line to send the session variables in the response
        echo json_encode([
            'status' => 'success',
            'logged_in_userID' => $_SESSION['logged_in_userID'],
            'selected_car_id' => $_SESSION['selected_car_id']
        ]);
    } else {
        // Password is incorrect or username not found
        echo json_encode(['status' => 'error', 'message' => 'Incorrect username or password']);
    }
}
?>
