<?php
//Tauluun to_opettaja liittyva apufunktio

function tunnusta_ei_kannassa($yhteys,$email)
{
    $kysely = $yhteys->prepare("SELECT * FROM to_opettaja WHERE email=?");
    $kysely->execute(array($email)); $rivimaara = $kysely->rowCount(); //laskee vastauksesta rivien määrän

    if($rivimaara == 0) return true;
    else return false;

}
/* Funktio palauttaa käyttäjän id:n*/
function hae_id_kannasta($email,$salasana)
{
    require "./tavara/yhteys.php";
    $id=NULL;
    $lause = $yhteys->prepare("SELECT * FROM to_opettaja WHERE email=:email AND salasana =:salasana");
    $lause->bindParam(':email', $tunnari);
    $lause->bindParam(':salasana', $passu);

    $tunnari = $email;
    $passu = $salasana;

    $lause->execute();

    $rivi = $lause->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($rivi)) $id = $rivi[0]["oID"];
    return $id;
}
function kayttajan_email($oID,$yhteys)
{
    $sql="SELECT email FROM to_opettaja WHERE oID=?";

    $teksti="";

    $kysely=$yhteys->prepare($sql);
    $kysely->execute(array($oID));

    $rivi=$kysely->fetchAll(PDO::FETCH_ASSOC);
    if(empty($rivi)) $teksti= "Käyttäjää ei löydy.";
    else {
        $email=$rivi[0]["email"];
        $teksti.=$email;
    }
    return $teksti;
}
?>
