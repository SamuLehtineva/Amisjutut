<?php
session_start();
$loggedin = $_SESSION["email"];
date_default_timezone_set("Europe/Helsinki");
?>
<html>
  <head>
    <title>tyoajankirjausjarjestelma</title>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
    <script src="//cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
    <link href="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>
    <link href="//cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css"  rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="http://truudeli7.net/tyoajankirjaus/tavara/css.css">
    <link rel="stylesheet" type="text/css" href="http://truudeli7.net/tyoajankirjaus/tavara/kalentericss.css">
  </head>
  <body>