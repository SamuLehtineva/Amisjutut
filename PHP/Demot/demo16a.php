<?php
/*
Lomake, joka pyytää käyttäjän nimen ja sisältää piilokentän nimeltään "salajuttu" (demo16a.php)
Sivu, joka tallentaa nimen ja salajutun evästeeseen (30 minuutin) ja lähettää edelleen kolmannelle sivulle (demo16b.php)
Kolmas sivu tulostaa sekä nimen että salajutun ja tuhoaa sitten evästeen (demo16c.php).*/

?>
<form action="./index.php?sivu=demo16b&kansio=Demot" method="post"
Kirjoita nimesi<br>
<input type="text2" name="nimi"><br>
<input type="hidden" name="salajuttu" value="erittäin salainen">
<input type="reset" value="Tyhjennä"><br>
<input type="submit" value="Lähetä">
</form>