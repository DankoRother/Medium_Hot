<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">       
        <title></title>                                                                         <!-- Standart HTML Settings -->
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="homepage.css">                                             <!--CSS Datei Import -->
    </head>
<!-- Beginn der Webseite -->
    <body>
        <header id="float">
            <div id="band" class="">
                <h3>2 Autos mieten zum Preis von 3</h3>                                         <!--Floating Headerzeile -->
            </div>
        </header>

        <header>                                                                                <!--Nav Header-->
            <a href="index.php" class="boximg"><img class="logo" src="Bilder/LogoAuto.PNG" alt="logo" width=100px height=100px></a>   <!--Logo-->
            <nav id="f1">
                <ul class="nav__links">
                    <li class="boxtext"><a href="#">Fahrzeuge</a></li>
                    <li class="boxtext"><a href="#">Standorte</a></li>              
                    <li class="boxtext"><a href="#">Mieten</a></li>                             <!--Navigation Links erstellt--> 
                    <li class="boxtext"><a href="#">Kontakt</a></li>
                </ul>
            </nav>
            <nav id="autoleft">
                <ul class="nav__links">
                    <li class="boxtext"><a href="#">Meine Buchungen</a></li>         <!--Meine Buchungen + Login erstellt-->
                    <li class="boxtext"><a href="#">Meine Buchungen</a></li>                    <!--Meine Buchungen + Login erstellt-->
                    <li class="log"><a href="#"><button>Login</button></a></li>
                </ul>
            </nav>
        </header>

        <div class="image">
            <div class="image-overlay">
                <h1 align="center">144 Autos in 14 verschiedenen Städten!</h1>
            </div>
        </div>




                                                                                                <!-- Google Maps -->
                                                                                                <!-- Darstellung einer Karte von Google Maps, wodurch man zum vordefinierten Standort navigieren kann. -->
    <div class="googlemaps">
         <h2 class="subtitle">Unser Hauptsitz</h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4521.810281179028!2d9.983530443398028!3d53.54759672432389!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47b18f052906e573%3A0x91f76f669af7ad22!2sWilly-Brandt-Stra%C3%9Fe%2075%2C%2020459%20Hamburg!5e0!3m2!1sde!2sde!4v1621458625556!5m2!1sde!2sde"width="800" height="450" style="border:0;" allowfullscreen="" loading="lazy">
         </iframe>
    </div>





        <footer class="footer">
           <div class="footer_container">
                <div class="footer-row">
                    <div class="footer-col">
                        <h4>Unternehmen</h4>
                        <ul>
                            <li><a href="#">Impressum</a></li>
                            <li><a href="#">AGB</a></li>
                            <li><a href="#">Datenschutz</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Über uns</h4>
                        <ul>
                            <li><a href="#">Kontakt</a></li>
                            <li><a href="#">Affiliate Program</a></li>
                            <li><a href="#">Über uns</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Hilfe</h4>
                        <ul>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Test</a></li>
                            <li><a href="#">Test</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Folg uns</h4>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
           </div>
        </footer>

        <footer class="footer2">
            <div class="pay-text">
                <h4>Zahlungsmethoden</h4>  
            </div>
            <div class="pay-img"> 
                <p><img src="Bilder/apple.png"></p>
                <p><img src="Bilder/googlepay.png"></p>
                <p><img src="Bilder/klarna.png"></p>
                <p><img src="Bilder/mastercard.png"></p>
                <p><img src="Bilder/visa.png"></p>
                <p><img src="Bilder/paypal.png"></p>
            </div>
            <div class="stylep">
                <p>&copy; 2023 CarSBA. Alle Rechte vorbehalten.</p>
            </div>
        </footer>
        
    </body>

</html>

