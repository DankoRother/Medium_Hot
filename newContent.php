<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">       
    <title></title>                                                         <!-- Standart HTML Settings -->
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="login.css">      
</head>
<?php
// This is a simple example; you can include dynamic content based on your requirements
echo "<tr>
<td></td>
<td>
<form action="."login.php"." method="."post".">
    <br>
    Vorname:<br><input type="."text"." name="."vorname1"."><br><br>
    Nachname:<br><input type="."text"." name="."nachname1"."><br><br>
    Geburtsdatum:<br><input type="."text"." name="."geburtsdatum"."><br><br>
    <input type="."submit".">
    <br>
</form> 
</td>
<td></td>
</tr>";
?>
</html>