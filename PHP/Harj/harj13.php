<?php
echo "<h2>13</h2>";
if(!empty($_POST ["kuukaudet"]) && !empty($_POST ["paivays"]) && !empty($_POST ["vuosi"])) {
	
$kuukaudet = $_POST["kuukaudet"];
$paivays = $_POST["paivays"];
$vuosi = $_POST["vuosi"];

echo $kuukaudet, " ", $paivays, " ", $vuosi;

}
?>
<form action="./index.php?sivu=harj13&kansio=Harj" method="post">
<select name="kuukaudet">
<?php
for($i = 1;$i <= 12; $i++)
echo "<option value =\"$i\">$i</option>";
?>
</select>

<select name="paivays">
<?php
for($i = 1;$i <= 31; $i++)
echo "<option value =\"$i\">$i</option>";
?>
</select>


<select name="vuosi">
<?php
for($i = 1947;$i <= 2000; $i++)
echo "<option value =\"$i\">$i</option>";
?>
</select>

<input type="submit" value="valmis">
</form>

<?php

$rand = rand(1, 100);
$i = 0;
do {
    echo "ei";
	echo $i, "<br>";
	$i++;
}while ($i != $rand);
echo $rand, "<br>";

echo "Parse error: syntax error, unexpected 'echo' (T_ECHO), expecting ';' in<br>";
echo "Parse error: syntax error, unexpected '>' in<br>";
echo "Notice: Use of undefined constant i<br>";
echo "Parse error:<br>";
echo "Parse error: syntax error, unexpected end of file<br>";
echo "Parse error: syntax error<br>";
echo "Tiedostoa ei löydy<br>";
echo "Parse error: syntax error<br>";