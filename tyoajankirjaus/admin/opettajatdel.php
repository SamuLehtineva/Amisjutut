<?php
require "../tavara/yhteys.php";

if (isset($_GET['oID'])) $oID = $_GET['oID'];

if(empty($_GET["oID"])) header("Location:opettajat.php");
else {
    // the message
    $msg = "Teidän käyttäjä on poistettu työajankirjausjärjestelmästä.\n\nJos haluatte lisätietoja asiasta, lähettäkää sähköposti osoitteeseen tyoajankirjaus@truudeli7.net";
    
    // use wordwrap() if lines are longer than 70 characters
    $msg = wordwrap($msg,70);
    $juttu = $yhteys->query("SELECT * FROM to_opettaja WHERE oID='$oID'");
    $juttu2 = $juttu->fetch();
    $email = $juttu2["email"];
    
    // send email
    mail("$email","Käyttäjäsi on poistettu",$msg);
    $sql = "DELETE FROM to_opettaja WHERE oID=$oID";
	$lause=$yhteys->prepare($sql);
	$lause->execute();
	header("Location:opettajat.php");
}
?>