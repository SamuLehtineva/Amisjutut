<?php
require ("../includes/connection.php");
//Ottaa tiedot muuttujaan
$id = $_GET["v"];
$sql2 = "SELECT tilaus.tilausID, tilaus.aika, tilaus.osoite, alue.aluenimi, extratieto.otsikko, extratieto.tieto, extratieto.tietoID FROM tilaus LEFT JOIN varaus ON tilaus.varausID = varaus.varausID LEFT JOIN extratieto ON varaus.varausID = extratieto.varausID LEFT JOIN alue ON varaus.alueID = alue.alueID WHERE tilaus.tilausID = $id";
//Käy läpi saadut rivit ja tekee kenttiä niistä
foreach($db->query($sql2) as $tietue) {
    //Tulostaa rivit
    echo "Otsikko<textarea readonly>".$tietue["otsikko"]."</textarea>Sisältö<textarea rows=\"4\" readonly>".$tietue["tieto"]."</textarea><br>";
}
?>