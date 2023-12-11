<?php
$loginButtonText;
if ($_SESSION['logged_in_userID'] > 0) {   
    $loginButtonText = "Log Out";
    $loginButtonAction = 'onclick="logOut()"';
    $bookingButtonText = "Meine Buchungen";
    $bookingButtonAction = 'onclick="myBookings()"';
}
else {
    $loginButtonText = "Log In";
    $loginButtonAction = 'onclick="logIn()"';
    $bookingButtonText = "Meine Buchungen";
    $bookingButtonAction = 'onclick="logIn()"'; //redirect to Log In if not logged in
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
        
        <script>
        function logOut() {
                // Use AJAX to perform a server-side logout action
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // Redirect to the login page after successful logout
                        window.location.href = 'home.php';
                    }
                };
                xhr.open('GET', 'logout.php', true);
                xhr.send();   
        }
        function logIn() {
            window.location.href = 'login.php';
        }
        function myBookings() {
            window.location.href = 'meine_buchungen.php';
        }
        </script>
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
                    <li class="boxtext"><a <?php echo($bookingButtonAction);?>>Meine Buchungen</a></li>         <!--Meine Buchungen + Login erstellt-->                   
                    <button class="log" <?php echo($loginButtonAction)?> enabled><?php echo $loginButtonText ?></button>
                </ul>
            </nav>
        </header>
</body>
</html>