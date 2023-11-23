<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">       
        <title>CarSBA Homepage</title>                                                                         <!-- Standart HTML Settings -->
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="CSS/homepage.css">                                             <!-- CSS Datei Import -->
    </head>
<!-- Beginn der Webseite -->
    <body>
        <?php include 'header.php'; ?>

        <div class="video-container">
          <video autoplay muted loop>
            <source src="Bilder/videodark.mp4" type="video/mp4">
          </video>
          <div class="vid_heading">
            <h1>230 Autos in 14 Standorten!</h1>
          </div>

          <div class="suchfilter">                                                                 <!--Suchfilter-->
            <form action="" method="GET">
              <div class="filter_row">
                <div class="filter_bar">
                  <h2>Start:</h2>
                  <input type="date" class="form-control">
                </div>
                <div class="filter_bar">
                  <h2>Ende:</h2>
                  <input type="date" class="form-control">
                </div>
                <div class="filter_bar">
                    <h2>Wo?</h2>
                    <select name="ort" class="form-select">
                        <option value="">Hamburg</option>
                        <option value="">Bielefeld</option>
                        <option value="">Rostock</option>
                        <option value="">Bochum</option>
                        <option value="">Dortmund</option>
                        <option value="">Muenchen</option>
                        <option value="">Berlin</option>
                        <option value="">Dresden</option>
                        <option value="">Freiburg</option>
                        <option value="">Leipzig</option>
                        <option value="">Koeln</option>
                        <option value="">Nuernberg</option>
                        <option value="">Bremen</option>
                        <option value="">Paderborn</option>
                    </select>
                </div>
                <div class="filter_bar">
                    <button type="submit" class="button_filter">Suchen</button>
                    <a href="index.php" class="button_reset">Reset</a>
                </div>
              </div>
              
            </form>
          </div>
        </div>



<div class="divoffer">
  <div class="divfortable">
    <table style="width: 100%;">
        <tr>
            <td  class="td" style="width: 50%;">
                <h3 class="h3"> Diverse Vielfalt </h3>
                <P class="p">Wir werden garantiert das passende Auto für Sie dabei haben!</P>
            </td>
            <td class="td" style="width: 50%;">
                <h3 class="h3">Limitierte Sonderangebote </h3>
                <p class="p">Gelegentlich bieten wir attraktive Sonderangebote an. <br> Also schnappen Sie zu!</p>
            </td>
        </tr>
 
        <tr>
            <td class="td">
                <h3 class="h3"> Vollkaskoschutz</h3>
                <p class="p">Natürlich besitzt jedes Kfz einen Vollkaskoschutz, <br> welcher Sie und das Fahrzeug schützt!</p>
            </td>
            <td class="td">
                <h3 class="h3"> 24 Stunden Service </h3>
                <p class="p">Damit Sie jederzeit zuverlässig <br> Ihr Ziel erreichen!</p>
            </td>
        </tr>
    </table>
  </div>
</div>
        <div class="divheading2">                                                               
            <p class="mainheading2">Unser Hauptsitz</p>
        </div>

        <div class="googlemaps">                                                               <!-- Einfügen der Karte von Google Maps -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4521.810281179028!2d9.983530443398028!3d53.54759672432389!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47b18f052906e573%3A0x91f76f669af7ad22!2sWilly-Brandt-Stra%C3%9Fe%2075%2C%2020459%20Hamburg!5e0!3m2!1sde!2sde!4v1621458625556!5m2!1sde!2sde"width="800" height="450" style="border:0;" allowfullscreen="" loading="lazy">
            </iframe>
        </div>

        <div class="headmem"><h1>Unser Team</h1></div>                                        <!--Unser Team Sektion-->
        <div class="mem_container">
          <div class="small_mem">
            <div class="member">
              <img src="Bilder/luis.jpg">
              <div class="memoverlay">
                <h5>luisloeck<br>@carsba.de</h5>
              </div>
              <h4>Luis Loeck</h4>
            </div>
            <div class="member">
              <img src="Bilder/linus.png">
              <div class="memoverlay">
                <h5>linuskaranikas<br>@carsba.de</h5>
              </div>
              <h4>Linus Karanikas</h4>
            </div>
            <div class="member">
              <img src="Bilder/Danko.png">
              <div class="memoverlay">
                <h5>dankorother<br>@carsba.de</h5>
              </div>
              <h4>Danko Rother</h4>
            </div>
            <div class="member">
              <img src="Bilder/kopf_gerion.jpeg">
              <div class="memoverlay">
                <h5>geriongutzeit<br>@carsba.de</h5>
              </div>
              <h4>Gerion Gutzeit</h4>
            </div>
            <div class="member">
              <img src="Bilder/jason.png">
              <div class="memoverlay">
                <h5>jasonwagner<br>@carsba.de</h5>
              </div>
              <h4>Jason Wagner</h4>
            </div>
          </div>
        </div>

    <?php include 'footer.php'; ?>
        
    </body>

</html>

