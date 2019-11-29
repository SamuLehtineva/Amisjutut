<?php
if(empty($_GET["id"])) {
	echo "et antanu id:tä";
	echo "<a href=\"./index.php?sivu=harj21&kansio=Harj\">Palaa takaisin listaan</a>";
}
else {
	$id=$_GET["id"];

	require "yhteys.php";
	$sql="SELECT * FROM uutiset WHERE id=?";
	$lause = $yhteys->prepare($sql);
	$lause->execute(array($id));
	$vastaus = $lause->fetchALL(PDO::FETCH_ASSOC);
	
	$otsikko = $vastaus[0]["otsikko"];
	$sisalto = $vastaus[0]["sisalto"];
	

	
if(!empty($_POST["otsikko"]) && !empty($_POST["sisalto"])) {
	$otsikko=$_POST["otsikko"];
	$sisalto = $_POST["sisalto"];
	
	$sql = "UPDATE uutinen SET otsikko=:otsikko, sisalto=:sisalto WHERE id=:id"; //tietoturva
	
	$kysely=$yhteys->prepare($sql);
	$kysely->execute(array(":otsikko"=>$otsikko,":sisalto"=>$sisalto,":id"=>$id));
	
	if($kysely) echo "Muutettu on";
	else "ei muuttunut";
	
	echo "<a href=\"./index.php?sivu=harj21&kansio=Harj\">Palaa takaisin listaan</a>";
}

?>
 <form action="index.php?sivu=harj21a&kansio=Harj&mode=muokkaa&id=<?php
 echo $id;?>" method="post">
 Otsikko<br>
 <input type="text" name="otsikko" value="<?php echo $otsikko;?>"><br>
 Sisalto<br>
 <input type="text" name="sisalto" value="<?php echo $sisalto?>"><br>
 <input type="submit" value="Päivitä">
 </form>
<?php
}
?>