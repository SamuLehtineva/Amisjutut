<?php
session_start();
$loggedin = $_SESSION["email"];
$soID = $_SESSION["oID"];
$nimi = $_SESSION["nimi"];
date_default_timezone_set("Europe/Helsinki");
if(!isset($_SESSION["oID"])){
    header('Location: http://truudeli7.net/tyoajankirjaus/kirjaudu.php');
}
$month = date('m');
    switch($month){
        case "1":
            $month = "Tammikuu";
            break;
        case "2":
            $month = "Helmikuu";
            break;
        case "3":
            $month = "Maaliskuu";
            break;
        case "4":
            $month = "Huhtikuu";
            break;
        case "5":
            $month = "Toukokuu";
            break;
        case "6":
            $month = "Kesäkuu";
            break;
        case "7":
            $month = "Heinäkuu";
            break;
        case "8":
            $month = "Elokuu";
            break;
        case "9":
            $month = "Syyskuu";
            break;
        case "10":
            $month = "Lokakuu";
            break;
        case "11":
            $month = "Marraskuu";
            break;
        case "12":
            $month = "Joulukuu";
            break;
    }
?>
<html lang="fi">
  <head>
    <title>tyoajankirjausjarjestelma</title>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--<link href="//cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css"  rel="stylesheet">
    <script src="//cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>-->
    <link rel="stylesheet" type="text/css" href="http://truudeli7.net/tyoajankirjaus/tavara/kalentericss.css">
    <link rel="stylesheet" type="text/css" href="http://truudeli7.net/tyoajankirjaus/tavara/css.css">

  </head>
  <body>