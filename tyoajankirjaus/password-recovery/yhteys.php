<?php
$host ="truudeli7.net";
$user = "truud286";
$pass = "nx[h2_SCqZy6";
$dbname = "truud286_tyoajankirjaus"; 

try //yritetään ottaa yhteys
{
    $yhteys = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$user, $pass);
    //luo PDO-olion
    $con = mysqli_connect($host,$user,$pass,$dbname);
}
catch(PDOException $e) // jos ei onnistu (poikkeus)
{
    echo $e->getMessage(); //antaa ilmoituksen siit채, miss채 virhe
}
?>
