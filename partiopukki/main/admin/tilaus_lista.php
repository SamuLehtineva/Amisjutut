<?php
session_start();
require ("./includes/connection.php");

$id = $_SESSION["id"];
$sql = "SELECT * FROM tilaus WHERE pukkiID=$id";
echo "<table class=\"col-lg-4\"><tr><th>osoite</th><th>aika</th><th>kesto</th><th>tila</th></tr>";
    foreach($db->query($sql) as $tietue) {
        echo "<tr><td><strong>".$tietue["osoite"]."</td><td><strong>".$tietue["aika"]."</td><td><strong>".$tietue["kesto"]."</td><td><strong>".$tietue["status"]."</td></tr>";
        $sql2 = "SELECT * FROM tilaus LEFT JOIN varaus ON tilaus.varausID = varaus.varausID LEFT JOIN extratieto ON extratieto.varausID = varaus.varausID WHERE pukkiID=$id";
        
        foreach($db->query($sql2) as $tietue2){
            echo "<tr><td>".$tietue2["otsikko"]."</td><td>".$tietue2["tieto"]."</td></tr>";
        }
    }
    echo "</table>";
?>