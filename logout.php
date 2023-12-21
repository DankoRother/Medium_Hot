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
        <!-- Redirect to home after a while-->
        <script> setTimeout(function() {
            window.location.href = "home.php";
            }, 3000); </script>');
        </script>
    </head>

     <!-- Include the header -->
<?php include 'header.php'; ?>

<!-- Main content section -->
<div class="divForBackground">
    <div class="headline">
        <h3>Logout</h3>
    </div>
     <!-- Container for the logout success message and navigation buttons -->
    <div class="big-object-container">
        <div class="object-container">

        <!-- Text container for logout message -->
            <div class="text-container">
                <br>
                <h3>Sie wurden erfolgreich ausgeloggt!</h3>
            </div>
            <!-- Button container for navigation options -->
            <div class="buttom-container">

            <!-- Back to homepage button -->
                <div class="bottom">
                    <a href="home.php"><button class="home-button">Zurück zur Startseite</button></a>
                </div>  
                
                <!-- Login button -->
                <div class="bottom-book">
                    <a href="login.php"><button class="book-button">Zum Login</button></a>
                </div>  
            </div>
        </div>
    </div> 
</div>

<!-- Include the footer -->
<?php include 'footer.php'; ?>

</html>