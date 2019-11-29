<?php
/************
Laadi tiedosto demo4.php, jonka avulla voit kysyä ja tulostaa ruudulle käyttäjän nimen.
@author: SL
@date: 23.10.2017
********/

// ensin lomakkeenkäsittelijä
// jos lomake on lähetetty, suoritetaan lomakkeenkäsittelijä
if(!empty($_POST["nimi"])) {
	$nimi=$_POST["nimi"];
	echo $nimi;
}
// sitten vasta lomake
// jos lomaketta ei ole lähetetty, tulostetaan lomake
else {
	?>
	<form action="./index.php?sivu=demo4&kansio=Demot" method="post">
	Kirjoita nimesi:
	<input type="text" name="nimi">
	<input type="submit" value="lähetä nimi">
	</form> 
<?php
}
?>