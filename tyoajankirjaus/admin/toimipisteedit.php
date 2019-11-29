<?php
require "../tavara/yhteys.php";
require "alku.php";
require "../tavara/nav.php";

if (isset($_GET['toimipisteID'])) $toimipisteID = $_GET['toimipisteID'];

if (isset($_POST["toimipiste"])){
	$toimipisteID = mysqli_real_escape_string($con, $_POST["toimipisteID"]);
	$toimipiste = mysqli_real_escape_string($con, $_POST["toimipiste"]);
	$toimipiste = htmlentities($toimipiste);
	$toimipiste = htmlspecialchars($toimipiste);
	echo $toimipisteID. " " . $toimipiste. " " . "tuli tuolta lomakkeelta..";
	$sql = "UPDATE to_toimipiste SET toimipiste='$toimipiste' WHERE toimipisteID='$toimipisteID'"; //tietoturva
	$kysely=$yhteys->prepare($sql);
	$kysely->execute();
	
}




$juttu = "SELECT * FROM to_toimipiste WHERE toimipisteID ='$toimipisteID'";
$stmt = $yhteys->query("SELECT * FROM to_toimipiste WHERE toimipisteID = '$toimipisteID'");
$tunti = $stmt->fetch();
//echo $laite[0];
$toimipisteID = $tunti['toimipisteID'];
$toimipiste =  $tunti['toimipiste'];
?>
<div class="container-fluid text-center">
    <div class="row content">
    <div class="col-sm-2 sidenav">

       </div>
    <div class="col-sm-8 text-left">
    <h1>Muokkaa toimipistettä</h1>
<form action="toimipisteedit.php" method="post" id="toimipiste">

<?php

echo $toimipisteID;
?>
<bR>
Toimipiste
<br>
<input required type="text" name="toimipiste" value="<?php echo $toimipiste; ?>" />
<br>
<input type="hidden" name="toimipisteID" value="<?php echo $toimipisteID; ?>" />
<input type="submit" value="Päivitä">
</form>
<?php echo "<a id=\"takaisin\" href='toimipiste.php'>Takaisin</a><br>"; ?>
</div>
</div>
</div>