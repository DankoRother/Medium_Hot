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
                        <option value="">Hamburg</option>
                        <option value="">Hamburg</option>
                        <option value="">Hamburg</option>
                        <option value="">Hamburg</option>
                        <option value="">Hamburg</option>
                        <option value="">Hamburg</option>
                        <option value="">Hamburg</option>
                        <option value="">Hamburg</option>
                        <option value="">Hamburg</option>
                        <option value="">Hamburg</option>
                        <option value="">Hamburg</option>
                        <option value="">Hamburg</option>
                        <option value="">Hamburg</option>
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

    </div>
</div>


<?php include 'footer.php'?>
</body>

</html>
