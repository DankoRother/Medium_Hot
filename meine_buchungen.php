<?php session_start();

if (!isset($_SESSION['logged_in_userID'])) {
    // Wenn nicht, leite zur Login-Seite weiter
    header("Location: login.php");
    exit(); // Beende das Skript nach der Weiterleitung
}?>


<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">       
        <title>Meine Buchungen</title>                                                                         <!-- Standart HTML Settings -->
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="CSS/meine_buchungen.css">  
        <script language="javascript" type="text/javascript" src="mieten.js"></script>                                             <!-- CSS Datei Import -->
    </head>

    <body>
        <?php include 'header.php'; ?>
        <?php include 'dbConfig.php' ?>
        <?php include 'PHP_Funktionen/bookabfrage.php' ?>


        <div class="img-container">
            <div class="filter-container">
                <div class="suchfilter">
                    <div class="filter-heading">
                        <h2>Meine Buchungen</h2>
                    </div>
                    <div class="booking-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Buchungsnummer</th>
                                    <th>Hersteller und Modell</th>
                                    <th>Preis in €/Tag</th>
                                    <th>Buchungszeitraum</th>
                                </tr>
                            </thead>
                            <tbody>
                        <?php 
                        if ($visibleResults > 0) {

                                foreach ($visibleResults as $row) {
                                                                    // Datum in YYYY-MM-DD-Format
                                    $originalDateStart = $row['start'];
                                    $originalDateEnd = $row['end'];

                                    // Umwandlung in DateTime-Objekt
                                    $dateTimeStart = new DateTime($originalDateStart);
                                    $dateTimeEnd = new DateTime($originalDateEnd);

                                    // Formatierung in MM-DD-YYYY
                                    $formattedDateStart = $dateTimeStart->format('m/d/Y');
                                    $formattedDateEnd = $dateTimeEnd->format('m/d/Y'); 
                                    
                                    $uniqueId = 'hidden_row_' . $row['bookingId'];?>

                                    <tr class="mainline" onclick="showHideRow('<?php echo $uniqueId; ?>')">
                                        <td><?php echo $row['bookingId']?></td> <!-- Booking Number -->
                                        <td><?php echo $row['vendor_name'] . " " . $row['name'] . " " . $row['name_extension'] ?></td> <!-- Vendor Name, Name and Extension -->
                                        <td><?php echo $row['price']?></td> <!-- Price -->
                                        <td><?php echo $formattedDateStart . " bis " . $formattedDateEnd . " in " . $row['location']?></td> <!-- Start Date bis End Date in Location -->
                                    </tr>
                                    <tr id="<?php echo $uniqueId; ?>" class="hidden_row" style="display: none;">
                                        <td colspan=4>
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
                                    <?php }} else { ?> <tr><td colspan=4><div class="zeroresults"><h3>Noch keine Buchungen vorhanden!<h3></div></td></tr> <?php
                                        }?>
                            </tbody>
                        </table>
                    </div>
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

        <?php include 'footer.php'; ?>

    </body>
