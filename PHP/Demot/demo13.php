<?php

//Pääohjelma, käyttää funktiokirjastoa
require_once "demo13funktiot.php";

echo palauta_otsikkona("Tämän pitäisi olla otsikko");
echo "<br>";

$sana="HEI";
$otsikkona=palauta_otsikkona($sana);
echo $otsikkona;


$salasana = "salis";
$salasana=palauta_md5($salasana);
echo $salasana;
echo"<br>";

$kirjain="k";
if(on_vokaali($kirjain))
	echo "$kirjain on vokaali";
else echo "$kirjain ei ole vokaali";