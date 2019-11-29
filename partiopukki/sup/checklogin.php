<?php
session_start();
require "../includes/functions.php";
require "../includes/connections.php";
if(!empty($_POST["type"]) && !empty($_POST["username"]) && !empty($_POST["pass"])){
    $type = $_POST["type"];
    $username = $_POST["username"];
    $pass = $_POST["pass"];
    $id && $type2 = checklogin($type, $username, $pass);
}
if(!empty($id)) {
        $_SESSION["type"] = $type2;
        $_SESSION["istuntoid"] = session_id();
        $_SESSION["id"]=$id;
        header("Pragma: No-Cache");
        header("Location: index.php?sivu=frontpage");
        die();
}