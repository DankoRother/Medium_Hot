<?php 
// Get the age of the logged-in user
if(isset($_SESSION['logged_in_userID'])) {
$userID = $_SESSION['logged_in_userID'];
$agestmt = $conn->prepare("SELECT TIMESTAMPDIFF(YEAR, age, CURDATE()) AS age FROM user WHERE userId = :userId");
$agestmt->bindParam(':userId', $userID);
$agestmt->execute();
$ageresult = $agestmt->fetch(PDO::FETCH_ASSOC);

// Check if the age information is retrieved successfully
if ($ageresult) {
    $loggedInAge = $ageresult['age'];
} else {
    $loggedInAge = 0; // Default age if not available
}

// Check if the 'book' form is submitted
if (isset($_POST['book'])) { 
    // Check if the user is logged in
    if (isset($_SESSION['logged_in_userID']) && $_SESSION['logged_in_userID'] > 0) {  
        // Get the start and end dates, user ID, and selected car location ID
        $start_date = date('Y-m-d', strtotime($_SESSION['start_date']));
        $end_date = date('Y-m-d', strtotime($_SESSION['end_date']));
        $userID = $_SESSION['logged_in_userID'];
        $carLocationID = $_SESSION['selected_car_id'];

        // Check for existing bookings within the specified period and car location
        $checkExistingBookingsSQL = "SELECT COUNT(*) as count FROM bookings 
        WHERE carLocationId = :carLocationID 
        AND (
            (:start_date BETWEEN bookings.start AND bookings.end) OR
            (:end_date BETWEEN bookings.start AND bookings.end) OR
            (bookings.start BETWEEN :start_date AND :end_date) OR
            (bookings.end BETWEEN :start_date AND :end_date)
        )";
        $checkExistingBookingsSQL = $conn->prepare($checkExistingBookingsSQL);
        $checkExistingBookingsSQL->bindParam(':carLocationID', $carLocationID);
        $checkExistingBookingsSQL->bindParam(':start_date', $start_date);
        $checkExistingBookingsSQL->bindParam(':end_date', $end_date);
        $checkExistingBookingsSQL->execute();
        $resultCount = $checkExistingBookingsSQL->fetchColumn();

        // Check minimum age requirement for booking
        $checkMinAge = "SELECT min_age FROM carDetails INNER JOIN carLocation ON carDetails.carID = carLocation.carId WHERE :selectedCar = carLocationId";
        $checkMinAge = $conn->prepare($checkMinAge);
        $checkMinAge->bindParam(':selectedCar', $carLocationID);
        $checkMinAge->execute();
        $minAge = $checkMinAge->fetchColumn();

        // If no booking overlaps and the user meets the minimum age requirement, insert the booking
        if ($resultCount == 0){
            if ($minAge <= $loggedInAge) {
                $insertSQL = "INSERT INTO bookings (start, end, userId, carLocationId) VALUES (?, ?, ?, ?)";
                
                // Prepare the INSERT statement
                $insertStatement = $conn->prepare($insertSQL);

                // Bind the values
                $insertStatement->bindParam(1, $start_date, PDO::PARAM_STR);
                $insertStatement->bindParam(2, $end_date, PDO::PARAM_STR);
                $insertStatement->bindParam(3, $userID, PDO::PARAM_INT);
                $insertStatement->bindParam(4, $carLocationID, PDO::PARAM_INT);

                // Execute the prepared statement
                $insertStatement->execute();
        
                // Display success message and redirect to bookSuccess.php
                ?><div class="book-success"><h3>&#9989; Die Buchung war erfolgreich!</h3></div> <?php
                header("Location: bookSuccess.php");
                exit;
            } else {
                // Display error message if user does not meet the minimum age requirement
                ?> <div class="book-error-2"><h3><span class="dang-sign">&#9888;</span> Erst ab <?php echo($minAge);?> buchbar!</h3></div> <?php  
            }
        } else {
            // Display error message if the car is already booked within the specified period
            ?> <div class="book-error-2"><h3><span class="dang-sign">&#9888;</span> Bereits vergeben innerhalb des Zeitraums!</h3></div> <?php  
        }
    } else {
        // Display error message if the user is not logged in
        ?> <a href="login.php"><div class="book-error"><h3><span class="dang-sign">&#9888;</span> Bitte Logge dich ein!</h3></div></a> <?php
    }
}}
?>
