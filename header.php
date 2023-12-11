<?php
session_start();
$loginButtonText;
if ($_SESSION['logged_in_userID'] > 0) {   
    $loginButtonText = "Log Out";
    # code...
}
else {
    # code...
    $loginButtonText = "Log In";
}
?>
<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">       
        <title></title>                                                                         <!-- Standart HTML Settings -->
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="CSS/header.css">                                             <!--CSS Datei Import -->
    </head>
<!-- Beginn der Webseite -->
    <body>
        <header>                                                                                <!--Nav Header-->
            <a href="home.php" class="boximg"><img class="logo" src="Bilder/LogoAuto.PNG" alt="logo" width=100px height=100px></a>   <!--Logo-->
            <nav id="f1">
                <ul class="nav__links">
                    <li class="boxtext"><a href="standorte.php">Standorte</a></li>              
                    <li class="boxtext"><a href="mieten.php">Mieten</a></li>                             <!--Navigation Links erstellt--> 
                </ul>
            </nav>
            <nav id="autoleft">
                <ul class="nav__links">
                    <li class="boxtext"><a href="meine_buchungen.php">Meine Buchungen</a></li>         <!--Meine Buchungen + Login erstellt-->                   
                    <li class="log"><a href="login.php"><button><?php echo $loginButtonText?></a></li>
                </ul>
            </nav>
        </header>
</body>
</html>