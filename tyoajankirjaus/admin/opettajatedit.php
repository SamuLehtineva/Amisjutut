<?php
require "../tavara/yhteys.php";
require "alku.php";
require "../tavara/nav.php";
require "../tavara/funktiot.php";
$loggedin = $_SESSION["email"];
if (isset($_GET['oID'])) $oID = $_GET['oID'];

if (isset($_POST["nimi"]) && isset($_POST["email"]) ){
	$oID = $_POST["oID"];
	$nimi = mysqli_real_escape_string($con, $_POST["nimi"]);
	$email = mysqli_real_escape_string($con, $_POST["email"]);
	$toimipisteID = $_POST["toimipisteID"];
	$nimi = htmlentities($nimi);
	$nimi = htmlspecialchars($nimi);
	$email = htmlentities($email);
	$email = htmlspecialchars($email);
	if (!empty($_POST["salasana"])) {
	    $salasana = $_POST["salasana"];
	    $salasana = muunna_salasana($salasana);
	    $sql = "UPDATE to_opettaja SET nimi='$nimi', email='$email', salasana='$salasana', toimipisteID='$toimipisteID' WHERE oID='$oID'";
	} else{
	    $sql = "UPDATE to_opettaja SET nimi='$nimi', email='$email', toimipisteID='$toimipisteID' WHERE oID='$oID'";
	}
	$kysely=$yhteys->prepare($sql);
	$kysely->execute();
	
}



$juttu = "SELECT * FROM to_opettaja WHERE oID ='$oID'";
$stmt = $yhteys->query("SELECT * FROM to_opettaja WHERE oID = '$oID'");
$tunti = $stmt->fetch();
$oID = $tunti['oID'];
$nimi =  $tunti['nimi'];
$email = $tunti['email'];
$toimipisteID = $tunti['toimipisteID']
?>
<div class="container-fluid text-center">
    <div class="row content">
    <div class="col-sm-2 sidenav">

       </div>
    <div class="col-sm-8 text-left">
        <h1>Opettajan tietojen muokkaus</h1>
<br>

<form action="opettajatedit.php" method="post" id="opettaja">

<?php

echo "OpettajaID $oID";
?>
<bR>
Nimi
<br>
<input required type="text" name="nimi" value="<?php echo $nimi; ?>" />
<bR>
Email
<bR>
<input required type="email" name="email" value="<?php echo $email; ?>" />
<bR>
Toimipiste
<br>
<select name="toimipisteID">
        <?php
        $sql="SELECT toimipisteID, toimipiste FROM to_toimipiste WHERE toimipisteID='$toimipisteID'";
        foreach($yhteys->query($sql) as $tietue) {
            echo "<option value = ".$tietue["toimipisteID"].">".$tietue["toimipiste"]."</option>";
        }
        $sql="SELECT toimipisteID, toimipiste FROM to_toimipiste WHERE NOT toimipisteID='$toimipisteID' ORDER BY toimipiste";
        foreach($yhteys->query($sql) as $tietue) {
            echo "<option value = ".$tietue["toimipisteID"].">".$tietue["toimipiste"]."</option>";
        }
        ?>
</select>
<br>
Uusi salasana (Jätä tyhjäksi jos et halua muuttaa)
<br>
<input type="text" name="salasana">
<br>
<input type="hidden" name="oID" value="<?php echo $oID; ?>" />
<input type="submit" value="Päivitä">
</form>
<a id="takaisin" href="opettajat.php">Takaisin</a>
</div>
</div>
</div>