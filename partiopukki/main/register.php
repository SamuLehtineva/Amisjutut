<?php
session_start();
require "includes/connection.php";
?>

<html>
    <head>
        <meta charset="utf-8">
        <script src="../ajax/ajax.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    </head>
    <section id="snow"></section>
<header class="masthead dots">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
    <body onload="check()">
        <script>
        var currentId;
            function find(id) {
                currentId = id;
                var element = document.getElementById(id);
                if(element.value != "")
                    search(id + ";" + element.value, "../ajax/checkuser");
                else {
                    document.getElementById(id + "res").className = "";
                }
            }
            function AjaxOnReady(response) {
                response = Number(response);
                if(response <= 0) {
                    document.getElementById(currentId + "res").className = "fas fa-check";
                    document.getElementById(currentId + "res").style.color = "green";
                }
                else {
                    document.getElementById(currentId + "res").className = "fas fa-times";
                    document.getElementById(currentId + "res").style.color = "red";
                }
                check();
            }
            function check() {
                var user = document.getElementById("usernameres");
                var email = document.getElementById("emailres");
                var button = document.getElementById("submit");
                button.disabled = (email.className == "fas fa-check" && user.className == "fas fa-check") ? false : true;
                
            }
        </script>
        <container>
        <h2>Rekisteröidy pukiksi</h2><br>
        <form action="index.php?sivu=checkregister" method="post">
            <label class="container-radio">Pukki
            <input type="radio" name="type" value="pukki" checked="checked">
            <span class="checkmark"></span>
            </label>
            <label class="container-radio">Koordinaattori
              <input type="radio" name="type" value="koordinaattori">
              <span class="checkmark"></span>
            </label>
            <input oninput="find('username')" id="username" type="text" placeholder="Käyttäjätunnus" name="username" required><i id="usernameres"></i><br><br>
            <input type="text" placeholder="Etunimi" name="enimi" required><br><br>
            <input type="text" placeholder="Sukunimi" name="snimi" required><br><br>
            <input oninput="find('email')" type="email" id="email" placeholder="Sähköposti" name="email" required><i id="emailres"></i><br><br>
            <input type="text" placeholder="Puhelinnumero" name="puh" required><br><br>
            <input type="password" placeholder="Password" name="salasana" required><br><br>
            
            <input id="submit" class="btn btn-primary" type="submit" value="Rekisteröidy">
       </form> 
       </container>
    </body>
</html>