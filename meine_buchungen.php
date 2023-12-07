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
                                    <th>Stardatum bis Enddatum in Standort</th>
                                    <th></th> <!-- Empty th for the dropdown button column -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Booking Number 1</td>
                                    <td>Manufacturer and Model</td>
                                    <td>Price</td>
                                    <td>Start Date - End Date at Location</td>
                                </tr>                                                   <!-- You can dynamically generate rows for each booking -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'footer.php'; ?>
    </body>
