<?php 
/**************************** 
* Kirjoita runo 
* 
* Ohjelma avaa näkyville valmiin runotiedoston ja näyttää lomakkeen, jolla voi lisätä runoon yhden rivin 
******************************/ 


if (isset($_POST["runonrivi"])) {
	$teksti=$_POST["runonrivi"]."\n"; //huom \n lisää rivinvaihdon tekstiin 
	$kahva=fopen("./Demot/avoin/runo.txt",'a'); //määre a avaa tiedoston kirjoitettavaksi sekä sijoittaa kursorin tiedoston loppuun 
	fwrite($kahva,$teksti); 
	fclose($kahva); // sulkee tiedoston

} 

// tämä osa lukee runon ruudulle
if(is_file("./Demot/avoin/runo.txt")) //jos runo on olemassa
	{
	$kahva=fopen("./Demot/avoin/runo.txt",'r'); // määre r avaa tiedoston luettavaksi sekä sijoittaa kursorin tiedoston alkuun 
	echo "<h1>Tässä runosi.</h1><p>"; 
	while(!feof($kahva)) //toistetaan lukemista rivi kerrallaan kunnes ollaan tiedoston lopussa
	{	

	$teksti=fread($kahva,8192); // lukee yhden rivin 
	echo str_replace("\n", "<br>", $teksti); // lukiessa korvataan \n html:n rivinvaihdoilla

	} 
	echo "</p>"; 
	fclose($kahva);
}

?> 
<p>Kirjoita runoosi seuraava rivi</p> 
<form action="./index.php?sivu=demo19&kansio=Demot" method="post"> 
<input type="text" name="runonrivi"> 
<input type="submit" value="Tallenna"> 
</form>