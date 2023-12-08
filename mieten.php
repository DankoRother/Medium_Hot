<?php session_start(); ?>
<!DOCTYPE html>
    <head>                                 <!-- Verlinkung zu Jquery -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>                                    <!-- Verlinkung zu Jquery -->
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>                                                                                              
  $(function() {
    $("#start_date").datepicker({                                                                               //Codeabschnitt von Jquery: Eingabe von Datumswerten unter Berücksichitigung, dass zum Beispiel das Startdatum nicht größer als das Enddatum sein darf.
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 3,
      onClose: function(selectedDate) {
        $("#end_date").datepicker("option", "minDate", selectedDate);
      }
    });
    $("#end_date").datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 3,
      onClose: function(selectedDate) {
        $("#start_date").datepicker("option", "maxDate", selectedDate);
      }
    });
  });
</script>
    <?php include 'dbConfig.php'?>
    <?php
    

    // Überprüfen, ob die Session-Variablen existieren
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Die Werte in separaten PHP-Variablen laden
        $_SESSION['start_date'] = $_POST['start_date'] ?? "";
        $_SESSION['end_date'] = $_POST['end_date'] ?? "";
        $_SESSION['location'] = $_POST['location'] ?? "";

    } else {
        // Standardwerte setzen, falls keine Session existiert
        $_SESSION['start_date'] = $_SESSION['end_date'] = $_SESSION['location'] = "";
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
                  <input type="text" class="form-control"  name="start_date" id="start_date" value="<?php echo $_SESSION['start_date']; ?>">
                </div>
                <div class="filter_bar">
                  <h2>Ende:</h2>
                  <input type="text" class="form-control" name="end_date" id="end_date" value="<?php echo $_SESSION['end_date']; ?>">
                </div>
                <div class="filter_bar">
                    <h2>Wo?</h2>
                    <select name="location" class="form-select">
                    <option value="<?php echo $_SESSION['location']; ?>"><?php echo $_SESSION['location']; ?></option>
                    <option value="">Alle anzeigen</option>
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
                        <option value="<?php if (isset($_POST['vendor'])) {echo $_POST['vendor'];} ?>"><?php if (isset($_POST['vendor'])) {echo $_POST['vendor'];} ?></option>
                        <option value="">Alle anzeigen</option>
                        <option value="Audi">Audi</option>
                        <option value="BMW">BMW</option>
                        <option value="Volkswagen">Volkswagen</option>
                        <option value="Mercedes-Benz">Mercedes-Benz</option>
                        <option value="Ford">Ford</option>
                        <option value="Range Rover">Range Rover</option>
                        <option value="Mercedes-AMG">Mercedes-AMG</option>
                        <option value="Opel">Opel</option>
                        <option value="Jaguar">Jaguar</option>
                        <option value="Maserati">Maserati</option>
                        <option value="Skoda">Skoda</option>
                    </select>
                </div>
                <div class="filter-bar-2">
                    <h3>Typ</h3>
                    <select name="type" class="form-select-2">
                        <option value="<?php if (isset($_POST['type'])) {echo $_POST['type'];} ?>"><?php if (isset($_POST['type'])) {echo $_POST['type'];} ?></option>
                        <option value="">Alle anzeigen</option>
                        <option value="SUV">SUV</option>
                        <option value="Cabrio">Cabrio</option>
                        <option value="Coupe">Coupe</option>
                        <option value="Mehrsitzer">Mehrsitzer</option>
                        <option value="Limousine">Limousine</option>
                        <option value="Combi">Combi</option>
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
                        <h3>Getriebe</h3>
                        <select name="gear" class="form-select-2">
                            <option value=""></option>
                            <option value="">manually</option>
                            <option value="">automatic</option>
                        </select>
                    </div>

                    <div class="filter-bar-2">
                        <h3>Antrieb</h3>
                        <select name="drive" class="form-select-2">
                            <option value=""></option>
                            <option value="">Verbrenner</option>
                            <option value="">Elektro</option>
                        </select>
                    </div>

                    <div class="filter-bar-2">
                        <h3>Sitze</h3>
                        <select name="seats" class="form-select-2">
                            <option value="<?php if (isset($_POST['seats'])) {echo $_POST['seats'];} ?>"><?php if (isset($_POST['seats'])) {echo $_POST['seats'];} ?></option>
                            <option value="">/</option>
                            <option value="2">2</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
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
                </div>

                <div class="filter-row-4">
                    <input type="hidden" name="air_condition" value="0">
                    <div class="filter-bar-2">
                        <h3>Klima</h3>
                        <input name="air_condition" type="checkbox" value="1" <?php echo isset($_POST['air_condition']) && $_POST['air_condition'] == '1' ? 'checked' : ''; ?>>
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
                        <h3>Koffer</h3>
                    </div>

                    <div class="filter-bar-2">
                        <h3>Alter ab</h3>
                        <select name="min_age" class="form-select-2">
                            <option value=""></option>
                            <option value="">18</option>
                            <option value="">21</option>
                            <option value="">25</option>
                        </select>
                        <h3>Jahren</h3>
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

<?php 

if (isset($_POST['filtern']) || isset($_POST['location']) || isset($_POST['searchOrt'])) {  // extented filter function

    ?><div class="output_background"><div class="container-output"><?php

        $start_date = $_POST['start_date'];         // setting filter variables 
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
        $air_condition = isset($_POST['air_condition']) ? true : false;
        $gps = isset($_POST['gps']) ? $_POST['gps'] : '0';
        $trunk = $_POST['trunk'];
    
    

    $conditions = array();  // Array zum Sammeln von Bedingungen

    // Sammle Bedingungen basierend auf vorhandenen Werten
    if (!empty($vendor)) {
        $conditions[] = "vendordetails.vendor_name = :vendor";
    }
    if (!empty($type)) {
        $conditions[] = "cardetails.type = :type";
    }
    if (!empty($price)) {
        $conditions[] = "cardetails.price <= :price";
    }

    if (!empty($seats)) {
        $conditions[] = "cardetails.seats = :seats";
    }

    if (!empty($location)) {
        $conditions[] = "location.location = :location";
    }
    if (!empty($air_condition)) {
        $conditions[] = "cardetails.air_condition = :air_condition";
    }

    

    $whereClause = (!empty($conditions)) ? "WHERE " . implode(" AND ", $conditions) : "";

    $sqlLocation = "SELECT vendordetails.vendor_name, cardetails.img, cardetails.name, cardetails.name_extension, cardetails.carId, cardetails.type, cardetails.price
                    FROM vendordetails
                    INNER JOIN cardetails ON vendordetails.vendorId = cardetails.vendorId
                    INNER JOIN carlocation ON carlocation.carId = cardetails.carId
                    INNER JOIN location ON location.locationId = carlocation.locationId
                    $whereClause
                    ORDER BY cardetails.price DESC";

        $stmt = $conn->prepare($sqlLocation);

        if (!empty($vendor)) {
            $stmt->bindParam(':vendor', $vendor);
        }
        if (!empty($type)) {
            $stmt->bindParam(':type', $type);
        }
        if (!empty($price)) {
            $stmt->bindParam(':price', $price);
        }
        if (!empty($seats)) {
            $stmt->bindParam(':seats', $seats);
        }
        if (!empty($location)) {
            $stmt->bindParam(':location', $location);
        }
        if (!empty($air_condition)) {
            $stmt->bindParam(':air_condition', $air_condition, PDO::PARAM_BOOL);
        }


        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $resultCount = count($result);                                                //count results

    if ($resultCount > 0) {
        foreach ($result as $row) {
            ?><div class="output">
                <div class="output_img">
                    <img src="Bilder/bilder_db/<?php echo $row['img'];?>">             <!-- get IMG from Database -->
                </div>
            <div class="button_text">    
                <div class="output_text">
                    <?php echo $row['vendor_name'] . "<br>" . $row['type'] . " " . $row['name'] . " " . $row['name_extension'] . "<br>" . $row['price'] . " €/Tag"; ?>  <!-- show Info from Database -->
                </div>
                <div class="output_button">
                    <a href="Produktdetails.php"><button>Jetzt Mieten</button></a>
                </div>
            </div>    
            </div>
            <?php 
        }
    } else { 
        ?><div class="no_result"><?php                                            
        echo "Leider gibt es für ihre Suche keine Treffer";
        var_dump($_POST); ?>
        </div> <?php //no results message
    }
    ?></div></div><?php
}
    
?>



<?php include 'footer.php'?>
</body>

</html>
