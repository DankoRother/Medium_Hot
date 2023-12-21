<?php 
session_start(); 
?>
<!DOCTYPE html>
    <head>                                 <!-- Verlinkung zu Jquery -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>                                    <!-- Verlinkung zu Jquery -->
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>                                                                                              
  $(function() {
    // Initialize datepicker for the start date
    $("#start_date").datepicker({                                                                               //Codeabschnitt von Jquery: Eingabe von Datumswerten unter Berücksichitigung, dass zum Beispiel das Startdatum nicht größer als das Enddatum sein darf.
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 3,
      onClose: function(selectedDate) {
        // Set the minimum date for the end date based on the selected start date
        $("#end_date").datepicker("option", "minDate", selectedDate);
      }
    });

    // Initialize datepicker for the end date
    $("#end_date").datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 3,
      onClose: function(selectedDate) {
        // Set the maximum date for the start date based on the selected end date
        $("#start_date").datepicker("option", "maxDate", selectedDate);
      }
    });
  });
</script>
<?php include 'dbConfig.php'?>   <!-- Including the database configuration file -->

<?php include 'PHP_Funktionen/getValues.php'?>   <!-- Including a file for fetching values from the database -->

<?php include 'PHP_Funktionen/resetbutton.php'?>   <!-- Including a file for resetting button functionality -->

    
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">       
<title>Mieten</title>                                                                           <!-- standart HTML settings -->
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="CSS/mieten.css">                                                   <!-- CSS file import -->
<script language="javascript" type="text/javascript" src="js/mieten.js"></script>   

</head>

<body>
<!-- Including the header file -->
<?php include 'header.php'; ?>



<div class="img-container">

<!-- Filter Heading Section -->
<div class="filter-heading">
    <h2>Unsere Angebote</h2>
</div>

<!-- Filter Container Section -->
<div class="filter-container">
     <!-- Search filter -->
    <div class="suchfilter">                                                                            <!-- search filter -->
        <form id="filter1" method="POST">
            <!-- Filter Row Section -->
            <div class="filter_row">
                <!-- Start Date Filter -->
                <div class="filter_bar">
                  <h2>Start:</h2>
                  <!-- Set Startdate to today if is not set -->
                  <input type="text" class="form-control" name="start_date" id="start_date" value="<?php echo isset($_SESSION['start_date']) ? $_SESSION['start_date'] : date('m/d/Y');?>" required>
                </div>
                <!-- End Date Filter -->
                <div class="filter_bar">
                  <h2>Ende:</h2>
                  <!-- Set Enddate to tomorrow if is not set -->
                  <input type="text" class="form-control" name="end_date" id="end_date" value="<?php echo isset($_SESSION['end_date']) ? $_SESSION['end_date'] : date('m/d/Y', strtotime('+1 day')); ?>" required>
                </div>
                 <!-- Location Filter -->
                <div class="filter_bar">
                    <h2>Wo?</h2>
                    <select name="location" class="form-select">
                        <!-- always Echo the the set location -->
                    <option value="<?php echo isset($_SESSION['location']) ? $_SESSION['location'] : ''; ?>"><?php echo isset($_SESSION['location']) && !empty($_SESSION['location']) ? $_SESSION['location'] : 'Alle anzeigen'; ?></option>
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

                <!-- Submit and Reset Buttons -->
                <div class="filter_bar">
                    <input type="submit" value="Suchen" class="button_filter" name="searchOrt">
                    <input type="submit" class="button_reset" value="Alles zurücksetzen" name="resetAll">
                    <input type="hidden" name="page" value="1">
                </div>
            </div>
    </div>
</div>

<!-- Include PHP function to edit values in the follow part -->
<?php include 'PHP_Funktionen/editvalues.php';

?>

<!-- The code represents an HTML form for filtering car listings. -->


