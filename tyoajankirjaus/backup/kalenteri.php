<?php
require "../tavara/kalenterialku.php";
require "../tavara/nav.php";
require "../tavara/yhteys.php";
$vuosi = date("Y");
$oID = $_SESSION["oID"];
$date=date_create();
date_date_set($date,date("Y"),date("m"),date("d"));
echo date_format($date,"Y,m,d");
if(!empty($_POST["kuukausi"])/* && !empty($_POST["testi"])*/) {
	$month=$_POST["kuukausi"];
	$testi=$_POST["testi"];
	$karkaus=$vuosi/4;
	switch ($month){
	    case "Tammikuu":
    	    $pm = 31;
    	    $tm = 0;
    	    date_date_set($date,2018,01,01);
    	    break;
	    case "Helmikuu":
	        if(strlen($karkaus)==3){
	            $pm = 29;
    	        $tm = 0;
	        }else{
    	        $pm = 28;
    	        $tm = 3;
	        }
    	    date_date_set($date,2018,02,01);
    	    break;
	    case "Maaliskuu":
    	    $pm = 31;
    	    $tm = 3;
    	    date_date_set($date,2018,03,01);
    	    break;
	    case "Huhtikuu":
    	    $pm = 30;
    	    $tm = 6;
    	    date_date_set($date,2018,04,01);
    	    break;
	    case "Toukokuu":
    	    $pm = 31;
    	    $tm = 1;
    	    date_date_set($date,2018,05,01);
    	    break;
	    case "Kesäkuu":
    	    $pm = 30;
    	    $tm = 4;
    	    date_date_set($date,2018,06,01);
    	    break;
	    case "Heinäkuu":
    	    $pm = 31;
    	    $tm = 6;
    	    date_date_set($date,2018,07,01);
    	    break;
	    case "Elokuu":
    	    $pm = 31;
    	    $tm = 2;
    	    date_date_set($date,2018,08,01);
    	    break;
	    case "Syyskuu":
    	    $pm = 30;
    	    $tm = 5;
    	    date_date_set($date,2018,09,01);
    	    break;
	    case "Lokakuu":
    	    $pm = 31;
    	    $tm = 0;
    	    date_date_set($date,2018,10,01);
    	    break;
	    case "Marraskuu":
    	    $pm = 30;
    	    $tm = 3;
    	    date_date_set($date,2018,11,01);
    	    break;
	    case "Joulukuu":
    	    $pm = 30;
    	    $tm = 5;
    	    date_date_set($date,2018,12,01);
    	    break;
	}
}
?>
<div class="month">      
  <ul>
    <li>
        <form action="kalenteri.php" id="kuukausi" method="post">
            <!--<input type="text" name="testi"></input>-->
            <select placeholder="$month" name="kuukausi" form="kuukausi">
                <option value="Tammikuu">Tammikuu</option>
                <option value="Helmikuu">Helmikuu</option>
                <option value="Maaliskuu">Maaliskuu</option>
                <option value="Huhtikuu">Huhtikuu</option>
                <option value="Toukokuu">Toukokuu</option>
                <option value="Kesäkuu">Kesäkuu</option>
                <option value="Heinäkuu">Heinäkuu</option>
                <option value="Elokuu">Elokuu</option>
                <option value="Syyskuu">Syyskuu</option>
                <option value="Lokakuu">Lokakuu</option>
                <option value="Marraskuu">Marraskuu</option>
                <option value="Joulukuu">Joulukuu</option>
            </select>
            <input type="submit">
        </form>
        <?php echo "<span style=\"font-size:18px\">$vuosi</span>"; ?>
    </li>
  </ul>
</div>
<ul class="weekdays">
  <li>Mo</li>
  <li>Tu</li>
  <li>We</li>
  <li>Th</li>
  <li>Fr</li>
  <li>Sa</li>
  <li>Su</li>
</ul>
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
    $p=1;
    $t = 1;
    $paiva = date_format($date,"Y-m-d");
    while($p <= $pm){
        while($t <= $tm){
            echo "<li></li>";
            $t++;
        }
        $sql="SELECT COUNT(tID) FROM to_tunti WHERE pvm=$paiva";
        if($p <= 0){
            echo "<li><span class=\"active\">".date_format($date,"d")."</li>";
        }else{
            echo "<li>".date_format($date,"d")."</li>";
        }
        date_add($date,date_interval_create_from_date_string("1 days"));
        $p++;
        /*echo $paiva;
        echo $rivimaara;*/
    }
    ?>
</ul>