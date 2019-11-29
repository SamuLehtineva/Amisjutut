<?php
require "../tavara/alku.php";
if (isset($_GET['month'])) {
        $month = $_GET['month'];
    }elseif(!empty($_POST["month"])) {
    	$month=$_POST["month"];
    	$testi=$_POST["testi"];
    }
?>
<script>
    function kuva(){

            var month = "<?php echo $month; ?>";
            
            var monthbg = document.getElementById("monthbg");
            if (month == "Helmikuu" || month == "Tammikuu" || month == "Joulukuu"){
                document.getElementById("monthbg").style.backgroundImage= "url('../kuvat/talvi.jpg')"; 
                document.getElementById("vari").style.backgroundColor= "#cfd5e8";
                var x = document.getElementsByClassName("navteksti");
                var i;
                for (i = 0; i < x.length;) {
                    x[i].style.color = "black";
                    i++;
                }
            }
            if (month == "Maaliskuu" || month == "Huhtikuu" || month == "Toukokuu"){
                document.getElementById("monthbg").style.backgroundImage= "url('../kuvat/kevat.jpg')";
                document.getElementById("vari").style.backgroundColor= "#c4d142";
            }
            if (month == "Kesäkuu" || month == "Heinäkuu" || month == "Elokuu"){
                document.getElementById("monthbg").style.backgroundImage= "url('../kuvat/kesa.jpg')";
                document.getElementById("vari").style.backgroundColor= "#6cb662";
            }
            if (month == "Syyskuu" || month == "Lokakuu" || month == "Marraskuu"){
                document.getElementById("monthbg").style.backgroundImage= "url('../kuvat/syksy.jpg')";
                document.getElementById("vari").style.backgroundColor= "#a95342";
            }
             
        }
</script>
<?php
echo "<body onload=kuva()>";
require "../tavara/nav.php";
require "../tavara/yhteys.php";
?>

<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">

        </div>
        <div class="col-sm-8 text-left">
        <?php
        
        $date = date('Y-m-d', time());
        $oID = $_SESSION["oID"];
        if(!isset($_GET['month'])) {
            $month = $_SESSION["month"];
        } elseif(!empty($_POST['month'])){
            $month = $_POST["month"];
            $_SESSION["month"] = $month;
        }
        if (isset($_GET['pvm'])) {
            $pvm = $_GET['pvm'];
        } else{
            $pvm=$date;
        }
        if(!empty($_POST["pvm"])) {
            $pvm=$_POST["pvm"];
        }
        require "mobkalenteri.php";
        ?>
        <!--<form action="karuselli.php" method="post">
                <?php
                    $soID = $_SESSION["oID"];
                    //echo $soID;
                    //print_r($_SESSION); 
                ?>
                
                 P채iv채
                 
                <br>
                <input type="date" name="pvm" value="<?php echo $date; ?>">
                <br>
                <input type="submit" value="Hae">
            </form>-->
        <?php
        /*$oID = $_SESSION["oID"];
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
        }*/
        echo "<hr><a href='mobtunninlis.php?pvm=".$pvm."&month=".$month."'>Lisää tunti</a><hr>";
        $sql="SELECT to_opettaja.nimi, to_tyypit.tyyppi, to_tyypit.alityyppi,to_tunti.tID, to_tunti.oID, to_tunti.tyyppiID, to_tunti.pvm, to_tunti.klo, to_tunti.kesto, to_tunti.kuvaus FROM ((to_tunti INNER JOiN to_opettaja ON to_tunti.oID = to_opettaja.oID) INNER JOIN to_tyypit ON to_tunti.tyyppiID = to_tyypit.tyyppiID) WHERE pvm='$pvm' AND to_tunti.oID='$soID' ORDER BY to_tunti.klo";
        echo "<div class=\"over\"> <div class=\"over2\">";
        echo "<div class=\"overflow\">";
        foreach($yhteys->query($sql) as $tietue) {
            echo "<table><tr><th>Kellonaika</th><td>".$tietue["klo"]."</td></tr>"."<tr><th>Tyyppi</th><td>".$tietue["tyyppi"]."</td></tr>"."<tr><th>Alityyppi</th><td>".$tietue["alityyppi"]."</td></tr>"."<tr><th>Pvm</th><td>".$tietue["pvm"]."</td></tr>"."<tr><th>Kesto</th><td>".$tietue["kesto"]."h"."</td></tr><tr>"."<th>Kuvaus</th><td>".$tietue["kuvaus"]."</td></tr><tr>"."<th>Poista</th><td>"."<a href='http://truudeli7.net/tyoajankirjaus/sivut/mobtunnindel.php?tID=".$tietue["tID"]."&month=$month&pvm=$pvm'>Poista</a>"."</td></tr><tr>"."<th>Muokkaa</th><td>"."<a href='http://truudeli7.net/tyoajankirjaus/sivut/mobtunninedit.php?tID=".$tietue["tID"]."&month=$month&pvm=$pvm'>Muokkaa</a>"."</td>"."</tr></table><br>";
        }
        echo "</div> </div> </div>";
        mysqli_close($con);
            
            
            
            
            