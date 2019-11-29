<?php



echo(rand(1,100));
echo "<br>";

$ala=M_PI*2.5*2.5;
$piiri=M_PI*2.5;
echo "jos ympyrän halkaisija on 5 sen ala on $ala ja piiri on $piiri";
echo "<br>";


$ala=M_PI*5*5;
$piiri=M_PI*5;
echo "jos ympyrän halkaisija on 10 sen ala on $ala ja piiri on $piiri";
echo "<br>";

$ala=M_PI*100*100;
$piiri=M_PI*100;
echo "jos ympyrän halkaisija on 200 sen ala on $ala ja piiri on $piiri";
echo "<br>";

echo "<h2>Pyöristykset</h2>";

echo "1,5 pyöristetty alaspäin kokonaislukuihin on ", round(1.5, 0, PHP_ROUND_HALF_DOWN); 
echo "<br>";
echo "1.456 pyöristettynä ylöspäin kahden desimaalin tarkkuudella on ", round (1.456, 2, PHP_ROUND_HALF_UP);
echo "<br>";
echo "68995 pyöristettynä kymmenien tarkkuudella on ", round (68995, -1);
echo "<br>";
echo "124.558 pyöristettynä satojen tarkkuudella on ", round (124.558, -2);
echo "<br>";
echo "pyöristettynä ylöspän on ", ceil(3.14);

echo "<h2>muita juttuja</h2>";

echo "3 potenssiin 5 on ", pow(3, 5);
echo "<br>";
echo "49:n neliöjuuri on ", sqrt(49);
echo "<br>";
echo "255 heksadesimaalina on ", dechex(255);
echo "<br>";
echo "heksadesimaalin ff arvo desimaalilukuna on ", var_dump(hexdec("ff"));
echo "<br>";
echo "10008:n neliöjuur on ", sqrt(10008);
echo "<br>";
echo "2 heksadesimaalina on ", dechex(2);
echo "<br>";
echo "pienin näistä luvuista 15,4,8,15,2,45 on ", min( 15, 4, 8, 15, 2, 45);
echo "<br>";
echo "5 potenssiin 3 on ", pow(5, 3);
