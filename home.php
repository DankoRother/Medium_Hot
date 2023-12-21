<?php session_start();
$_SESSION['selected_car_id'] = 0;?>

<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">       
        <title>CarSBA Homepage</title>                                                                         <!-- Standart HTML Settings -->
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="CSS/homepage.css">  <!-- Link to css -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>                                    <!-- link to Jquery -->
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>                                                                                              
  $(function() {
    // Initialize datepicker for the start date
    $("#start_date").datepicker({                                                                               //JQuery code which denies the end date to be smaller than the start date.
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 3,
      onClose: function(selectedDate) {
        // Set the minimum date for the end date based on the selected start date
        $("#end_date").datepicker("option", "minDate", selectedDate);
      }
    });
    // Initialize datepicker for the end date
    $("#end_date").datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 3,
      onClose: function(selectedDate) {
        // Set the maximum date for the start date based on the selected end date
        $("#start_date").datepicker("option", "maxDate", selectedDate);
      }
    });
  });
</script>
        <script language="javascript" type="text/javascript" src="js/homepage.js"></script>                                            <!-- JS Data Import -->
    </head>

<!-- start of website -->

    <body>
      <!-- Including the header and the reset button functionality -->
        <?php include 'header.php'; ?>
        <?php include 'PHP_Funktionen/resetbutton.php'; ?>
         <!-- Container for the video background and heading -->
        <div class="video-container">
          <!-- Video background -->
          <video autoplay muted loop>
            <source src="Bilder/videodark.mp4" type="video/mp4">
          </video>
          <!-- Heading for the video section -->
          <div class="vid_heading">
            <h1>230 Autos in 14 Standorten!</h1>
          </div>

          <!-- Search filter container -->
          <div class="suchfilter"> 
             <!-- Form for filtering car rental options -->                                                                <!--Suchfilter-->
            <form action="mieten.php" method="POST">
              <!-- Filter row with various filter options -->
              <div class="filter_row">
                <!-- Start date filter -->
                <div class="filter_bar">
                  <h2>Start:</h2>
                  <input type="text" class="form-control" name="start_date" id="start_date" value="<?php echo isset($_SESSION['start_date']) ? $_SESSION['start_date'] : date('m/d/Y');?>" required>
                </div>

                <!-- End date filter -->
                <div class="filter_bar">
                  <h2>Ende:</h2>
                  <input type="text" class="form-control" name="end_date" id="end_date" value="<?php echo isset($_SESSION['end_date']) ? $_SESSION['end_date'] : date('m/d/Y', strtotime('+1 day')); ?>" required>
                </div>

                <!-- Location filter -->
                <div class="filter_bar">
                  <h2>Wo?</h2>
                  <select name="location" class="form-select">
                  <!-- Display selected location if any -->
                  <option value="<?php echo isset($_SESSION['location']) ? $_SESSION['location'] : ''; ?>"><?php echo isset($_SESSION['location']) && !empty($_SESSION['location']) ? $_SESSION['location'] : 'Alle anzeigen'; ?></option>
                  <!-- Location options -->
                  <option value="">Alle anzeigen</option>
                  <option value="Hamburg">Hamburg</option>
                  <option value="Bielefeld">Bielefeld</option>
                  <option value="Rostock">Rostock</option>
                  <option value="Bochum">Bochum</option>
                  <option value="Dortmund">Dortmund</option>
                  <option value="Muenchen">München</option>
                  <option value="Berlin">Berlin</option>
                  <option value="Dresden">Dresden</option>
                  <option value="Freiburg">Freiburg</option>
                  <option value="Leipzig">Leipzig</option>
                  <option value="Koeln">Köln</option>
                  <option value="Nuernberg">Nürnberg</option>
                  <option value="Bremen">Bremen</option>
                  <option value="Paderborn">Paderborn</option>
                </select>
                 <!-- Hidden input fields for additional filters -->
              <input type="hidden" name="vendor" value="">
              <input type="hidden" name="price" value="">
              <input type="hidden" name="seats" value="">
              <input type="hidden" name="gear" value="">
              <input type="hidden" name="doors" value="">
              <input type="hidden" name="min_age" value="">
              <input type="hidden" name="drive" value="">
              <input type="hidden" name="air_condition" value="">
              <input type="hidden" name="gps" value="">
              <input type="hidden" name="trunk" value="">
              <input type="hidden" name="sort" value="ASC">
            </div>

             <!-- Type filter -->
            <div class="filter_bar">
                  <h2>Typ: </h2>
                  <select name="type" class="form-select">
                     <!-- Display selected type if any -->
                  <option value="<?php echo isset($_SESSION['type']) ? $_SESSION['type'] : ''; ?>"><?php echo isset($_SESSION['type']) && !empty($_SESSION['type']) ? $_SESSION['type'] : 'Alle'; ?></option>
                  <!-- Type options -->
                  <option value="">Alle</option>
                  <option value="SUV">SUV</option>
                  <option value="Cabrio">Cabrio</option>
                  <option value="Coupe">Coupe</option>
                  <option value="Mehrsitzer">Mehrsitzer</option>
                  <option value="Limousine">Limousine</option>
                  <option value="Combi">Combi</option>
                </select>
            </div>

            <!-- Filter and reset buttons -->
                <div class="filter_bar">
                    <input type="submit" value="Suchen" class="button_filter">
                    <input type="submit" class="button_reset" value="Zurücksetzen" name="resetHome">
                </div>
              </div>
              
            </form>
          </div>
        </div>


