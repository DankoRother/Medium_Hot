<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">       
        <title>Mieten</title>                                                                         <!-- Standart HTML Settings -->
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="CSS/mieten.css">                                             <!-- CSS Datei Import -->
    </head>

<body>
<?php include 'header.php'; ?>

<div class="img-container">

<div class="filter-heading">
    <h2>Unsere Angebote</h2>
</div>

<div class="filter-container">
    <div class="suchfilter">                                                                 <!--Suchfilter-->
        <form action="" method="GET">
            <div class="filter_row">
                <div class="filter_bar">
                  <h2>Start:</h2>
                  <input type="date" class="form-control">
                </div>
                <div class="filter_bar">
                  <h2>Ende:</h2>
                  <input type="date" class="form-control">
                </div>
                <div class="filter_bar">
                    <h2>Wo?</h2>
                    <select name="ort" class="form-select">
                        <option value=""></option>
                        <option value="">Hamburg</option>
                        <option value="">Bielefeld</option>
                        <option value="">Rostock</option>
                        <option value="">Bochum</option>
                        <option value="">Dortmund</option>
                        <option value="">Muenchen</option>
                        <option value="">Berlin</option>
                        <option value="">Dresden</option>
                        <option value="">Freiburg</option>
                        <option value="">Leipzig</option>
                        <option value="">Koeln</option>
                        <option value="">Nuernberg</option>
                        <option value="">Bremen</option>
                        <option value="">Paderborn</option>
                    </select>
                </div>
                <div class="filter_bar">
                    <button type="submit" class="button_filter">Suchen</button>
                    <a href="index.php" class="button_reset">Reset</a>
                </div>
            </div>
    </div>
</div>


<div class="filter-container-2">
    <div class="suchfilter-extended">
        <form action="" method="GET">
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
                        <option value="">SUV</option>
                        <option value="">Cabrio</option>
                        <option value="">Coupe</option>
                        <option value="">Mehrsitzer</option>
                        <option value="">Limosine</option>
                        <option value="">Combi</option>
                    </select>
                </div>
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
                    <h3>Türen</h3>
                    <select name="doors" class="form-select-2">
                        <option value=""></option>
                        <option value="">2</option>
                        <option value="">4</option>
                        <option value="">5</option>
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
                    <h3>Antrieb</h3>
                    <select name="drive" class="form-select-2">
                        <option value=""></option>
                        <option value="">Verbrenner</option>
                        <option value="">Elektro</option>
                    </select>
                </div>
                
            </div>
            <div class="filter-row-2">
                <div class="filter-bar-2">
                    <h3>Kofferraum</h3>
                    <select name="doors" class="form-select-2">
                        <option value=""></option>
                        <option value="">0</option>
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4</option>
                    </select>
                    <h3>L</h3>
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
                    <h3>Alter ab</h3>
                    <select name="min_age" class="form-select-2">
                        <option value=""></option>
                        <option value="">18</option>
                        <option value="">21</option>
                        <option value="">25</option>
                    </select>
                    <h3>Jahren</h3>
                </div>
                <div class="filter-bar-2">
                    <h3>Preis bis</h3>
                    <select name="price" class="form-select-2">
                        <option value=""></option>
                        <option value="">100</option>
                        <option value="">150</option>
                        <option value="">200</option>
                        <option value="">300</option>
                        <option value="">400</option>
                        <option value="">500</option>
                        <option value="">600</option>
                        <option value="">700</option>
                        <option value="">800</option>
                        <option value="">900</option>
                    </select>
                    <h3>€/Tag</h3>
                </div>
            </div>
            
        </form>
    </div>
</div>
</div>


<?php include 'footer.php'?>
</body>

</html>
