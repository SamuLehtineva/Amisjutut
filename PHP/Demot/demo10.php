<?php
/********Demo10, while
Laadi tiedosto, jossa arvotaan satunnainen numero ja käydään läpi silmukan avulla luvut 1:stä kymmeneen sekä
kerrotaan onko kierrosluku sama , isompi vai pienempi kuin arvottu luku.
@author SL
@date 13.11.2017
*******/

$satunnainen = rand(1,10);
$kierros = 1;

while($kierros <=10) {
	if($kierros < $satunnainen) echo "kierros $kierros on pienenmpi kuin $satunnainen<br>";
	else {
		if($kierros == $satunnainen) echo "Luvut ovat samat<br>";
		else echo "Kierros $kierros on suurempi kuin $satunnainen<br>";
	}
	$kierros++;
}