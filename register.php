<?php session_start();?>

<!DOCTYPE html>
<head>
    <!-- Metadata settings for character encoding, IE compatibility, and viewport -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">       
    <title>Sign Up</title> <!-- Standard HTML settings -->
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Linking to the external stylesheet and jQuery library -->
    <link rel="stylesheet" href="CSS/register.css">   
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>   
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> 
</head>

<body>
    <!-- Including the header -->
    <?php include 'header.php'?>            
    <br>
    <br>
    <br>
    <br>
    <div align="center">
        <h1 class="register"> Registrieren </h1><br>
    </div>
    <br>
    <!-- Container for the registration form -->
    <div class="roundedcorners" id="roundedcorners">
        <form method="POST" id="registrationForm" onsubmit="submitForm(event)">
            <!-- Flex container for input elements -->
            <container class="flex">
                <!-- First set of inputs -->
                <input class="input" type="text" id="username" name="username" style="order: 6">
                <label class="label" for="username" style="order: 7">Username:</label>
                
                <input class="input" type="text" id="email" name="email" style="order: 4">
                <label class="label" for="email" style="order: 5">E-Mail:</label>
                
                <input class="input" type="text" id="passwort" name="passwort" style="order: 2">
                <label class="label" for="passwort" style="order: 3">Passwort:</label>
                
                <input type="button" id="weiterButton" class="first" onclick="hideFirstShowSecond()" style="order: 1" value="Weiter" disabled>

                <!-- Second set of inputs (initially hidden) -->
                <input class="input" type="text" id="vorname" name="vorname" style="order: 6; display: none">
                <label class="label" for="vorname" style="order: 7; display: none" hidden>Vorname:</label>
                
                <input class="input" type="text" id="nachname" name="nachname" style="order: 4; display: none" >
                <label class="label" for="nachname" style="order: 5; display: none" hidden>Nachname:</label>
                
                <input class="input" type="text" id="geburtsdatum" name="geburtsdatum" style="display: none; order: 2;" placeholder="tt.mm.jjjj">
                <label class="label" for="geburtsdatum" style="order: 3; display: none">Geburtsdatum:</label>
                
                <!-- Submit button (initially hidden) -->
                <input id="submitButton" class="final" type="submit" style="order: 1; display: none; margin-left: 18%;" name="submit" value="Registrieren" disabled>
            </container>
            <br>
        </form>

        <!-- Error handling for the first set of inputs -->
        <div class="errorHandlingMajor" id="firstErrors" style="display: block"> 
            <div class="errorHandlingMinor" id="error1" style="margin-top:16%; order: 1;">Username darf nicht leer sein</div>
            <div class="errorHandlingMinor" id="error2" style="margin-top: 12%; order: 2; margin-right: 5%;">Geben Sie eine gültige E-Mail ein</div>
            <div class="errorHandlingMinor" id="error3" style="margin-top:8%; order: 3;">Passwort muss mindestens 8 Zeichen haben</div>
        </div>

        <!-- Error handling for the second set of inputs (initially hidden) -->
        <div class="errorHandlingMajor" id="secondErrors" style="display:none"> 
            <div class="errorHandlingMinor" id="vornameError" style="margin-top: 16%; order: 1;" >Vorname darf nicht leer sein</div>
            <div class="errorHandlingMinor" id="nachnameError" style="margin-top: 17%; order: 2; margin-right: 5%;" >Nachname darf nicht leer sein</div>
            <div class="errorHandlingMinor" id="geburtstagError" style="margin-top: 13%; margin-right: 5%; order: 3;" >Geben Sie ein gültiges Datum ein</div>
            
            <!-- Back button for navigating to the first set of inputs -->
            <input type="button" id="backButton" class="back" onclick="hideSecondShowFirst()" value="Zurück" style="display: none; margin-top: 0.25%;">
        </div>
    </div>

    <!-- Link to login page -->
    <a class="register" href="login.php"><button class="login">Login</button></a>
    <br>

    <!-- Including the footer -->
    <?php include 'footer.php'?>
    <!-- Linking to the registration script -->
    <script src="js\registrationscript.js"></script> 
</body>
</html>
