<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">       
    <title>Sign Up</title>                                                         <!-- Standart HTML Settings -->
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/login.css">      
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="script.js"></script>  
    <script>
        function preventFormSubmission(event) {
            event.preventDefault(); // Prevents the default form submission
            loadNewContent(); // Call your function to load new content
            return false;
        }
        
    </script>
</head>

<body>
<?php include 'header.php'?>
        <div align="center" class="dividiediv">
            <h1> Registrierung </h1><br>
        </div>
<?php
$servername = "localhost";
$username = "Danko1";
$password = "031520";
$dbname = "carsba";
?>
            <div id="contentContainer" class="roundedcorners">
                <form onsubmit="submitForm(event)">
                    <container class="flex">
                    <input class="input1" type="text" id="username" name="username">
                    <label class="label1" for="Username">Username:</label>
                    <input class="input2" type="text" id="email" name="email">
                    <label class="label2" for="email">E-Mail:</label>
                    <input class="input3" type="text" id="passwort" name="passwort">
                    <label class="label3" for="passwort">Passwort:</label>
                    <button id="weiterButton" class="first" onclick="loadNewContent()">Weiter</button>
                    </container>
                    <br>
                </form>
            </div>
<?php

?>

<?php include 'footer.php'?>

</body>
</html>
