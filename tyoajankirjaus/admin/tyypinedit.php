<?php
require "../tavara/yhteys.php";
require "alku.php";
require "../tavara/nav.php";

if (isset($_GET['tyyppiID'])) $tyyppiID = $_GET['tyyppiID'];

if (isset($_POST["tyyppi"]) && isset($_POST["alityyppi"]) ){
	$tyyppiID = mysqli_real_escape_string($con, $_POST["tyyppiID"]);
	$tyyppi = mysqli_real_escape_string($con, $_POST["tyyppi"]);
	$alityyppi = mysqli_real_escape_string($con, $_POST["alityyppi"]);
	$tyyppi = htmlentities($tyyppi);
	$tyyppi = htmlspecialchars($tyyppi);
	$alityyppi = htmlentities($alityyppi);
	$alityyppi = htmlspecialchars($alityyppi);
	echo $tyyppiID. " " . $tyyppi. " " . $alityyppi. "tuli tuolta lomakkeelta..";
	$sql = "UPDATE to_tyypit SET tyyppi='$tyyppi', alityyppi='$alityyppi' WHERE tyyppiID='$tyyppiID'"; //tietoturva
	echo $tyyppiID;
	$kysely=$yhteys->prepare($sql);
	$kysely->execute();
	
}




$juttu = "SELECT * FROM to_tyypit WHERE tyyppiID ='$tyyppiID'";
$stmt = $yhteys->query("SELECT * FROM to_tyypit WHERE tyyppiID = '$tyyppiID'");
$tunti = $stmt->fetch();
//echo $laite[0];
$tyyppiID = $tunti['tyyppiID'];
$tyyppi =  $tunti['tyyppi'];
$alityyppi = $tunti['alityyppi'];
?>
<div class="container-fluid text-center">
    <div class="row content">
    <div class="col-sm-2 sidenav">

       </div>
    <div class="col-sm-8 text-left">
    <h1>Muokkaa tyyppiä</h1>
<form action="tyypinedit.php" method="post" id="tyyppi">

<?php

echo $tyyppiID;
?>
<bR>
Tyyppi
<br>
<input required type="text" name="tyyppi" value="<?php echo $tyyppi; ?>" />
<bR>
Alityyppi
<bR>
<input required type="text" name="alityyppi" value="<?php echo $alityyppi; ?>" />
<bR>
<input type="hidden" name="tyyppiID" value="<?php echo $tyyppiID; ?>" />
<input type="submit" value="Päivitä">
</form>
<?php echo "<a id=\"takaisin\" href='tyypit.php?pvm=".$pvm."'>Takaisin</a><br>"; ?>
</div>
</div>
</div>