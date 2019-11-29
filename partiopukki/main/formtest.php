<?php
session_start();
/*
The main form page, from here clients send information to the database. Editing this page should be done extremely carefully.

Time spent yelling at this page: [NaN]
*/
require "includes/connection.php";
require "includes/functions.php";
$sql = "DESCRIBE extratieto";
$query = $db->query($sql);
$fields = $query->fetchAll(PDO::FETCH_ASSOC);

if(!empty($_POST["snimi"]) && !empty($_POST["enimi"]) && !empty($_POST["osoite"])) {
    $snimi = $_POST["snimi"];
    $enimi = $_POST["enimi"];
    $osoite = $_POST["osoite"];
    $email = $_POST["email"];
    $puh = $_POST["puh"];
    $aikavali = $_POST["aikavali"];
    $aika = $_POST["aika"];
    $kesto = $_POST["kesto"];
    $sql ="SELECT * FROM asiakas WHERE email = '$email'";
    $query = $db -> query($sql);
    
    if($query -> rowCount() == 0) {
        $sql = "INSERT INTO asiakas (etunimi, sukunimi, email, puhelin) VALUES ('$enimi', '$snimi', '$email', '$puh')";
        $query = $db -> query($sql);
        
    }

    $sql = "SELECT * FROM asiakas WHERE etunimi = '$enimi' AND sukunimi = '$snimi'";
    $juttu = $db->query($sql);
    $juttu2 = $juttu->fetch();
    $asiakasID = $juttu2['asiakasID'];
    $alueID = $_POST['alue'];
    $sql = "SELECT * FROM varaus WHERE osoite = '$osoite' AND aikavali = '$aikavali'";
    $query = $db -> query($sql);
    if($query -> rowCount() == 0) {
        $sql = "INSERT INTO varaus (asiakasID, osoite, alueID, aikavali, aika, kesto) VALUES('$asiakasID', '$osoite', '$alueID', '$aikavali', '$aika', '$kesto') ";
        $query = $db -> query($sql);
    
    
        $sql = "SELECT * FROM varaus WHERE asiakasID = $asiakasID AND osoite = '$osoite'";
        $query = $db ->query($sql);
        $juttu2 = $query->fetch();
        
        $varausID = $juttu2['varausID'];
        $otsikot = explode(";", $_POST["title"]);
        for($i = 0; $i < $_POST['count']; $i++) {
            $values = "'".$otsikot[$i]."','".$_POST[$i."tieto"]."'";
            $sql = "INSERT INTO extratieto (otsikko, tieto, varausID) VALUES ($values, '$varausID')";
            $query = $db -> query($sql);
        }
        
    }
    $title = "Partiopukki";
    $text = "Hei ".$enimi.", olet asettanut meille joulupukkivarauksen\n
    Asettamasi varaus sisältää seuraavat tiedot\nSukunimi ".
    $snimi."\nEtunimi ".
    $enimi."\nOsoite ".
    $osoite."\nEmail ".
    $email."\nPuhelin ".
    $puh."\nAikaväli ".
    $aikavali."\nAika ".
    $aika."\n".
    $kesto;
    SendEmail($email, $title, $text);
    echo "<a href=\"index.php?sivu=thanks\">Kiitossivulle</a>";
    echo "<script type=\"text/javascript\">
                   window.location.assign(\"http://partiopukki.truudeli17.net/index.php?sivu=thanks\");
            </script>";
    die();
    
}
else {
    ?>
    <!doctype html>
    <html>
    <head>
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
        <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
        
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link href="css/stylemain.css" rel="stylesheet" type="text/css">
        
        <script src="ajax/ajax.js"></script>
        <script>
            function time(id) {
                search(id, "ajax/gettime");
            }
            function AjaxOnReady(response) {
                document.getElementById("list").innerHTML = "<option value=\"null\">Valitse aikaväli...</option>" + response;
                
            }
        </script>
    </head>
    
    <body>
        <section id="snow"></section>
        <header class="masthead dots">
          <div class="container h-100">
            <div class="row boat h-100 align-items-center">
              <div class="container formw">
                <h1>Tilaa Pukki!</h1>
                <p class="lead">* merkityt ovat pakollisia</p>
                <div class="row">
                <div class="row-element col-lg-5">
                <form action="index.php?sivu=formtest" method="post">
                        <label for=etunimi>Etunimi*</label><br>
                        
                        <input class="" type="text" label="etunimi" id="etunimi" name="enimi" maxlength="20" required><br>
                        <label for=sukunimi>Sukunimi*</label><br>
                        <input class="" type="text" label="sukunimi" id="sukunimi" name="snimi"  required><br>
                        Osoite*<br>
                        <input class="" type="text" name="osoite" required><br>
                        Sähköposti*<br>
                        <input type="email" name="email" required><br>
                        Puhelin*<br>
                        <input type="text" name="puh" required><br>
                        Alue*<br>
                        <select oninput="time(this.value)" name="alue" required>
                            <option value="null">Valitse alue...</option>
                            <?php
                            $sql = "SELECT * FROM alue";
                            $query = $db -> query($sql);
                            
                            if($query != false) {
                                $result = $query -> fetchAll(PDO::FETCH_ASSOC);
                                foreach($result as $row) {
                                    echo "<option value=\"".$row['alueID']."\">".$row['aluenimi']."</option>";       
                                }
                            }
                            ?>
                        </select>
                        <br>
                        Aikaväli*<br>
                        <select id="list" name="aikavali">
                            <option>Valitse aikaväli...</option>
                        </select><br>
                        Tietty aika(Huom. tietyn ajan valitseminen maksaa enemmän)<br>
                        <input type="time" name="aika"><br>
                        Kesto<br>
                        <label class="container-radio">15 Min
                            <input name="kesto" type="radio" checked="checked" value="1">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container-radio">30 Min
                            <input name="kesto" type="radio" value="2">
                            <span class="checkmark"></span>
                        </label>
                        </div>
                        <div class="row-element col-lg-7">
                        <?php
                        $sql = "SELECT * FROM extrat WHERE extraState = 2";
                        $extraname = 0;
                        $query = $db->query($sql);
                        $otsikot;
                        foreach($query as $tietue) {
                            echo "<p>".$tietue["extraOtsikko"]."</p>";
                            $otsikot.=$tietue["extraOtsikko"].";";
                            $type = $tietue['extraTyyppi'];
                            switch($type) {
                                case "textarea":
                                    echo "<textarea class=\"formbox textbox\" name=\"".$extraname."".$fields[2]['Field']."\" placeholder=\"".$tietue["extraPlaceholder"]."\" id=\"".$tietue["extraID"]."\"required></textarea><br>";
                                break;
                                default:
                                    echo "<input type=\"$type\" name=\"".$extraname."".$fields[2]['Field']."\" placeholder=\"".$tietue["extraPlaceholder"]."\" id=\"".$tietue["extraID"]."\">"; 
                                break;
                            }
                            $extraname++;
                        }
                        ?>
                        <input type="hidden" value="<?php echo $query -> rowCount() ?>" name="count">
                        <input type="hidden" name ="title" value="<?php echo $otsikot ?>">
                            
                        <div class="container">
      <!-- The Modal -->
      
      <div class="modal" id="myModal">
        <div class="modal-dialog modal-dialog-scrollable">
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
      
    </div>
    
    </div>
    </div>
    Olen lukenut ja hyväksyn <a href="#" data-toggle="modal" data-target="#myModal">rekisteriselosteen
  </a>
  <label class="container-radio">
<input type="checkbox" required>
<span class="checkmark"></span><br>
</label>
                        <input type="submit" class="btn btn-primary" value="Tee varaus">
                        <a href="http://partiopukki.truudeli17.net/index.php" class="btn btn-primary">Peruuta</a>
                        </div>
                    </row>
                    </form>

                </div>
            </div>
          </div>
        </header>
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
<?php
}
