<?php 
$userID = $_SESSION['logged_in_userID'];
$agestmt = $conn->prepare("SELECT TIMESTAMPDIFF(YEAR, age, CURDATE()) AS age FROM user WHERE userId = :userId");
$agestmt->bindParam(':userId', $userID);
$agestmt->execute();
$ageresult = $agestmt->fetch(PDO::FETCH_ASSOC);
if ($ageresult) {
    $loggedInAge = $ageresult['age'];
} else {
    $loggedInAge = 0;
}
if (isset($_POST['book'])) { 
        if (isset($_SESSION['logged_in_userID']) && $_SESSION['logged_in_userID'] > 0) {  
                $start_date = date('Y-m-d', strtotime($_SESSION['start_date']));
                $end_date = date('Y-m-d', strtotime($_SESSION['end_date']));
                $userID = $_SESSION['logged_in_userID'];
                $carLocationID = $_SESSION['selected_car_id'];

                // Überprüfen, ob es bereits Buchungen für den angegebenen Zeitraum und die carLocationId gibt
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

                $checkMinAge = "SELECT min_age FROM carDetails INNER JOIN carLocation ON carDetails.carID = carLocation.carId WHERE :selectedCar = carLocationId";
                $checkMinAge = $conn->prepare($checkMinAge);
                $checkMinAge->bindParam(':selectedCar', $carLocationID);
                $checkMinAge->execute();
                $minAge = $checkMinAge->fetchColumn();
                        if ($resultCount == 0){
                        // Keine Überschneidungen gefunden, führe das INSERT-Statement aus
                        if ($minAge <= $loggedInAge) {
                        $insertSQL = "INSERT INTO bookings (start, end, userId, carLocationId) VALUES (?, ?, ?, ?)";
                        
                        // Vorbereiten der INSERT-Anweisung
                        $insertStatement = $conn->prepare($insertSQL);

                        // Binden der Werte
                        $insertStatement->bindParam(1, $start_date, PDO::PARAM_STR);
                        $insertStatement->bindParam(2, $end_date, PDO::PARAM_STR);
                        $insertStatement->bindParam(3, $userID, PDO::PARAM_INT);
                        $insertStatement->bindParam(4, $carLocationID, PDO::PARAM_INT);

                        // Ausführen der vorbereiteten Anweisung
                        $insertStatement->execute();
                
                        ?><div class="book-success"><h3>&#9989; Die Buchung war erfolgreich!</h3></div> <?php
                        header("Location: bookSuccess.php");
                        exit;
                        }
                        else {
                                ?> <div class="book-error-2"><h3><span class="dang-sign">&#9888;</span> Erst ab <?php echo($minAge);?> buchbar!</h3></div> <?php  
                        }
                } else {
                        ?> <div class="book-error-2"><h3><span class="dang-sign">&#9888;</span> Bereits vergeben innerhalb des Zeitraums!</h3></div> <?php  
                }
        
        
        
        } else {
                // Setze eine Fehlermeldung
                ?> <a href="login.php"><div class="book-error"><h3><span class="dang-sign">&#9888;</span> Bitte Logge dich ein!</h3></div></a> <?php
                }
                }
            
            ?>