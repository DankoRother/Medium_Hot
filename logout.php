<?php
session_start();

if ($_SESSION['logged_in_userID'] > 0) {
    // User is logged in, perform the logout action
    // ... (any additional logout actions if needed)

    // Set the session variable to 0
    $_SESSION['logged_in_userID'] = 0;

    // Send a response (you can customize the response if needed)
    echo "Logout successful";
} else {
    // User is not logged in, handle accordingly
    echo "User is not logged in";
}
?>
