<?php
// Reset button logic: Reset specific filter options
if (isset($_POST['resetButton'])) {
    // Reset individual filter options in the session
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

    // Redirect to the same page to apply the changes
    header("Location: {$_SERVER['PHP_SELF']}");
    exit;
}

// Reset all filters logic: Reset all filter options and return to the home page
if (isset($_POST['resetAll'])) {
    // Reset all filter options in the session
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

    // Redirect to the home page to apply the changes
    header("Location: home.php");
    exit;
}

// Reset home button logic: Reset filters and return to the home page
if (isset($_POST['resetHome'])) {
    // Reset filters in the session
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

    // Redirect to the home page to apply the changes
    header("Location: home.php");
    exit;
}
?>
