<?php
//Poistaa tilauksen
require "../includes/connection.php";
//Ottaa tiedot muuttujaan ja erottaa ne pisteen perusteella
$v = explode(".", $_GET['v']);
//Mikäli ensimmäinen arvo on "d" poistetaan kyseinen tilaus.
if($v[0] == "d") {
    //Tekee sql lauseen ja tekee kyselyn
    $sql = "DELETE FROM tilaus WHERE tilausID = ".$v[1];
    $query = $db -> query($sql);
}

?>