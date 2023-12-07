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
                                <tr>
                                    <td>Booking Number</td>
                                    <td>Manufacturer and Model</td>
                                    <td>Price</td>
                                    <td>Start Date - End Date at Location</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'footer.php'; ?>
    </body>
