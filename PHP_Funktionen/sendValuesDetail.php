<script>
            function backToSelection() {
            // Hier setzt du den Pfad zur gewünschten Seite
                var targetPage = "mieten.php";
  
            // Session-Variablen in den JavaScript-Code einfügen
                var start_date = "<?php echo $_SESSION['start_date']; ?>";
                var end_date = "<?php echo $_SESSION['end_date']; ?>";
                var location = "<?php echo $_SESSION['location']; ?>";
                var vendor = "<?php echo $_SESSION['vendor'];?>";
                var type = "<?php echo $_SESSION['type'];?>";
                var price = "<?php echo $_SESSION['price'];?>";
                var doors = "<?php echo $_SESSION['doors'];?>";
                var seats = "<?php echo $_SESSION['seats'];?>";
                var min_age = "<?php echo $_SESSION['min_age'];?>";
                var air_condition = "<?php echo $_SESSION['air_condition'];?>";
                var gps = "<?php echo $_SESSION['gps'];?>";
                var trunk = "<?php echo $_SESSION['trunk'];?>";
                var drive = "<?php echo $_SESSION['drive'];?>";
                var gear = "<?php echo $_SESSION['gear'];?>";



            // URL erstellen, Session-Variablen anhängen und zur Seite leiten
            window.location.href = targetPage + '?start_date=' + encodeURIComponent(start_date)
            + '&end_date=' + encodeURIComponent(end_date)
            + '&location=' + encodeURIComponent(location)
            + '&vendor=' + encodeURIComponent(vendor)
            + '&type=' + encodeURIComponent(type)
            + '&price=' + encodeURIComponent(price)
            + '&doors=' + encodeURIComponent(doors)
            + '&seats=' + encodeURIComponent(seats)
            + '&min_age=' + encodeURIComponent(min_age)
            + '&air_condition=' + encodeURIComponent(air_condition)
            + '&gps=' + encodeURIComponent(gps)
            + '&trunk=' + encodeURIComponent(trunk)
            + '&drive=' + encodeURIComponent(drive)
            + '&gear=' + encodeURIComponent(gear);
            }
</script>