<?php
session_start(); //ensimmäiseksi
header("Pragma: No-cache");
include "../alku.php";
echo "Tässä käytetään edellä luodun istunnon muuttujia ja lopuksi tuhotaan istunto \n";

print session_encode()."\n";

if(isset($_SESSION["etunimi"])) echo $_SESSION["etunimi"]; //tarkistus
echo "Seuraavaksi tuhotaan rekisteröidyt muuttujat session_unset()-funktiolla \n";

echo "ja sitten itse istunto session_destroy():lla \n";

session_unset(); //poistaa istuntomuuttujat
session_destroy(); //poistaa istunnon
echo "<a href=\"demo17c.php\">Kolmannelle sivulle, jossa tämä istunto ei ole voimassa</a>";
include "../loppu.php";
?>