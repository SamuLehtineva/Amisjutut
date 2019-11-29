<?php
//Ottaa tiedot muuttujaan ja erottaa ne
$value = $_GET['v'];
$value = explode(";", $value);
//Oikeat arvot funktiolle
$values = array("username" => "ktunnus", "email" => "email");

require "../includes/connection.php";
//Läpikäytävät taulut
$tables = array("pukki", "koordinaattori", "yllapito");
$i = 0;
//Käy läpi kaikki taulut, jotka on määritelty ylempänä
foreach($tables as $table) {
    //Tekee sql lauseen ja kyselyn sillä
    $sql = "SELECT * FROM $table WHERE ".$values[$value[0]]." = '".$value[1]."'";
    $query = $db -> query($sql);
    if($query != false) {
        //Lisää saadut rivit $i muuttujaan
        $i += $query -> rowCount();
    }
}
//Tulostaa $i:n arvon
echo $i;
?>