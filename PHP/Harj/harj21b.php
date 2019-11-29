<?php
if(empty($_GET["id"])) header("Location:./index.php?sivu=harj21&kansio=Harj");
else{
	$id=$_GET["id"];
	if(!empty($_GET["mode"])) $mode=$_GET["mode"];
	else $mode="muokkaa";
//poistaminen
	require "yhteys.php";
	if($mode=="poista") {
		$sql = "DELETE FROM uutinen WHERE id=$id";
		$lause=$yhteys->prepare($sql);
		$lause->execute();
		header("Location:../index.php?sivu=harj21&kansio=Harj");
	}
}