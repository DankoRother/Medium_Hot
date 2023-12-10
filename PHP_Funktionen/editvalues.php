<?php function setValues($variableName) {
  if (isset($_POST[$variableName])) {
    $_SESSION[$variableName] = $_POST[$variableName];
    echo $_SESSION[$variableName];
  } elseif(isset($_GET[$variableName])){
    $_SESSION[$variableName] = $_GET[$variableName];
    echo $_SESSION[$variableName];
  } else {
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

?>


<script>
function resetForm() {
  document.querySelector('select[name="vendor"]').value = '';
  document.querySelector('input[name="price"]').value = '';
  document.querySelector('select[name="type"]').value = '';
  <?php $_SESSION['vendor'] = ''; ?> // Dies setzt den PHP-Wert auf einen Leerstring
  <?php $_SESSION['price'] = ''; ?>
  <?php $_SESSION['type'] = ''; ?>
}
</script>