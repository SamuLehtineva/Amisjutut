<?php
/*
Logout, is the logout.
*/
    session_start();
    session_unset();
    session_destroy();
    header("location: ../index.php");
    die();
?>