<?php
/********************
@author SL
@date 6.11.2017
*****************/
$i = 1; //alkuarvo

while($i <=10) { //lopetusehto
	
	echo "Kierros $i<br>";
	$i++; //kasvatusehto
}
echo "<h3>Alaspäin</h3>";

$i=10; //alkuarvo
while($i > 0) {
	echo "KIerros $i<br>";
	$i = $i - 1;
}