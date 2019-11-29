<?php
session_start();
header('Location: http://truudeli7.net/tyoajankirjaus/password-recovery/login.php');
?>
<html>
  <head>
    <title>tyoajankirjausjarjestelma</title>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://truudeli7.net/tyoajankirjaus/tavara/css.css">

  </head>
  <body>
<nav class="navbar navbar-inverse">
     <div class="container-fluid">
    <div class="navbar-header">
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
         </button>
         <a class="navbar-brand" href="#">Työajankirjausjärjestelmä</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
         <ul class="nav navbar-nav">
         </ul>
         <ul class="nav navbar-nav navbar-right">
             <li><a href="http://truudeli7.net/tyoajankirjaus/sivut/rekisteroidy.php">Rekisteröi uusi käyttäjä</a></li>
         </ul>
    </div>
     </div>
</nav>
<div class="content">
<div class="col-sm-2 col-xs- sidenav">

</div>
<div class="col-sm-10 col-xs-10 text-left">
<h1>Kirjaudu</h1>
  <div class="form">
<form action="./tarkista_kirjautuminen.php" method="post">
  email<br>
  <input type="text"name="email"><br>
  salasana<br>
  <input type="password"name="salasana"><br>
  <input type="submit" value="lähetä">
</form>
<?php
//kirjautumislomake
if(!empty($_GET["puuttuu"]))echo "<div class=\"alerbox\"><p class=\"alert\">tietoja puuttuu!</p></div>";
if(!empty($_GET["vaarin"])){
    echo $_SESSION["email"];
    echo "<div class=\"alertbox\"><p class=\"alert\">tietoja väärin!</p><br><a class=\"alertlink\" href=\"./sivut/reset_password.php\">Unohditko salasanasi</a></div>";
}

?>
<!--<a href="index.php?sivu=rekisteroidy">rekisteröidy</a>-->
</div>
</div>
</div>
