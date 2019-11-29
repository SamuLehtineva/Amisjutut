<?php
require ("../includes/connection.php");

$id = $_GET["v"];
$sql = "SELECT * FROM tilaus WHERE pukkiID=$id ORDER BY aika";
$i = 1;
$query = $db->query($sql);
if($query -> rowCount() > 0) {
    
    foreach($query as $tietue) {
        $status = $tietue['status'] == 2 ? "checked" : ""; 
        $kesto = $tietue['kesto'] == 1 ? "15 Min" : "30 Min"; 
        echo "<h3>$i. ".$tietue["aika"]."</h3>
        <table class=\"w-100\"><tr><th>Osoite</th><th>Aika</th><th>Kesto</th><th>Status</th></tr><tr><td>".$tietue['osoite']."</td><td>".$tietue['aika']."</td><td>".$kesto."</td><td><label class=\"container-radio\">
                            <input name=\"kesto\" type=\"checkbox\" disabled $status>
                            <span class=\"checkmark\"></span>
                        </label></td></tr></table>";
        $sql2 = "SELECT * FROM extratieto WHERE varausID = ".$tietue['varausID'];
        foreach($db->query($sql2) as $tietue2){
            echo "<p>".$tietue2["otsikko"]."</p><textarea rows=\"4\" readonly>".$tietue2["tieto"]."</textarea>";
        }
        echo "<button class=\"btn-default\" onclick=\"del(".$tietue['tilausID'].",".$id.")\"><i class=\"fas fa-trash-alt\"></i></button><hr>";
        $i++;
    }  
}
else echo "<h4>Onpas täällä tyhjää</h4>";
?>