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
                    <select name="ort" class="form-select-2">
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
            </div>
        </form>
    </div>
</div>
</div>


<?php include 'footer.php'?>
</body>

</html>
