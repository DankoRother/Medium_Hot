<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">       
        <title>Produktdetails</title>                                                         <!-- Standart HTML Settings -->
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="CSS/Produktdetails.css"> 
    </head>

    <body>
    <?php include 'header.php'; ?>                                                           <!-- Including the header structure into the product details site -->
    <?php include 'dbConfig.php'; ?> 
    <?php
        if (isset($_GET['carId'])) {
            $selectedCarId = $_GET['carId'];
            // Jetzt kannst du $selectedCarId in deinem Code verwenden
            $_SESSION['selected_car_id'] = $selectedCarId;
        }

        if (isset($_SESSION['location'])) {
            $location = $_SESSION['location'];
        
            // Überprüfe, ob $selectedCarId und $location gesetzt sind
            if (isset($selectedCarId, $location)) {
                // Verwende vorbereitete Anweisungen, um SQL-Injektion zu verhindern
                $sqlLocation = "SELECT vendordetails.vendor_name, cardetails.*
                                FROM vendordetails
                                INNER JOIN cardetails ON vendordetails.vendorId = cardetails.vendorId
                                INNER JOIN carlocation ON carlocation.carId = cardetails.carId
                                INNER JOIN location ON location.locationId = carlocation.locationId
                                WHERE cardetails.carId = :selectedCarId AND location.location = :location";
        
                $stmt = $conn->prepare($sqlLocation);
        
                // Binden der Parameter
                $stmt->bindParam(':selectedCarId', $selectedCarId, PDO::PARAM_INT);
                $stmt->bindParam(':location', $location, PDO::PARAM_STR);
        
                $stmt->execute();
        
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
                // Jetzt kannst du $result verwenden, um auf die Daten zuzugreifen
            }
        } else {

        }

    ?>
<?php if (!empty($result)) {
    $row = $result[0]; // Erster Datensatz
 ?>
        <div class="divForBackground">                                                       <!-- Creating a div for the background  -->
            <div class="divDesignForHeader"> <h3> Produktdetails </h3></div>                 <!-- Creating a div structure for the Heading  -->
            <div class="flex-container">                                                     <!-- Creating a div container for the following div 'divforheading'  -->
                <div class="divForHeading">                                                  <!-- Creating a div for the heading  -->
                     <h3> Das Fahrzeug ist vom <?php echo $_SESSION['start_date']?> bis zum <?php echo $_SESSION['end_date']?> am ausgewählten Standort <?php echo $_SESSION['location']?> verfügbar (Anzahl: N/A) </h3>         <!-- This part is the heading with certain elements specified in the css  -->
                     <hr class="line1">
                </div>
            </div>
            <div class="flex-container2">                                                     <!-- Creating a div container which includes two divs and a table for structuring  -->
                <div class="divDesignForImage"> <img src="Bilder/bilder_db/<?php echo $row['img']; ?>">
                </div>
                <div class="divDesignForDescription"> 
                    <table style="width: 100%;">
                        <tr>
                            <td class="td">  <h3 class="h3ForDescription "> Hersteller: <?php echo $row['vendor_name']; ?></h3></td>
                            <td class="td"> <h3 class="h3ForDescription "> Sitzplätze:</h3></td>           
                        </tr>
                        <tr>
                            <td class="td"> <h3 class="h3ForDescription "> Typ: <?php echo $row['type']; ?></h3></td>
                            <td class="td"> <h3 class="h3ForDescription "> Kofferraum: <?php echo $row['trunk']; ?> Koffer</h3></td>           
                        </tr>
                        <tr>
                            <td class="td"> <h3 class="h3ForDescription "> Kraftstoff:</h3></td>
                            <td class="td"> <h3 class="h3ForDescription "> Klimaanlage:</h3></td>           
                        </tr>
                        <tr>
                            <td class="td"> <h3 class="h3ForDescription "> Getriebe:</h3></td>
                            <td class="td"> <h3 class="h3ForDescription "> GPS:</h3></td>           
                        </tr>
                        <tr>
                            <td class="td"> <h3 class="h3ForDescription "> Türen:</h3></td>
                            <td class="td"> <h3 class="h3ForDescription "> Mindestalter:</h3></td>           
                        </tr>
                        
                    </table>
                </div>
            </div>
            <div class="flex-container3">                                                       <!-- Creating a div container which includes one div. The div is used for structuring and styling the h3 text -->
                <div class="divDesignForPrice"> <h3 class="h3ForPrice"> <?php echo $row['price'] ?>€/Tag</h3></div>
            <hr class="line2">
                
            </div>
            <div class="flex-container4">                                                       <!-- Creating a div container which includes two divs. The divs are used for structuring and styling the h3 texts -->
                <div class="divDesignForBackToSelection"> <a href="mieten.php" style="text-decoration: none;"> <h3> Zurück zur Auswahl </h3></a></div>
                <div class="divDesignForLogin"> <a href="login.php"><button class="button"> <h3 class="h3ForLogin"> Login </h3></button></a></div>
            </div>
        </div> <?php 
    }?>
        <?php include 'footer.php'; ?>      <!-- Including the footer structure into the product details site -->       
    </body>
</html>