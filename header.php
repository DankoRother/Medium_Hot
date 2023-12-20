<?php
$loginButtonText;
if (isset($_SESSION['logged_in_userID']) && $_SESSION['logged_in_userID'] > 0) {   
    $loginButtonText = "Logout";
    $loginButtonAction = 'onclick="logOut()"';
    $bookingButtonAction = 'onclick="myBookings()"';
    $class = "log-out";
}
else {
    $loginButtonText = "Login";
    $loginButtonAction = 'onclick="logIn()"';
    $bookingButtonAction = 'onclick="logIn()"'; //redirect to Log In if not logged in
    $class = "log";
}
?>
<?php include 'dbConfig.php'; ?>
<?php include 'PHP_Funktionen/userabfrage.php'; ?>
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
                        window.location.href = 'logout.php';
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
                    <li class="boxtext"><a href="home.php">Home</a></li>   
                    <li class="boxtext"><a href="standorte.php">Standorte</a></li>              
                    <li class="boxtext"><a href="mieten.php">Mieten</a></li>
                    <?php if (isset($_SESSION['logged_in_userID']) && $_SESSION['logged_in_userID'] > 0) { ?>
                    <li class="boxtext"><a <?php echo($bookingButtonAction);?>>Meine Buchungen</a></li>  
                    <?php } ?>                           <!--Navigation Links created--> 
                </ul>
            </nav>
            <nav id="autoleft">
                <ul class="nav__links">
                           <!--Hallo Message + Login created-->
                <?php if (isset($_SESSION['logged_in_userID']) && $_SESSION['logged_in_userID'] > 0) { 
                    ?><li class="boxtext"><a href="">Moin, <?php echo $result['first_name'] . "!"; }?></a></li>                   
                    <button class="<?php echo $class?>" <?php echo($loginButtonAction)?> enabled><?php echo $loginButtonText ?></button>
                </ul>
            </nav>
        </header>
</body>
</html>