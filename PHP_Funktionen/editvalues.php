<?php function setValues($variableName) {
  if (isset($_POST[$variableName])) {
    $_SESSION[$variableName] = $_POST[$variableName];
    echo $_SESSION[$variableName];
  }elseif (isset($_SESSION[$variableName])) {
    echo $_SESSION[$variableName];
  }
  else {
    $_SESSION[$variableName] = "";
    echo $_SESSION[$variableName];
  }
}

function setOutput($variableName) {
  if (isset($_POST[$variableName]) && $_POST[$variableName] != "") {
    $_SESSION[$variableName] = $_POST[$variableName];
    echo $_SESSION[$variableName];
  }elseif (isset($_SESSION[$variableName]) && $_SESSION[$variableName] != "") {
    echo $_SESSION[$variableName];
  }
  else {
    $_SESSION[$variableName] = "";
    echo 'Alle';
}
}

function setOutputNum($variableName) {
  if (isset($_POST[$variableName]) && $_POST[$variableName] != "") {
    $_SESSION[$variableName] = $_POST[$variableName];
    echo $_SESSION[$variableName];
  }elseif (isset($_SESSION[$variableName]) && $_SESSION[$variableName] != "") {
    echo $_SESSION[$variableName];
  }
  else {
    $_SESSION[$variableName] = "";
    echo '/';
}
}

function setOutputCon($variableName) {
  if (isset($_POST[$variableName]) && $_POST[$variableName] != "") {
    $_SESSION[$variableName] = $_POST[$variableName];
    echo $_SESSION[$variableName];
  }elseif (isset($_SESSION[$variableName]) && $_SESSION[$variableName] != "") {
    echo $_SESSION[$variableName];
  }
  else {
    $_SESSION[$variableName] = "";
    echo 'Egal';
}
}

function setSort($variableName) {
  // Überprüfe, ob ein POST-Wert vorhanden ist und nicht leer ist
  if (isset($_POST[$variableName]) && !empty($_POST[$variableName])) {
    $_SESSION[$variableName] = $_POST[$variableName];
  }
  // Wenn SESSION-Wert nicht vorhanden ist, setze Standardwert auf "ASC"
  elseif (!isset($_SESSION[$variableName])) {
    $_SESSION[$variableName] = "ASC";
  }
}



function changeValues($valueName){
    $value = "";
    if (isset($_POST[$valueName])) {
        if($_POST[$valueName] == "Ja"){
            $value = "1";
        }
    }
    return $value;
}




?>


<script>

</script>