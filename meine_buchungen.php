<?php session_start();

if (!isset($_SESSION['logged_in_userID'])) {
    // if is not set header to login page
    header("Location: login.php");
    exit(); // end script
}?>


<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">       
        <title>Meine Buchungen</title>                                                                         <!-- Standart HTML Settings -->
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="CSS/meine_buchungen.css">  <!-- CSS Data Import -->
        <script language="javascript" type="text/javascript" src="js/mieten.js"></script>          <!-- JS data Import -->                          
    </head>

    <body>
        <!-- Include the header -->
        <?php include 'header.php'; ?>
        <!-- Include the database connection -->
        <?php include 'dbConfig.php' ?>
        <!-- Include sql statement -->
        <?php include 'PHP_Funktionen/bookabfrage.php' ?>

<!-- Container for the background image -->
        <div class="img-container">
             <!-- Container for bookings -->
            <div class="filter-container">
                <!-- Booking container -->
                <div class="suchfilter">
                    <!-- Heading for booking section -->
                    <div class="filter-heading">
                        <h2>Meine Buchungen</h2>
                    </div>
                     <!-- Booking table container -->
                    <div class="booking-table">
                        <table>
                            <!-- Table header -->
                            <thead>
                                <tr>
                                    <th>Buchungsnummer</th>
                                    <th>Hersteller und Modell</th>
                                    <th>Gesamtpreisreis in €</th>
                                    <th>Buchungszeitraum</th>
                                </tr>
                            </thead>
                            <!-- Table body -->
                            <tbody>
                        <?php  // Loop through visible results
                        if ($visibleResults > 0) {

                                foreach ($visibleResults as $row) {
                                                                    // Datum in YYYY-MM-DD-Format
                                    $originalDateStart = $row['start'];
                                    $originalDateEnd = $row['end'];

                                    // change to DateTime-Object
                                    $dateTimeStart = new DateTime($originalDateStart);
                                    $dateTimeEnd = new DateTime($originalDateEnd);

                                    // change into MM-DD-YYYY
                                    $formattedDateStart = $dateTimeStart->format('m/d/Y');
                                    $formattedDateEnd = $dateTimeEnd->format('m/d/Y'); 

                                    //count days
                                    $dateDifference = $dateTimeStart->diff($dateTimeEnd);

                                    //add 1 day 
                                    $totalDays = $dateDifference->days + 1;

                                    // calculate total price for the whole timeperiod
                                    $totalPrice = $totalDays * $row['price'];
                                    
                                    $uniqueId = 'hidden_row_' . $row['bookingId'];?>
                                <!-- Main row with booking details, clickable to show/hide additional details -->
                                    <tr class="mainline" onclick="showHideRow('<?php echo $uniqueId; ?>')">
                                        <td><?php echo $row['bookingId']?></td> <!-- Booking Number -->
                                        <td><?php echo $row['vendor_name'] . " " . $row['name'] . " " . $row['name_extension'] ?></td> <!-- Vendor Name, Name and Extension -->
                                        <td><?php echo $totalPrice;?></td> <!-- Price -->
                                        <td><?php echo $formattedDateStart . " bis " . $formattedDateEnd . " in " . $row['location']?></td> <!-- Start Date to End Date at Location -->
                                    </tr>
                                    <!-- Additional details row, initially hidden -->
                                    <tr id="<?php echo $uniqueId; ?>" class="hidden_row" style="display: none;">
                                        <td colspan=4>
                                            <!-- Details about the booked vehicle -->
                                            <div class="textfeld">
                                                <div><?php if($row['gear'] == "manually"){echo "Schaltgetriebe";}else {echo "Automatik";};?></div>
                                                <div><?php echo $row['drive'] ?></div>
                                                <div><?php echo $row['seats'] ?> Sitze</div>
                                                <div><?php echo $row['doors'] ?> Türen</div>
                                                <div>GPS: <?php if($row['gps'] == 1){echo "Ja";}else {echo "Nein";};?></div>
                                                <div>Klima: <?php if($row['air_condition'] == 1){echo "Ja";}else {echo "Nein";};?></div>
                                                <div>Kofferraum: <?php echo $row['trunk'] ?> Koffer</div>
                                                <div>ab <?php echo $row['min_age'] ?> Jahren</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Displayed when there are no bookings -->
                                    <?php }} else { ?> <tr><td colspan=4><div class="zeroresults"><h3>Noch keine Buchungen vorhanden!<h3></div></td></tr> <?php
                                        }?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination section -->
                    <?php 
                    echo '<div class="pagination">';
                        for ($i = 1; $i <= $totalPages; $i++) {
                            $activeClass = ($i == $currentPage) ? 'active' : '';
                            echo '<a class="' . $activeClass . '" href="?page=' . $i . '">' . $i . '</a>';
                        }
                        echo '</div>';
                        ?>
                </div>
            </div>
        </div>
<!-- Include the footer -->
        <?php include 'footer.php'; ?>

    </body>
