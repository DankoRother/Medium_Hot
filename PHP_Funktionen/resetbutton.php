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
}

if (isset($_POST['resetAll'])) {
    unset($_SESSION['start_date']);
    unset($_SESSION['end_date']);
    $_SESSION['location'] = "";
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

  header("Location: home.php");
  exit;
}

if (isset($_POST['resetHome'])) {
    $_SESSION['start_date'] = date('m/d/Y');
    $_SESSION['end_date'] = date('m/d/Y', strtotime('+1 day'));
    $_SESSION['location'] = "";
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

header("Location: home.php");
exit;
}

?>