<?php session_start();
$_SESSION['selected_car_id'] = 0; ?>
<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">       
        <title>Standorte</title>                                                                         <!-- Standart HTML Settings -->
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="CSS/standorte.css">                                                 <!-- CSS Data Import -->
    </head>

   <!-- Including the header -->
<body>
    <?php include 'header.php'; ?>
    
    <!-- Heading for the map section -->
    <div class="map-heading">
        <h1>Unsere Standorte</h1>
    </div>
    
    <!-- Container for the map and location pins -->
    <div class="map-container">
        <!-- Germany Map with location pins -->
        <div class="ger-map">
            <img src="Bilder/karte.png" alt="map">
            
            <!-- Pins representing different locations -->
            <div class="pin hamburg">
                <span>Hamburg</span>
            </div>
            <div class="pin berlin">
                <span>Berlin</span>
            </div>
            <div class="pin paderborn">
                <span>Paderborn</span>
            </div>
            <div class="pin rostock">
                <span>Rostock</span>
            </div>
            <div class="pin bielefeld">
                <span>Bielefeld</span>
            </div>
            <div class="pin bochum">
                <span>Bochum</span>
            </div>
            <div class="pin bremen">
                <span>Bremen</span>
            </div>
            <div class="pin dortmund">
                <span>Dortmund</span>
            </div>
            <div class="pin dresden">
                <span>Dresden</span>
            </div>
            <div class="pin freiburg">
                <span>Freiburg</span>
            </div>
            <div class="pin koeln">
                <span>Köln</span>
            </div>
            <div class="pin leipzig">
                <span>Leipzig</span>
            </div>
            <div class="pin muenchen">
                <span>München</span>
            </div>
            <div class="pin nuernberg">
                <span>Nürnberg</span>
            </div>
        </div>
    </div>

    <!-- Including the footer -->
    <?php include 'footer.php'; ?>
</body>
