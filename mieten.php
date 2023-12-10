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
<?php include 'PHP_Funktionen/getValues.php'?>
    
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
        <form id="filter1" method="POST">
            <div class="filter_row">
                <div class="filter_bar">
                  <h2>Start:</h2>
                  <input type="text" class="form-control"  name="start_date" id="start_date" value="<?php echo $_SESSION['start_date']; ?>" required>
                </div>
                <div class="filter_bar">
                  <h2>Ende:</h2>
                  <input type="text" class="form-control" name="end_date" id="end_date" value="<?php echo $_SESSION['end_date']; ?>" required>
                </div>
                <div class="filter_bar">
                    <h2>Wo?</h2>
                    <select name="location" class="form-select" required>
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

<?php include 'PHP_Funktionen/editvalues.php'?>

<div class="filter-container-2">
    <div class="suchfilter-extended">
        <form id="filter2" action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST">
            <div class="filter-row-2">
                <div class="filter-bar-2">
                    <h3>Hersteller</h3>
                    <select name="vendor" class="form-select-2">
                        <option value="<?php setValues('vendor')?>"><?php setValues('vendor')?></option>
                        <option value="">Alle</option>
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
                        <option value="<?php setValues('type')?>"><?php setValues('type')?></option>
                        <option value="">Alle</option>
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
                    <input type="number" id="price" name="price" class="form-input-2" value="<?php setValues('price')?>" oninput="validatePrice(this)">
                    <h3>€/Tag</h3>
                </div>
            </div>

            

            <div id="filter2">
                <div class="filter-row-3">

                    <div class="filter-bar-2">
                        <h3>Getriebe</h3>
                        <select name="gear" class="form-select-2">
                            <option value="<?php setValues('gear')?>"><?php setValues('gear')?></option>
                            <option value="">Alle</option>
                            <option value="manually">manually</option>
                            <option value="automatic">automatic</option>
                        </select>
                    </div>

                    <div class="filter-bar-2">
                        <h3>Antrieb</h3>
                        <select name="drive" class="form-select-2">
                            <option value="<?php setValues('drive')?>"><?php setValues('drive')?></option>
                            <option value="">Alle</option>
                            <option value="Combuster">Combuster</option>
                            <option value="Electric">Electric</option>
                        </select>
                    </div>

                    <div class="filter-bar-2">
                        <h3>Sitze</h3>
                        <select name="seats" class="form-select-2">
                            <option value="<?php setValues('seats')?>"><?php setValues('seats')?></option>
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
                            <option value="<?php setValues('doors')?>"><?php setValues('doors')?></option>
                            <option value="">/</option>
                            <option value="2">2</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>  
                </div>

                <div class="filter-row-4">
                    <div class="filter-bar-2">
                        <h3>Klima</h3>
                        <select name="air_condition" class="form-select-2">
                            <option value="<?php setValues('air_condition')?>"><?php setValues('air_condition')?></option>
                            <option value="">Egal</option>
                            <option value="Ja">Ja</option>
                        </select>
                    </div>
                    <div class="filter-bar-2">
                        <h3>GPS</h3>
                        <select name="gps" class="form-select-2">
                            <option value="<?php setValues('gps')?>"><?php setValues('gps')?></option>
                            <option value="">Egal</option>
                            <option value="Ja">Ja</option>
                        </select>
                    </div>

                    <div class="filter-bar-2">
                        <h3>Kofferraum mind.</h3>
                        <select name="trunk" class="form-select-2">
                            <option value="<?php setValues('trunk')?>"><?php setValues('trunk')?></option>
                            <option value="">/</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                        <h3>Koffer</h3>
                    </div>

                    <div class="filter-bar-2">
                        <h3>Alter ab</h3>
                        <select name="min_age" class="form-select-2">
                            <option value="<?php setValues('min_age')?>"><?php setValues('min_age')?></option>                          
                            <option value="">/</option>
                            <option value="18">18</option>
                            <option value="21">21</option>
                            <option value="25">25</option>
                        </select>
                        <h3>J.</h3>
                    </div> 
                </div>    
            </div>    

            <div class="filter-row-filter">
                <div class="filter_bar">
                    <input type="submit" value="Filtern" class="button_filter" name="filtern">
                    <input type="submit" value="Filter und Sortierung zurücksetzen" class="button_reset" onclick="resetForm()">
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

<?php include 'PHP_Funktionen/filterabfrage.php' ?>



<?php include 'footer.php'?>
</body>

</html>
