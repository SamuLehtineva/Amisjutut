<?php
session_start(); //tarvitaan jokaisessa tiedostossa
//laita aina kaikkein ensimmäiselle tiedoston riville (oltava utf-8 without BOM)
header("Pragma: No-cache");//otetaan välimuisti pois käytöstä
include "../alku.php";

echo "Hei, aloitit juuri istunnon, jonka ID on ".session_id()."\n";
$_SESSION["etunimi"]="Leevi";
$_SESSION["sukunimi"]="Syrjäkylä";
$_SESSION["jokunimi"]="Jaska Jokunen";

echo "<br>Asetit sessiomuuttujiksi etunimen Leevi, sukunimen Syrjäkylä";

echo "<br>Muuttujat on tallennettu palvelimelle tilapäiseen tiedostoon.";

echo "<br>Niiden tilan voi nähdä session_encode()-funktiolla. \n";

echo session_encode()."\n";//näyttää taulukkomuuttujan arvot

echo "Tilapäinen tiedosto on kansiossa".session_save_path()."";

echo "<a href=\"demo17b.php\">Toiselle sivulle, joka näyttää muuttujien käytön</a>";
include "../loppu.php";
?>