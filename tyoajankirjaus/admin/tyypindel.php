<?php
require "../tavara/yhteys.php";

if (isset($_GET['tyyppiID'])) $tyyppiID = $_GET['tyyppiID'];

if(empty($_GET["tyyppiID"])) header("Location:tyypit.php");
else {
$sql = "DELETE FROM to_tyypit WHERE tyyppiID=$tyyppiID";
		$lause=$yhteys->prepare($sql);
		$lause->execute();
		header("Location:tyypit.php");
	}
?>