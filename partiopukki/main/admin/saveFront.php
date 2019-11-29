<?php
require "includes/connection.php";

for($i = 0; $i < $_POST['rows']; $i++) {
    $title = $_POST["hd$i"];
    $content = $_POST["txt$i"];
    $id = $_POST["id$i"];
    $status = $_POST["st$i"] == "on" ? "2" : "1";
    
    if($id == "null" && $title != "") {
        $sql = "INSERT INTO etusivu(Otsikko, teksti, status) VALUES ('$title', '$content', $status)";
    }
    else {
        $sql = "UPDATE etusivu SET Otsikko = '$title', teksti = '$content', status = $status WHERE eID = $id";
    }
    $query = $db -> query($sql);
}

header("Location: admin_index.php?sivu=editfront");
?>