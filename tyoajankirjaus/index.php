<?php
/****************************

@author:EN
@date:15.10.2018
****************************/
//välissä sisällytetään itse sivu ja tulostetaan lähdekoodisession_start();
session_start();
if(!isset($_SESSION["email"]) || $_SESSION["istuntoid"]!=session_id()){
  header("Location:./kirjaudu.php");
  die();
}
else{
$sivu="etusivu";
if(isset($_GET["sivu"])) $sivu=$_GET["sivu"];

else{header("Location:./etusivu.php");}
}
?>