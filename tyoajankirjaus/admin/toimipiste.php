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
        <h1>Toimipisteet</h1>
                <div class="over">
                <div class="over2">
<?php
                echo "<table>"."<tr>"."<th>ToimipisteID</th>"."<th>Toimipiste</th>"."<th>Poista</th>"."<th>Muokkaa</th>"."</tr>";
                $sql="SELECT * FROM to_toimipiste ORDER BY toimipiste";
                echo "<div class=\"overflow\">";
                foreach($yhteys->query($sql) as $tietue) {
                    echo "<tr><td>".$tietue["toimipisteID"]."</td>"."<td>".$tietue["toimipiste"]."</td>"."<td>"."<a href='toimipistedel.php?toimipisteID=".$tietue["toimipisteID"]."'>Poista</a>"."</td>"."<td>"."<a href='toimipisteedit.php?toimipisteID=".$tietue["toimipisteID"]."'>Muokkaa</a>"."</td>"."</tr>";
                }
                ?>
                </div>
                </div>
                <?php
                echo "<a href='toimipistelis.php'>Lisää toimipiste</a>";
?>
</div>
</div>
</div>