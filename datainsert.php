<?php
$servername = "localhost";
$username = "Danko1";
$password = "031520";
$dbname = "carsba";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assume $data is your user input
$data = "some data";

// Escape user input to prevent SQL injection
$escaped_data = $conn->real_escape_string($data);

// Your SQL query
$sql = "INSERT INTO your_table (column_name) VALUES ('$escaped_data')";

if ($conn->query($sql) === TRUE) {
    echo "Record inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