<div class="filter-container-2">
    <div class="suchfilter-extended">
         <!-- Form for filtering cars based on various criteria. -->
        <form id="filter2" action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST">
            <div class="filter-row-2">
                <!-- Filter options for car manufacturers. -->
                <div class="filter-bar-2">
                    <h3>Hersteller</h3>
                    <select name="vendor" class="form-select-2">
                        <!-- Selected manufacturer value is set and displayed dynamically. -->
                        <option value="<?php setValues('vendor')?>"><?php (setOutput('vendor'))?></option>
                        <option value="">Alle</option>
                        <!-- Options for various car manufacturers. -->
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

                <!-- Filter options for car types. -->
                <div class="filter-bar-2">
                    <h3>Typ</h3>
                    <select name="type" class="form-select-2">
                        <!-- Selected car type value is set and displayed dynamically. -->
                        <option value="<?php setValues('type')?>"><?php setOutput('type')?></option>
                        <option value="">Alle</option>
                        <option value="SUV">SUV</option>
                        <option value="Cabrio">Cabrio</option>
                        <option value="Coupe">Coupe</option>
                        <option value="Mehrsitzer">Mehrsitzer</option>
                        <option value="Limousine">Limousine</option>
                        <option value="Combi">Combi</option>
                    </select>
                </div>
                
                <!-- Filter options for maximum price. -->
                <div class="filter-bar-2">
                    <h3>Preis bis</h3>
                    <input type="number" id="price" name="price" class="form-input-2" value="<?php setValues('price')?>" oninput="validatePrice(this)"  placeholder="Betrag">
                    <h3>€/Tag</h3>
                </div>
            </div>

            
            <!-- Filter options for gear. -->
            <div id="filter2">
                <div class="filter-row-3">

                    <div class="filter-bar-2">
                        <h3>Getriebe</h3>
                        <select name="gear" class="form-select-2">
                            <option value="<?php setValues('gear')?>"><?php setOutput('gear')?></option>
                            <option value="">Alle</option>
                            <option value="manually">manually</option>
                            <option value="automatic">automatic</option>
                        </select>
                    </div>

                    <!-- Filter options for drive. -->
                    <div class="filter-bar-2">
                        <h3>Antrieb</h3>
                        <select name="drive" class="form-select-2">
                            <option value="<?php setValues('drive')?>"><?php setOutput('drive')?></option>
                            <option value="">Alle</option>
                            <option value="Combuster">Combuster</option>
                            <option value="Electric">Electric</option>
                        </select>
                    </div>

                    <!-- Filter options for seats. -->
                    <div class="filter-bar-2">
                        <h3>Sitze</h3>
                        <select name="seats" class="form-select-2">
                            <option value="<?php setValues('seats')?>"><?php setOutputNum('seats')?></option>
                            <option value="">/</option>
                            <option value="2">2</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                        </select>
                    </div>
                    
                    <!-- Filter options for doors. -->
                    <div class="filter-bar-2">
                        <h3>Türen</h3>
                        <select name="doors" class="form-select-2">
                            <option value="<?php setValues('doors')?>"><?php setOutputNum('doors')?></option>
                            <option value="">/</option>
                            <option value="2">2</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>  
                </div>

                <!-- Filter options for aircondition. -->
                <div class="filter-row-4">
                    <div class="filter-bar-2">
                        <h3>Klima</h3>
                        <select name="air_condition" class="form-select-2">
                            <option value="<?php setValues('air_condition')?>"><?php setOutputCon('air_condition')?></option>
                            <option value="">Egal</option>
                            <option value="Ja">Ja</option>
                        </select>
                    </div>

                    <!-- Filter options for GPS. -->
                    <div class="filter-bar-2">
                        <h3>GPS</h3>
                        <select name="gps" class="form-select-2">
                            <option value="<?php setValues('gps')?>"><?php setOutputCon('gps')?></option>
                            <option value="">Egal</option>
                            <option value="Ja">Ja</option>
                        </select>
                    </div>

                    <!-- Filter options for trunk. -->
                    <div class="filter-bar-2">
                        <h3>Kofferraum mind.</h3>
                        <select name="trunk" class="form-select-2">
                            <option value="<?php setValues('trunk')?>"><?php setOutputNum('trunk')?></option>
                            <option value="">/</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                        <h3>Koffer</h3>
                    </div>


                    <!-- Filter options for min age. -->
                    <div class="filter-bar-2">
                        <h3>Alter ab</h3>
                        <select name="min_age" class="form-select-2">
                            <option value="<?php setValues('min_age')?>"><?php setOutputNum('min_age')?></option>                          
                            <option value="">/</option>
                            <option value="18">18</option>
                            <option value="21">21</option>
                            <option value="25">25</option>
                        </select>
                        <h3>J.</h3>
                    </div> 
                </div>    
            </div>  
             <!-- Sorting options for car listings. -->  
            <?php setSort('sort'); ?>
            <div class="filter-row-filter">
                <div class="filter_bar">
                    <select name="sort" class="form-select-sort">
                        <!-- Selected sort order is set dynamically. -->  
                        <option value="ASC" <?php echo ($_SESSION['sort'] === 'ASC') ? 'selected' : ''; ?>>Preis Aufsteigend <span class="arrow">&#8593;</span></option>
                        <option value="DESC" <?php echo ($_SESSION['sort'] === 'DESC') ? 'selected' : ''; ?>>Preis Absteigend <span class="arrow">&#8595;</span></option>
                    </select>
                    <!-- Form submission buttons for filtering and resetting filters. -->
                    <input type="submit" value="Filtern" class="button_filter" name="filtern">
                    <input type="submit" value="Filter und Sortierung zurücksetzen" class="button_reset" name="resetButton">
                    <input type="hidden" name="page" value="1">
                </div>
            </div>
        </form>

         <!-- Button to show/hide additional filter options. -->
        <div class="filter-row-button">
                <div class="filter-bar-2">
                    <button onclick="show_hide()" class="button-more"><i id="chevron" class="fa fa-chevron-down"></i></button>
                </div>
        </div>
    </div>
</div>
</div>

<!-- PHP file for handling filter queries. -->
<?php include 'PHP_Funktionen/filterabfrage.php' ?>


<!-- Footer section. -->
<?php include 'footer.php'?>
</body>

</html>
