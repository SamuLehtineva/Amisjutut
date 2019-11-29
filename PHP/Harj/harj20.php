<?php

echo "<h2>20.1</h2>";
require_once "harj20_funktiot.php";

echo "<h3>Minimi</h3>";
$luku1 = 2;
$luku2 = 50;
$luku3 = 4;

$minimi=minimi($luku1,$luku2,$luku3);
echo $minimi;

echo "<h3>Maximi</h3>";
$maximi=maximi($luku1,$luku2,$luku3);
echo $maximi;

echo "<h3>Summa</h3>";
$summa=summa($luku1,$luku2,$luku3);
echo $summa;

echo "<h3>Keskiarvo</h3>";
$keskiarvo=keskiarvo($luku1,$luku2,$luku3);
echo $keskiarvo;


echo "<h2>20.2</h2>"; 
// tässä lasketaan arvonlisävero ja verollinen hinta
if(!empty($_POST["vero"]) && !empty($_POST["hinta"])) {
	$vero=$_POST["vero"];
	$hinta=$_POST["hinta"];
	echo "verollinen hinta ".verollinen($hinta,$vero);
}
else {
	?>
	<form action="./index.php?sivu=harj20&kansio=Harj" method="post">
	Anna Hinta:<bR>
	<input type="text" name="hinta"><br>
	Anna vero%:<br>
	<input type="text" name="vero">
	<input type="submit" value="laske">
	</form>
	
	
	<?php
}
// tässä lasketaan veroprosentti ja veroton hinta

if(!empty($_POST["verollinen"]) && !empty($_POST["veropros"])) {
	$verollinen=$_POST["verollinen"];
	$veropros=$_POST["veropros"];
	echo "Veroton hinta ".veroton($verollinen,$veropros),"€";
	echo "<br>";
	echo "Veron arvo ".vero($veropros,$verollinen),"€";
}
else {
	?>
	<form action="./index.php?sivu=harj20&kansio=Harj" method="post">
	Anna verollinen hinta:<br>
	<input type="text" name="verollinen"><br>
	Anna veroprosentti:<br>
	<input type="text" name="veropros"><br>
	<input type="submit" value="laske">
	</form>
	<?php
}
