<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">       
        <title>Produktdetails</title>                                                         <!-- Standart HTML Settings -->
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="CSS/Produktdetails.css"> 
    </head>

    <body>
    <?php include 'header.php'; ?>

        <div class="divForBackground">
            <div class="divDesignForHeader"> <h3> Produktdetails </h3></div>
            <div class="flex-container">
                <div class="divForHeading">
                     <h3> Das Fahrzeug ist vom DD.MM.YYYY bis zum DD.MM.YYYY am ausgewählten Standort verfügbar (Anzahl: N/A) </h3>
                </div>
            </div>
            <div class="flex-container2">
                <div class="divDesignForImage"> <img src= Bilder\lambo.png alt="">
                </div>
                <div class="divDesignForDescription"> 
                    <table style="width: 100%;">
                        <tr>
                            <td class="td">  <h3 class="h3ForDescription "> Hersteller: </h3></td>
                            <td class="td"> <h3 class="h3ForDescription "> Sitzplätze:</h3></td>           
                        </tr>
                        <tr>
                            <td class="td"> <h3 class="h3ForDescription "> Klasse:</h3></td>
                            <td class="td"> <h3 class="h3ForDescription "> Stauraum:</h3></td>           
                        </tr>
                        <tr>
                            <td class="td"> <h3 class="h3ForDescription "> Kraftstoff:</h3></td>
                            <td class="td"> <h3 class="h3ForDescription "> Klimaanlage:</h3></td>           
                        </tr>
                        <tr>
                            <td class="td"> <h3 class="h3ForDescription "> Getriebe:</h3></td>
                            <td class="td"> <h3 class="h3ForDescription "> GPS:</h3></td>           
                        </tr>
                        <tr>
                            <td class="td"> <h3 class="h3ForDescription "> Türen:</h3></td>
                            <td class="td"> <h3 class="h3ForDescription "> Mindestalter:</h3></td>           
                        </tr>
                        
                    </table>
                </div>
            </div>
            <div class="flex-container3">
                <div class="divDesignForPrice"> <h3 class="h3ForPrice"> 00,00€/Tag</h3></div>
                
            </div>
            <div class="flex-container4">
                <div class="divDesignForBackToSelection"> <a href="#" style="text-decoration: none;"> <h3> Zurück zur Auswahl </h3></a></div>
                <div class="divDesignForLogin"> <a href="login.php"><button class="button"> <h3 class="h3ForLogin"> Login </h3></button></a></div>


            </div>
        </div>
        <?php include 'footer.php'; ?>
        
    </body>
</html>