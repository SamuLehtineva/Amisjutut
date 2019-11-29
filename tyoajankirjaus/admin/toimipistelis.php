<?php
require "../tavara/yhteys.php";
require "alku.php";
require "../tavara/nav.php";
if(!empty($_POST["toimipiste"])) {
	$toimipiste = $_POST["toimipiste"];
	echo $toimipiste;
	$sql = "INSERT INTO to_toimipiste (toimipiste) VALUES ('$toimipiste')";
	$kysely=$yhteys->prepare($sql);
	$kysely->execute();
}
?>
<div class="col-sm-2 col-xs- sidenav">

</div>
<div class="col-sm-10 col-xs-10 text-left">
<h1>Toimipisteen lisäys</h1>
<form action="toimipistelis.php" method="post" id="toimipiste">
    Toimipiste
    <br>
    <input required type="text" name="toimipiste">
    <br>
    <input type="submit" value="valmis">
</form>
<?php echo "<a id=\"takaisin\" href='toimipiste.php'>Takaisin</a><br>"; ?>
<?php
$sql="SELECT * FROM to_toimipiste ORDER BY toimipiste";
foreach($yhteys->query($sql) as $tietue) {
    echo $tietue["toimipiste"]. "<br>";
}
?>
</div>