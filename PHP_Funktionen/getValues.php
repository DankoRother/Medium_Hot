<?php
// Check if the session variables exist
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Load values into separate PHP variables

    // Load start date from the POST array, default to an empty string if not present
    $_SESSION['start_date'] = $_POST['start_date'] ?? "";

    // Load end date from the POST array, default to an empty string if not present
    $_SESSION['end_date'] = $_POST['end_date'] ?? "";

    // Load location from the POST array, default to an empty string if not present
    $_SESSION['location'] = $_POST['location'] ?? "";

    // Load vehicle type from the POST array, default to an empty string if not present
    $_SESSION['type'] = $_POST['type'] ?? "";
};
?>
