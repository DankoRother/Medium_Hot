<?php
 // Database connection parameters
    $servername = "localhost";
    $username = "testuser23";
    $password = "paswort123!";
    $dbname = "carsba";

try {
    // Create a new PDO (PHP Data Objects) instance for database connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Set the PDO attribute to throw exceptions for errors
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    // If an exception occurs during the connection, catch and display the error message
    echo "Error: " . $e->getMessage();
}
?>