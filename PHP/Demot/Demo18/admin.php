<?php
session_start();

if(!isset($_SESSION["ktunnus"]) || $_SESSION["istuntoid"] != session_id()) {
	header("Location:./index.php?sivu=kirjaudu");
	die(); //estetään sivun latautuminen uudestaan
}
else
{
	require "./apu/admin_alku.php";

	if(!empty($_GET["sivu"])) $sivu=$_GET["sivu"];
	else $sivu="etusivu";

	$sallitut = array("admin_etusivu");
	if(in_array($sivu,$sallitut)) {
		$sivu="./sis/".$sivu.".php";
		require $sivu;
	}
	require"./apu/loppu.php";
}
?>