<?php
    

    // Überprüfen, ob die Session-Variablen existieren
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Die Werte in separaten PHP-Variablen laden
        $_SESSION['start_date'] = $_POST['start_date'] ?? "";
        $_SESSION['end_date'] = $_POST['end_date'] ?? "";
        $_SESSION['location'] = $_POST['location'] ?? "";

    } 


    if (isset($_GET['start_date']) && isset($_GET['end_date']) && isset($_GET['location'])) {
        // Setze die Session-Variablen basierend auf den URL-Parametern
        $_SESSION['start_date'] = $_GET['start_date'];
        $_SESSION['end_date'] = $_GET['end_date'];
        $_SESSION['location'] = $_GET['location'];
    }
    

?>