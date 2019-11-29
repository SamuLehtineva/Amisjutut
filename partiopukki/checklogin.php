<?php
session_start();
/*
This page checks login information. Basic functionality is ensued, as long as you don't do anything absolutely stupid.
*/

$tables = array("pukki" => array("pukki", "pukkiID"), "koordinaattori" => array("koordinaattori", "kID"), "yllapito" => array("admin", "yID"));

require "./includes/functions.php";
require "./includes/connection.php";

if(!empty($_POST["username"]) && !empty($_POST["pass"])) {
    $username = $_POST["username"];
    $pass = $_POST["pass"];
    $notfound = true;
    
    foreach($tables as $table => $value) {
        
        $sql = "SELECT ktunnus, salasana, ".$value[1]." FROM ".$table." WHERE ktunnus = '$username'";
        if($table != "yllapito") {
            $sql .= " AND tila = 2";
        }
        $query = $db -> query($sql);
        
        if($query != false) {
            $result = $query -> fetchAll(PDO::FETCH_ASSOC);
            if($result[0]["salasana"] == md5($pass)) {
                $notfound = false;
                $_SESSION['userID'] = $result[0][$value[1]];
                $_SESSION["type"] = $value[0];
                $_SESSION["username"] = $username;
                $_SESSION["sessionid"] = session_id();
                header("Location: admin_index.php?sivu=".$value[0]."page");
                break;
            }
        }
    }
    
}
if($notfound)
    header("Location: admin_index.php?sivu=login");