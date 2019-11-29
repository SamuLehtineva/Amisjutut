<?php
session_start(); //ensimmäinen asia
header("Pragma: No-cache");
include "../alku.php";
echo "Tässä tutkitaan, onko edellisen istunnon muuttujat voimassa ja lopuksi tuhotaan senhetkinen istunto \n";

echo "Olet istunnossa, jonka muuttujat ovat ".session_encode()."\n";

if(isset($_SESSION["etunimi"])) echo $_SESSION["etunimi"];
else echo "Etunimeä ei löydy";

session_unset();
session_destroy();

include "../loppu.php";
?>