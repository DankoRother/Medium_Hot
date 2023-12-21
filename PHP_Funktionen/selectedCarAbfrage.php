<?php $selectedCarId = $_SESSION['selected_car_id']; 
    
        // Verwende vorbereitete Anweisungen, um SQL-Injektion zu verhindern
        $sqlLocation = "SELECT vendordetails.vendor_name, cardetails.*, location.location, carlocation.carLocationId
                        FROM vendordetails
                        INNER JOIN cardetails ON vendordetails.vendorId = cardetails.vendorId
                        INNER JOIN carlocation ON carlocation.carId = cardetails.carId
                        INNER JOIN location ON location.locationId = carlocation.locationId
                        WHERE carlocation.carLocationId = :selectedCarId";
    
        $stmt = $conn->prepare($sqlLocation);
    
        // Binden der Parameter
        $stmt->bindParam(':selectedCarId', $selectedCarId, PDO::PARAM_INT);
    
        $stmt->execute();
    
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        
        unset($_SESSION['selected_car_id']);    ?>