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

function setSort($variableName) {
  // Überprüfe, ob ein POST-Wert vorhanden ist
  if (isset($_POST[$variableName]) || isset($_SESSION[$variableName]) ) {
    $_SESSION[$variableName] = $_POST[$variableName];
  }
  // Wenn weder POST noch SESSION vorhanden sind, setze Standardwert auf "ASC"
  else {
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