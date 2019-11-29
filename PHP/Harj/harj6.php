<?php

echo "<h2>61</h2>";
echo "laske palkkasi";
echo "<br>";
if(!empty($_POST ["tunnit"]) && !empty($_POST ["palkka"]) && !empty($_POST ["veropros"])) {
	$tunnit=$_POST["tunnit"];
	$palkka=$_POST["palkka"];
	$veropros=$_POST["veropros"];
	$brutto=$tunnit*$palkka;
	$vero=$brutto*$veropros/100;
	$netto=$brutto-$vero;
	
echo "bruttopalkka ", $brutto, "<br>";
echo "vero ", $vero, "<br>";
echo "nettopalkka ", $netto, "<br>";
}
else {
	?>
	<form action="./index.php?sivu=harj6&kansio=Harj" method="post">
	Anna tehdyt tunnit:<br>
	<input type="text" name="tunnit"><br>
	Anna tuntipalkka:<br>
	<input type="text" name="palkka"><br>
	Anna veroprosenntti:<br>
	<input type="text" name="veropros"><br>
	<input type="submit" value="laske"><br>
	</form>
<?php	
}
echo "<h2>6.2</h2>";
echo "Laske tuotteen hinta";
echo "<br>";
if (!empty($_POST ["ykshinta"]) && 	!empty($_POST ["määrä"])
	&& !empty($_POST ["alepros"])) {
	$ykshinta=$_POST["ykshinta"];	
	$määrä=$_POST["määrä"];
	$alepros=$_POST["alepros"];
	$summa=$ykshinta*$määrä;
	$ale=$summa*$alepros/100;
	$alennettu=$summa-$ale;
echo $summa, "<br>";
echo $ale, "<br>";
echo $alennettu, "<br>";
}
else {
	?>
	<form action="./index.php?sivu=harj6&kansio=Harj" method="post">
	Anna yksikköhinta:<br>
	<input type="text" name="ykshinta"><br>
	Anna määrä:<br>
	<input type="text" name="määrä"><br>
	Anna alennusprosentti:<br>
	<input type="text" name="alepros">
	<input type="submit" value="laske">
	</form>
	
<?php
}
echo "<h2>6.3</h2>";
echo "Valitse pienempi tai suurempi";
echo "<br>";
if(!empty($_POST ["luku1"]) && !empty($_POST ["luku2"])) {
	$luku1=$_POST["luku1"];
	$luku2=$_POST["luku2"];
	
	if($luku1 > $luku2) {
		$pienempi=$luku2;
		$suurempi=$luku1;
	}
	else {
		$pienempi=$luku1;
		$suurempi=$luku2;
	}
	if($_POST["valinta"]=="pienempi") echo $pienempi; else echo $suurempi;
}
else {
	?>
	<form action="./index.php?sivu=harj6&kansio=Harj" method="post">
	Anna luku 1:
	<input type="text" name="luku1"><br>
	Anna luku 2:
	<input type="text" name="luku2"><br>
	Tulosta suurempi
	<input type="radio" name="valinta" value="suurempi">
	Tulosta pienempi
	<input type="radio" name="valinta" value="pienempi">
	<input type="submit" value="lähetä">
	</form>
	

<?php	
}
echo "<h2>6.4</h2>";
echo "anna arvosanasi";
echo "<br>";
if(!empty($_POST["arvosana"])) {
	$arvosana=$_POST["arvosana"];
switch($arvosana) {
	case "0":
	$teksti="säälittävä";
	break;
	
	case "1":
	$teksti="surkea";
	break;
	
	case "2":
	$teksti="huono";
	break;
	
	case "3":
	$teksti="menettelee";
	break;
	
	case "4":
	$teksti="Ok";
	break;
	
	case "5":
	$teksti="hyvä";
	break;
	}
	echo $teksti;
}
else {
	?>
	<form action="./index.php?sivu=harj6&kansio=Harj" method="post">
	Anna arvosanasi:
	<select name="arvosana">
	<option value="0">0</option>
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
	</select>
	<input type="submit" value="lähetä">
	</form>
<?php
}