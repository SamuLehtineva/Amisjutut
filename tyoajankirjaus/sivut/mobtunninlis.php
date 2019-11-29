<?php
session_start();
require "../tavara/yhteys.php";
require "../tavara/alku.php";
require "../tavara/nav.php";
if (isset($_GET['pvm'])) $pvm = $_GET['pvm'];
if (isset($_GET['month'])) $month = $_GET['month'];

if(!empty($_POST["tyyppi"]) && !empty($_POST["pvm"]) && !empty($_POST["klo"]) && !empty($_POST["kesto"]) && !empty($_POST["kuvaus"])) {
	$oID = $_SESSION["oID"];
	$pvm = mysqli_real_escape_string($con, $_POST["pvm"]);
	$tyyppi = mysqli_real_escape_string($con, $_POST["tyyppi"]);
	$klo = mysqli_real_escape_string($con, $_POST["klo"]);
	$kesto = mysqli_real_escape_string($con, $_POST["kesto"]);
    $kuvaus = mysqli_real_escape_string($con, $_POST["kuvaus"]);
    $kuvaus = htmlentities($kuvaus);
	echo "Tunti lisätty";
	$sql = "INSERT INTO to_tunti (oID, tyyppiID, pvm, klo, kesto, kuvaus) VALUES ('$oID', '$tyyppi', '$pvm', '$klo', '$kesto', '$kuvaus')";
	$kysely=$yhteys->prepare($sql);
	$kysely->execute();
}
?>
<div class="col-sm-2 col-xs- sidenav">

</div>
<div class="col-sm-10 col-xs-10 text-left">
<h1>Lisää tunti</h1>
<?php
    $tarkistus = $_SESSION["oID"];
    if ($tarkistus == NULL) echo "Et ole kirjautunut sisään!";

echo "<form action=\"mobtunninlis.php?month=$month&pvm=$pvm\" method=\"post\" id=\"tunti\">"
?>
    <!--OpettajaID
    <br>
    <input type="number" name="oID">
    <br>-->
    Tyyppi<br>
    <select name="tyyppi" form="tunti">
        <?php
            $sql="SELECT * FROM to_tyypit ORDER BY tyyppi";
            foreach($yhteys->query($sql) as $tietue) {
                echo "<option value = ".$tietue["tyyppiID"].">".$tietue["tyyppi"]." | ".$tietue["alityyppi"]."</option>";
            }
        ?>
    </select>
    <br>
    Päivämäärä
    <br>
    <input required type="date" name="pvm" value="<?php echo $pvm; ?>" >
    <br>
    Kellonaika
    <br>
    <input readonly="readonly" type="text" class="timepicker" name="klo" />
    <br>
    Kesto tunteina
    <br>
    <input required type="number" min="1" name="kesto">
    <br>
    Kuvaus
    <br>
    <input required type="text" name="kuvaus">
    <bR>
    <input type="submit" value="valmis">
</form>
<script src="//code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

<script type="text/javascript">
       $(document).ready(function() {
         $('.timepicker').timepicker({
                timeFormat: 'HH:mm',
                interval: 30,
                defaultTime: '8',
              });
       });
</script>
<?php echo "<a id=\"takaisin\" href='karuselli.php?pvm=".$pvm."&month=".$month."'>Takaisin</a><br>"; ?>