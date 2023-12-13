<?php 
session_start();

include '../dbConfig.php';

if (isset($_POST['start_date'], $_POST['end_date'], $_POST['userID'], $_POST['carLocationID'])) {
    // Verbindung zur Datenbank herstellen und SQL INSERT Befehl ausführen
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $userID = $_POST['userID'];
    $carLocationID = $_POST['carLocationID'];

                    $sql = "INSERT INTO bookings (start, end, userId, carLocationId) VALUES ('$start_date', '$end_date', $userID, $carLocationID)";

                    $conn->query($sql);

                    echo "Buchung erfolgreich!";
}  else {
    // Setze eine Fehlermeldung
    $errorMessage = "Bitte logge dich ein!";
}