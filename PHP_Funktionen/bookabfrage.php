<?php 


$userID = $_SESSION['logged_in_userID'];


$sqlLocation = "SELECT bookings.*, vendordetails.vendor_name, cardetails.*, location.location
                    FROM vendordetails
                    INNER JOIN cardetails ON vendordetails.vendorId = cardetails.vendorId
                    INNER JOIN carlocation ON carlocation.carId = cardetails.carId
                    INNER JOIN location ON location.locationId = carlocation.locationId
                    INNER JOIN bookings ON bookings.carLocationId = carlocation.carLocationId
                    WHERE bookings.userId = :userID";

        $stmt = $conn->prepare($sqlLocation);
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->execute();

       $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
       $resultCount = count($result);
        
        
        
        ?>