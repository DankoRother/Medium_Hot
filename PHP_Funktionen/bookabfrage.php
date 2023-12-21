<?php 
// Get the logged-in user ID and define results per page
$userID = $_SESSION['logged_in_userID'];
$resultsPerPage = 5;

// Determine the total number of results
$sqlCount = "SELECT *
             FROM vendordetails
             INNER JOIN cardetails ON vendordetails.vendorId = cardetails.vendorId
             INNER JOIN carlocation ON carlocation.carId = cardetails.carId
             INNER JOIN location ON location.locationId = carlocation.locationId
             INNER JOIN bookings ON bookings.carLocationId = carlocation.carLocationId
             WHERE bookings.userId = :userID";

$stmtCount = $conn->prepare($sqlCount);
$stmtCount->bindParam(':userID', $userID, PDO::PARAM_INT);
$stmtCount->execute();
$totalResults = $stmtCount->rowCount();

// Calculate the total number of pages
$totalPages = ceil($totalResults / $resultsPerPage);

// Set the current page
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $currentPage = (int)$_GET['page'];
} else {
    $currentPage = 1;
}

// Ensure that the current page is within the valid range
if ($currentPage > $totalPages) {
    $currentPage = $totalPages;
} elseif ($currentPage < 1) {
    $currentPage = 1;
}

// Check if there are any results
if ($totalResults > 0) {
    // Calculate the OFFSET value for the SQL query
    $offset = ($currentPage - 1) * $resultsPerPage;

    // Get the visible results for the current page
    $sqlLocation = "SELECT bookings.*, vendordetails.vendor_name, cardetails.*, location.location
                    FROM vendordetails
                    INNER JOIN cardetails ON vendordetails.vendorId = cardetails.vendorId
                    INNER JOIN carlocation ON carlocation.carId = cardetails.carId
                    INNER JOIN location ON location.locationId = carlocation.locationId
                    INNER JOIN bookings ON bookings.carLocationId = carlocation.carLocationId
                    WHERE bookings.userId = :userID
                    LIMIT :offset, :resultsPerPage";

    $stmt = $conn->prepare($sqlLocation);
    $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindParam(':resultsPerPage', $resultsPerPage, PDO::PARAM_INT);
    $stmt->execute();

    // Fetch the visible results
    $visibleResults = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    // If there are no results, set visibleResults to 0
    $visibleResults = 0;
}
?>
