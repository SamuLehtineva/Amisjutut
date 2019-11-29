<?php
//Sivu, joka tallentaa nimen ja salajutun evästeeseen (30 minuutin) ja lähettää edelleen kolmannelle sivulle (demo16b.php)

if(!empty($_POST["nimi"]) && !empty($_POST["salajuttu"])) {
	$nimi=$_POST["nimi"];
	$sala=$_POST["salajuttu"];
	
	setcookie("nimi",$nimi,time() +1800);
	setcookie("salajuttu",$sala,time() +1800);
	
	header("Location:./index.php?sivu=demo16c&kansio=Demot");
}
else header("Location:./index.php?sivu=demo16a&kansio=Demot");