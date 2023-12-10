<?php 
session_start(); 
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">       
        <title>Produktdetails</title>                                                         <!-- Standart HTML Settings -->
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="CSS/Produktdetails.css"> 
        <script language="javascript" type="text/javascript" src="mieten.js"></script>
    </head>

    <body>
    <?php include 'header.php'; ?>                                                           <!-- Including the header structure into the product details site -->
    <?php include 'dbConfig.php';
    echo $_SESSION['type'];?> 
    <?php
        if (isset($_POST['carId'])) {
            $selectedCarId = $_POST['carId'];
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
        
                // $result verwenden, um auf die Daten zuzugreifen
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
                     <h3> Das Fahrzeug ist vom <span class="highlight"><?php echo $_SESSION['start_date']?>
                    </span> bis zum <span class="highlight"><?php echo $_SESSION['end_date']?>
                    </span> am ausgewählten Standort <span class="highlight"><?php echo $_SESSION['location']?></span> verfügbar (Anzahl: N/A) </h3>         <!-- This part is the heading with certain elements specified in the css  -->
                     <hr class="line1">
                </div>
            </div>
            <div class="flex-container2">                                                     <!-- Creating a div container which includes two divs and a table for structuring  -->
                <div class="divDesignForImage"> 
                    <img src="Bilder/bilder_db/<?php echo $row['img']; ?>">
                </div>
                <div class="divDesignForDescription"> 
                    <table style="width: 100%;">
                        <tr>
                            <td class="td">  <h3 class="h3ForDescription "> Hersteller: <span class="thickness"><?php echo $row['vendor_name']; ?></span></h3></td>
                            <td class="td"> <h3 class="h3ForDescription "> Sitzplätze: <span class="thickness"><?php echo $row['seats']; ?></span></h3></td>           
                        </tr>
                        <tr>
                            <td class="td"> <h3 class="h3ForDescription "> Typ: <span class="thickness"><?php echo $row['type']; ?></span></h3></td>
                            <td class="td"> <h3 class="h3ForDescription "> Kofferraum: <span class="thickness"><?php echo $row['trunk']; ?> Koffer</span></h3></td>           
                        </tr>
                        <tr>
                            <td class="td"> <h3 class="h3ForDescription "> Kraftstoff: <span class="thickness"><?php echo $row['drive']; ?></span></h3></td>
                            <td class="td"> <h3 class="h3ForDescription "> Klimaanlage: <span class="thickness"><?php if($row['gps'] == 1){echo "Ja";}else {echo "Nein";};?></span></h3></td>           
                        </tr>
                        <tr>
                            <td class="td"> <h3 class="h3ForDescription "> Getriebe: <span class="thickness"><?php echo $row['gear']; ?></span></h3></td>
                            <td class="td"> <h3 class="h3ForDescription "> GPS: <span class="thickness"><?php if($row['gps'] == 1){echo "Ja";}else {echo "Nein";};?></span></h3></td>           
                        </tr>
                        <tr>
                            <td class="td"> <h3 class="h3ForDescription "> Türen: <span class="thickness"><?php echo $row['doors']; ?></span></h3></td>
                            <td class="td"> <h3 class="h3ForDescription "> Mindestalter: <span class="thickness"><?php echo $row['min_age']; ?> Jahre</span></h3></td>           
                        </tr>
                        
                    </table>
                </div>
            </div>
            <div class="flex-container3">                                                       <!-- Creating a div container which includes one div. The div is used for structuring and styling the h3 text -->
                <div class="divDesignForPrice"> <h3 class="h3ForPrice"> <?php echo $row['price'] ?>€/Tag</h3></div>
            <hr class="line2">
                
            </div>

            <div class="flex-container4">                                                       <!-- Creating a div container which includes two divs. The divs are used for structuring and styling the h3 texts -->
                <div class="divDesignForBackToSelection"><button type="button" onclick="backToSelection()">Zurück zur Auswahl</button></div>
                <div class="divDesignForLogin"> <a href="login.php"><button class="button"> <h3 class="h3ForLogin"> Login </h3></button></a></div>
            </div>

            <script>
            function backToSelection() {
            // Hier setzt du den Pfad zur gewünschten Seite
                var targetPage = "mieten.php";
  
            // Session-Variablen in den JavaScript-Code einfügen
                var start_date = "<?php echo $_SESSION['start_date']; ?>";
                var end_date = "<?php echo $_SESSION['end_date']; ?>";
                var location = "<?php echo $_SESSION['location']; ?>";
                var vendor = "<?php echo $_SESSION['vendor'];?>";
                var type = "<?php echo $_SESSION['type'];?>";
                var price = "<?php echo $_SESSION['price'];?>";
                var doors = "<?php echo $_SESSION['doors'];?>";
                var seats = "<?php echo $_SESSION['seats'];?>";
                var min_age = "<?php echo $_SESSION['min_age'];?>";
                var air_condition = "<?php echo $_SESSION['air_condition'];?>";
                var gps = "<?php echo $_SESSION['gps'];?>";
                var trunk = "<?php echo $_SESSION['trunk'];?>";
                var drive = "<?php echo $_SESSION['drive'];?>";
                var gear = "<?php echo $_SESSION['gear'];?>";



            // URL erstellen, Session-Variablen anhängen und zur Seite leiten
            window.location.href = targetPage + '?start_date=' + encodeURIComponent(start_date)
            + '&end_date=' + encodeURIComponent(end_date)
            + '&location=' + encodeURIComponent(location)
            + '&vendor=' + encodeURIComponent(vendor)
            + '&type=' + encodeURIComponent(type)
            + '&price=' + encodeURIComponent(price)
            + '&doors=' + encodeURIComponent(doors)
            + '&seats=' + encodeURIComponent(seats)
            + '&min_age=' + encodeURIComponent(min_age)
            + '&air_condition=' + encodeURIComponent(air_condition)
            + '&gps=' + encodeURIComponent(gps)
            + '&trunk=' + encodeURIComponent(trunk)
            + '&drive=' + encodeURIComponent(drive)
            + '&gear=' + encodeURIComponent(gear);
            }
        </script>
        </div> <?php 
    }?>
        <?php include 'footer.php'; ?>      <!-- Including the footer structure into the product details site -->       
    </body>
</html>