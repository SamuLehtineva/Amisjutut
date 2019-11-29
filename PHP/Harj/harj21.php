<?php

require "yhteys.php";

if(!empty($_POST["otsikko"]) && !empty($_POST["sisalto"])) {
	$sisalto=$_POST["sisalto"];
	$otsikko=$_POST["otsikko"];
	$lisayspvm = date('Y-m-j');
	$poistamispvm = strtotime($lisayspvm) + 12099600;
	$poistamispvm = date('Y-m-j', $poistamispvm);
	if(!empty($_POST["kirjoittaja"])) $kirjoittaja=$_POST["kirjoittaja"];
	else $kirjoittaja=NULL;
	//2. rakenna sql
	
	$sql="INSERT INTO uutinen(sisalto,otsikko,kirjoittaja,kirjoituspvm,poistamispvm) VALUES('$sisalto','$otsikko','$kirjoittaja','$lisayspvm','$poistamispvm')";
	echo $sql;
	//3. valmistele ja suorita
	
	$lause=$yhteys ->prepare($sql);
	$lause->execute();
	
}

?>

<h2>Lisää uutinen</h2>
<form action="./index.php?sivu=harj21&kansio=Harj" method="post">
Otsikko<br>
<input type="text" name="otsikko" required><br>
Sisältö<bR>
<input type="text" name="sisalto" required><br>
Kirjoittaja<br>
<input type="text" name="kirjoittaja"><br>

<input type="submit" value="Lisää">
</form>

<?php
$sql="SELECT otsikko,id FROM uutinen";

foreach($yhteys->query($sql) as $tietue) {
echo $tietue["otsikko"]."<a href=\"index.php?sivu=harj21a&kansio=Harj&mode=muokkaa&id=".$tietue["id"]."\">Muokkaa</a>";

echo "<a href=\"./Harj/harj21b.php?kansio=Harj&mode=poista&id=".$tietue["id"]."\">Poista</a><br>";
}