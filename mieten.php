
<!DOCTYPE html>
    <head>
    <?php
    session_start();

    // Überprüfen, ob die Session-Variablen existieren
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Die Werte in separaten PHP-Variablen laden
        $start_date = $_POST['start_date'] ?? "";
        $end_date = $_POST['end_date'] ?? "";
        $location = $_POST['location'] ?? "";
    } else {
        // Standardwerte setzen, falls keine Session existiert
        $start_date = $end_date = $location = "";
    }
    ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">       
        <title>Mieten</title>                                                                           <!-- standart HTML settings -->
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="CSS/mieten.css">                                                   <!-- CSS file import -->
        <script language="javascript" type="text/javascript" src="mieten.js"></script>   
    </head>

<body>
<?php include 'header.php'; ?>

<?php include 'dbConfig.php'?>

<div class="img-container">

<div class="filter-heading">
    <h2>Unsere Angebote</h2>
</div>

<div class="filter-container">
    <div class="suchfilter">                                                                            <!-- search filter -->
        <form id="filter1" action="" method="POST">
            <div class="filter_row">
                <div class="filter_bar">
                  <h2>Start:</h2>
                  <input type="date" class="form-control"  name="start_date" value="<?php echo $start_date; ?>">
                </div>
                <div class="filter_bar">
                  <h2>Ende:</h2>
                  <input type="date" class="form-control" name="end_date" value="<?php echo $end_date; ?>">
                </div>
                <div class="filter_bar">
                    <h2>Wo?</h2>
                    <select name="location" class="form-select">
                    <option value="<?php echo $location; ?>"><?php echo $location; ?></option>
                    <option value="Hamburg">Hamburg</option>
                    <option value="Bielefeld">Bielefeld</option>
                    <option value="Rostock">Rostock</option>
                    <option value="Bochum">Bochum</option>
                    <option value="Dortmund">Dortmund</option>
                    <option value="Muenchen">Muenchen</option>
                    <option value="Berlin">Berlin</option>
                    <option value="Dresden">Dresden</option>
                    <option value="Freiburg">Freiburg</option>
                    <option value="Leipzig">Leipzig</option>
                    <option value="Koeln">Koeln</option>
                    <option value="Nuernberg">Nuernberg</option>
                    <option value="Bremen">Bremen</option>
                    <option value="Paderborn">Paderborn</option>  
                    </select>
                </div>
                <div class="filter_bar">
                    <input type="submit" value="Suchen" class="button_filter" name="searchOrt">
                    <input type="reset" class="button_reset" value="Zurücksetzen" onclick="">
                </div>
            </div>
    </div>
</div>


