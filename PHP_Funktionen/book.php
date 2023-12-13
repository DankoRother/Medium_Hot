<?php 

if (isset($_POST['book'])) {
        if (isset($_SESSION['logged_in_userID']) && $_SESSION['logged_in_userID'] > 0) {  
                $start_date = date('Y-m-d', strtotime($_SESSION['start_date']));
                $end_date = date('Y-m-d', strtotime($_SESSION['end_date']));
                $userID = $_SESSION['logged_in_userID'];
                $carLocationID = $_SESSION['selected_car_id'];

                $sql = "INSERT INTO bookings (start, end, userId, carLocationId) VALUES ('$start_date', '$end_date', $userID, $carLocationID)";

                $conn->query($sql);

                ?><div class="book-success"><h3>&#9989; Die Buchung war erfolgreich!</h3></div> <?php
                header("Location: bookSuccess.php");
                exit;
                }  else {
                // Setze eine Fehlermeldung
                ?> <div class="book-error"><h3><span class="dang-sign">&#9888;</span> Bitte Logge dich ein!</h3></div> <?php
                }
                }
            
            ?>