<?php
session_start();
require "includes/connection.php";
?>

        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link href="css/stylemain.css" rel="stylesheet" type="text/css">
<script>
    function jee() {
        alert("Hello! I am an alert box!!");
    }
</script>

<div class="container">
    <div class="row">
        
<div class="row-element col-lg-4">
    <h2 class="col-lg-4">Varaukset</h2>
    <?php
    $sql="SELECT * FROM varaus";
    echo "<table class=\"col-lg-4\">"."<tr>"."<th>osoite</th> "."<th>alueID</th>"."<th>aikavali</th>"."<th>Aika</th>"."<th>Kesto</th>"."</tr>";
    foreach($db->query($sql) as $tietue) {
        echo "<tr><td>".$tietue["osoite"]."</td>"."<td>".$tietue["alueID"]."</td>"."<td>".$tietue["aikavali"]."</td>"."<td>".$tietue["aika"]."</td>"."<td>".$tietue["kesto"]."</td></tr>";
    }
    echo "</table>";
    ?>
</div>
<div class="row-element col-lg-4">
    <h2>Jee</h2>
    <h2>juu</h2>
</div>
<div class="row-element col-lg-4">
    <h2>Pukki</h2>
    <?php
    $sql="SELECT * FROM pukki";
    echo "<table class=\"col-lg-4\">"."<tr>"."<th>Ktunnus</th> "."<th>sukunimi</th>"."<th>etunimi</th>"."<th>puh</th>"."<th>Email</th><th>Linkki</th></tr>";
    foreach($db->query($sql) as $tietue) {
        echo "<tr><td>".$tietue["ktunnus"]."</td>"."<td>".$tietue["sukunimi"]."</td>"."<td>".$tietue["etunimi"]."</td>"."<td>".$tietue["puh"]."</td><td>".$tietue["email"]."</td><td><a href=\"#\" data-toggle=\"modal\" data-target=\"#myModal\">Avaa</a></td></tr>";
    }
    echo "</table>";
    ?>
</div>
    
      
      
</div>
</div>
<div class="modal" id="myModal">
        <div class="modal-dialog modal-dialog-scrollable">a
          <div class="modal-content">
          
            <!-- Modal Header -->
            
            <!-- Modal body -->
            <div class="modal-body">
              <h3>Rekisteri- ja tietosuojaseloste</h3>
              <p>Keräämme käyttäjistämme tietyn asteen tietoja mahdollistaaksemme parhaimman mahdollisen palvelun. Tiedot joita keräämme ovat vaadittuja palvelun tarjoamiseksi ja ne poistetaan asiakkuuden päätyttyä.</p>
              
              <h3>Rekisterin Pitäjä</h3>
              <p>Rekisteriä ylläpitää ja hallitsee Tampereen Eräpojat ja heidän valtuuttamat tahot.</p>
              
              <h3>Rekisterin tiedot</h3>
              <p>Rekisterissä säilytetään asiakkaan tiedot, joihin sisältyy, mutta ei rajoitu; <ul><li>Asiakkaan nimi</li><li>Osoite</li><li>Puhelinnumero</li><li>Sähköposti</li><li>Ja muuta vapaasti annettavaa tietoa.</li></ul></p>
              
              <h3>Oikeusperuste ja henkilötietojen käsittelyn tarkoitus</h3>
              <p>EU:n yleisen tietosuoja-asetuksen mukainen oikeusperuste henkilötietojen käsittelylle on;<ul><li>Henkilön, i.e asiakkaan suostumus</li><li>Palvelun tarjonta käyttäjän luvalla</li></ul></p>
              
              <h3>Tietolähteet</h3>
              <p>Rekisteriin talletetaan tietoja jotka käyttäjä on luovuttanut www-lomakkeella, puhelimitse tai sähköpostilla. Nämä tiedot varastoidaan asiakkuuden päättymiseen asti.</p>
              
              <h3>Tietojen luovuttaminen EU:n tai ETA:n ulkopuolelle</h3>
              <p>Tietoja ei luovuteta ulkopuolisille tahoille. Tietoja voidaan jakaa ainoastaan käyttäjän hyväksynnällä.</p>
              
              <h3>Rekisterin suokausen periaatteet</h3>
              <p>Rekisterin käsittelyssä noudatetaan huolellisuutta ja tietojärjestelmien avulla käsiteltävät tiedot suojataan asianmukaisesti. Kun rekisteritietoja säilytetään Internet-palvelimilla, niiden laitteiston fyysisestä ja digitaalisesta tietoturvasta huolehditaan asiaankuuluvasti. Rekisterinpitäjä huolehtii siitä, että tallennettuja tietoja sekä palvelimien käyttöoikeuksia ja muita henkilötietojen turvallisuuden kannalta kriittisiä tietoja käsitellään luottamuksellisesti ja vain niiden työntekijöiden toimesta, joiden työnkuvaan se kuuluu.</p>
              
              <h3>Tarkastusoikeus ja oikeus tulla unohdetuksi</h3>
              <p>Jokaisella henkilöllä rekisterissä on oikeus pyytää nähdä tietonsa, muokata tietojaan ja tulla unohdetuksi. Mikäli henkilö haluaa tavoitella näitä oikeuksia, tulee hänen ottaa yhteyttä rekisterinpitäjään. Rekisterinpitäjä voi pyytää tarvittaessa pyynnön esittäjää todistamaan henkilöllisyytensä. Rekisterinpitäjä vastaa asiakkaalle EU:n tietosuoja-asetuksessa säädetyssä ajassa, pääsääntöisesti 31 päivän kuluessa. </p>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Sulje</button>
            </div>
            
          </div>
        </div>
      </div>

        