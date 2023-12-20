<?php 
$userID = $_SESSION['logged_in_userID'];
$stmt = $conn->prepare("SELECT TIMESTAMPDIFF(YEAR, date_of_birth, CURDATE()) AS age FROM user WHERE userId = :userId");
$stmt->bindParam(':username', $userID);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
if ($result) {
    $loggedInAge = $result['age'];
    echo $loggedInAge;
} else {
    $loggedInAge = 0;
    echo $loggedInAge;
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

                $checkExistingBookingsSQ = $conn->prepare($checkExistingBookingsSQL);
                $checkExistingBookingsSQ->bindParam(':carLocationID', $carLocationID);
                $checkExistingBookingsSQ->bindParam(':start_date', $start_date);
                $checkExistingBookingsSQ->bindParam(':end_date', $end_date);
                $checkExistingBookingsSQ->execute();
                $resultCheck = $checkExistingBookingsSQ->fetchColumn();


                        if ($resultCount == 0){
                        // Keine Überschneidungen gefunden, führe das INSERT-Statement aus
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
                } else {
                        ?> <div class="book-error-2"><h3><span class="dang-sign">&#9888;</span> Bereits vergeben innerhalb des Zeitraums!</h3></div> <?php  
                }
        
        
        
        } else {
                // Setze eine Fehlermeldung
                ?> <a href="login.php"><div class="book-error"><h3><span class="dang-sign">&#9888;</span> Bitte Logge dich ein!</h3></div></a> <?php
                }
                }
            
            ?>