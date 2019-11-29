<?php
/*************
@author: SL
@date: 9.11.2017
************/
echo "<h2>11.1</h2>";
$i=2;
while($i <=2000) {
	echo "$i";
	$i = $i*2;
	echo "<br>";
}

echo "<h2>11.2</h2>";
if(!empty($_POST["numero"]) && !empty($_POST["potenssi"])) {
	$numero = $_POST["numero"];
	$potenssi = $_POST["potenssi"];
	$vastaus =$numero*$potenssi;
echo "$vastaus<br>";
}
else {
?>
<form action="./index.php?sivu=harj11&kansio=Harj" method="post">
Anna numero:<br>
<input type="text" name="numero"><br>
Anna kertoja:<br>
<input type="text" name="potenssi"><br>
<input type="submit" value="laske">
</form>

<?php
}

echo "<h2>11.3</h2>";
echo "Tämä laskee paljonko auto maksaa x vuoden kuluttua jos sen hinta alenee 10% joka vuosi<br>";
if(!empty($_POST["hinta"]) && !empty($_POST["vuosi"])) 	{
	$hinta = $_POST["hinta"];
	$vuosi = $_POST["vuosi"];
	$i=0;
	while($i < $vuosi) {
	$hinta = $hinta*0.9;
	$i++;
	}
	echo "$hinta", "€";
}
else {
?>
<form action="./index.php?sivu=harj11&kansio=Harj" method="post">
Anna uuden auton hinta:<br>
<input type="text" name="hinta"><br>
Anna vuosimäärä:<br>
<input type="text" name="vuosi"<br>
<input type="submit" value="laske">
</form>

<?php	
}