<?php 
// Function to set values in the session based on POST data or retrieve from the session
function setValues($variableName) {
  if (isset($_POST[$variableName])) {
    $_SESSION[$variableName] = $_POST[$variableName];
    echo $_SESSION[$variableName];
  } elseif (isset($_SESSION[$variableName])) {
    echo $_SESSION[$variableName];
  } else {
    $_SESSION[$variableName] = "";
    echo $_SESSION[$variableName];
  }
}

// Function to set output based on POST data or retrieve from the session
function setOutput($variableName) {
  if (isset($_POST[$variableName]) && $_POST[$variableName] != "") {
    $_SESSION[$variableName] = $_POST[$variableName];
    echo $_SESSION[$variableName];
  } elseif (isset($_SESSION[$variableName]) && $_SESSION[$variableName] != "") {
    echo $_SESSION[$variableName];
  } else {
    $_SESSION[$variableName] = "";
    echo 'Alle';
  }
}

// Function to set numerical output based on POST data or retrieve from the session
function setOutputNum($variableName) {
  if (isset($_POST[$variableName]) && $_POST[$variableName] != "") {
    $_SESSION[$variableName] = $_POST[$variableName];
    echo $_SESSION[$variableName];
  } elseif (isset($_SESSION[$variableName]) && $_SESSION[$variableName] != "") {
    echo $_SESSION[$variableName];
  } else {
    $_SESSION[$variableName] = "";
    echo '/';
  }
}

// Function to set conditional output based on POST data or retrieve from the session
function setOutputCon($variableName) {
  if (isset($_POST[$variableName]) && $_POST[$variableName] != "") {
    $_SESSION[$variableName] = $_POST[$variableName];
    echo $_SESSION[$variableName];
  } elseif (isset($_SESSION[$variableName]) && $_SESSION[$variableName] != "") {
    echo $_SESSION[$variableName];
  } else {
    $_SESSION[$variableName] = "";
    echo 'Egal';
  }
}

// Function to set sorting preference in the session
function setSort($variableName) {
  // Check if a POST value is present and not empty
  if (isset($_POST[$variableName]) && !empty($_POST[$variableName])) {
    $_SESSION[$variableName] = $_POST[$variableName];
  }
  // If SESSION value is not present, set default value to "ASC"
  elseif (!isset($_SESSION[$variableName])) {
    $_SESSION[$variableName] = "ASC";
  }
}

// Function to change values based on specific conditions
function changeValues($valueName){
    $value = "";
    if (isset($_POST[$valueName])) {
        // If POST value is "Ja", set $value to "1"
        if($_POST[$valueName] == "Ja"){
            $value = "1";
        }
    }
    return $value;
}
?>



