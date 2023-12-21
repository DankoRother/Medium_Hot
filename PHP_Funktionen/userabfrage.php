<?php 
// Check if the user is logged in
if (isset($_SESSION['logged_in_userID']) && $_SESSION['logged_in_userID'] > 0) { 

    // Retrieve the user ID from the session
    $userId = $_SESSION['logged_in_userID'];

    // SQL query to select user information based on user ID
    $sqluser = "SELECT *
                FROM user
                WHERE user.userId = :selectedUserId";
    
    // Prepare the SQL statement
    $stmt = $conn->prepare($sqluser);
    
    // Bind the parameter for the user ID
    $stmt->bindParam(':selectedUserId', $userId, PDO::PARAM_INT);
    
    // Execute the SQL statement
    $stmt->execute();
    
    // Fetch the result set into an associative array
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
