<?php

function palauta_otsikkona($sana)
{
	$otsikko = "<h1>$sana</h1>";
	return $otsikko;
}

function palauta_md5($sana)
{
	$suolattu="puppua";
	$suolattu.=$sana;//lisäää perään sanan, muuttuja sisältää nyt "puppua"
	$suojattu = md5($suolattu);
	return$suojattu;
}


function on_vokaali($kirjain)
{
	$vokaalit=array("a","e","i","o","u","y","ä","ö","å");
	if(in_array($kirjain,$vokaalit)) {
		return true;
	}
	else {
		return false;
	}
}