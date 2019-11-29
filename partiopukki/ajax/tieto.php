<?php
require ("../includes/connection.php");
//Ottaa tiedot muuttujaan
$id = $_GET["v"];
$sql2 = "SELECT varaus.varausID, extratieto.otsikko, extratieto.tieto, extratieto.tietoID FROM varaus INNER JOIN extratieto ON extratieto.varausID = varaus.varausID WHERE varaus.varausID = $id";
//Käy läpi saadut rivit ja tekee kenttiä niistä
foreach($db->query($sql2) as $tietue) {
    //Tulostaa rivit
    echo "Otsikko<textarea readonly>".$tietue["otsikko"]."</textarea>Sisältö<textarea rows=\"4\" readonly>".$tietue["tieto"]."</textarea><br>";
}
?>