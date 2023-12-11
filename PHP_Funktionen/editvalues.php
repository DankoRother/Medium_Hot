<?php function setValues($variableName) {
  if (isset($_POST[$variableName])) {
    $_SESSION[$variableName] = $_POST[$variableName];
    echo $_SESSION[$variableName];
  } elseif (isset($_SESSION[$variableName])) {
    echo $_SESSION[$variableName];
  }
  else {
    $_SESSION[$variableName] = "";
    echo $_SESSION[$variableName];
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

function getSessionValue($variableName, $defaultValue = '') {
  if (isset($_SESSION[$variableName])) {
      return $_SESSION[$variableName];
  } else {
      $_SESSION[$variableName] = $defaultValue;
      return $_SESSION[$variableName];
  }
}



?>


<script>

</script>