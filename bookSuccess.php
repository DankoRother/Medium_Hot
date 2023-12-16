<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">       
    <title>Produktdetails</title>                                                         <!-- Standart HTML Settings -->
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/bookSuccess.css"> 
</head>

<?php include 'header.php'; ?>

<?php include 'dbConfig.php';?> 

<?php $selectedCarId = $_SESSION['selected_car_id']; 
    
        // Verwende vorbereitete Anweisungen, um SQL-Injektion zu verhindern
        $sqlLocation = "SELECT vendordetails.vendor_name, cardetails.*, location.location, carlocation.carLocationId
                        FROM vendordetails
                        INNER JOIN cardetails ON vendordetails.vendorId = cardetails.vendorId
                        INNER JOIN carlocation ON carlocation.carId = cardetails.carId
                        INNER JOIN location ON location.locationId = carlocation.locationId
                        WHERE carlocation.carLocationId = :selectedCarId";
    
        $stmt = $conn->prepare($sqlLocation);
    
        // Binden der Parameter
        $stmt->bindParam(':selectedCarId', $selectedCarId, PDO::PARAM_INT);
    
        $stmt->execute();
    
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        
        unset($_SESSION['selected_car_id']);    ?>


<?php if (!empty($result)) {
    $row = $result[0]; // Erster Datensatz
 ?>
<div class="divForBackground">
    <div class="headline">
        <h3>Gute Fahrt!</h3>
    </div>
    <div class="big-object-container">
        <div class="object-container">
            <div class="text-container">
                <h3>Ihre Buchung vom <span class="highlight"><?php echo $_SESSION['start_date']?>
                        </span> bis zum <span class="highlight"><?php echo $_SESSION['end_date']?>
                        </span> in <span class="highlight"><?php echo $row['location']?>
                        </span> war erfolgreich!</h3>
            </div>
            <div class="img-car">
                <img src="Bilder/bilder_db/<?php echo $row['img']?>">
            </div>
            <div class="text-car">
                <h3><?php echo $row['vendor_name']. " " . $row['name'] . " " . $row['name_extension'] ?></h3>
            </div>
            <div class="buttom-container">
                <div class="bottom">
                    <a href="home.php"><button class="home-button">Zurück zur Startseite</button></a>
                </div>    
                <div class="bottom-book">
                    <a href="meine_buchungen.php"><button class="book-button">Zu ihren Buchungen</button></a>
                </div>  
            </div>
        </div>
    </div> 
</div>
<?php } ?>

<?php include 'footer.php'; ?>

</html>