<?php
if (isset($_POST['resetButton'])) {
    $_SESSION['vendor'] = "";
    $_SESSION['type'] = "";
    $_SESSION['price'] = "";
    $_SESSION['seats'] = "";
    $_SESSION['gear'] = "";
    $_SESSION['doors'] = "";
    $_SESSION['min_age'] = "";
    $_SESSION['drive'] = "";
    $_SESSION['gps'] = "";
    $_SESSION['air_condition'] = "";
    $_SESSION['trunk'] = "";
    $_SESSION['sort'] = "ASC";

  header("Location: {$_SERVER['PHP_SELF']}");
  exit;
}?>