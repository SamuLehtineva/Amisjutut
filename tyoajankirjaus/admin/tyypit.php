<?php

    require "../tavara/yhteys.php";
    require "alku.php";
    require "../tavara/nav.php";
        if ($loggedin !== "admin"){
        header("location:http://truudeli7.net/tyoajankirjaus/etusivu.php");
    }
?>
<div class="container-fluid text-center">
    <div class="row content">
    <div class="col-sm-2 sidenav">

       </div>
    <div class="col-sm-8 text-left">
        <h1>Tuntityypit</h1>
                <div class="over">
                <div class="over2">
<?php
                echo "<table>"."<tr>"."<th>TyyppiID</th>"."<th>Tyyppi</th>"."<th>Alityyppi</th>"."<th>Poista</th>"."<th>Muokkaa</th>"."</tr>";
                $sql="SELECT * FROM to_tyypit ORDER BY tyyppi";
                echo "<div class=\"overflow\">";
                foreach($yhteys->query($sql) as $tietue) {
                    echo "<tr><td>".$tietue["tyyppiID"]."</td>"."<td>".$tietue["tyyppi"]."</td>"."<td>".$tietue["alityyppi"]."</td>"."<td>"."<a href='tyypindel.php?tyyppiID=".$tietue["tyyppiID"]."'>Poista</a>"."</td>"."<td>"."<a href='tyypinedit.php?tyyppiID=".$tietue["tyyppiID"]."'>Muokkaa</a>"."</td>"."</tr>";
                }
                ?>
                </div>
                </div>
                <?php
                echo "<a href='tyypinlis.php'>Lisää tyyppi</a>";
?>
</div>
</div>
</div>