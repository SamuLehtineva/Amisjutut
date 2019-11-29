<?php

    require "../tavara/yhteys.php";
    require "alku.php";
    require "../tavara/nav.php";
?>
<div class="container-fluid text-center">
    <div class="row content">
    <div class="col-sm-2 sidenav">

       </div>
    <div class="col-sm-8 text-left">
        <h1>Opettajat</h1>
                <div class="over">
                <div class="over2">
<?php
                echo "<table>"."<tr>"."<th>oID</th>"."<th>Nimi</th>"."<th>Email</th>"."<th>Toimipiste</th>"."<th>Poista</th>"."<th>Muokkaa</th>"."</tr>";
                $sql="SELECT to_opettaja.nimi, to_opettaja.oID, to_opettaja.email, to_opettaja.toimipisteID, to_toimipiste.toimipiste FROM to_opettaja INNER JOIN to_toimipiste ON to_opettaja.toimipisteID = to_toimipiste.toimipisteID ORDER BY oID";
                echo "<div class=\"overflow\">";
                foreach($yhteys->query($sql) as $tietue) {
                    echo "<tr><td>".$tietue["oID"]."</td>"."<td>".$tietue["nimi"]."</td>"."<td>".$tietue["email"]."</td>"."<td>".$tietue["toimipiste"]."</td>"."<td> <a href='opettajatdel.php?oID=".$tietue["oID"]."'onclick=\"return confirm('Haluatko varmasti poistaa opettajan ".$tietue["nimi"]."?')\">Poista</a>"."</td>"."<td>"."<a href='opettajatedit.php?oID=".$tietue["oID"]."'>Muokkaa</a>"."</td>"."</tr>";
                }
                ?>
                </div>
                </div>

</div>
</div>
</div>