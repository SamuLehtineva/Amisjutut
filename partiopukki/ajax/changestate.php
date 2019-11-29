<?php
//Muuttaa aikavälin näkyvyyden varauslomakkeessa
require "../includes/connection.php";
//Ottaa arvot GET:llä ja erottaa ne pisteellä
$vals = explode(".", $_GET['v']);
//Ottaa arvot omiin muuttujiin
$id = $vals[0];
$state = $vals[1];
//Päivittää tiedot tietokantaan
$sql = "UPDATE alueenaika SET status = $state WHERE aaID = $id";
$query = $db -> query($sql);
?>