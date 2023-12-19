<?php 

$userID = $_SESSION['logged_in_userID'];

$resultsPerPage = 5;

// Ermittle die Gesamtanzahl der Ergebnisse
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

// Berechne die Gesamtanzahl der Seiten
$totalPages = ceil($totalResults / $resultsPerPage);

// Setze die aktuelle Seite
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $currentPage = (int)$_GET['page'];
} else {
    $currentPage = 1;
}

// Stelle sicher, dass die aktuelle Seite innerhalb des gültigen Bereichs liegt
if ($currentPage > $totalPages) {
    $currentPage = $totalPages;
} elseif ($currentPage < 1) {
    $currentPage = 1;
}


if ($totalResults > 0) {
// Berechne den OFFSET-Wert für die SQL-Abfrage
$offset = ($currentPage - 1) * $resultsPerPage;

// Hol dir die sichtbaren Ergebnisse für die aktuelle Seite
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

$visibleResults = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $visibleResults = 0;
}
?>