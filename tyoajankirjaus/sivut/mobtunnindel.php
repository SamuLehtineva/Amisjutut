<?php
require "../tavara/yhteys.php";

if (isset($_GET['tID'])) $tID = $_GET['tID'];
if (isset($_GET['month'])) $month = $_GET['month'];
if (isset($_GET['pvm'])) $pvm = $_GET['pvm'];

if(empty($_GET["tID"])) header("Location:karuselli.php");
else {
$sql = "DELETE FROM to_tunti WHERE tID=$tID";
		$lause=$yhteys->prepare($sql);
		$lause->execute();
		header("Location:karuselli.php?month=$month&pvm=$pvm");
	}
?>