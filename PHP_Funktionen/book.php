<?php 

if (isset($_POST['book'])) {
        if (isset($_SESSION['logged_in_userID']) && $_SESSION['logged_in_userID'] > 0) {  
                $start_date = date('Y-m-d', strtotime($_SESSION['start_date']));
                $end_date = date('Y-m-d', strtotime($_SESSION['end_date']));
                $userID = $_SESSION['logged_in_userID'];
                $carLocationID = $_SESSION['selected_car_id'];

                // Überprüfen, ob es bereits Buchungen für den angegebenen Zeitraum und die carLocationId gibt
                $checkExistingBookingsSQL = "SELECT COUNT(*) as count FROM bookings 
                                 WHERE carLocationId = $carLocationID 
                                 AND (('$start_date' BETWEEN bookings.start AND bookings.end) OR ('$end_date' BETWEEN bookings.start AND bookings.end))";

                        $result = $conn->query($checkExistingBookingsSQL);

                        if ($result->num_rows == 0){
                        // Keine Überschneidungen gefunden, führe das INSERT-Statement aus
                        $insertSQL = "INSERT INTO bookings (start, end, userId, carLocationId) VALUES ('$start_date', '$end_date', $userID, $carLocationID)";

                        $conn->query($insertSQL);
                
                        ?><div class="book-success"><h3>&#9989; Die Buchung war erfolgreich!</h3></div> <?php
                        header("Location: bookSuccess.php");
                        exit;
                } else {
                        ?> <a href=""><div class="book-error"><h3><span class="dang-sign">&#9888;</span> Bereits vergeben innerhalb des Zeitraums!</h3></div></a> <?php  
                }
        
        
        
        } else {
                // Setze eine Fehlermeldung
                ?> <a href="login.php"><div class="book-error"><h3><span class="dang-sign">&#9888;</span> Bitte Logge dich ein!</h3></div></a> <?php
                }
                }
            
            ?>