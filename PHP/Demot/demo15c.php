<?php
/*Muokkaa tietettä
ei tehdä uudelleenohjausta, laitetaan linkit paluuseen*/

// katsotaan id:n ja mode.n saaminen pyynnöstä
if(empty($_GET["id"])) {
	echo "et antanu id:tä";
	echo "<a href=\"./index.php?sivu=demo15&kansio=Demot\">Palaa takaisin listaan</a>";
}
else {
	$id=$_GET["id"];
//1. jos tiedot saatu, haetaan muut tiedot kannasta muuttujiin
	require "yhteys.php";
	$sql="SELECT * FROM pelaajat WHERE id=?";
	$lause = $yhteys->prepare($sql);
	$lause->execute(array($id));
	$vastaus = $lause->fetchALL(PDO::FETCH_ASSOC);
	
	$ktunnus = $vastaus[0]["ktunnus"];
	$email = $vastaus[0]["email"];
	
	//echo $email. " ".$ktunnus;
	
//3. lomakkeenkäsittelijä, päivittää muutetut tiedot kantaan
if(!empty($_POST["ktunnus"]) && !empty($_POST["email"])) {
	$ktunnus=$_POST["ktunnus"];
	$email = $_POST["email"];
	
	$sql = "UPDATE pelaajat SET ktunnus=:ktunnus, email=:email WHERE id=:id"; //tietoturva
	
	$kysely=$yhteys->prepare($sql);
	$kysely->execute(array(":ktunnus"=>$ktunnus,":email"=>$email,":id"=>$id));
	
	if($kysely) echo "Muutettu on";
	else "ei muuttunut";
	
	echo "<a href=\"./index.php?sivu=demo15&kansio=Demot\">Palaa takaisin listaan</a>";
}

//2. Tulostetaan lomake jossa tiedot ovat näkyvillä
?>
 <form action="index.php?sivu=demo15c&kansio=Demot&mode=muokkaa&id=<?php
 echo $id;?>" method="post">
 Käyttäjätunnus<br>
 <input type="text" name="ktunnus" value="<?php echo $ktunnus;?>"><br>
 Sähköposti<br>
 <input type="text" name="email" value="<?php echo $email?>"><br>
 <input type="submit" value="Päivitä">
 </form>
<?php
}
?>