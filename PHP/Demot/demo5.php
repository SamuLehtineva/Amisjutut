<?php
/*********************
Laadi tiedosto demo5.php, jonka avulla voit tehdä yksinkertaisia laskutoimia.
@author: SL
@date: 25.10.2017

***************/
?>
<h1>Laskin</h1>
<form action="index.php?sivu=demo5&kansio=Demot" method="post">
Luku 1<input type="number" name="luku1"><br>
Luku 2<input type="number" name="luku2"><br>
<input type="submit" name="laske" value="+">
<input type="submit" name="laske" value="-">
<input type="submit" name="laske" value="*">
<input type="submit" name="laske" value="/">
</form>

<h2>Vastaus</h2>
<?php
if(!empty($_POST["luku1"]) && !empty($_POST["luku2"]) && !empty($_POST["laske"])) {
	$luku1=$_POST["luku1"];
	$luku2=$_POST["luku2"];
	$laske=$_POST["laske"];
	
	/*if($laske =="+") $vastaus=$luku1+$luku2;
	if($laske =="-") $vastaus=$luku1-$luku2;
	if($laske =="*") $vastaus=$luku1*$luku2;
	if($laske =="/") $vastaus=$luku1/$luku2;*/
	
	//sama switch - case -rakenteella
	
	switch($laske) {
		case "+":
		$vastaus = $luku1+$luku2;
		break;
		
		case "-":
		$vastaus = $luku1-$luku2;
		break;
		
		case "*":
		$vastaus = $luku1*$luku2;
		break;
		
		case "/":
		$vastaus = $luku1/$luku2;
		break;
		
		default:
		break;
		
	}
	
	echo $vastaus;
	
}