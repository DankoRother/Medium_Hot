<?php
session_start();
if ($_SESSION['logged_in_userID'] > 0) {
    // Set the session variable to 0
    $_SESSION['logged_in_userID'] = 0;
    // Set the selected car to 0
    $_SESSION['selected_car_id'] = 0;
 // Send a response (you can customize the response if needed)

} else {
    // User is not logged in, handle accordingly
}
?>

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
        <h3>Logout</h3>
    </div>
    <div class="big-object-container">
        <div class="object-container">
            <div class="text-container">
                <br>
                <h3>Sie wurden erfolgreich ausgeloggt!</h3>
            </div>
            <div class="buttom-container">
                <div class="bottom">
                    <a href="home.php"><button class="home-button">Zurück zur Startseite</button></a>
                </div>    
                <div class="bottom-book">
                    <a href="login.php"><button class="book-button">Zum Login</button></a>
                </div>  
            </div>
        </div>
    </div> 
</div>

<?php include 'footer.php'; ?>

</html>