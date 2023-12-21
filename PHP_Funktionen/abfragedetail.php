<?php
// Check if a carId is submitted via POST
if (isset($_POST['carId'])) {
    // Store the selected carId in the session
    $selectedCarId = $_POST['carId'];
    $available = $_POST['number'];
    $_SESSION['selected_car_id'] = $selectedCarId;
    $_SESSION['available_number'] = $available;

    // Use prepared statements to prevent SQL injection
    $sqlLocation = "SELECT vendordetails.vendor_name, cardetails.*, location.location, carlocation.carLocationId
                    FROM vendordetails
                    INNER JOIN cardetails ON vendordetails.vendorId = cardetails.vendorId
                    INNER JOIN carlocation ON carlocation.carId = cardetails.carId
                    INNER JOIN location ON location.locationId = carlocation.locationId
                    WHERE carlocation.carLocationId = :selectedCarId";

    $stmt = $conn->prepare($sqlLocation);

    // Bind parameters
    $stmt->bindParam(':selectedCarId', $selectedCarId, PDO::PARAM_INT);

    $stmt->execute();

    // Fetch the result set
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Now you can use $result to access the data
    
} 
// If carId is stored in the session
elseif (isset($_SESSION['selected_car_id'])) {
    // Retrieve the selected carId from the session
    $selectedCarId = $_SESSION['selected_car_id'];

    // Use prepared statements to prevent SQL injection
    $sqlLocation = "SELECT vendordetails.vendor_name, cardetails.*, location.location, carlocation.carLocationId
                    FROM vendordetails
                    INNER JOIN cardetails ON vendordetails.vendorId = cardetails.vendorId
                    INNER JOIN carlocation ON carlocation.carId = cardetails.carId
                    INNER JOIN location ON location.locationId = carlocation.locationId
                    WHERE carlocation.carLocationId = :selectedCarId";

    $stmt = $conn->prepare($sqlLocation);

    // Bind parameters
    $stmt->bindParam(':selectedCarId', $selectedCarId, PDO::PARAM_INT);

    $stmt->execute();

    // Fetch the result set
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} 
// If neither carId is submitted nor stored in the session
else {
    // No action is taken in this case
}
?>
