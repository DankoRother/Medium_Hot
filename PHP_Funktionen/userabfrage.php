<?php 
if (isset($_SESSION['logged_in_userID']) && $_SESSION['logged_in_userID'] > 0) { 

    $userId = $_SESSION['logged_in_userID'];

    $sqluser = "SELECT *
                FROM user
                WHERE user.userId = :selectedUserId";
    
    $stmt = $conn->prepare($sqluser);
    
    // Binden der Parameter
    $stmt->bindParam(':selectedUserId', $userId, PDO::PARAM_INT);
    
    $stmt->execute();
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>