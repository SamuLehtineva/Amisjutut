<?php

$koulu = array("nimi"=>"TAO",
				"osoite"=>"Sammonkatu 45",
				"postinumero"=>"33540",
				"postitp"=>"TAMPERE",
				"maa"=>"Suomi");

print_r($koulu);
echo "<hr>";

foreach($koulu as $tieto) {
	echo $tieto."<br>";
}
echo "<hr>";

foreach ($koulu as $avain => $arvo) {
	echo $avain." on ".$arvo."<br>";
}
