<?php
session_start();
require "tavara/tkfunktiot.php";
require "tavara/funktiot.php";
$id = hae_id_kannasta($email,$salasana);
$month = date('m');
    switch($month){
        case "1":
            $month = "Tammikuu";
            break;
        case "2":
            $month = "Helmikuu";
            break;
        case "3":
            $month = "Maaliskuu";
            break;
        case "4":
            $month = "Huhtikuu";
            break;
        case "5":
            $month = "Toukokuu";
            break;
        case "6":
            $month = "Kes채kuu";
            break;
        case "7":
            $month = "Hein채kuu";
            break;
        case "8":
            $month = "Elokuu";
            break;
        case "9":
            $month = "Syyskuu";
            break;
        case "10":
            $month = "Lokakuu";
            break;
        case "11":
            $month = "Marraskuu";
            break;
        case "12":
            $month = "Joulukuu";
            break;
    }
header("Location: etusivu.php?month=$month");