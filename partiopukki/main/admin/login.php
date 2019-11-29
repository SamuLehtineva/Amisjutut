<?php
session_start();
/*
This file hosts the main login and register functions. Editing is safeish. First comes login, which is built with PHP and Ajax.

*/
if(isset($_SESSION["type"]) && isset($_SESSION["sessionid"])) {
    $type = $_SESSION["type"];
    header("Location: admin_index.php?sivu=".$type."page");
}
require "./includes/connection.php";
if(!empty($_POST['username']) && !empty($_POST['enimi']) && !empty($_POST['snimi']) && !empty($_POST['email']) && !empty($_POST['puh']) && !empty($_POST['salasana']) && !empty($_POST['type'])) {
    $username = $_POST['username'];
    $enimi = $_POST['enimi'];
    $snimi = $_POST['snimi'];
    $email = $_POST['email'];
    $puh = $_POST['puh'];
    $salasana = md5($_POST['salasana']);
    $alue = $_POST['alue'];
    $type = $_POST['type'];
    $sql = "SELECT * FROM $type WHERE ktunnus = '$username' OR email = '$email'";
    $query = $db -> query($sql);
    
    if($query -> rowCount() <= 0) {
        
        $sql = "INSERT INTO ".$type."(ktunnus, salasana, sukunimi, etunimi, puh, email, tila) VALUES ('$username', '$salasana', '$snimi', '$enimi', '$puh', '$email', 1)"; 
        $query = $db -> query($sql);
    }
}
require "sup/start.php";


?>
<section id="snow"></section>
<header class="masthead dots">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
<script src="../ajax/ajax.js"></script>
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
<div class="container-fluid">
  <div class="row no-gutter">
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <h3 class="login-heading mb-4">Kirjaudu</h3>
              <form action="../checklogin.php" method="post">
                <div class="form-label-group">
                  <input type="text" id="usernamel" name="username" placeholder="Käyttäjätunnus" autofocus required><br>
                  <label for="usernamel">Käyttäjätunnus</label>
                </div>

                <div class="form-label-group">
                  <input type="password" id="salasana" name="pass" placeholder="Salasana" required><br>
                  <label for="salasana">Salasana</label>
                </div>

                <button class="btn btn-lg btn-primary col-lg-9 col-10" type="submit">Kirjaudu</button>
                <div class="text-center">
                  <a class="small" href="admin_index.php?sivu=reset">Forgot password?</a><br>
                 </div>
              </form>
            </div>
          </div>
        </div
                
    </div>
  </div>
</div>
<!--
This marks the end of the login segment, and the start of the register.
-->

<container class="col-lg-6">
        <h2>Rekisteröidy pukiksi</h2><br>
        <form action="index.php?sivu=login" method="post">
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
            
            <input onclick="popup()" id="submit" class="btn btn-primary" type="submit" value="Rekisteröidy">
       </form> 
       <script language="JavaScript">
           function popup(){
               alert("Rekisteröintipyyntö on lähetetty, hallinto käsittelee pyyntösi mahdollisimman pian.");
           }
       </script>
       </container>
</body>