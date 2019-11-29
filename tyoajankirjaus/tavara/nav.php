<?php
$month = date('m'); //ottaa kuukauden ja tekee siitä suomen kielisen muuttujan
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
$pvm = date('Y-m-d'); //ottaa tämän päivän päivämäärän
?>
<nav class="navbar navbar-inverse">
     <div class="container-fluid" id="vari">
    <div class="navbar-header">
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
         </button>
         <?php
         echo "<a class=\"navbar-brand navteksti\" href=\"http://truudeli7.net/tyoajankirjaus/etusivu.php?pvm=".$pvm."&month=".$month."\">";
         $loggedin = $_SESSION["username"];
         $oID = $_SESSION["oID"];
         echo "$loggedin";
         ?>
         </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
            <?php echo "<li class=\"active\"><a class=\"navteksti\" href=\"http://truudeli7.net/tyoajankirjaus/etusivu.php?pvm=".$pvm."&month=".$month."\">Etusivu</a></li>"?>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a class="navteksti" href="http://truudeli7.net/tyoajankirjaus/sivut/tuki.php">Tuki</a></li>
            <li><a class="navteksti" href="http://truudeli7.net/tyoajankirjaus/kirjaudu_ulos.php"><span class="glyphicon glyphicon-log-in"></span> Kirjaudu ulos</a></li>
            <li><a class="navteksti" href="http://truudeli7.net/tyoajankirjaus/sivut/rekisteroidy.php">Rekisteröi uusi käyttäjä</a></li>
        </ul>
    </div>
     </div>
</nav>