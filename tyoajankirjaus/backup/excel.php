<?php
    require "../tavara/yhteys.php";
    require "../tavara/alku.php";
    require "../tavara/nav.php";
    if (isset($_POST["date1"]) && isset($_POST["date2"]) ){ 
      $date1 = $_POST["date1"];
      $date2 = $_POST["date2"];
    }
     $soID = $_SESSION["oID"];
     $loggedin = $_SESSION["email"];
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
        if($loggedin == "admin"){
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
    <?php echo $date1;?>
    <b>-</b>
    <?php echo $date2;?>
    <br>
    <?php echo "<a href='../export.php?date1=".$date1."&soID=".$soID."&date2=".$date2."'>Lataa</a><br>";?>
</div>
</div>
</div>