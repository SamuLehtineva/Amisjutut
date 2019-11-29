<?php
require "../tavara/yhteys.php";
require "alku.php";
require "../tavara/nav.php";
if(!empty($_POST["tyyppi"]) && !empty($_POST["alityyppi"])) {
	$tyyppi = $_POST["tyyppi"];
	$alityyppi = $_POST["alityyppi"];
	echo $tyyppi ." ". $alityyppi;
	$sql = "INSERT INTO to_tyypit (tyyppi, alityyppi) VALUES ('$tyyppi', '$alityyppi')";
	$kysely=$yhteys->prepare($sql);
	$kysely->execute();
}
?>
<div class="col-sm-2 col-xs- sidenav">

</div>
<div class="col-sm-10 col-xs-10 text-left">
<h1>Tuntityypin lisäys</h1>
<form action="tyypinlis.php" method="post" id="tyyppi">
    Tyyppi
    <br>
    <input required type="text" name="tyyppi">
    <br>
    Aliyyppi
    <br>
    <input required type="text" name="alityyppi">
    <br>
    <input type="submit" value="valmis">
</form>
<?php echo "<a id=\"takaisin\" href='tyypit.php?pvm=".$pvm."'>Takaisin</a><br>"; ?>
<?php
$sql="SELECT * FROM to_tyypit ORDER BY tyyppi";
foreach($yhteys->query($sql) as $tietue) {
    echo $tietue["tyyppi"]." | ". $tietue["alityyppi"]. "<br>";
}
?>
</div>