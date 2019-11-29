<?php
require "./apu/alku.php";

if(!empty($_GET["sivu"])) $sivu=$_GET["sivu"];
else $sivu="etusivu";

$sallitut = array("etusivu", "kirjaudu");
if(in_array($sivu,$sallitut)) {
	$sivu="./sis/".$sivu.".php";
	require $sivu;
}

require "./apu/loppu.php";