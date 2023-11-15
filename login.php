<!DOCTYPE html>
<?php
$servername = "localhost";
$username = "Danko1";
$password = "031520";
$dbname = "userdata";?>
<form action="login.php" method="get">
Vorname: <input type="text" name="vorname"><br>
Nachname: <input type="text" name="nachname"><br>
E-mail: <input type="text" name="e-mail"><br>
Passwort: <input type="text" name="passwort"><br>
Geburtsdatum: <input type="text" name="geburtsdatum"><br>
<input type="submit">
</form>


<?php
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<br> " . "Connected Successfully";
    
$val_vorname = $_GET["vorname"];
$val_nachname = $_GET["nachname"];
$val_email = $_GET["e-mail"];
$val_passwort = $_GET["passwort"];
$val_geburtsdatum = $_GET["geburtsdatum"];
$stmt = $conn->exec("INSERT INTO user_data (vorname, nachname, email, passwort, geburtsdatum) VALUES ('".$val_vorname."','".$val_nachname."','".$val_email."','".$val_passwort."','".$val_geburtsdatum."')");
echo "New user created successfully by SQL";
}
catch(PDOException $e){
    echo "Error: ". $e->getMessage();
}
$conn = null;
?>

</html>
