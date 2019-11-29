<?php

/*1.3 Lisää sivuun html-alku kirjoittamalla se ennen php:n aloitustagia./*

Muuta se sitten php:n sisälle. Käy välissä katsomassa muutoksen vaikutus html-lähdekoodiin.*/


/****************************************
Demo 1, peräkkäisrakenteet
@author Samu L
@date 4.10.2017
*****************************/

/*1.1 Laadi PHP:tä hyväksikäyttämällä sivu, jossa tulostuu ruudulle
 "Hello World!".
 1.2
 Muuta teksti "Hello World!" h1-tasoiseksi otsikoksi.
 */
 
 
echo "<h1>Hello world!</h1>\n";
/* 1.4 Lisää sivulle kappale, jossa lukee seuraava kuolematon lause "Kun hyppäät ilosta ilmaan, varo, ettei kukaan vedä maata jalkojesi alta (Stanislaw Jerzy Lec)" Lainausmerkkien tulee myös olla näkyvissä.
1.5 Lisää edelliseen lauseeseen html-rivinvaihto pilkkujen jälkeen. Lisää myös lähdekoodiin html-lähdekoodissa näkyvät rivinvaihdot.*/

echo "<p>\"Kun hyppäät ilosta ilmaan, varo ettei kukaan vedä maata jalkojesi alta (Stanislaw Jerzy Lec)\" </p>\n<br>\n";

/*1.6 Sijoita oma nimesi talteen koneen muistiin (muuttujaan $omanimi), muuttujan nimi kuvaa sisältöä. */
$omanimi="Samu";


/*1.7 Tulosta seuraava lause: "Kirjoittajan nimi on " ja lauseen jälkeen muuttujassa oleva nimi. */

echo "kirjoittajan nimi on $omanimi<br>\n";

/*1.8 Sijoita muuttujaan $luku1 arvo 5. Tulosta luku selityksen kera ruudulle. */

$luku1 = 9;
echo "luku 1 on $luku1<br>\n";

/* 1.9 Käytä edellisen tehtävän muuttujaan. Tee seuraavat laskelmat ja tulosta niiden tulos selityksen kera ruudulle:
$summa = $luku1 + $luku1;
$erotus = $luku1 - $luku1;
$tulo = $luku1 * $luku1; */
$summa = $luku1 + $luku1;
$erotus = $luku1 - $luku1;
$tulo = $luku1 * $luku1;

echo "summa on $summa<br>\n";
echo "erotus on $erotus<br>\n";
echo "tulo on $tulo<br>\n";

/*Sijoita pienen taikinan arvot vakiomuuttujiin ja tulosta ruudulle ainesosat yhden sokeridesilitran, kolmen sokeridesilitran ja 5 sokeridesilitran mukaan. Tee ainesosien määrän laskenta kaavoilla.

Ruudun tulostuksen tulkee näyttää suurin piirtein seuraavalta:

Pieni taikina
Sokeria 1 dl
Rasvaa 200 g
Jauhoja 3 dl*/
define("sokeri",1);
define("rasva",200);
define("jauho",3);

echo "<h3>pieni taikina</h3>";
$annos=1;
$sokeria=sokeri*$annos;
$rasvaa=rasva*$annos;
$jauhoja=jauho*$annos;

echo "taikinaan tarvitaan sokeria $sokeria dl, rasvaa $rasvaa grammaa ja jauhoja $jauhoja dl<br>\n";

echo "<h3>keskikokoinen taikina</h3>";
$annos=2;
$sokeria=sokeri*$annos;
$rasvaa=rasva*$annos;
$jauhoja=jauho*$annos;

echo "taikinaan tarvitaan sokeria $sokeria dl, rasvaa $rasvaa grammaa ja jauhoja $jauhoja dl<br>\n";
