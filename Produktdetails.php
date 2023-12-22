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
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="js/mieten.js"></script>
    </head>

    <body>
        <!-- Including the header structure into the product details site -->
    <?php include 'header.php'; 

// Include 'dbConfig.php' for database configuration settings
     include 'dbConfig.php';

    // Include 'abfragedetail.php' for querying details from the database
    include 'PHP_Funktionen/abfragedetail.php';

// Include 'book.php' for booking-related functionality
    include 'PHP_Funktionen/book.php'; ?>

    
<?php 
// Check if $result is not empty
if (!empty($result)) {
    $row = $result[0]; // Retrieve the first record from the result set
 ?>
  <!-- Start of the main container div with background -->
        <div class="divForBackground">  
             <!-- Container for heading -->                                                     <!-- Creating a div for the background  -->
            <div class="divDesignForHeader"> <h3> Produktdetails </h3></div>                 <!-- Creating a div structure for the Heading  -->
            <div class="flex-container">  
                 <!-- Div for heading with selected dates and location -->                                                   <!-- Creating a div container for the following div 'divforheading'  -->
                <div class="divForHeading">                                                  <!-- Creating a div for the heading  -->
                     <h3> Das Fahrzeug ist vom <span class="highlight"><?php echo $_SESSION['start_date']?>
                    </span> bis zum <span class="highlight"><?php echo $_SESSION['end_date']?>
                    </span> am ausgewählten Standort <span class="highlight"><?php echo $row['location']?></span> <?php echo  $_SESSION['available_number'];?> mal verfügbar</h3>         <!-- This part is the heading with certain elements specified in the css  -->
                     <hr class="line1">
                </div>
            </div>

            <!-- Container for image and description -->
            <div class="flex-container2">                                                     <!-- Creating a div container which includes two divs and a table for structuring  -->
                <div class="divDesignForImage"> 
                    <img src="Bilder/bilder_db/<?php echo $row['img']; ?>">
                </div>
                <div class="divDesignForDescription"> 
                    <table style="width: 100%;">
                     <!-- Row 1: Manufacturer and Seating Capacity -->
                        <tr>
                            <td class="td">  <h3 class="h3ForDescription "> Hersteller: <span class="thickness"><?php echo $row['vendor_name']; ?></span></h3></td>
                            <td class="td"> <h3 class="h3ForDescription "> Sitzplätze: <span class="thickness"><?php echo $row['seats']; ?></span></h3></td>           
                        </tr>
                          <!-- Row 2: Vehicle Type and Trunk Capacity -->
                        <tr>
                            <td class="td"> <h3 class="h3ForDescription "> Typ: <span class="thickness"><?php echo $row['type']; ?></span></h3></td>
                            <td class="td"> <h3 class="h3ForDescription "> Kofferraum: <span class="thickness"><?php echo $row['trunk']; ?> Koffer</span></h3></td>           
                        </tr>
                        <!-- Row 3: Fuel Type and Air Conditioning -->
                        <tr>
                            <td class="td"> <h3 class="h3ForDescription "> Kraftstoff: <span class="thickness"><?php echo $row['drive']; ?></span></h3></td>
                            <td class="td"> <h3 class="h3ForDescription "> Klimaanlage: <span class="thickness"><?php if($row['air_condition'] == 1){echo "Ja";}else {echo "Nein";};?></span></h3></td>           
                        </tr>
                        <!-- Row 4: Transmission and GPS -->
                        <tr>
                            <td class="td"> <h3 class="h3ForDescription "> Getriebe: <span class="thickness"><?php echo $row['gear']; ?></span></h3></td>
                            <td class="td"> <h3 class="h3ForDescription "> GPS: <span class="thickness"><?php if($row['gps'] == 1){echo "Ja";}else {echo "Nein";};?></span></h3></td>           
                        </tr>
                         <!-- Row 5: Doors and Minimum Age Requirement -->
                        <tr>
                            <td class="td"> <h3 class="h3ForDescription "> Türen: <span class="thickness"><?php echo $row['doors']; ?></span></h3></td>
                            <td class="td"> <h3 class="h3ForDescription "> Mindestalter: <span class="thickness"><?php echo $row['min_age']; ?> Jahre</span></h3></td>           
                        </tr>
                        
                    </table>
                </div>
            </div>

             <!-- Container for price and vendor name -->
            <div class="flex-container3">      
                <!-- Div for displaying the rental price -->                                                 <!-- Creating a div container which includes one div. The div is used for structuring and styling the h3 text -->
                <div class="divDesignForPrice"> <h3 class="h3ForPrice"> <?php echo $row['price'] ?>€/Tag</h3></div>
                           <!-- Div for displaying vendor and vehicle name -->
                <div class="divDesignForName"> <h3 class="h3ForPrice"> <?php echo $row['vendor_name']. " " . $row['name'] . " " . $row['name_extension'] ?></h3></div>
            <hr class="line2">
            </div>

            <!-- Container for buttons -->
            <div class="flex-container4">   
                <!-- Div for "Back to Selection" button -->                                                    <!-- Creating a div container which includes two divs. The divs are used for structuring and styling the h3 texts -->
                <div class="divDesignForBackToSelection"><a href="mieten.php"><button class="button-back"> <h3 class="h3ForLogin">Zurück zur Auswahl</h3></button></a></div>
                
                 <!-- Div for booking button within a form -->
                <div class="divDesignForLogin">
                   <form method="post"> 
                    <button type="submit" class="button" name="book"> <h3 class="h3ForLogin">Jetzt Buchen</h3></button>
                   <form></form> 
                </div>

            </div>

            

        </div> <?php 
    } else {?>
        <div class="no_booking">
            <h2>Keine laufende Buchung!</h2>
        </div>

        <script>
        // JavaScript zum Weiterleiten nach 5 Sekunden
        setTimeout(function() {
            window.location.href = 'mieten.php';
        }, 3000); // 5000 Millisekunden entsprechen 5 Sekunden
    </script>
    <?php } ?>
        <?php include 'footer.php'; ?>      <!-- Including the footer structure into the product details site -->       
    </body>
</html>