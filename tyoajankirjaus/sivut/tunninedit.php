<?php
require "../tavara/yhteys.php";
require "../tavara/alku.php";
require "../tavara/nav.php";
if (isset($_GET['tID'])) $tID = $_GET['tID'];
if (isset($_GET['month'])) $month = $_GET['month'];

if (isset($_POST["tyyppiID"]) && isset($_POST["pvm"]) ){
	$tID = $_POST["tID"];
	$tyyppiID = $_POST["tyyppiID"];
	$pvm = mysqli_real_escape_string($con, $_POST["pvm"]);
	$klo = mysqli_real_escape_string($con, $_POST["klo"]);
	$kesto = mysqli_real_escape_string($con, $_POST["kesto"]);
	$kuvaus = mysqli_real_escape_string($con, $_POST["kuvaus"]);
	$kuvaus = htmlentities($kuvaus);
	$kuvaus = htmlspecialchars($kuvaus);
	$pvm = htmlentities($kuvaus);
	$pvm = htmlspecialchars($pvm);
	//echo $tID. " " . $tyyppiID. " "  . $pvm. " " . $klo. " " . $kesto. " " . $kuvaus. "tuli tuolta lomakkeelta..";
	$sql = "UPDATE to_tunti SET tyyppiID='$tyyppiID', pvm='$pvm', klo='$klo', kesto='$kesto', kuvaus='$kuvaus' WHERE tID='$tID'"; //tietoturva
	//echo "<p>$sql</p>";
	$kysely=$yhteys->prepare($sql);
	$kysely->execute();
	
}




$juttu = "SELECT * FROM to_tunti WHERE tID ='$tID'";
$stmt = $yhteys->query("SELECT * FROM to_tunti WHERE tID = '$tID'");
$tunti = $stmt->fetch();
$tID = $tunti['tID'];
$tyyppiID = $tunti['tyyppiID'];
$pvm =  $tunti['pvm'];
$klo = $tunti['klo'];
$kesto = $tunti['kesto'];
$kuvaus = $tunti['kuvaus'];
?>
<div class="container-fluid text-center">
    <div class="row content">
    <div class="col-sm-2 sidenav">

       </div>
    <div class="col-sm-8 text-left">
        <h1>Tunnin muokkaus</h1>
<?php
echo "<form action=\"tunninedit.php?month=$month&pvm=$pvm\" method=\"post\" id=\"tunti\">";




//echo "TuntiID on ".$tID;

?>
<bR>
Tyyppi<br>
    <select name="tyyppiID" form="tunti" value="<?php echo $tyyppiID; ?>">
        <?php
        //Alla oleva juttu valitsee muokattavan tunnin tyypin ja alityypin ja näyttää ne samassa
            $sql="SELECT * FROM to_tyypit WHERE tyyppiID ='$tyyppiID'";
            foreach($yhteys->query($sql) as $tietue) {
                echo "<option value = ".$tietue["tyyppiID"]." selected>".$tietue["tyyppi"]." | ".$tietue["alityyppi"]."</option>";
            }
            //Alla oleva juttu valitsee kaikki paitsi valitun tunnin tyypit
            $sql="SELECT * FROM to_tyypit WHERE NOT tyyppiID ='$tyyppiID' ORDER BY tyyppi";
            foreach($yhteys->query($sql) as $tietue) {
                echo "<option value = ".$tietue["tyyppiID"].">".$tietue["tyyppi"]." | ".$tietue["alityyppi"]."</option>";
            }
        ?>
    </select>
    <br>
Pvm
<br>
<input required type="date" name="pvm" value="<?php echo $pvm; ?>" />
<bR>
Klo
<bR>
<input readonly type="text" class="timepicker" name="klo" value="<?php echo $klo; ?>" />
<!--<input required type="time" name="klo" value="<?php// echo $klo; ?>" />-->
<bR>
Kesto
<br>
<input required type="number" min="1" name="kesto" value="<?php echo $kesto; ?>"/>
<br>
Kuvaus
<br>
<input required type="text" name="kuvaus" value="<?php echo $kuvaus; ?>"/>
<input type="hidden" name="tID" value="<?php echo $tID; ?>" />
<br>
<input type="submit" value="Päivitä">
</form>
<script src="//code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

<script type="text/javascript">
       $(document).ready(function() {
         $('.timepicker').timepicker({
                timeFormat: 'HH:mm',
                interval: 30,
              });
       });
</script>
<?php echo "<a id=\"takaisin\" href='../etusivu.php?pvm=".$pvm."&month=".$month."'>Takaisin</a><br>"; ?>
</div>
</div>
</div>