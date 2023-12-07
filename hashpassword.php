<?php
include("dbConfig.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password'])) {
    $password = $_POST['password'];

    // Hash the password (use appropriate password hashing algorithm, e.g., password_hash)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    echo json_encode(['status' => 'success', 'hashedPassword' => $hashedPassword]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}
?>
