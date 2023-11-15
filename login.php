<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">       
    <title></title>                                                         <!-- Standart HTML Settings -->
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="login.css">        
</head>

<body>
<?php include 'header.php'?>
<table>
    <tr>
        <td></td><td>
        <div align="center" class="dividiediv">
            <h1> Registrierung </h1>
        </div>
        </td><td></td>
    </tr>
<?php
$servername = "localhost";
$username = "Danko1";
$password = "031520";
$dbname = "account";
?>
<tr>
    <td></td>
    <td class="center">
    <div class="roundedcorners">
    <form class="formm" align="center" action="login.php" method="post">
        <br>
        Vorname: <input type="text" name="vorname"><br>
        Nachname: <input type="text" name="nachname"><br>
        Geburtsdatum: <input type="text" name="geburtsdatum"><br><br>
        E-mail: <input type="text" name="e-mail"><br>
        Passwort: <input type="text" name="passwort"><br>
        <input type="submit">
        <br>
        <br>
    </form>

    </div>
    </td>
    <td></td>
</tr>

<?php
    /*
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
*/
?></table>

<?php include 'footer.php'?>

</body>
</html>
