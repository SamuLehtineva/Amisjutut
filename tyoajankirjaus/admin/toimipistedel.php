<?php
require "../tavara/yhteys.php";

if (isset($_GET['toimipisteID'])) $toimipisteID = $_GET['toimipisteID'];

if(empty($_GET["toimipisteID"])) header("Location:toimipiste.php");
else {
$sql = "DELETE FROM to_toimipiste WHERE toimipisteID=$toimipisteID";
		$lause=$yhteys->prepare($sql);
		$lause->execute();
		header("Location:toimipiste.php");
	}
?>