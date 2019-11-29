<?php
if(!empty($_POST["kk"]) && !empty($_POST["paiva"])){
	$kuukausi = array(31, 28, 31,30, 31, 30, 31, 31, 30, 31, 30, 31);
	$kk=$_POST["kk"];
	$paiva=$_POST["paiva"];
	for($i=0;$i <= $kk-1;$i++)
	$summa=0;
	{
		$summa= $summa + $kuukausi[$i];
	}
	$summa = $summa + $paiva;
	echo $summa;
}
else {
	?>
	<form action="./index.php?sivu=harj16&kansio=Harj" method="post">
	Anna kuukausi:<br>
	<input type="text" name="kk"><br>
	Anna päivä:<br>
	<input type="text" name="paiva"><br>
	<input type="submit" value="laske">
	</form>
	
	
<?php
}
/*******
Ohjelma arpoo lukuja väliltä 0-10 ja sijoittaa ne järjestyksessä taulukkoon
Ohjelma laskee taulukon arvojen summan
Ohjelma etsii taulukon pienimmän arvon ja sen paikan
Ohjelma tulostaa lopuksi sekä taulukon, arvojen summan, pienimmän ja sen paikan.
*/
echo "<h2>16.2</h2>";
echo "<br>";
for($i=0; $i < 10; $i++) {
	$numerot[$i]=rand(0, 10);
}
print_r($numerot);
echo "<br>";
$tulo = 0;
for($j=0;$j < 10;$j++) {
	$tulo = $tulo + $numerot[$j];
}
echo $tulo."<br>";
echo "pienin ".min($numerot);
echo "<br>";
$min = min($numerot);
for($i=0;$i <10;$i++){
	if($numerot[$i] == $min)
		echo "paikka ".$i;
}