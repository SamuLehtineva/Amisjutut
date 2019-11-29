<?php
//1. ota yhteys
require "../tavara/yhteys.php";
//require "./tavara/funktiot.php";
//Lomakkeen käsittelijä
if(!empty($_POST["nimi"]) && !empty($_POST["salasana"]) && !empty($_POST["toimipiste"])) {
    $salasana=mysqli_real_escape_string($con, $_POST['salasana']);
	$nimi=mysqli_real_escape_string($con, $_POST['nimi']);
	$toimipiste=$_POST["toimipiste"];
	$email=mysqli_real_escape_string($con, $_POST['email']);
	$nimi=htmlentities($nimi);
	$email=htmlentities($email);
	$nimi=htmlspecialchars($nimi);
	$email=htmlspecialchars($email);
	//2. rakenna sql
	$sql ="SELECT * FROM to_opettaja WHERE email ='$email'";
	$juttu = $yhteys->query($sql);
    $juttu2 = $juttu->fetch();
    $juttu3 = $juttu2['email'];
    if($email == $juttu3){
        echo "<script type=\"text/javascript\">alert(\"Tällä sähköpostilla on jo käyttäjä\")</script>";
    }else{
        /*$tarkistus=$yhteys ->prepare("SELECT * FROM to_opettaja WHERE email='$email'");
    	$tarkistus->execute(array($email)); $rivimaara = $lause->rowCount($tarkistus);
    	if($rivimaara == 0)  {*/
    	    "sähköposti on käytössä, kokeile toisella sähköpostilla. jos ongelma toistuu ota yhteyttä ylläpitoon.";
        //}else{
        $salasana.="puppu";
        $salasana=md5($salasana);
    	    $sql="INSERT INTO to_opettaja(nimi,email,salasana,toimipisteID) VALUES('$nimi','$email','$salasana','$toimipiste')";
    	$lause=$yhteys ->prepare($sql);
    	$lause->execute();
        // the message
        $msg = "Teille on onnistuneesti rekisteröity käyttäjä opettajien työajankirjausjärjestelmään";
        
        // use wordwrap() if lines are longer than 70 characters
        $msg = wordwrap($msg,70);
        
        // send email
        mail("$email","Rekisteröityminen työajankirjausjärjestelmään",$msg);
       // }
    }
}

//lomake, pakolliset kentät ktunnus, salasana
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
    <link rel="stylesheet" type="text/css" href="http://truudeli7.net/tyoajankirjaus/tavara/kalentericss.css">
    <link rel="stylesheet" type="text/css" href="http://truudeli7.net/tyoajankirjaus/tavara/css.css">
    <script>
        function popup(){
            alert("käyttäjä rekisteröity. Voit tehdä uuden käyttäjän, tai palata kirjautumiseen.")
        }
    </script>
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
<div class="container-fluid text-center">
    <div class="row content">
    <div class="col-sm-2 sidenav">

       </div>
    <div class="col-sm-8 text-left">
        <h1>Rekisteröi uusi käyttäjä</h1>
        <form action="rekisteroidy.php" method="post">
        Nimi<br>
        <input type="text" name="nimi" required><br>
        Salasana<bR>
        <input type="password" name="salasana" required><br>
        Email<br>
        <input type="email" name="email" required><br>
        Toimipaikka<br>
        <select name="toimipiste">
            <?php
            $sql="SELECT toimipisteID, toimipiste FROM to_toimipiste";
            
            foreach($yhteys->query($sql) as $tietue) {
            	echo "<option value=".$tietue["toimipisteID"].">".$tietue["toimipiste"]."</option>";
            }
            ?>
        </select>
        <br><br>
        <input onclick="popup()" type="submit" value="Rekisteröidy">
        </form>
        <?php
        $sql="SELECT to_toimipiste.toimipiste,to_opettaja.nimi,to_opettaja.oID,to_opettaja.email,to_opettaja.toimipisteID FROM to_toimipiste INNER JOIN to_opettaja ON to_toimipiste.toimipisteID = to_opettaja.toimipisteID";
        echo "<a href=\"../kirjaudu_ulos.php\">Takaisin</a>";
        
        ?>
    </div>
    <div class="col-sm-2 sidenav">
          
    </div>
    </div>
</div>





