<?php

echo "<h2>18.1</h2>";
if(!empty($_POST["enimi"]) && !empty($_POST["snimi"])) {
	$enimi=$_POST["enimi"];
	$snimi=$_POST["snimi"];
	echo "nimi: $enimi $snimi"; 
	echo "<br>";
	$enimi=strtolower($enimi);
	$snimi=strtolower($snimi);
	$enimi=str_replace("ä","a",$enimi,$snimi);
	$enimi=str_replace("ö","o",$enimi,$snimi);
	echo "Käyttäjätunnus: taok", $enimi[0], $enimi[1], $enimi[2], $snimi[0], $snimi[1], $snimi[2];
	
}
else {
	?>
	<form action="./index.php?sivu=harj18&kansio=Harj" method="post">
	Etunimi:<br>
	<input type="text" name="enimi">
	<br>Sukunimi: <br>
	<input type="text" name="snimi">
	<input type="submit" value="lähetä">
	</form>
<?php
}
echo "<h2>18.2</h2>";
if(!empty($_POST["kirjain"])) {
$vokaalit = array("a", "e", "i", "o", "u", "y", "ä", "ö");
$kirjain=$_POST["kirjain"];
if (in_array("$kirjain", $vokaalit)) {
	echo "$kirjain on vokaali";
}
else {
	echo "$kirjain ei ole vokaali";
}
}
else {
	?>
	<form action="./index.php?sivu=harj18&kansio=Harj" method="post">
	Tähän jokin kirjain:
	<input type="text" name="kirjain">
	<input type="submit" value="katso">
	</form>
<?php
}
echo "<h2>18.3</h2>";
if(!empty($_POST["R"]) && !empty($_POST["G"]) && !empty($_POST["B"])) {
	$R=$_POST["R"];
	$G=$_POST["G"];
	$B=$_POST["B"];
	$red=dechex($R);
	$green=dechex($G);
	$blue=dechex($B);
	echo $red.$green.$blue;
	$vari="#".$red.$green.$blue;
	echo "<p style=\"color:$vari\">Väri $vari</p>";
}
else {
	?>
	<form action="./index.php?sivu=harj18&kansio=Harj" method="post">
	R:<br>
	<input type="number" name="R" min="0" max="255">
	<br>G:<br>
	<input type="number" name="G" min="0" max="255">
	<br>B:<br>
	<input type="number" name="B" min="0" max="255">
	<input type="submit" Value="valmis">
	</form>
<?php
}