<?php
//Kirjautumislomake
if(!empty($_GET["puuttuu"])) echo "Tietoja puuttuu!";
if(!empty($_GET["vaarin"])) echo "Tiedot väärin!";


?>

<form action="./tarkista_kirjautuminen.php" method="post">
Käyttäjätunnus<br>
<input type="text" name="ktunnus"><br>
Salasana<br>
<input type="password" name="salasana"><br>
<input type="reset" value="Tyhjennä">
<input type="submit" value="Lähetä">
</form>