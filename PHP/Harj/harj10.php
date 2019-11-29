<?php
/********************
@author SL
@date 6.11.2017
*****************/
echo "<h2>10.1</h2>";
$i = 5;


while($i <=45) {
	$i = $i + 5;
	echo "$i<br>";
}

echo "<h2>10.2</h2>";
$i = 2;

while($i <=11) {
	$i = $i + 1;
	echo "$i<br>";
}

echo "<h2>10.3</h2>";
$i = 1;
while($i <=15) {
	echo "*";
	$i++;
}

echo "<h2>10.4</h2>";
if(!empty($_POST["leveys"]) && !empty($_POST["korkeus"])) {
	$leveys = $_POST["leveys"];
	$korkeus = $_POST["korkeus"];
	
$i=0;
while($i<$korkeus){
	$j=0;
	while($j<$leveys){
		echo "*";
		$j++;
	}
	$i++;
	echo "<br>";
}
}
else {
	?>
<form action="./index.php?sivu=harj10&kansio=Harj" method="post">
	Anna leveys:<br>
	<input type="text" name="leveys"><br>
	Anna korkeus:<br>
	<input type="text" name="korkeus"<br>
	<input type="submit" value="tee neliö">
	
	</form>	
<?php
}
