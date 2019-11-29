<?php

/**********
Demo 3, Yksinkertainen lomake
Laadi sitten tiedosto demo3_lomakkeenkasittelija.php,
joka tulostaa käyttäjän nimen kuvaruudulle.
@author: SL
@date: 23.10.2017
***/
if(!empty($_POST["nimi"]))
	$nimi=$_POST["nimi"];
else $nimi="ei nimeä";

echo $nimi;