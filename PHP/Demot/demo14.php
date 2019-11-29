<?php
/******
Luo seuraava taulu käyttäen PHP:tä ja PDO-luokkaa hyväksi.
Mieti sopivat tietotyypit kentille:

taulun nimi on pelaajat
id
ktunnus (vähintään 3 merkkiä, ei yli 30 merkkiä)
salasana (vähintään 5 merkkiä, varaa merkkejä md5-suojaukseen (50)
email
viimeksi_kirjautunut
online
rahaa
nykyinen_hahmo
suljettu_ulos
************/
//1. ota yhteys
require "yhteys.php"; //yhteys kantaan

//2. rakenna sql
$sql = "CREATE TABLE IF NOT EXISTS pelaajat (
id int(6) NOT NULL AUTO_INCREMENT,
ktunnus VARCHAR(30) NOT NULL,
SALASANA varchar(60) NOT NULL,
email VARCHAR(50),
viimeksi_kirjautunut DATE,
online BOOLEAN,
rahaa DECIMAL(15,2),
nykyinen_hahmo VARCHAR(10),
suljettu_ulos BOOLEAN,
PRIMARY KEY (id)
) ENGINE innoDB default charset=utf8 AUTO_INCREMENT=1";

//3. Valmistele ja suorita lause
$lause = $yhteys->prepare($sql);
$lause -> execute();

//4. tulosta kaikki käyttäjä nimet

$sql = "SELECT ktunnus FROM pelaajat";
foreach($yhteys->query($sql) as $tietue) {
	echo "Pelaaja ".$tietue["ktunnus"]."<br>";
}

//5. Hakee kaikki käyttäjätunnukset ja sähköpostit

$sql = "SELECT ktunnus,email FROM pelaajat";


foreach($yhteys->query($sql) as $tietue) {
	echo "Pelaajan ".$tietue["ktunnus"]." sähköposti on ".$tietue["email"]."<br>";
}

//6. hakee kaikki pelaajar jotka ovat kirjautuneet tänään

$nyt = date('Y-m-d');
$sql ="SELECT ktunnus FROM pelaajat WHERE viimeksi_kirjautunut ='$nyt'";

//7. hae kaikki pelaajat joita ei ole suljettu ulos

$sql ="SELECT ktunnus FROM pelaajat WHERE suljettu_ulos=0";

foreach($yhteys->query($sql) as $tietue) {
	echo "Pelaaja ".$tietue["ktunnus"]." ei ole suljettu ulos<br>";
}
// KATKAISE YHTEYS
$yhteys =NULL;