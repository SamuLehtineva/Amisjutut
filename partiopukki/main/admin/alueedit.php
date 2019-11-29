<?php
require "./includes/connection.php";
if(!empty($_GET["alueID"]) && !empty($_POST["aikavali"])){
    $alueID = $_GET["alueID"];
    $aikavali = $_POST["aikavali"];
    $sql = "INSERT INTO alueenaika (alueID, aikavali, status) VALUES ('$alueID', '$aikavali', '1')";
    $query = $db -> query($sql);
}
    
if(!empty($_POST["nimi"]) && !empty($_POST["postinumero"])) {
    $alueID = $_GET["alueID"];
    $nimi = $_POST["nimi"];
    $postinumero = $_POST["postinumero"];
    $sql = "UPDATE alue SET aluenimi = '$nimi', postinumero='$postinumero' WHERE alueID=$alueID";
    $query = $db -> query($sql);
}
header("Location: admin_index.php?sivu=alue_list");
?>