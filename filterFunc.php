<?php
function getCities(){
    include('dbConfig.php');
    $default="Hamburg";
    $location = array($default);
    $stmtGetCities = $conn->prepare("SELECT City FROM Location WHERE City!=:cityIdent");
    $stmtGetCities->bindParam(':cityIdent', $default);
    $stmtGetCities->execute();
    while($row = $stmtGetCities->fetch()){
        $location[] = $row['City'];
    }
    return $location;    
}
?>