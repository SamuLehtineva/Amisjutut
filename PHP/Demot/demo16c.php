<?php
//Kolmas sivu tulostaa sekä nimen että salajutun ja tuhoaa sitten evästeen (demo16c.php).
echo $_COOKIE["nimi"];
echo "<hr>ja salainen asia piilokentässä oli ";
echo $_COOKIE["salajuttu"];

setcookie("nimi","",time() +1800);
setcookie("salajuttu","",time() +1800);
?>