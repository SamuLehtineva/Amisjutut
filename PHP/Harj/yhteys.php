<?php
//ottaa yhteyden tietokantaan, palauttaa olion muuttujan ($yhteys)
$host = "magnesium"; //jos et tiedä kokeile localhost
$user ="17aslehtineva";
$pass = "salasana";
$skeema ="17aslehtineva";
try{
	$yhteys = new PDO("mysql:host=$host;dbname=$skeema;charset=utf8",$user,$pass);
}
catch(PDOException $e) {
	echo $e->getMessage();
}