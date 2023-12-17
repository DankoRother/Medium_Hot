<?php
    

    // Überprüfen, ob die Session-Variablen existieren
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Die Werte in separaten PHP-Variablen laden
        $_SESSION['start_date'] = $_POST['start_date'] ?? "";
        $_SESSION['end_date'] = $_POST['end_date'] ?? "";
        $_SESSION['location'] = $_POST['location'] ?? "";
        $_SESSION['type'] = $_POST['type'] ?? "";

    } 

?>