<?php
    require "../tavara/yhteys.php";
    require "../tavara/alku.php";
    require "../tavara/nav.php";
    if (isset($_POST["date1"]) && isset($_POST["date2"]) ){ 
      $date1 = $_POST["date1"];
      $date2 = $_POST["date2"];
    }
     $soID = $_SESSION["oID"];
     $loggedin = $_SESSION["username"];
?>
<div class="container-fluid text-center">
    <div class="row content">
    <div class="col-sm-2 sidenav">

       </div>
    <div class="col-sm-8 text-left">
      
<h1>Valitse aikaväli</h1>
<form action="excel.php" method="post" id="export">
    <input type="date" name="date1" required>
    -
    <input type="date" name="date2" required>
    <br>
      <?php
        if($loggedin == "admin@admin"){
                    $stmt = $yhteys->query("SELECT * FROM to_opettaja");
                    $opettaja = $stmt->fetch();
                    $soID = $_POST[soID];
                    $sql="SELECT * FROM to_opettaja";
                    echo "<select name='soID' form='export' value='<?php echo $soID;?>'";
                     foreach($yhteys->query($sql) as $tietue) {
                         echo "<option value=".$tietue["oID"].">".$tietue["nimi"]."</option>";
                     }
                     echo "<option value='kaikki'>Kaikki</option>";
                     echo "</select><bR>";
            }
            ?>
    <input type="submit" value="Valmis">
</form>
<br>
    <?php
    echo "<a href='../export.php?date1=".$date1."&soID=".$soID."&date2=".$date2."'>Lataa</a><br>";
    if(isset($_POST["date1"]) && isset($_POST["date2"])){
        if($soID == "kaikki"){
            $sql = "SELECT to_opettaja.nimi, to_tyypit.tyyppi, to_tyypit.alityyppi, to_tunti.pvm, to_tunti.klo, to_tunti.kesto, to_tunti.kuvaus FROM ((to_tunti INNER JOiN to_opettaja ON to_tunti.oID = to_opettaja.oID) INNER JOIN to_tyypit ON to_tunti.tyyppiID = to_tyypit.tyyppiID) WHERE pvm BETWEEN '$date1' AND '$date2' ORDER BY to_tunti.pvm";
            echo "<div class=\"sisalto\"><div class=\"over\"> <div class=\"over2\">";
                        echo "<table>"."<tr>"."<th>Nimi</th>"."<th>Tyyppi</th>"."<th>Alityyppi</th>"."<th>Pvm</th>"."<th>Kellonaika</th>"."<th>Kesto</th>"."<th>Kuvaus</th>"."</tr>";
                        echo "<div class=\"overflow\">";
                        foreach($yhteys->query($sql) as $tietue) {
                            echo "<tr><td>".$tietue["nimi"]."</td>"."<td>".$tietue["tyyppi"]."</td>"."<td>".$tietue["alityyppi"]."</td>"."<td>".$tietue["pvm"]."</td>"."<td>".$tietue["klo"]."</td>"."<td>".$tietue["kesto"]."h"."</td>"."<td>".$tietue["kuvaus"]."</td>"."</tr>";
                        }
                        echo "</div> </div> </div></table>";
        } else{
            $sql = "SELECT to_tyypit.tyyppi, to_tyypit.alityyppi, to_tunti.pvm, to_tunti.klo, to_tunti.kesto, to_tunti.kuvaus FROM ((to_tunti INNER JOiN to_opettaja ON to_tunti.oID = to_opettaja.oID) INNER JOIN to_tyypit ON to_tunti.tyyppiID = to_tyypit.tyyppiID) WHERE pvm BETWEEN '$date1' AND '$date2' AND to_tunti.oID='$soID' ORDER BY to_tunti.pvm";
            echo "<div class=\"sisalto\"><div class=\"over\"> <div class=\"over2\">";
                        echo "<table>"."<tr>"."<th>Tyyppi</th>"."<th>Alityyppi</th>"."<th>Pvm</th>"."<th>Kellonaika</th>"."<th>Kesto</th>"."<th>Kuvaus</th>"."</tr>";
                        echo "<div class=\"overflow\">";
                        foreach($yhteys->query($sql) as $tietue) {
                            echo "<tr><td>".$tietue["tyyppi"]."</td>"."<td>".$tietue["alityyppi"]."</td>"."<td>".$tietue["pvm"]."</td>"."<td>".$tietue["klo"]."</td>"."<td>".$tietue["kesto"]."h"."</td>"."<td>".$tietue["kuvaus"]."</td>"."</tr>";
                        }
                        echo "</div> </div> </div></table>";
        }
    }
    ?>
</div>
</div>
</div>