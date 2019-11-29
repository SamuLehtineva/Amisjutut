<?php
/*****
Tee taulukko-muuttuja $ruuat, johon lisäät 5 eri ruoka-ainetta.

Tulosta taulukon sisältö näytölle print_r -funktion avulla
*********/

$ruuat = array("kananmuna"=>"valkoinen", "jauho"=>"valkoinen" , "tilli"=>"vihreä", "pippuri"=>"musta", "kaneli"=>"ruskea");

print_r($ruuat);
echo "<hr>";

$nimet = array("Samu", "Petteri", "Pekka", "Liisa", "Tuomas");

foreach ($nimet as $avain => $arvo) {
	echo $avain." on ".$arvo."<br>";
}