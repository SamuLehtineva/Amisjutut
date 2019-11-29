<?php



$äidinikä=30;
$isänikä=34;
$lapsenikä=5;
$summa=$äidinikä+$isänikä+$lapsenikä;
$synnytys=$äidinikä-$lapsenikä;
$syntymä=2017-$isänikä;

echo "iät yhteensa $summa<br>";
echo "<br>";
echo "äiti oli $synnytys vuotias kun lapsi syntyi<br>";
echo "<br>";
echo "isä syntyi vuonna $syntymä<br>";

define("KERROIN",3);

$tulos=KERROIN*1000;

echo KERROIN;
echo "<br>";
echo "$tulos<br>";

$luku=3;
$lasku=KERROIN*$luku;

echo "$lasku<br>";