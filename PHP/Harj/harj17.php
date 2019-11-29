<?php
echo "<h2>17.1 <br></h2>";
echo "1.addslashes lisää kauttamerkkejä <br>
2.bin2hex tekee binarystä hexadesimaalin <br>
3.chr palauttaa tietyn merkin <br>
4.echo tulostaa merkkijonon <br>
5.explode hajottaa merkkijonon <br>
6.htmlentities tekee kaikista merkeistä html entityjä <br>
7.htmlspecialchars tekee erikois merkeistä html entityjä <br>
8.join yhdistää luettelon sisällöt <br>
9.lcfirst tekee merkkijonon ekasta kirjaimesta pienen <br>
10.md5 laskee merkkijonon md5 arvon  <br>
11.str_replace korvaa merkkijonon toisella <br>
12.strlen kertoo merkkijonon pituuden <br>
13.strstr kertoo missä merkkijonon ensimmäisen esiintymisen <br>
14.strtolower tekee merkkijonon kirjaimista pieniä <br>
15.strtoupper tekee merkkijonon kirjaimista isoja <br>
16.trim poistaa merkkijonon alusta ja lopusta merkin";

echo "<h2>17.2</h2>";
$jono="abcdefgh";
echo "1. ", substr($jono,0,3);
echo "<br>";
echo "2. ", substr($jono,2,5);
echo "<br>";
echo "3. ", substr($jono,4,7);

echo "<h2>17.3</h2>";
$salasana ="Helsinki";
$salasana = strtoupper($salasana);
echo $salasana;
echo "<br>";
$salasana ="Helsinki";
$salasana = strtolower($salasana);
echo $salasana;
echo "<br>";
$salasana ="Helsinki";
echo strlen($salasana);