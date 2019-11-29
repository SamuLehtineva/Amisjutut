<?php
/*muokkaa/poista tietue
saa tiedot $_GEt-parametrista (pelaajan id, mode eli muokataanko vai poistetaanko)

1. tarkista onko id. Jos on jatkaa matkaa. Jos ei palaa edelliselle sivulle

2. jos id on tarkistaa muokataanko vai poistetaanko

3. jos mode=poista poista pelaaja ja forward edelliselle sivulle

4. jos mode=muokkaa
haetaan pelaajan tiedot kannasta
sijoitetaan tiedot lomakkeelle
kun lomake on lähetetty, päivitetään tietokanta
**************/
if(empty($_GET["id"])) header("Location:./index.php?sivu=demo15&kansio=Demot");
else{
	$id=$_GET["id"];
	if(!empty($_GET["mode"])) $mode=$_GET["mode"];
	else $mode="muokkaa";
//poistaminen
	require "yhteys.php";
	if($mode=="poista") {
		$sql = "DELETE FROM pelaajat WHERE id=$id";
		$lause=$yhteys->prepare($sql);
		$lause->execute();
		header("Location:../index.php?sivu=demo15&kansio=Demot");
	}
}