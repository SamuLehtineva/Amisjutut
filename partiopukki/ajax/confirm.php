<?php
session_start();
require "../includes/connection.php";
$value = $_GET['v'];
$value = explode(".", $value);
$tables = array("p" =>  array("pukki", "pukkiID"), "k" => array("koordinaattori", "kID"));

if($value[2] == "ok") {
    $sql = "UPDATE ".$tables[$value[0]][0]." SET tila = 2 WHERE ".$tables[$value[0]][1]." = ".$value[1];
    $query = $db -> query($sql);
}
else if($value[2] == "del") {
    $sql = "DELETE FROM ".$tables[$value[0]][0]." WHERE ".$tables[$value[0]][1]." = ".$value[1];
    $query = $db -> query($sql);
}
$types = $value[1];

$sql = "SELECT * FROM pukki LEFT JOIN alue ON pukki.alueID = alue.alueID";
if($types != "all") {
    $sql .=  " WHERE tila != 2";
}
$query = $db -> query($sql);

if($query != false) {
    $result = $query -> fetchAll(PDO::FETCH_ASSOC);
    echo "<h2>Pukit</h2>";
    echo "<table><tr><th>Sukunimi</th><th>Etunimi</th><th>Email</th><th>Tunnus</th><th>Puhelin</th><th>Hyväksy</th>"."<th>Poista</th></tr>";
    
    foreach($result as $tietue) {
        echo "<tr><td>".$tietue["sukunimi"]."</td><td>".$tietue["etunimi"]."</td><td>".$tietue["email"]."</td><td>".$tietue["ktunnus"]."</td><td>".$tietue["puh"]."</td>";
        if($tietue['tila'] == 1) {
            echo "<td><button class=\"btn-default\" onclick='ok(\"p.".$tietue['pukkiID']."\")'><i class=\"fas fa-check\"></i></button></td>";
        }
        else echo "<td></td>";
        echo "<td><button class=\"btn-default\" onclick='remove(\"p.".$tietue['pukkiID']."\")'><i class=\"fas fa-trash-alt\"></i></button></td></tr>";
    }
    echo "</table></div>";
}
if($_SESSION['type'] != "admin") return;

echo "<h2>Koordinaattorit</h2>";
$sql = "SELECT * FROM koordinaattori";
if($types != "all") {
    $sql .=  " WHERE tila != 2";
}
$query = $db -> query($sql);
if($query != false){
    
    $result = $query -> fetchAll(PDO::FETCH_ASSOC);
    
    echo "<table>"."<tr>"."<th>Sukunimi</th> "."<th>Etunimi </th>"."<th>Email </th>"."<th>K.Tunnus</th>"."<th>Puhelin</th>"."<th>Hyväksy </th><th>Poista</th>"."</tr>";
    
    foreach($result as $tietue) {
            echo "<tr><td>".$tietue["sukunimi"]."</td><td>".$tietue["etunimi"]."</td><td>".$tietue["email"]."</td><td>".$tietue["ktunnus"]."</td><td>".$tietue["puh"]."</td>";
            if($tietue['tila'] == 1) {
                echo "<td><button class=\"btn-default\" onclick='ok(\"k.".$tietue['kID']."\")'><i class=\"fas fa-check\"></i></button></td>";
            }
            else echo "<td></td>";
            echo "<td><button class=\"btn-default\" onclick='remove(\"k.".$tietue['kID']."\")'><i class=\"fas fa-trash-alt\"></button></td><tr>";
    }
    echo "</table>";
}
?>