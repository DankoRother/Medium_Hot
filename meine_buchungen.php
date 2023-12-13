<?php session_start();?>
<?php
// Placeholder data for a single booking
$placeholder_booking = [
    ["Booking Number 123", "Tesla", "Model S", "Electric", "150€", "2023-12-15", "2023-12-20", "Berlin"],
    // Add more bookings if needed
];
?>
<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">       
        <title>Meine Buchungen</title>                                                                         <!-- Standart HTML Settings -->
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="CSS/meine_buchungen.css">                                             <!-- CSS Datei Import -->
    </head>

    <body>
        <?php include 'header.php'; ?>


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
                                    <th>Preis</th>
                                    <th>Startdatum bis Enddatum in Standort</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($placeholder_booking as $booking) : ?>
                                    <tr onclick="showHideRow('hidden_row1');">
                                        <td><?= $booking[0] ?></td> <!-- Booking Number -->
                                        <td><?= $booking[1] . ' ' . $booking[2] . ' ' . $booking[3] ?></td> <!-- Vendor Name, Name and Extension -->
                                        <td><?= $booking[4] ?></td> <!-- Price -->
                                        <td><?= $booking[5] . ' bis ' . $booking[6] . ' in ' . $booking[7] ?></td> <!-- Start Date bis End Date in Location -->
                                    </tr>
                                <?php endforeach; ?>
                                    <tr id="hidden_row1" class="hidden_row">
                                        <td colspan=4>
                                            <div class="textfeld">
                                                <div>Getriebe</div>
                                                <div>Antrieb</div>
                                                <div>x Sitze</div>
                                                <div>x Türen</div>
                                                <div>GPS</div>
                                                <div>Klima</div>
                                                <div>Kofferraum</div>
                                                <div>Alter</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                    // Beispiel-Datenquelle - Hier könntest du deine tatsächliche Datenquelle einfügen
                                        $bookings = array(
                                            array("Booking Number 1", "Manufacturer and Model 1", "Price 1", "Start Date - End Date at Location 1"),
                                            array("Booking Number 2", "Manufacturer and Model 2", "Price 2", "Start Date - End Date at Location 2")
                                            // Füge weitere Buchungsdaten hier hinzu, basierend auf deiner Datenquelle
                                        );

                                        // Iteriere durch die Buchungsdaten und fülle die Tabelle
                                        foreach ($bookings as $booking) {
                                            echo "<tr>";
                                            foreach ($booking as $data) {
                                                echo "<td>$data</td>";
                                            }
                                            echo "</tr>";
                                        }
                                    ?>
                                    <tr onclick="showHideRow('hidden_row2');">
                                        <td>Booking Number</td>
                                        <td>Manufacturer and Model</td>
                                        <td>Price</td>
                                        <td>Start Date - End Date at Location</td>
                                    </tr>
                                    <tr id="hidden_row2" class="hidden_row">
                                        <td colspan=4>
                                            <div class="textfeld">
                                                <div>Getriebe</div>
                                                <div>Antrieb</div>
                                                <div>x Sitze</div>
                                                <div>x Türen</div>
                                                <div>GPS</div>
                                                <div>Klima</div>
                                                <div>Kofferraum</div>
                                                <div>Alter</div>
                                            </div>
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'footer.php'; ?>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            window.onload = function() {
                setTimeout(function() {
                    adjustContainerHeight();
                    $('.hidden_row').hide(); // Hide the rows by default
                }, 100); // Adjust delay time if needed
            };

            function showHideRow(row) {
                $("#" + row).toggle();
                adjustContainerHeight();
            }

            function adjustContainerHeight() {
                var tableHeight = document.querySelector('.booking-table table').clientHeight;
                document.querySelector('.suchfilter').style.height = (tableHeight + 160) + 'px';
                var suchfilterHeight = document.querySelector('.suchfilter').clientHeight;
                var totalHeight = suchfilterHeight + 60; // Adjust padding as needed

                document.querySelector('.img-container').style.height = totalHeight + 'px';
            }
        </script>

    </body>
