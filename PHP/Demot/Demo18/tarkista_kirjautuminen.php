<?php
if(!empty($_POST["ktunnus"]) && !empty($_POST["salasana"])) {
	$ktunnus=$_POST["ktunnus"];
	$salasana=$_POST["salasana"];
	
	if($ktunnus == "Samu" && $salasana == "salasana"){
	
		session_start(); //aloittaa istunnon
		$_SESSION["istuntoid"] = session_id();
		$_SESSION["ktunnus"] = $ktunnus;
		header("Pragma: No-Cache");
		header("Location: admin.php");
		die();
	}
	else header("Location: index.php?sivu=kirjaudu&vaarin=true");
}
else header("Location:index.php?sivu=kirjaudu&puuttuu=true");