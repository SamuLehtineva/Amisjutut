<?php
session_start();
$sallittu = array("newpass", "reset");

if((!isset($_SESSION['type']) || !isset($_SESSION['username'])) && !in_array($_GET['sivu'], $sallittu))
{
    require "main/admin/login.php";
} 
else {
    if (isset($_GET["sivu"]))
        $sivu = $_GET["sivu"];
    else
        $sivu = "pukkipage";
        
    require "./includes/functions.php";
  
    $sallitut = array("frontpage", "pukkipage", "koordinaattoripage", "adminpage", "login", "user_list", "reset", "newpass", "checkregister", "aikavali", "aluelis", "editfront", "alue_list", "aikadel", "saveFront", "editform", "saveform", "schedule", "aikaset", "edituser", "orders", "alueedit", "coordination", "tilaus_lista");
    if(in_array($sivu, $sallitut)) {
        $polku = "main/admin/".$sivu.".php";
        require $polku;
    }
    else {
        require "main/404.php";
    }
}
?>