<?php 

if (isset($_POST['filtern']) || isset($_SESSION['location']) || isset($_POST['searchOrt']) || isset($_POST['location'])) {  // extented filter function

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

    $conditions = array();  // Array zum Sammeln von Bedingungen

    // Sammle Bedingungen basierend auf vorhandenen Werten
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
        $conditions[] = "cardetails.min_age >= :min_age";
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

    $sqlLocation = "SELECT vendordetails.vendor_name, cardetails.img, cardetails.name, cardetails.name_extension, cardetails.carId, cardetails.type, cardetails.price
                    FROM vendordetails
                    INNER JOIN cardetails ON vendordetails.vendorId = cardetails.vendorId
                    INNER JOIN carlocation ON carlocation.carId = cardetails.carId
                    INNER JOIN location ON location.locationId = carlocation.locationId
                    $whereClause
                    ORDER BY cardetails.price DESC";

        $stmt = $conn->prepare($sqlLocation);

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
        $resultCount = count($result);                                                //count results

    if ($resultCount > 0) {

        foreach ($result as $row) {
            ?><div class="output">
                <div class="output_img">
                    <img src="Bilder/bilder_db/<?php echo $row['img'];?>">             <!-- get IMG from Database -->
                </div>
            <div class="button_text">    
                <div class="output_text">
                    <?php echo $row['vendor_name'] . "<br>" . $row['type'] . " " . $row['name'] . " " . $row['name_extension'] . "<br>" . $row['price'] . " €/Tag"; ?>  <!-- show Info from Database -->
                </div>
                <div class="output_button">
                    <form action="Produktdetails.php" method="post">
                        <input type="hidden" name="carId" value="<?php echo $row['carId']; ?>">
                        <button type="submit">Jetzt Mieten</button>
                    </form>
                </div>
            </div>    
            </div>
            <?php 
        }
    } else { 
        ?><div class="no_result"><?php                                            
        echo "Leider gibt es für ihre Suche keine Treffer";?>
        </div> <?php //no results message
    }
    ?></div></div><?php
}
    
?>