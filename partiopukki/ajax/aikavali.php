<?php

/*
Tiedosto hakee alueID:n perusteella alueen tiedot ja näyttää aikavälit alueella
Luo lomakkeelle alueen muokkausmahdollisuudet
*/
session_start();
require("../includes/connection.php");
//Erottaa tiedot saadusta arvosta
$value = explode(".", $_GET['v']);

$alueID = $value[0];
//Hakee alueen tiedot
$sql = "SELECT * FROM alue WHERE alueID=$alueID";
$juttu = $db->query($sql);
$juttu2 = $juttu->fetch();
$aluenimi = $juttu2['aluenimi'];
$postinumero = $juttu2['postinumero'];
    
?>
<div>
    <br>
    <h2><?php echo $aluenimi; ?></h2>
    <?php
    //Hakee tiedot tietokannasta
    $sql = "SELECT * FROM alueenaika WHERE alueID = $alueID";
    $query = $db -> query($sql);
    $result = $query -> fetchAll(PDO::FETCH_ASSOC);
    //Luo taulun otsikkorivin
    echo "<table><tr><th>Aikaväli</th><th>Toiminnot</th></tr>";
    //Jos rivejä on nolla, tulostetaan tauluun rivi, joka kertoo että aikavälejä ei ole
    if($query -> rowCount() == 0) {
        echo "<tr><td>Ei lisättyjä aikavälejä</td><td></td></tr>";
    }
    else {
        //Jos taas rivejä on, tulostetaan tiedot
        foreach($result as $row) {
            //Aikavälin statuksen perusteella valitaan valintaboxin valinta
            $state = $row["status"] == 2 ? "checked" : "";
            echo "<tr><td>".$row["aikavali"]."</td><td><button type=\"button\" class=\"btn-default\" onclick=\"aadel(".$row['aaID'].")\"><i class=\"fas fa-trash-alt\"></i></button><label class=\"switch\">
                    <input onchange=\"change(".$row['aaID'].", this.checked)\" type=\"checkbox\" $state>
                    <span id=\"slider\" class=\"slider\"></span>
                </label></td></tr>";
        }
    }
    echo "</table>";
    
    ?>
    <!--Alueen aikavälin lisäämislomake-->
    <br>
    <b>Lisää alueelle aikaväli</b>
    <form action="admin_index.php?sivu=alueedit&alueID=<?php echo $alueID?>" method="post">
        <input type="text" name="aikavali" placeholder="Aikaväli..." required>
        <br>
        <input type="submit" class="btn btn-primary" value="Lisää">
    </form>
    <p><b>Muokkaa tietoja</b></p>
    <?php
    
?>
<!--Alueen muokkauslomake-->
    <form action="admin_index.php?sivu=alueedit&alueID=<?php echo $alueID?>" method="post">
        Alueen nimi
        <br>
        <input type="text" name="nimi" placeholder="Alueen nimi..." value="<?php echo $aluenimi?>"><br>
        Postinumero
        <br>
        <input type="text" name="postinumero" placeholder="Postinumero..." value="<?php echo $postinumero?>" method="post"><br>
        <input type="submit" class="btn btn-primary" value="Tallenna">
    </form>
</div>
<?php
