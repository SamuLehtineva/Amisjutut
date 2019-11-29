<?php
require "includes/connection.php";

for($i = 0; $i < $_POST['rows']; $i++) {
    $title = $_POST["hd$i"];
    $content = $_POST["txt$i"];
    $id = $_POST["id$i"];
    $status = $_POST["st$i"] == "on" ? "2" : "1";
    $type = $_POST["type$i"];
    if($title == "") {}
    else {
        if($id == "null" && $title != "") {
            $sql = "INSERT INTO extrat(extraOtsikko, extraPlaceholder, extraState, extraTyyppi) VALUES ('$title', '$content', $status, '$type')";
        }
        else if($id != "") {
            $sql = "UPDATE extrat SET extraOtsikko = '$title', extraPlaceholder = '$content', extraState = $status, extraTyyppi = '$type' WHERE extraID = $id";
        }
        $query = $db -> query($sql);
    }
}

header("Location: admin_index.php?sivu=editform");
?>