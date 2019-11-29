<?php
//Hakee aikavälin alueesta ja valitsee vain näkyvät
require "../includes/connection.php";
//Ottaa arvot muuttujaan
$value = $_GET['v'];
//Luo sql lauseen ja tekee kyselyn
$sql = "SELECT * FROM alueenaika WHERE alueID = $value AND alueenaika.status = 2";
$query = $db -> query($sql);
$result = $query -> fetchAll(PDO::FETCH_ASSOC);
//Tulostaa tulokset pudotusvalikon riveinä
foreach($result as $row) {
    echo "<option value=\"".$row['aikavali']."\">".$row['aikavali']."</option>";
    
}
?>