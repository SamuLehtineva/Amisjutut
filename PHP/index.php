<?php 
/*****************
Harjoitusten palautussivu
saa syötteekseen HTTP-pyynnössä GET-metodissa sivu-nimisen parametrin ja kansio-nimisen parametrin

pyyntö on siis muotoa

http:://magnesium/17tvpt02a/samu.lehtineva/PHP/index.php?sivu=harj1&kansio=Harj

@author:SL
@date:11.10.2017
**************/



session_start();

if(!isset($_SESSION["ktunnus"]) || $_SESSION["istuntoid"] != session_id()) {
	header("Location:kirjautumislomake.php");
	die(); //estetään sivun latautuminen uudestaan
}



require "alku.php";

?>
<p><a href="kirjaudu_ulos.php">Kirjaudu ulos</a></p>
<h2>demot</h2>
<ul>
	<li><a href="./index.php?sivu=demo1&kansio=Demot">Demo1 </a></li>
	<li><a href="./index.php?sivu=rdemo1&kansio=Demot">RDemo1 </a></li>
	<li><a href="./index.php?sivu=demo3&kansio=Demot">Demo3 </a></li>
	<li><a href="./index.php?sivu=demo4&kansio=Demot">Demo4 </a></li>
	<li><a href="./index.php?sivu=demo5&kansio=Demot">Demo5 </a></li>
	<li><a href="./index.php?sivu=demo7&kansio=Demot">Demo7 </a></li>
	<li><a href="./index.php?sivu=demo8&kansio=Demot">Demo8 </a></li>
	<li><a href="./index.php?sivu=demo9&kansio=Demot">Demo9 </a></li>
	<li><a href="./index.php?sivu=demo10&kansio=Demot">Demo10 </a></li>
	<li><a href="./index.php?sivu=demo11&kansio=Demot">Demo11 </a></li>
	<li><a href="./index.php?sivu=demo12&kansio=Demot">Demo12 </a></li>
	<li><a href="./index.php?sivu=demo13&kansio=Demot">Demo13 </a></li>
	<li><a href="./index.php?sivu=demo14&kansio=Demot">Demo14 </a></li>
	<li><a href="./index.php?sivu=demo15&kansio=Demot">Demo15 </a></li>
	<li><a href="./index.php?sivu=demo16a&kansio=Demot">Demo16 </a></li>
	<li><a href="./index.php?sivu=demo19&kansio=Demot">Demo19 </a></li>
</ul>

<h2>harjoitukset</h2>
<ul>
	<li><a href="./index.php?sivu=harj1&kansio=Harj">harjoitus1 </a></li>
	<li><a href="./index.php?sivu=harj2&kansio=Harj">harjoitus2 </a></li>
	<li><a href="./index.php?sivu=harj3&kansio=Harj">harjoitus3 </a></li>
	<li><a href="./index.php?sivu=harj5&kansio=Harj">harjoitus5 </a></li>
	<li><a href="./index.php?sivu=harj6&kansio=Harj">harjoitus6 </a></li>
	<li><a href="./index.php?sivu=harj7&kansio=Harj">harjoitus7 </a></li>
	<li><a href="./index.php?sivu=harj9&kansio=Harj">harjoitus9 </a></li>
	<li><a href="./index.php?sivu=harj10&kansio=Harj">harjoitus10 </a></li>
	<li><a href="./index.php?sivu=harj11&kansio=Harj">harjoitus11 </a></li>
	<li><a href="./index.php?sivu=harj12&kansio=Harj">harjoitus12 </a></li>
	<li><a href="./index.php?sivu=harj13&kansio=Harj">harjoitus13 </a></li>
	<li><a href="./index.php?sivu=harj14&kansio=Harj">harjoitus14 </a></li>
	<li><a href="./index.php?sivu=harj15&kansio=Harj">harjoitus15 </a></li>
	<li><a href="./index.php?sivu=harj16&kansio=Harj">harjoitus16 </a></li>
	<li><a href="./index.php?sivu=harj17&kansio=Harj">harjoitus17 </a></li>
	<li><a href="./index.php?sivu=harj18&kansio=Harj">harjoitus18 </a></li>
	<li><a href="./index.php?sivu=harj19&kansio=Harj">harjoitus19 </a></li>
	<li><a href="./index.php?sivu=harj20&kansio=Harj">harjoitus20 </a></li>
	<li><a href="./index.php?sivu=harj21&kansio=Harj">harjoitus21 </a></li>
	<li><a href="./index.php?sivu=harj24&kansio=Harj">harjoitus24 </a></li>
	<li><a href="./index.php?sivu=rakenneharjoitus4&kansio=Harj">rakenneharjoitus4 </a></li>
</ul>
<hr>


<?php

// välissä sisällytetään itse sivu ja tulostetaan lähdekoodi
require "ekavali.php"; //ulkoasukoodi

if(isset($_GET["sivu"]))
	$sivu = $_GET["sivu"];
else
	$sivu = "harj1";
	
if(isset($_GET["kansio"]))
	$kansio = $_GET["kansio"];
else
	$kansio = "Harj";
echo "<h2>Harjoitus $sivu</h2>";


$sallitut = array("harj1", "harj2", "harj3", "harj4", "harj5", "harj6", "harj7", "harj9", "harj10", "harj11", "harj12", "harj13",
 "harj14", "harj15", "harj16", "harj17", "harj18", "harj19", "harj20", "harj21", "demo1", "rdemo1", "demo2", "demo3",
 "demo3_lomakkeenkasittelija", "demo4", "demo5", "demo7", "demo8", "demo9", "demo10", "demo11", "demo12", "demo13", "demo14",
 "demo15", "demo15b", "demo15c", "demo16a", "demo16b", "demo16c", "demo19", "harj21a", "harj21b", "harj24", 
 "rakenneharjoitus4");
if(in_array($sivu, $sallitut)) {
	$polku = "./".$kansio."/".$sivu.".php"; // on merkkijono ./kansio/sivu
	require $polku;
	
	//ulkoasurivi
	require "tokavali.php";
	echo "<h2>lähdekoodi</h2>";

	echo "<hr>";
	highlight_file($polku);
}

else
	echo "Tiedostoa ei löydy";

require "loppu.php";
?>
