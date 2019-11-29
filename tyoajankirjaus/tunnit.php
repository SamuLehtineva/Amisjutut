<?php

require "yhteys.php";

if(!empty($_POST["pvm"])) {
	$pvm=$_POST["pvm"];
	
}
?>
<style>
    table {
        border-collapse:collapse;
        text-align:center;
    }
    td, th {
    }
    table, th, td {
        border:1px solid black;
    }
    input {
        width:130px;
        height:40px;
    }
</style>
<h2>Päivä</h2>
<?php
echo "<a href='sivut/tunninlis.php'>Lisää</a>";
?>
<form action="tunnit.php" method="post">
Pvm<br>
<input type="date" name="pvm">
<br>
<input type="submit">
</form>

<?php
        $sql="SELECT to_opettaja.nimi, to_tyypit.tyyppi, to_tyypit.alityyppi,to_tunti.tID, to_tunti.oID, to_tunti.tyyppiID, to_tunti.pvm, to_tunti.klo, to_tunti.kesto, to_tunti.kuvaus FROM ((to_tunti INNER JOiN to_opettaja ON to_tunti.oID = to_opettaja.oID) INNER JOIN to_tyypit ON to_tunti.tyyppiID = to_tyypit.tyyppiID) WHERE pvm='$pvm' ORDER BY to_tunti.klo";
        $juttu = $yhteys->query($sql);
        $juttu2 = $juttu->fetch();
        $juttu3 = $juttu2['tID'];
        if($juttu3 !== null){
            echo "<table>"."<tr>"."<th>Opettaja</th>"."<th>Tyyppi</th>"."<th>Alityyppi</th>"."<th>Pvm</th>"."<th>Kellonaika</th>"."<th>Kesto</th>"."<th>Kuvaus</th>"."<th>Poista</th>"."<th>Muokkaa</th>"."</tr>";
            foreach($yhteys->query($sql) as $tietue) {
                echo "<tr><td>".$tietue["nimi"]."</td>"."<td>".$tietue["tyyppi"]."</td>"."<td>".$tietue["alityyppi"]."</td>"."<td>".$tietue["pvm"]."</td>"."<td>".$tietue["klo"]."</td>"."<td>".$tietue["kesto"]."h"."</td>"."<td>".$tietue["kuvaus"]."</td>"."<td>"."<a href='sivut/tunnindel.php?tID=".$tietue["tID"]."'>Poista</a>"."</td>"."<td>"."<a href='sivut/tunninedit.php?tID=".$tietue["tID"]."'>Muokkaa</a>"."</td>"."</tr>";
            }
        
            $sql="SELECT SUM(kesto), to_opettaja.nimi, to_tyypit.tyyppi, to_tyypit.alityyppi, to_tunti.oID, to_tunti.tyyppiID, to_tunti.pvm, to_tunti.klo, to_tunti.kesto, to_tunti.kuvaus FROM ((to_tunti INNER JOiN to_opettaja ON to_tunti.oID = to_opettaja.oID) INNER JOIN to_tyypit ON to_tunti.tyyppiID = to_tyypit.tyyppiID) WHERE pvm='$pvm'";
            foreach($yhteys->query($sql) as $tietue) {
                echo " Tuntien kesto yhteensä ".$tietue["SUM(kesto)"]."<br>";
            }
            $sql="SELECT COUNT(tID), to_opettaja.nimi, to_tyypit.tyyppi, to_tyypit.alityyppi, to_tunti.oID, to_tunti.tyyppiID, to_tunti.pvm, to_tunti.klo, to_tunti.kesto, to_tunti.kuvaus FROM ((to_tunti INNER JOiN to_opettaja ON to_tunti.oID = to_opettaja.oID) INNER JOIN to_tyypit ON to_tunti.tyyppiID = to_tyypit.tyyppiID) WHERE pvm='$pvm'";
            foreach($yhteys->query($sql) as $tietue) {
                echo " Tunteja tällä päivällä ".$tietue["COUNT(tID)"]."<br>";
            }
            $sql="SELECT COUNT(tID), to_opettaja.nimi, to_tyypit.tyyppi, to_tyypit.alityyppi, to_tunti.oID, to_tunti.tyyppiID, to_tunti.pvm, to_tunti.klo, to_tunti.kesto, to_tunti.kuvaus FROM ((to_tunti INNER JOiN to_opettaja ON to_tunti.oID = to_opettaja.oID) INNER JOIN to_tyypit ON to_tunti.tyyppiID = to_tyypit.tyyppiID) WHERE tyyppi='Sidottu' AND pvm='$pvm'";
            foreach($yhteys->query($sql) as $tietue) {
                echo " Sidottuja on ".$tietue["COUNT(tID)"]."<br>";
            }
            $sql="SELECT COUNT(tID), to_opettaja.nimi, to_tyypit.tyyppi, to_tyypit.alityyppi, to_tunti.oID, to_tunti.tyyppiID, to_tunti.pvm, to_tunti.klo, to_tunti.kesto, to_tunti.kuvaus FROM ((to_tunti INNER JOiN to_opettaja ON to_tunti.oID = to_opettaja.oID) INNER JOIN to_tyypit ON to_tunti.tyyppiID = to_tyypit.tyyppiID) WHERE tyyppi='Sitomaton' AND pvm='$pvm'";
            foreach($yhteys->query($sql) as $tietue) {
                echo " Sitomattomia on ".$tietue["COUNT(tID)"]."<br>";
            }
        } else{
            echo "Tällä päivällä ei ole tunteja<br>";
        }
?>