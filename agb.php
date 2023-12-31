<?php session_start();
$_SESSION['selected_car_id'] = 0; ?>

<!DOCTYPE html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">       
        <title>AGB</title>                                                         <!-- Standart HTML Settings -->
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="CSS/impressum.css">        

</head>

<body style="background-color: #ffffff;">
<?php include 'header.php'; ?>                                                  <!--include Header-->
<table width="100%">
    <tr>
       <!-- <td width="10%" style="background-color: #ffffff;"></td> -->
        <td width="100%">
            <div align="center" class="agb">
                <h1>Allgemeine Geschäftsbedingungen (AGB)</h1><br>
                <h3>der<br>CarSBA GmbH Autovermietung<br>Willy-Brandt-Straße 75<br>DE 20459 Hamburg<br>(nachfolgend "CarSBA" genannt)</h3>
            </div>
        </td>
           <!-- <td width="10%" style="background-color: #ffffff;"></td>-->
    </tr>
    <tr>
        <!-- AGB Text -->
        <td class="center_text">
        <div class="agb_2">
                <h2>1. Vertragsgegenstand</h2>
                <h3>1.1 CarSBA stellt dem Mieter das im Vertrag näher beschriebene Fahrzeug zur Verfügung.<br>1.2 Das Fahrzeug bleibt Eigentum von CarSBA.</h3><br><br>
                <h2>2. Mietdauer</h2>
                <h3>2.1 Die Mietdauer beginnt und endet gemäß den im Vertrag festgelegten Daten und Uhrzeiten.<br>2.2 Eine Verlängerung der Mietdauer bedarf der Zustimmung von CarSBA.</h3><br><br>
                <h2>3. Mietpreis und Zahlungsbedingungen</h2>
                <h3>3.1 Der Mieter verpflichtet sich, den vereinbarten Mietpreis gemäß den im Vertrag festgelegten Zahlungsbedingungen zu entrichten.<br>3.2 Zusätzliche Kosten, wie Treibstoff, Mautgebühren und Strafzettel, gehen zu Lasten des Mieters.</h3><br><br>
                <h2>4. Fahrzeugnutzung und -pflege</h2>
                <h3>4.1 Der Mieter verpflichtet sich, das Fahrzeug sachgemäß zu nutzen und in einem ordnungsgemäßen Zustand zu halten.<br>4.2 Jegliche Schäden oder Mängel am Fahrzeug sind CarSBA unverzüglich zu melden.</h3><br><br>
                <h2>5. Versicherung</h2>
                <h3>5.1 Das Fahrzeug ist gemäß den gesetzlichen Bestimmungen versichert.<br>5.2 Der Mieter ist verpflichtet, Schäden oder Unfälle dem CarSBA und den örtlichen Behörden unverzüglich zu melden.</h3><br><br>
                <h2>6. Haftung</h2>
                <h3>6.1 CarSBA haftet nicht für Verluste oder Schäden an persönlichem Eigentum des Mieters im Fahrzeug.<br>6.2 Der Mieter haftet für Schäden am Fahrzeug, die während der Mietdauer entstehen.</h3><br><br>
                <h2>7. Rückgabe des Fahrzeugs</h2>
                <h3>7.1 Das Fahrzeug ist am Ende der Mietdauer in dem Zustand zurückzugeben, in dem es übernommen wurde.<br>7.2 Verspätete Rückgaben können zusätzliche Gebühren nach sich ziehen.</h3><br><br>
                <h2>8. Stornierung</h2>
                <h3>8.1 Stornierungen müssen gemäß den im Vertrag festgelegten Bedingungen erfolgen.<br>8.2 Bei verspäteter Stornierung können Stornogebühren anfallen.</h3><br><br>
                <h2>9. Sonstige Bestimmungen</h2>
                <h3>9.1 Änderungen oder Ergänzungen des Vertrags bedürfen der Schriftform.<br>9.2 Gerichtsstand für alle Streitigkeiten aus diesem Vertrag ist der Sitz von CarSBA.</h3>
            </div>
        </td>
    </tr>
</table>
<?php include 'footer.php'; ?>                                                  <!--include Footer-->
</body>

</html>
