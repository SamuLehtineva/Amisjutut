<?php
/*******Demo 8, toistorakenteet, for
Laadi for-rakenteen avulla silmukka, joka tulostaa html-taulukkoon 20 x 20 kertotaulun.
@author SL
@date 13.11.2017
*********/
echo "<h2>Kertotaulu</h2>";

echo "<table>";

for($i = 1 ; $i <= 20; $i++) {
	echo "<tr>";
	for($j = 1; $j <= 20; $j++) {
		echo "<td>";
		$luku = $i * $j;
		echo $luku;
		echo "</td>";
	}
	echo "</tr>";
}

echo "</table>";