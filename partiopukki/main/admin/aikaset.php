<?php
session_start();
require("./includes/connection.php");
if(isset($_GET["status1"]) && isset($_GET["aaID"])) {
    $alueID = $_GET["alueID"];
    $status = $_GET["status1"];
    $aaID = $_GET["aaID"];
    $sql = $status == 1? "UPDATE alueenaika SET status=2 WHERE aaID=$aaID":"UPDATE alueenaika SET status=1 WHERE aaID=$aaID";
    $query = $db -> query($sql);
    header("Location: admin_index.php?sivu=aikavali&alueID=$alueID");
}