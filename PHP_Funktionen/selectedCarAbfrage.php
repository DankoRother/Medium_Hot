<?php
// Retrieve the selected car ID from the session
$selectedCarId = $_SESSION['selected_car_id'];

// Use prepared statements to prevent SQL injection
$sqlLocation = "SELECT vendordetails.vendor_name, cardetails.*, location.location, carlocation.carLocationId
                FROM vendordetails
                INNER JOIN cardetails ON vendordetails.vendorId = cardetails.vendorId
                INNER JOIN carlocation ON carlocation.carId = cardetails.carId
                INNER JOIN location ON location.locationId = carlocation.locationId
                WHERE carlocation.carLocationId = :selectedCarId";

// Prepare the SQL statement
$stmt = $conn->prepare($sqlLocation);

// Bind the parameter
$stmt->bindParam(':selectedCarId', $selectedCarId, PDO::PARAM_INT);

// Execute the SQL statement
$stmt->execute();

// Fetch the result set into an associative array
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

unset($_SESSION['available_number']);
$_SESSION['selected_car_id'] = 0;

?>
