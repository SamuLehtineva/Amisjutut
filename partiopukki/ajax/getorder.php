<?php
session_start();
require "../includes/connection.php";
$value = $_GET['v'];
if($value == "update") {
    if($_SESSION['type'] == "pukki") {
        $id = $_SESSION['userID'];
        $sql = "SELECT tilaus.tilausID, tilaus.aika, tilaus.osoite, alue.aluenimi, extratieto.tieto, extratieto.otsikko, extratieto.tietoID FROM tilaus LEFT JOIN varaus ON tilaus.varausID = varaus.varausID LEFT JOIN extratieto ON varaus.varausID = extratieto.varausID LEFT JOIN alue ON varaus.alueID = alue.alueID WHERE tilaus.pukkiID = $id ORDER BY aika";
        $query = $db -> query($sql);
        $result = $query -> fetchAll(PDO::FETCH_ASSOC);
        echo "<h2>Omat käynnit</h2><br><table class=\"col-lg-6\"><tr><th>Aika</th><th>Alue</th><th>Osoite</th><th>Lisätietoa</th></tr>";
        $i = -1;
        foreach($result as $row) {
            echo "<tr id=".$row["tietoID"]." onclick=\"jee(".$row['tilausID'].")\"><td>".$row['aika']."</td><td>".$row['aluenimi']."</td><td>".$row['osoite']."</td><td>".$row['otsikko'].": ".$row['tieto']."</td></tr>";
            $i = $row['tilausID'];
        }
        echo "</table>";
    }
}