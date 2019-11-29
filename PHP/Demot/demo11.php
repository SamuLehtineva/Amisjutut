<?php
/************
@author Sl
@date 20.11.2017
******/
for($i=0; $i < 10; $i++) {
	$numerot[$i]=0;
	
}
print_r($numerot);

$numerot[0]=5;
$numerot[2]=3;
$numerot[3]=9;
$numerot[1]=2;
$numerot[9]=4;

$summa =0;

for($i = 0; $i < 10; $i++){
	echo $numerot[$i]."<br>";
	$summa = $summa + $numerot[$i];
	
}
echo "Lukujen summa on $summa";