<!-- Container for offers -->
<div class="divoffer">
  <!-- Container for the table -->
  <div class="divfortable">
    <!-- Table with two rows -->
    <table style="width: 100%;">
    <!-- First row of the table -->
        <tr>
          <!-- First column of the first row -->
            <td  class="td" style="width: 50%;">
            <!-- Heading and content for diverse variety -->
                <h3 class="h3"> Diverse Vielfalt </h3>
                <P class="p">Wir werden garantiert das passende Auto für Sie dabei haben!</P>
            </td>
            <!-- Second column of the first row -->
            <td class="td" style="width: 50%;">
            <!-- Heading and content for limited special offers -->
                <h3 class="h3">Limitierte Sonderangebote </h3>
                <p class="p">Gelegentlich bieten wir attraktive Sonderangebote an. <br> Also schnappen Sie zu!</p>
            </td>
        </tr>
 
         <!-- Second row of the table -->
        <tr>
          <!-- First column of the second row -->
            <td class="td">
              <!-- Heading and content for comprehensive insurance coverage -->
                <h3 class="h3"> Vollkaskoschutz</h3>
                <p class="p">Natürlich besitzt jedes Kfz einen Vollkaskoschutz, <br> welcher Sie und das Fahrzeug schützt!</p>
            </td>
             <!-- Second column of the second row -->
            <td class="td">
              <!-- Heading and content for 24-hour service -->
                <h3 class="h3"> 24 Stunden Service </h3>
                <p class="p">Damit Sie jederzeit zuverlässig <br> Ihr Ziel erreichen!</p>
            </td>
        </tr>
    </table>
  </div>
</div>

<!-- Auto Slider Section -->
<div class="slide-heading">                                                               
    <p class="mainheading2">Unsere Autos</p>
</div>

<!-- Container for the slider -->
<div class="big-container">
  <div class="container">
     <!-- Wrapper for the slider -->
    <div class="slider-wrapper">
       <!-- Button to navigate to the previous slide -->
        <button id="prev-slide" class="slide-button material-symbols-rounded">
          chevron_left
        </button>

        <!-- List of images for the slider -->
        <ul class="image-list">
          <img class="image-item" src="Bilder/bilder_db/bmw-3er-kombi.jpg" alt="img-1" />
          <img class="image-item" src="Bilder/bilder_db/audi-a7-cabrio.jpg" alt="img-2" />
          <img class="image-item" src="Bilder/bilder_db/mb-v-van.jpg" alt="img-3" />
          <img class="image-item" src="Bilder/bilder_db/mb-e-klasse.jpg" alt="img-4" />
          <img class="image-item" src="Bilder/bilder_db/mb-g-klasse.jpg" alt="img-5" />
          <img class="image-item" src="Bilder/bilder_db/bmw-2er-coupe.jpg" alt="img-6" />
        </ul>

         <!-- Button to navigate to the next slide -->
        <button id="next-slide" class="slide-button material-symbols-rounded">
          chevron_right
        </button>
    </div>

    <!-- Scrollbar for the slider -->
      <div class="slider-scrollbar">
        <div class="scrollbar-track">
          <div class="scrollbar-thumb">
          </div>
        </div>
      </div>
  </div>
</div>



<!-- Maps Heading Section -->
        <div class="divheading2">                                                               
            <p class="mainheading2">Unser Hauptsitz</p>
        </div>

        <!-- Google Maps Section -->
        <div class="googlemaps">  
          <!-- Embedding Google Maps with an iframe -->                                                             <!-- Einfügen der Karte von Google Maps -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4521.810281179028!2d9.983530443398028!3d53.54759672432389!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47b18f052906e573%3A0x91f76f669af7ad22!2sWilly-Brandt-Stra%C3%9Fe%2075%2C%2020459%20Hamburg!5e0!3m2!1sde!2sde!4v1621458625556!5m2!1sde!2sde"width="800" height="450" style="border:0;" allowfullscreen="" loading="lazy">
            </iframe>
        </div>

        <!-- Team Section -->
      <div class="headmem"><h1>Unser Team</h1></div>  
        <!-- Team Members Container -->
        <div class="mem_container">
          <div class="small_mem">
            <!-- Individual Team Member -->
            <div class="member">
              <img src="Bilder/luis.jpg">
              <!-- Member Overlay with Email -->
              <div class="memoverlay">
                <h5>luisloeck<br>@carsba.de</h5>
              </div>
              <h4>Luis Loeck</h4>
            </div>
             <!-- Member 2 -->
            <div class="member">
              <img src="Bilder/linus.png">
              <div class="memoverlay">
                <h5>linuskaranikas<br>@carsba.de</h5>
              </div>
              <h4>Linus Karanikas</h4>
            </div>
             <!-- Member 3 -->
            <div class="member">
              <img src="Bilder/Danko.png">
              <div class="memoverlay">
                <h5>dankorother<br>@carsba.de</h5>
              </div>
              <h4>Danko Rother</h4>
            </div>
             <!-- Member 4 -->
            <div class="member">
              <img src="Bilder/kopf_gerion.jpeg">
              <div class="memoverlay">
                <h5>geriongutzeit<br>@carsba.de</h5>
              </div>
              <h4>Gerion Gutzeit</h4>
            </div>
             <!-- Member 5 -->
            <div class="member">
              <img src="Bilder/jason.png">
              <div class="memoverlay">
                <h5>jasonwagner<br>@carsba.de</h5>
              </div>
              <h4>Jason Wagner</h4>
            </div>
          </div>
        </div>

        <!-- Including the footer -->
    <?php include 'footer.php'; ?>
        
    </body>

</html>

