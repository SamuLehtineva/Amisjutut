<?php

echo "<h2>5.1</h2>";
echo "Laske paljonko saat bensaa";
echo "<br>";
if(!empty($_POST["raha"])) {
	$raha=$_POST["raha"];
$bensa=$raha/1.55;
echo $bensa, "L";
}
else {
	?>
	<form action="./index.php?sivu=harj5&kansio=Harj" method="post">
	Anna rahamäärä:
	<input type="text" name="raha">
	<input type="submit" value="anna rahamäärä">
	</form>
<?php
}
echo "<hr>";
echo "<h2>5.2</h2>";
echo "paljonko saat takaisin ostoksista";
echo "<br>";
if(!empty($_POST["raha2"]) && !empty($_POST["summa"])) {
	$raha2=$_POST["raha2"];
	$summa=$_POST["summa"];
if($raha2<$summa)echo "anna lisää rahaa";

$takas=$raha2-$summa;
echo $takas;
}
else {
	?>
	<form action="./index.php?sivu=harj5&kansio=Harj" method="post">
	Anna rahamäärä:
	<input type="text" name="raha2">
	Anna loppusumma:
	<input type="text" name="summa">
	<input type="submit" value="summa">
	</form> 
	
<?php
}
echo "<h2>5.3</h2>";
echo "laske arvonlisävero";
echo "<br>";
if(!empty($_POST["hinta"]) && !empty($_POST["alv"])) {
	$hinta=$_POST["hinta"];
	$alv=$_POST["alv"];
	$vero=$alv/100*$hinta;
	$loppu=$hinta+$vero;
	
echo "alv määrä", $vero, "€";
echo "<br>";
echo "verollinen hinta", $loppu, "€";
	
}
else {
	?>
	<form action="./index.php?sivu=harj5&kansio=Harj" method="post">
	Anna hinta:<br>
	<input type="text" name="hinta"><br>
	Anna alv%: <br>
	<input type="text" name="alv"><br>
	<input type="submit" value="laske">
	</form>
	
<?php
}
echo "<h2>5.4</h2>";
echo "arvonta";
echo "<br>";
if (!empty($_POST["luku"])) {
	$luku=$_POST ["luku"];
	$vastaus=mt_rand(1, 10);
	
if($luku==$vastaus) echo "Voitit";
else echo "ei osu";
}
else {
	?>
	<form action="./index.php?sivu=harj5&kansio=Harj" method="post">
	Anna luku 1-10:<br>
	<input type="text" name="luku"><br>
	<input type="submit" value="arvo">
	</form>	
	
<?php
}
echo "<h2>5.5</h2>";
echo "Valintarakenne";
echo "<br>";
if (!empty($_POST["arvosana"])) {
	$arvosana=$_POST ["arvosana"];

if($arvosana==1) echo "Säälittävä";
if($arvosana==2) echo "menettelee";
if($arvosana==3) echo "ihan ok";	
}
else {
	?>
	<form action="./index.php?sivu=harj5&kansio=Harj" method="post">
	Anna arvosanasi:
	<select name="arvosana">
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	</select>
	<input type="submit" value="valitse">
	</form>
<?php
}
