<?php
session_start();
$loggedin = $_SESSION["email"];
if(!isset($_SESSION["email"]) || $_SESSION["email"]!=admin){
  header("Location:http://truudeli7.net/tyoajankirjaus/etusivu.php");
  die();
}
echo $loggedin;
?>