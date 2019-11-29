<?php
/*
Ajax-tiedosto, ottaa tiedot GET metodilla ja poistaa ajan alueesta ja lataa taulun uusilla tiedoilla
*/
require ("../includes/connection.php");
//Saa tiedot
$v = $_GET["v"];
//Erotetaan tiedot pisteellä
$v = explode("." , $v);
$aaID = $v[0];
$alueID = $v[1];
//Jos alueenaikaid on update, ei alueenaikaa poisteta vaan taulu vain päivitetään
if($aaID != "update") {
    $sql = "DELETE FROM alueenaika WHERE aaID='$aaID'";
	$lause=$db->prepare($sql);
	$lause->execute();
}
//Haetaan tiedot tietokannasta ja listataan ne tauluun
$sql = "SELECT alueenaika.aaID, alueenaika.aikavali, alueenaika.status, alue.aluenimi FROM alueenaika INNER JOIN alue ON alueenaika.alueID = alue.alueID WHERE alue.alueID = '$alueID'";
$query = $db -> query($sql);
echo "<table>";
//Käy vastauksen kaikki tietueet läpi
foreach($db->query($sql) as $tietue){
    //Luu taulun rivit ja tekstin stusnapille
    $text = $tietue["status"] == 1 ? "Näytä" : "Piilota";
    echo "<tr><td>".$tietue["aikavali"]."</td><td><button type=\"button\" onclick=\"del(".$tietue['aaID'].")\">Poista</button></td><td><button type=\"button\" onclick=\"asia(".$tietue['aaID'].",".$tietue['status'].")\">$text</button></td></tr>";
}
?>
</table>