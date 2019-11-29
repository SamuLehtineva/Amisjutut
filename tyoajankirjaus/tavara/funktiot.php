<?php

function tulosta_alku()
{
    require "./tavara/alku.php";
    date_default_timezone_set("Europe/Helsinki");
}

function tulosta_admin_alku()
{
    require "./tavara/admin_alku.php";
    date_default_timezone_set("Europe/Helsinki");
}

function tulosta_loppu()
{
    require "./tavara/loppu.php";
}

function tulosta_admin_loppu()
{
    require "./tavara/admin_loppu.php";
}

function tulosta_sisalto($sivu)
{
    $sallitut=array('etusivu','rekisteroidy');
    if(in_array($sivu,$sallitut))     {
        $sivu=$sivu.".php";
        require "./sivut/$sivu";
    }
    else require "./etusivu.php";
}

function tulosta_admin_sisalto($sivu)
{
    $sallitut=array('muokkaa_omia_tietoja','lisaa_juttu','muokkaa_juttua','admin_etusivu');
    if(in_array($sivu,$sallitut))     {
        $sivu=$sivu.".php";
        require "./tavara/$sivu";
    }
    else require "./tavara/admin_etusivu.php";
}
function putsaa($sana)
{
    $sana=trim($sana);//poistaa tyhjät merkit merkkijonon alusta ja lopusta
    //$sana=htmlspecialchars($sana); //muuntaa html-tagit entiteeteiksi
    return $sana;
}
function muunna_salasana($sana) //apufunktio salasanan vahvistusta varten
{
    $sana.="puppu";
    $sana=md5($sana);
    return $sana;
}
