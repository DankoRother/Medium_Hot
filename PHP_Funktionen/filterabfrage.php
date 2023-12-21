<?php 
 // Extended filter function
if (isset($_POST['filtern']) || isset($_SESSION['location']) || isset($_POST['searchOrt']) || isset($_POST['location']) || isset($_POST['resetButton']) || isset($_POST['start_date']) || isset($_SESSION['start_date'])) {  // extented filter function

    ?><div class="output_background"><div class="container-output"><?php

        $start_date = $_SESSION['start_date'];         // setting filter variables 
        $end_date = $_SESSION['end_date'];
        $location = $_SESSION['location'];
        $vendor = $_SESSION['vendor'];
        $type = $_SESSION['type'];
        $price = $_SESSION['price'];
        $seats = $_SESSION['seats'];
        $gear = $_SESSION['gear'];
        $doors = $_SESSION['doors'];
        $min_age = $_SESSION['min_age'];
        $drive = $_SESSION['drive'];
        $air_condition = changeValues('air_condition');
        $gps = changeValues('gps');
        $trunk = $_SESSION['trunk'];

    $conditions = array();  // Array for collecting conditions

    // Collect conditions based on existing values
    if (!empty($vendor)) {
        $conditions[] = "vendordetails.vendor_name = :vendor";
    }
    if (!empty($type)) {
        $conditions[] = "cardetails.type = :type";
    }
    if (!empty($price)) {
        $conditions[] = "cardetails.price <= :price";
    }

    if (!empty($seats)) {
        $conditions[] = "cardetails.seats = :seats";
    }

    if (!empty($location)) {
        $conditions[] = "location.location = :location"; 
    }
    if (!empty($doors)) {
        $conditions[] = "cardetails.doors = :doors";
    }
    if (!empty($gear)) {
        $conditions[] = "cardetails.gear = :gear";
    }
    if (!empty($drive)) {
        $conditions[] = "cardetails.drive = :drive";
    }
    if (!empty($min_age)) {
        $conditions[] = "cardetails.min_age <= :min_age";
    }
    if (!empty($trunk)) {
        $conditions[] = "cardetails.trunk >= :trunk";
    }
    if (!empty($air_condition)) {
        $conditions[] = "cardetails.air_condition = :air_condition";
    }
    if (!empty($gps)) {
        $conditions[] = "cardetails.gps = :gps";
    }

    

    $whereClause = (!empty($conditions)) ? "WHERE " . implode(" AND ", $conditions) : "";

    $sortOrder = (isset($_POST['sort']) && !empty($_POST['sort'])) ? $_POST['sort'] : (isset($_SESSION['sort']) ? $_SESSION['sort'] : 'ASC');


     // SQL query to fetch results based on filters and conditions
    $sqlLocation = "SELECT carlocation.carLocationId, vendordetails.vendor_name, cardetails.img, cardetails.name, cardetails.name_extension, 
                    cardetails.carId, cardetails.type, cardetails.price
                    FROM vendordetails
                    INNER JOIN cardetails ON vendordetails.vendorId = cardetails.vendorId
                    INNER JOIN carlocation ON carlocation.carId = cardetails.carId
                    INNER JOIN location ON location.locationId = carlocation.locationId
                    $whereClause
                    ORDER BY cardetails.price $sortOrder";

        $stmt = $conn->prepare($sqlLocation);

         // Bind parameters for the prepared statement based on conditions

        if (!empty($vendor)) {
            $stmt->bindParam(':vendor', $vendor);
        }
        if (!empty($type)) {
            $stmt->bindParam(':type', $type);
        }
        if (!empty($price)) {
            $stmt->bindParam(':price', $price);
        }
        if (!empty($seats)) {
            $stmt->bindParam(':seats', $seats);
        }
        if (!empty($location)) {
            $stmt->bindParam(':location', $location);
        }
        if (!empty($doors)) {
            $stmt->bindParam(':doors', $doors); 
        }
        if (!empty($gear)) {
            $stmt->bindParam(':gear', $gear);
        }
        if (!empty($drive)) {
            $stmt->bindParam(':drive', $drive);
        }
        if (!empty($min_age)) {
            $stmt->bindParam(':min_age', $min_age);
        }
        if (!empty($trunk)) {
            $stmt->bindParam(':trunk', $trunk);
        }
        if (!empty($gps)) {
            $stmt->bindParam(':gps', $gps);
        }
        if (!empty($air_condition)) {
            $stmt->bindParam(':air_condition', $air_condition);
        }

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $resultCount = count($result);   
        
        

        if ($resultCount > 0) {
            $finalResults = array();
            // Check for existing bookings for the specified period and carLocationId
        
            foreach ($result as $row) {
                $start_date = date('Y-m-d', strtotime($_SESSION['start_date']));
                $end_date = date('Y-m-d', strtotime($_SESSION['end_date']));
                $carLocationID = $row['carLocationId'];
        
                
                $checkExistingBookingsSQL = "SELECT COUNT(*) as count FROM bookings 
                    WHERE carLocationId = :carLocationID 
                    AND (
                        (:start_date BETWEEN bookings.start AND bookings.end) OR
                        (:end_date BETWEEN bookings.start AND bookings.end) OR
                        (bookings.start BETWEEN :start_date AND :end_date) OR
                        (bookings.end BETWEEN :start_date AND :end_date)
                    )";
        
                $checkExistingBookingsSQ = $conn->prepare($checkExistingBookingsSQL);
                $checkExistingBookingsSQ->bindParam(':carLocationID', $carLocationID);
                $checkExistingBookingsSQ->bindParam(':start_date', $start_date);
                $checkExistingBookingsSQ->bindParam(':end_date', $end_date);
                $checkExistingBookingsSQ->execute();
                $resultCheck = $checkExistingBookingsSQ->fetchColumn();
        
                if ($resultCheck == 0) {
                    $finalResults[] = $row;
                }
            }
        
             // Pagination logic
            $resultsPerPage = 9;
            $totalResults = count($finalResults);
            $totalPages = ceil($totalResults / $resultsPerPage);
        
            // Determine the current page
            if (isset($_GET['page']) && is_numeric($_GET['page'])) {
                $currentPage = (int)$_GET['page'];
            } else {
                $currentPage = 1;
            }

         // Ensure the current page is within the valid range
            if ($currentPage > $totalPages) {
                $currentPage = $totalPages;
            } elseif ($currentPage < 1) {
                $currentPage = 1;
            }
            if(isset($_POST['filtern'])){
            $currentPage = isset($_POST['page']) ? (int)$_POST['page'] : 1; }

            if(isset($_POST['searchOrt'])){
            $currentPage = isset($_POST['page']) ? (int)$_POST['page'] : 1; }

            // Set the start index for slicing the visible results
            $startIndex = ($currentPage - 1) * $resultsPerPage;
            $visibleResults = array_slice($finalResults, $startIndex, $resultsPerPage);

            if (empty($finalResults)) {?>
                <div class="no_result">
                    <?php echo "Leider gibt es für ihre Suche in diesem Zeitraum keine Treffer"; ?>
                </div>
            <?php

            } else {
        
            foreach ($visibleResults as $row) { 
                // Output visible results?>
                <div class="output">
                    <div class="output_img">
                        <img src="Bilder/bilder_db/<?php echo $row['img']; ?>">
                    </div>
                    <div class="button_text">
                        <div class="output_text">
                            <?php echo $row['vendor_name'] . " " . $row['name'] . " " . $row['name_extension'] . "<br>" . $row['type'] . "<br>" . $row['price'] . " €/Tag"; ?>
                        </div>
                        <div class="output_button">
                            <form action="Produktdetails.php" method="post">
                                <input type="hidden" name="carId" value="<?php echo $row['carLocationId']; ?>">
                                <button type="submit">Jetzt Mieten</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } }
            

        } else { ?>
            <div class="no_result">
                <?php echo "Leider gibt es für ihre Suche keine Treffer"; ?>
            </div>
        <?php } ?>
</div><?php if ($resultCount > 0) {
            // Pagination-Links
            echo '<div class="pagination">';
            for ($i = 1; $i <= $totalPages; $i++) {
                $activeClass = ($i == $currentPage) ? 'active' : '';
                echo '<a class="' . $activeClass . '" href="?page=' . $i . '">' . $i . '</a>';
            }
            echo '</div>'; }
}
    
?>