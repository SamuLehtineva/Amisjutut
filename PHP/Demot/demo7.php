<?php
/**********
Demo 7, toistorakenteet, for

Laadi for-rakenteen avulla silmukka, joka toistuu 10 kertaa ja tulostaa joka kerta kierroksen numeron.
@author SL
@date 6.11.2017
*************************************/
for($i = 1; $i <= 10 ; $i++) { 
	//$i on kierroslaskurimuuttuja, aluksi se on 1, sitten kun se on 10, suoritetaan viimeisen kerran silmukka, $i++ on sama kuin $i = $i = 1
	echo "kierrosnumero on $i<br>";
}

/*Laadi samaan tiedostoon 10 kertaa toistuva silmukka, joka laskee kierrosnumeroiden summan.*/
echo "<h3>Kohta 2</h3>";
$summa = 0;
for($i = 1; $i <= 10; $i++) { 
	$summa = $summa = $summa + $i;
	echo "Kierroksella $i summa on $summa <br>";
}
echo "Lopullinen summa on $summa";

/*Laadi samaan tiedostoon silmukka, joka tulostaa arvot 10:stä yhteen.*/
echo "<h3>Kohta 3</h3>";
for($i = 1; $i ; $i = $i-1) {
	echo "$i<br>";
}