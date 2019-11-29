<?php
session_start();
$loggedin = $_SESSION["username"];
$soID = $_SESSION["oID"];
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
            $month = "Kes채kuu";
            break;
        case "7":
            $month = "Hein채kuu";
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
if (isset($_GET['month'])) {
        $month = $_GET['month'];
    }elseif(!empty($_POST["month"])) {
    	$month=$_POST["month"];
    	$testi=$_POST["testi"];
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
    <script>
        if (/Android|Mobile|webOS|iPhone|iPad|iPod|BlackBerry|BB|PlayBook|IEMobile|Windows Phone|Kindle|Silk|Opera Mini/i.test(navigator.userAgent)) {
            // Take the user to a different screen here.
            window.location.assign("http://truudeli7.net/tyoajankirjaus/sivut/karuselli.php?month=<?php echo $month; ?>");
        }
        function myfunction() {
            document.getElementById("month").submit();
        }
        //Alla oleva funktio muuttaa kalenterin taustakuvaa riippuen kuukaudesta
        function kuva(){

            var month = "<?php echo $month; ?>";
            var monthbg = document.getElementById("monthbg");
            if (month == "Helmikuu" || month == "Tammikuu" || month == "Joulukuu"){
                document.getElementById("monthbg").style.backgroundImage= "url('kuvat/talvi.jpg')"; 
                document.getElementById("vari").style.backgroundColor= "#cfd5e8";
                var x = document.getElementsByClassName("navteksti");
                var i;
                for (i = 0; i < x.length;) {
                    x[i].style.color = "black";
                    i++;
                }
            }
            if (month == "Maaliskuu" || month == "Huhtikuu" || month == "Toukokuu"){
                document.getElementById("monthbg").style.backgroundImage= "url('kuvat/kevat.jpg')";
                document.getElementById("vari").style.backgroundColor= "#c4d142";
            }
            if (month == "Kesäkuu" || month == "Heinäkuu" || month == "Elokuu"){
                document.getElementById("monthbg").style.backgroundImage= "url('kuvat/kesa.jpg')";
                document.getElementById("vari").style.backgroundColor= "#6cb662";
            }
            if (month == "Syyskuu" || month == "Lokakuu" || month == "Marraskuu"){
                document.getElementById("monthbg").style.backgroundImage= "url('kuvat/syksy.jpg')";
                document.getElementById("vari").style.backgroundColor= "#a95342";
            }
             
        }
    </script>
    <?php
    echo "<body onload=kuva()>";
    require "yhteys.php";
    require "tavara/nav.php";

    ?>
    
    <div class="container-fluid text-center">
      <div class="row content">
        <div class="col-sm-2 col-xs- sidenav">
            <?php
            
            $timezone = date_default_timezone_get();
            //echo "The current server timezone is: " . $timezone;
            $date = date('Y-m-d', time());
            //echo $date;
            if(!isset($_GET['month'])) {
                $month = $_SESSION["month"];
            } elseif(empty($_GET['month'])){
                $month = $_SESSION["month"];
            }
            if (isset($_GET['pvm'])) {
                $pvm = $_GET['pvm'];
            } else{
                $pvm=$date;
            }
            if(!empty($_POST["pvm"])) {
	        $pvm=$_POST["pvm"];
	        //echo $email;
            }
            $loggedin = $_SESSION["username"];
            //Alla oleva funktio näyttää linkkejä admin sivuille jos on kirjautunut admin tunnuksilla
            if($loggedin == "admin@admin"){
                echo "
                    <h3>Admin tavaraa</h3><br>
                    <a href=\"http://truudeli7.net/tyoajankirjaus/admin/opettajat.php\">Opettajat</a><br>
                    <a href=\"http://truudeli7.net/tyoajankirjaus/admin/tyypit.php\">Tyypit</a><br>
                    <a href=\"http://truudeli7.net/tyoajankirjaus/admin/toimipiste.php\">Toimipisteet</a>
                    
                ";
            }
            ?>
            </div>
        <div class="col-sm-8 text-left">
            <div class="centercontent">
         <?php 
                    require "sivut/kalenteri.php";
                
                    $soID = $_SESSION["oID"];
                    
                    
                    //Alla oleva asia tarkistaa onko päivällä tunteja ja tekee asioita vastauksesta riippuen
                    $sql="SELECT * FROM to_tunti WHERE pvm='$pvm' AND oID='$soID'";
                    $juttu = $yhteys->query($sql);
                    $juttu2 = $juttu->fetch();
                    $juttu3 = $juttu2['tID'];
                    if($juttu3 !== null){
                        
                        $sql="SELECT to_opettaja.nimi, to_tyypit.tyyppi, to_tyypit.alityyppi,to_tunti.tID, to_tunti.oID, to_tunti.tyyppiID, to_tunti.pvm, to_tunti.klo, to_tunti.kesto, to_tunti.kuvaus FROM ((to_tunti INNER JOiN to_opettaja ON to_tunti.oID = to_opettaja.oID) INNER JOIN to_tyypit ON to_tunti.tyyppiID = to_tyypit.tyyppiID) WHERE pvm='$pvm' AND to_tunti.oID='$soID' ORDER BY to_tunti.klo";
                    
                        echo "<div class=\"sisalto\"><div class=\"over\"> <div class=\"over2\">";
                        echo "<table>"."<tr>"."<th>Tyyppi</th>"."<th>Alityyppi</th>"."<th>Pvm</th>"."<th>Kellonaika</th>"."<th>Kesto</th>"."<th>Kuvaus</th>"."<th>Poista</th>"."<th>Muokkaa</th>"."</tr>";
                        echo "<div class=\"overflow\">";
                        foreach($yhteys->query($sql) as $tietue) {
                            echo "<tr><td>".$tietue["tyyppi"]."</td>"."<td>".$tietue["alityyppi"]."</td>"."<td>".$tietue["pvm"]."</td>"."<td>".$tietue["klo"]."</td>"."<td>".$tietue["kesto"]."h"."</td>"."<td>".$tietue["kuvaus"]."</td>"."<td>"."<a href='sivut/tunnindel.php?tID=".$tietue["tID"]."&month=".$month."&pvm=".$pvm."'>Poista</a>"."</td>"."<td>"."<a href='sivut/tunninedit.php?tID=".$tietue["tID"]."&month=".$month."&pvm=".$pvm."'>Muokkaa</a>"."</td>"."</tr>";
                        }
                        echo "</div> </div> </div></table>";
                        echo "<a href='sivut/tunninlis.php?pvm=".$pvm."&month=".$month."'>Lisää tunti</a><br>";
                        echo "<a href='sivut/excel.php'>Lataa excel tiedostona</a><br>";
                        $sql="SELECT COUNT(tID), to_opettaja.nimi, to_tyypit.tyyppi, to_tyypit.alityyppi, to_tunti.oID, to_tunti.tyyppiID, to_tunti.pvm, to_tunti.klo, to_tunti.kesto, to_tunti.kuvaus FROM ((to_tunti INNER JOiN to_opettaja ON to_tunti.oID = to_opettaja.oID) INNER JOIN to_tyypit ON to_tunti.tyyppiID = to_tyypit.tyyppiID) WHERE pvm='$pvm' AND to_tunti.oID='$soID'";
                        foreach($yhteys->query($sql) as $tietue) {
                            echo " Tunteja tällä päivällä ".$tietue["COUNT(tID)"]."<br>";
                        }
                        $sql="SELECT SUM(kesto), to_opettaja.nimi, to_tyypit.tyyppi, to_tyypit.alityyppi, to_tunti.oID, to_tunti.tyyppiID, to_tunti.pvm, to_tunti.klo, to_tunti.kesto, to_tunti.kuvaus FROM ((to_tunti INNER JOiN to_opettaja ON to_tunti.oID = to_opettaja.oID) INNER JOIN to_tyypit ON to_tunti.tyyppiID = to_tyypit.tyyppiID) WHERE pvm='$pvm' AND to_tunti.oID='$soID'";
                        foreach($yhteys->query($sql) as $tietue) {
                            echo " Tuntien kesto yhteensä ".$tietue["SUM(kesto)"]."<br>";
                        }
                        $sql="SELECT COUNT(tID), to_opettaja.nimi, to_tyypit.tyyppi, to_tyypit.alityyppi, to_tunti.oID, to_tunti.tyyppiID, to_tunti.pvm, to_tunti.klo, to_tunti.kesto, to_tunti.kuvaus FROM ((to_tunti INNER JOiN to_opettaja ON to_tunti.oID = to_opettaja.oID) INNER JOIN to_tyypit ON to_tunti.tyyppiID = to_tyypit.tyyppiID) WHERE tyyppi='Sidottu' AND pvm='$pvm' AND to_tunti.oID='$soID'";
                        foreach($yhteys->query($sql) as $tietue) {
                            echo " Sidottuja on ".$tietue["COUNT(tID)"]."<br>";
                        }
                        $sql="SELECT COUNT(tID), to_opettaja.nimi, to_tyypit.tyyppi, to_tyypit.alityyppi, to_tunti.oID, to_tunti.tyyppiID, to_tunti.pvm, to_tunti.klo, to_tunti.kesto, to_tunti.kuvaus FROM ((to_tunti INNER JOiN to_opettaja ON to_tunti.oID = to_opettaja.oID) INNER JOIN to_tyypit ON to_tunti.tyyppiID = to_tyypit.tyyppiID) WHERE tyyppi='Sitomaton' AND pvm='$pvm' AND to_tunti.oID='$soID'";
                        foreach($yhteys->query($sql) as $tietue) {
                            echo " Sitomattomia on ".$tietue["COUNT(tID)"]."<br>";
                        }
                        
                        
                    } else{
                        echo "Päivällä $pvm ei ole tunteja<br>";
                        echo "<hr><a href='sivut/tunninlis.php?pvm=".$pvm."&month=".$month."'>Lisää tunti</a><br>";
                        echo "<a href='sivut/excel.php'>Lataa excel tiedostona</a><br>";
                    }
                    
                    ?>
                    </div>
        </div>
        </div>
        </div>
      </div>
    </div>

    <!--<footer class="container-fluid text-center">
      <p>Footer Text</p>
    </footer>-->
  </body>
</html>
<?php
mysqli_close($con);
?>
