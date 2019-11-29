<?php
/*require "../tavara/kalenterialku.php";
require "../tavara/nav.php";*/
require "../tavara/yhteys.php";
$vuosi = date("Y");
$oID = $_SESSION["oID"];
$date2=date_create();
?>
<script>
    function myfunction() {
        document.getElementById("month").submit();
    }
</script>
<?php
date_date_set($date2,date("Y"),date("m"),date("d"));
if (isset($_GET["month"])) {
    $month = $_GET["month"];
}elseif(!empty($_POST["month"])) {
	$month=$_POST["month"];
	$testi=$_POST["testi"];
	$karkaus=$vuosi/4;
}

	switch ($month){
	    case "Tammikuu":
    	    $pm = 31;
    	    $tm = 0;
    	    date_date_set($date2,2018,01,01);
    	    break;
	    case "Helmikuu":
	        if(strlen($karkaus)==3){
	            $pm = 29;
    	        $tm = 0;
	        }else{
    	        $pm = 28;
    	        $tm = 3;
	        }
    	    date_date_set($date2,2018,02,01);
    	    break;
	    case "Maaliskuu":
    	    $pm = 31;
    	    $tm = 3;
    	    date_date_set($date2,2018,03,01);
    	    break;
	    case "Huhtikuu":
    	    $pm = 30;
    	    $tm = 6;
    	    date_date_set($date2,2018,04,01);
    	    break;
	    case "Toukokuu":
    	    $pm = 31;
    	    $tm = 1;
    	    date_date_set($date2,2018,05,01);
    	    break;
	    case "Kesäkuu":
    	    $pm = 30;
    	    $tm = 4;
    	    date_date_set($date2,2018,06,01);
    	    break;
	    case "Heinäkuu":
    	    $pm = 31;
    	    $tm = 6;
    	    date_date_set($date2,2018,07,01);
    	    break;
	    case "Elokuu":
    	    $pm = 31;
    	    $tm = 2;
    	    date_date_set($date2,2018,08,01);
    	    break;
	    case "Syyskuu":
    	    $pm = 30;
    	    $tm = 5;
    	    date_date_set($date2,2018,09,01);
    	    break;
	    case "Lokakuu":
    	    $pm = 31;
    	    $tm = 0;
    	    date_date_set($date2,2018,10,01);
    	    break;
	    case "Marraskuu":
    	    $pm = 30;
    	    $tm = 3;
    	    date_date_set($date2,2018,11,01);
    	    break;
	    case "Joulukuu":
    	    $pm = 30;
    	    $tm = 5;
    	    date_date_set($date2,2018,12,01);
    	    break;
	}

$months = array("Tammikuu"=>"31", "Helmikuu"=>"28", "Maaliskuu"=>"31", "Huhtikuu"=>"30", "Toukokuu"=>"31", "Kesäkuu"=>"30", "Heinäkuu"=>"31", "Elokuu"=>"31", "Syyskuu"=>"30", "Lokakuu"=>"31", "Marraskuu"=>"30", "Joulukuu"=>"30");
 ?>
 <div class="monthbg" id="monthbg">
 <div class="month" id="ei">      
  <ul>
    <li>
        <?php
        echo "<form action=\"http://truudeli7.net/tyoajankirjaus/sivut/karuselli.php\" id=\"month\" method=\"post\">";
            echo "<select onchange=\"myfunction()\" name=\"month\" form=\"month\">";
                    foreach($months as $x => $x_value){
                        if($month == $x){
                        echo "<option selected value=".$x.">".$x."</option>";
                        } else {
                        echo "<option value=".$x.">".$x."</option>";
                        }
                    }
            echo "</select>";
        echo "</form>";
        echo "<div class=\"vuosicontainer\">";
        echo "<span style=\"font-size:18px\">$vuosi</span>";
        echo "</div>";
        ?>
    </li>
 </ul>
</div>
</div>
<ul class="days">
<?php
$vuosil=$vuosi;
    if(strlen($karkaus)==3){
        while($vuosil > 2018){
            $tm=$tm+2;
            $vuosil--;
        }
    }else{
        while($vuosil > 2018){
            $tm++;
            $vuosil--;
        }
    }
    $t = 1;
    $p=1;
    $numero = $months[$month];
    $paiva = date_format($date2,"Y-m-d");
    
    
    while($p <= $pm){
        $result = $date2->format('Y-m-d');
        //echo $result;
        $krr    = explode('-', $result);
        $result = implode("", $krr);
        //echo $result;
        $sql = "SELECT COUNT(tID) FROM to_tunti WHERE pvm='$result' AND oID='$soID'";
       $sql = "SELECT COUNT(tID) FROM to_tunti WHERE pvm='$result' AND oID='$soID'";
        $stmt = $yhteys->query($sql);
        $asia = $stmt->fetch();
        $count = $asia["COUNT(tID)"];
        $testi = date_format($date2,"Y-m-d");
        if($testi == date("Y-m-d")){
            if($count == 0){
                echo "<li><a class='jotain' href=\"http://truudeli7.net/tyoajankirjaus/sivut/karuselli.php?pvm=".date_format($date2,"Y-m-d")."&month=".$month."\">".date_format($date2,"d")."</a></li>";
            }else{
                echo "<li><span class=\"active\"><a class='jotain' href=\"http://truudeli7.net/tyoajankirjaus/sivut/karuselli.php?pvm=".date_format($date2,"Y-m-d")."&month=".$month."\">".date_format($date2,"d")."</a>"."</li>";
            }
        }else{
            if($count == 0){
                echo "<li ><a href=\"http://truudeli7.net/tyoajankirjaus/sivut/karuselli.php?pvm=".date_format($date2,"Y-m-d")."&month=".$month."\">".date_format($date2,"d")."</a></li>";
            }else{
                echo "<li><span class=\"active\"><a href=\"http://truudeli7.net/tyoajankirjaus/sivut/karuselli.php?pvm=".date_format($date2,"Y-m-d")."&month=".$month."\">".date_format($date2,"d")."</a>"."</li>";
            }
        }
        date_add($date2,date_interval_create_from_date_string("1 days"));
        //echo $kjuttu5;
        $p++;
        //echo $paiva;
        //echo $rivimaara;
    }
echo "</ul>";

