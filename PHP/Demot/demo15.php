<?php
/*lisää tietoja tauluun*/

//1. ota yhteys
require "yhteys.php";

//Lomakkeen käsittelijä
if(!empty($_POST["ktunnus"]) && !empty($_POST["salasana"])) {
	$ktunnus=$_POST["ktunnus"];
	$salasana=$_POST["salasana"];
	if(!empty($_POST["email"])) $email=$_POST["email"];
	else $email=NULL;
	//2. rakenna sql
	
	$sql="INSERT INTO pelaajat(ktunnus,salasana,email) VALUES('$ktunnus','$salasana','$email')";
	
	//3. valmistele ja suorita
	
	$lause=$yhteys ->prepare($sql);
	$lause->execute();
	
}



//lomake, pakolliset kentät ktunnus, salasana
?>
<h2>Rekisteröidy</h2>
<form action="./index.php?sivu=demo15&kansio=Demot" method="post">
Käyttäjätunnus<br>
<input type="text" name="ktunnus" required><br>
Salasana<bR>
<input type="password" name="salasana" required><br>
Email<br>
<input type="email" name="email"><br>

<input type="submit" value="Rekisteröidy">
</form>

<h2>Pelaajat</h2>
<?php
$sql="SELECT ktunnus,id FROM pelaajat";

foreach($yhteys->query($sql) as $tietue) {
echo $tietue["ktunnus"]."<a href=\"index.php?sivu=demo15c&kansio=Demot&mode=muokkaa&id=".$tietue["id"]."\">Muokkaa</a>";

echo "<a href=\"./Demot/demo15b.php?kansio=Demot&mode=poista&id=".$tietue["id"]."\">Poista</a><br>";
}