<div class="filter-container-2">
    <div class="suchfilter-extended">
        <form id="filter2" action="" method="POST">
            <div class="filter-row-2">
                <div class="filter-bar-2">
                    <h3>Hersteller</h3>
                    <select name="vendor" class="form-select-2">
                        <option value=""></option>
                        <option value="">Audi</option>
                        <option value="">BMW</option>
                        <option value="">Volkswagen</option>
                        <option value="">Mercedes-Benz</option>
                        <option value="">Ford</option>
                        <option value="">Range Rover</option>
                        <option value="">Mercedes-AMG</option>
                        <option value="">Opel</option>
                        <option value="">Jaguar</option>
                        <option value="">Maserati</option>
                        <option value="">Skoda</option>
                    </select>
                </div>
                <div class="filter-bar-2">
                    <h3>Typ</h3>
                    <select name="type" class="form-select-2">
                        <option value=""></option>
                        <option value="SUV">SUV</option>
                        <option value="cabrio">Cabrio</option>
                        <option value="coupe">Coupe</option>
                        <option value="mehrsitzer">Mehrsitzer</option>
                        <option value="limosine">Limosine</option>
                        <option value="combi">Combi</option>
                    </select>
                </div>
                <div class="filter-bar-2">
                    <h3>Preis bis</h3>
                    <input type="number" name="price" class="form-input-2">
                    <h3>€/Tag</h3>
                </div>
            </div>

            

            <div id="filter2">
                <div class="filter-row-3">
                    <div class="filter-bar-2">
                        <h3>Sitze</h3>
                        <select name="seats" class="form-select-2">
                            <option value=""></option>
                            <option value="">2</option>
                            <option value="">4</option>
                            <option value="">5</option>
                            <option value="">7</option>
                            <option value="">8</option>
                            <option value="">9</option>
                        </select>
                    </div>
                    <div class="filter-bar-2">
                        <h3>Getriebe</h3>
                        <select name="gear" class="form-select-2">
                            <option value=""></option>
                            <option value="">manually</option>
                            <option value="">automatic</option>
                        </select>
                    </div>
                    <div class="filter-bar-2">
                        <h3>Türen</h3>
                        <select name="doors" class="form-select-2">
                            <option value=""></option>
                            <option value="">2</option>
                            <option value="">4</option>
                            <option value="">5</option>
                        </select>
                    </div>
                    <div class="filter-bar-2">
                        <h3>Alter ab</h3>
                        <input type="number" name="min_age" class="form-input-2">
                        <h3>Jahren</h3>
                    </div> 
                </div>
                <div class="filter-row-4">
                    <div class="filter-bar-2">
                        <h3>Antrieb</h3>
                        <select name="drive" class="form-select-2">
                            <option value=""></option>
                            <option value="">Verbrenner</option>
                            <option value="">Elektro</option>
                        </select>
                    </div>
                    <div class="filter-bar-2">
                        <h3>Klima</h3>
                        <input name="air_condition" type="checkbox">
                    </div>
                    <div class="filter-bar-2">
                        <h3>GPS</h3>
                        <input name="gps" type="checkbox">
                    </div>
                    <div class="filter-bar-2">
                        <h3>Kofferraum</h3>
                        <select name="trunk" class="form-select-2">
                            <option value=""></option>
                            <option value="">0</option>
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                            <option value="">4</option>
                        </select>
                        <h3>m³</h3>
                    </div>
                </div>    
            </div>    

            <div class="filter-row-filter">
                <div class="filter_bar">
                    <input type="submit" value="Filtern" class="button_filter" name="filtern">
                    <input type="reset" value="Filterauswahl zurücksetzen" class="button_reset" onclick="document.getElementById('filter2').selectedIndex = 0">
                </div>
            </div>
            
        </form>
        <div class="filter-row-button">
                <div class="filter-bar-2">
                    <button onclick="show_hide()" class="button-more"><i id="chevron" class="fa fa-chevron-down"></i></button>
                </div>
            </div>
    </div>
</div>
</div>

<div class="container-output">
<?php 

if (isset($_POST['searchOrt'])) {

    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $location = $_POST['location'];

    $sqlLocation = "SELECT vendor_name, cardetails.type, name_extenstion FROM location;";
    $result = $conn->query($sqlLocation);
    $resultCheck = $result->rowCount();

    if ($resultCheck > 0) {
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            ?><div class="output">
                <div class="output_img">
                    <img src="<?php echo $row['img'];?>">
                </div>
                <div class="output_text">
                    <?php echo $row['vendor_name'] . "<br>" . $row['type'] . $row['name_extention'] . "<br>" . $row['price'] . " €/Tag"; ?>
                </div>
            </div>
            <?php 
        }
    } else {
        echo "Keine Treffer";
    }

}

?>

<?php 

if (isset($_POST['filtern'])) {

    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $location = $_POST['location'];
    $vendor = $_POST['vendor'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $seats = $_POST['seats'];
    $gear = $_POST['gear'];
    $doors = $_POST['doors'];
    $min_age = $_POST['min_age'];
    $drive = $_POST['drive'];
    $air_condition = $_POST['air_condition'];
    $gps = $_POST['gps'];
    $trunk = $_POST['trunk'];

    $sqlLocation = "SELECT vendor_name, cardetails.type, name_extenstion FROM location;";
    $result = $conn->query($sqlLocation);
    $resultCheck = $result->rowCount();

    if ($resultCheck > 0) {
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            ?><div class="output">
                <div class="output_img">
                    <img src="<?php echo $row['img'];?>">
                </div>
                <div class="output_text">
                    <?php echo $row['vendor_name'] . "<br>" . $row['type'] . $row['name_extention'] . "<br>" . $row['price'] . " €/Tag"; ?>
                </div>
            </div>
            <?php 
        }
    } else {
        echo "Keine Treffer";
    }

}

?>
</div>


<?php include 'footer.php'?>
</body>

</html>
