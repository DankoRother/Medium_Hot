<?php
        if (isset($_POST['carId'])) {
            $selectedCarId = $_POST['carId'];
            // Jetzt kannst du $selectedCarId in deinem Code verwenden
            $_SESSION['selected_car_id'] = $selectedCarId;
        }

        if (isset($_SESSION['location'])) {
            $location = $_SESSION['location'];
        
            // Überprüfe, ob $selectedCarId und $location gesetzt sind
            if (isset($selectedCarId, $location)) {
                // Verwende vorbereitete Anweisungen, um SQL-Injektion zu verhindern
                $sqlLocation = "SELECT vendordetails.vendor_name, cardetails.*
                                FROM vendordetails
                                INNER JOIN cardetails ON vendordetails.vendorId = cardetails.vendorId
                                INNER JOIN carlocation ON carlocation.carId = cardetails.carId
                                INNER JOIN location ON location.locationId = carlocation.locationId
                                WHERE cardetails.carId = :selectedCarId AND location.location = :location";
        
                $stmt = $conn->prepare($sqlLocation);
        
                // Binden der Parameter
                $stmt->bindParam(':selectedCarId', $selectedCarId, PDO::PARAM_INT);
                $stmt->bindParam(':location', $location, PDO::PARAM_STR);
        
                $stmt->execute();
        
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
                // $result verwenden, um auf die Daten zuzugreifen
            }
        } else {

        }

?>