<?php
session_start();

if(!isset($_SESSION["ktunnus"]) || $_SESSION["istuntoid"] != session_id()) {
	header("Location:./index.php?sivu=kirjaudu");
	die(); //estetään sivun latautuminen uudestaan
}
else
{
	session_unset();
	session_destroy();
	header("Location: ./index.php?sivu=kirjaudu");
}