<?php session_start() ?>

<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">       
        <title></title>                                                                         <!-- Standart HTML Settings -->
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="CSS/logout-screen.css"> 
    </head>

<?php include 'header.php'; ?>

<div class="divForBackground">
    <div class="headline">
        <h3>Log In</h3>
    </div>
    <div class="big-object-container">
        <div class="object-container">
            <div class="text-container">
                <h3>Sie wurden erfolgreich eingeloggt!</h3>
            </div>
            <div class="buttom-container">
                <div class="bottom">
                    <a href="home.php"><button class="home-button">Zurück zur Startseite</button></a>
                </div>    
                <div class="bottom-book">
                <?php if(isset($_SESSION['selected_car_id'])) { ?>
                    <a href="Produktdetails.php"><button class="book-button">Zurück zum Buchungsvorgang</button></a>
                  <?php } else {
                    
                  } ?>  
                </div>  
            </div>
        </div>
    </div> 
</div>

<?php include 'footer.php'; ?>

</html>