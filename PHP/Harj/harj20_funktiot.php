<?php

function minimi($luku1,$luku2,$luku3)
{
	$min = min($luku1, $luku2, $luku3);
	return $min;
}

function maximi($luku1, $luku2, $luku3)
{
	$max = max($luku1, $luku2, $luku3);
	return $max;
}

function summa($luku1,$luku2,$luku3)
{
	$summa=$luku1+$luku2+$luku3;
	return $summa;
}

function keskiarvo($luku1,$luku2,$luku3)
{
	$keskiarvo=($luku1+$luku2+$luku3)/3;
	return $keskiarvo;
}

function verollinen($hinta,$vero)
{
	$veroarvo=$vero/100*$hinta;
	$verollinen=$veroarvo+$hinta;
	return $verollinen;
}

function veroton($verollinen,$veropros)
{
	$veroton=$verollinen/(100+$veropros)*100;
	$arvo=$veroton*$veropros/100;
	return $veroton;
}

function vero($veropros,$verollinen)
{
	$veroton=$verollinen/(100+$veropros)*100;
	$arvo=$veroton*$veropros/100;
	return $arvo;
}