<?php
/*
The main coordination page. Trough this the coordinators can plan routes and assign Santas to clients. The main page is written in PHP with some additional Ajax.
Time wasted here: [NaN]
*/
session_start();
require "./sup/admin_start.php";
require "includes/connection.php";

if (!empty($_POST["asia"]) && !empty($_POST["asia1"]) && !empty($_POST["aika"])) {
    $aika = $_POST["aika"];
    $varausID = $_POST["asia"];
    $pukkiID = $_POST["asia1"];
    $sql = "SELECT * FROM varaus WHERE varausID = $varausID";
    $juttu = $db->query($sql);
    $juttu2 = $juttu->fetch();
    $osoite = $juttu2["osoite"];
    $alueID = $juttu2["alueID"];
    $kesto = $juttu2["kesto"];
    $sql ="INSERT INTO tilaus (varausID, osoite, alueID, aika, kesto, status, pukkiID) VALUES ($varausID, '$osoite', $alueID, '$aika', $kesto, 1, $pukkiID)";
    $query = $db -> query($sql);
    if($query != FALSE){
        $sql = "SELECT * FROM asiakas INNER JOIN varaus ON asiakas.asiakasID = varaus.asiakasID WHERE varausID = $varausID";
        $query2 = $db ->query($sql);
        $juttu2 = $db->fetchAll(PDO::FETCH_ASSOC);
        $email = $juttu2[0]["email"];
        $title = "Aikavarmistus";
        $text = "Hei, sinun pukkivarauksellesi on asetettu ajaksi".$aika.". Jos tämä aika ei sovi teille, ottakaa meihin yhteyttä niin voimme keskustella uudesta ajasta. Jos tämä aika sopii teille, voitte jättää tämän viestin huomioimatta";
        SendEmail($email, $title, $text);
    }
}
?>

<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link href="css/stylemain.css" rel="stylesheet" type="text/css">
<script src="ajax/ajax.js"></script>
<style>
    textarea {
        width:100%;
    }
    modal {
        word-wrap: break-word;
    }
</style>
<script>
    function jee(id) {
        search(id, "ajax/etsi");
        document.getElementById("myModal").style.display = "block";
    }
    function AjaxOnReady(responseText) {
        document.getElementById("modaali").innerHTML = responseText;
    }
    function jee2() {
        var modal = document.getElementById("myModal");
        modal.style.display = "none";
        modal.InnerHTML = "";
        
        
    }
    function juttu(id) {
        var c = document.getElementById("tbody").childNodes;
        
        for(var i = 0; i < c.length; i++) {
            if(Number(c[i].id) == Number(id)) {
                c[i].style = "border: 1px solid #f32121";
            }
            else {
                c[i].style = "border: none";
            }
        }
        
        document.getElementById("asia").value = id;
        
    }
    function juttu2(id) {
        var c = document.getElementById("tbody1").childNodes;
        
        for(var i = 0; i < c.length; i++) {
            if(Number(c[i].id) == Number(id)) {
                c[i].style = "border: 1px solid #f32121";
            }
            else {
                c[i].style = "border: none";
            }
        }
        
        document.getElementById("asia1").value = id;
        
    }
    function juu(id) {
        search2(id, "ajax/tieto");
        document.getElementById("myModal").style.display = "block";
    }
    function AjaxOnReady2(responseText) {
        document.getElementById("modaali").innerHTML = responseText;
    }
    function del(id, pid) {
        search3("d." + id, "ajax/processorder");
        jee(pid);
        
    }
    function AjaxOnReady3(responseText) {}
</script>
    <?php
            $type = $_SESSION['type'];
            if($type == "admin") require "includes/adminnav.php";
            else if($type == "koordinaattori") require "includes/koordnav.php";
        ?>
    <div class="main container row">
        
<div class="row-element col-lg-6">
    <br>
    <h2 class="col-lg-4">Varaukset</h2>
    <?php
    $sql = "SELECT varaus.varausID, varaus.osoite, varaus.aikavali, varaus.aika, varaus.kesto, pukki.pukkiID, pukki.etunimi, pukki.sukunimi FROM varaus LEFT JOIN tilaus ON varaus.varausID = tilaus.varausID INNER JOIN alue ON varaus.alueID = alue.alueID LEFT JOIN pukki ON tilaus.pukkiID = pukki.pukkiID";
    echo "<table class=\"col-lg-4\"><tbody id=\"tbody\"><tr><th>osoite</th><th>Alue</th><th>Aikavali</th><th>Aika</th><th>Kesto</th><th>Pukki</th><th>Lisätieto</th></tr>";
    foreach($db->query($sql) as $tietue) {
        $onclick = $tietue["pukkiID"] == "" ? " onclick=\"juttu(".$tietue['varausID'].")\"" : "";
        echo "<tr id=".$tietue["varausID"]." $onclick><td>".$tietue["osoite"]."</td><td>".$tietue["alue"]."</td><td> ".$tietue["aikavali"]."</td><td>".$tietue["aika"]."</td><td>".$tietue["kesto"]."</td><td>".$tietue["etunimi"]."</td><td><a href=\"#\" onclick=\"juu(".$tietue['varausID'].")\">Avaa</a></td></tr>";
    }
    echo "</tbody></table>";
    ?>
</div>
<div class="row-element col-lg-4">
    <form action="admin_index.php?sivu=coordination" method="post">
    <br>    
    <h2>Käynnille pukki</h2>
    <br>
    <p class="text-white">Käynnille aika <input type="time" name="aika"></p><br>
    <input type="hidden" name="asia" id="asia"><br>
    <input type="hidden" name="asia1" id="asia1">
    <input type="submit" class="btn btn-primary" value="Aseta varaukselle pukki">
    </form>
</div>
<div class="row-element col-lg-2">
    <br>
    <h2>Pukki</h2>
    <?php
    $sql="SELECT * FROM pukki";
    echo "<table class=\"col-lg-12\"><tbody id=\"tbody1\"><tr><th>Ktunnus</th><th>sukunimi</th><th>etunimi</th><th>puh</th><th>Email</th><th>Pukin käynnit</th></tr>";
    foreach($db->query($sql) as $tietue) {
        echo "<tr id=".$tietue["pukkiID"]." onclick=\"juttu2(".$tietue['pukkiID'].")\"><td>".$tietue["ktunnus"]."</td><td>".$tietue["sukunimi"]."</td><td> ".$tietue["etunimi"]."</td><td>".$tietue["puh"]."</td><td>".$tietue["email"]."</td><td><a href=\"#\" onclick=\"jee(".$tietue['pukkiID'].")\">Avaa</a></td></tr>";
    }
    echo "</tbody></table>";
    ?>
</div>
    
      
      
</div>
<div class="container">
    <div class="modal bg-black-trans" id="myModal">
        <div class="modal-dialog modal-dialog-scrollable modal-w">
          <div class="modal-content">
          
            <!-- Modal Header -->
            
            <!-- Modal body -->
            <div id="modaali" class="modal-body">
             <?php
             
             ?>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" onclick="jee2()">Sulje</button>
            </div>
            
          </div>
        </div>
      </div>
      </div

        