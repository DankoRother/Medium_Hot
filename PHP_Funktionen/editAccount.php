<?php
// Include the database configuration file
include '../dbConfig.php';
// Start the session
session_start();

// Check if the user is logged in
if (isset($_SESSION['logged_in_userID'])) {
    // Get the user ID from the session
    $userID = $_SESSION['logged_in_userID'];

    // Retrieve the field and value from the AJAX request
    $field = $_POST['field'];
    $value = $_POST['value'];
    if($field == 'password') {
        $value = password_hash($value, PASSWORD_DEFAULT);
    }
    // Check if the new value already exists for email or username
    if (($field === "email" || $field === "username") && valueExists($conn, $field, $value)) {
        if($field === "email") {
            echo("Diese E-Mail ist bereits vergeben!");
        }
        if($field === "username"){
            echo("Dieser Username ist bereits vergeben!");
        }
    } else {
        // Update the user table in the database
        $query = "UPDATE user SET $field = :value WHERE userId = :userID";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':value', $value);
        $stmt->bindParam(':userID', $userID);

        // Execute the query
        if ($stmt->execute()) {
            echo "Data updated successfully";
        } else {
            echo "Error updating data";
        }
    }
} else {
    echo "User not logged in";
}

// Function to check if the value already exists in the database for email or username
function valueExists($conn, $field, $value) {
    try {
        $query = "SELECT COUNT(*) FROM user WHERE $field = :value";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':value', $value);
        $stmt->execute();

        $count = $stmt->fetchColumn();
        return $count > 0;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
