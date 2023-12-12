<?php session_start();?>
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
                                <tr onclick="showHideRow('hidden_row1');">
                                    <td>Booking Number</td>
                                    <td>Manufacturer and Model</td>
                                    <td>Price</td>
                                    <td>Start Date - End Date at Location</td>
                                </tr>
                                <tr id="hidden_row1" class="hidden_row">
                                    <td colspan=4>
                                        <div id="rowContent">Getriebe Antrieb x-Sitzer x-Türer GPS Klima Kofferraum Alter</div>
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
                                        Getriebee   · 	· 	·   Antrieb   · 	· 	·   x Sitze   · 	· 	·   x Türen   · 	· 	·   GPS   · 	· 	·   Kofferraum   · 	· 	·   Alter
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
            function showHideRow(row) {
                $("#" + row).toggle();
                adjustContainerHeight();
                if ($("#" + row).is(":visible")) {
                    justifyRowContent(row);
                }
            }

            function adjustContainerHeight() {
                var tableHeight = document.querySelector('.booking-table table').clientHeight;
                document.querySelector('.suchfilter').style.height = (tableHeight + 160) + 'px';
                var suchfilterHeight = document.querySelector('.suchfilter').clientHeight;
                var totalHeight = suchfilterHeight + 60; // Adjust padding as needed

                document.querySelector('.img-container').style.height = totalHeight + 'px';
            }

            // Initial adjustment when the page loads
            adjustContainerHeight();

            // Hide the rows by default
            $(document).ready(function () {
                $('.hidden_row').hide();
            });
            // Function to justify the row content
            function justifyRowContent(rowId) {
                console.log('Justify function called for row:', rowId);
                var rowContent = document.getElementById(rowId).querySelector('#rowContent');
                var words = rowContent.innerText.split(' ');
                rowContent.innerHTML = '';

                words.forEach(function (word) {
                    var span = document.createElement('span');
                    span.textContent = word + ' ';
                    span.style.display = 'inline-block';
                    /*span.style.marginRight = '5px'; <---- wenn die einzelnen Wörter lieber enger zusammen anstatt über die Breite verteilt werden sollen*/
                    rowContent.appendChild(span);
                });
                rowContent.style.display = 'flex'; // <---- wenn span.style.marginRight eingefügt wird, diese Zeile löschen
                rowContent.style.justifyContent = 'space-between'; // <---- wenn span.style.marginRight eingefügt wird, diese Zeile löschen
            }
        </script>

    </body>
