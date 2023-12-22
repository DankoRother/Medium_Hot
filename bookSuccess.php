<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">       
    <title>Buchung erfolgreich!</title>                                                         <!-- Standart HTML Settings -->
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/bookSuccess.css"> 
</head>

<?php 
// Including the 'header.php' file
include 'header.php'; 

// Including the 'dbConfig.php' file for database configuration
include 'dbConfig.php';

// Including the 'PHP_Funktionen/selectedCarAbfrage.php' file for car information retrieval
include 'PHP_Funktionen/selectedCarAbfrage.php' ?>


<?php 
// Checking if the $result variable is not empty
if (!empty($result)) {
    // Getting the first row from the result set
    $row = $result[0]; 
 ?>
  <!-- Container for the background -->
<div class="divForBackground">
     <!-- Headline section -->
    <div class="headline">
        <h3>Gute Fahrt!</h3>
    </div>
    <!-- Container for the main content -->
    <div class="big-object-container">
        <div class="object-container">
            <!-- Container for text information -->
            <div class="text-container">
                <h3>Ihre Buchung vom <span class="highlight"><?php echo $_SESSION['start_date']?>
                        </span> bis zum <span class="highlight"><?php echo $_SESSION['end_date']?>
                        </span> in <span class="highlight"><?php echo $row['location']?>
                        </span> war erfolgreich!</h3>
            </div>
             <!-- Container for car image -->
            <div class="img-car">
                <img src="Bilder/bilder_db/<?php echo $row['img']?>">
            </div>
            <!-- Container for car information -->
            <div class="text-car">
                <h3><?php echo $row['vendor_name']. " " . $row['name'] . " " . $row['name_extension'] ?></h3>
            </div>
            <!-- Container for buttons -->
            <div class="buttom-container">
                <div class="bottom">
                    <!-- Back to homepage button -->
                    <a href="home.php"><button class="home-button">Zurück zur Startseite</button></a>
                </div>    
                <div class="bottom-book">
                    <!-- Button to go to bookings page -->
                    <a href="meine_buchungen.php"><button class="book-button">Zu ihren Buchungen</button></a>
                </div>  
            </div>
        </div>
    </div> 
</div>
<?php } ?>

<!-- Include footer section -->
<?php include 'footer.php'; ?>

</html>