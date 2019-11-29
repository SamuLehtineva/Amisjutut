<?php
session_start();

/*
Checks register information and uploads them to the database. If the database structure changes, this file needs to be updated!
*/

require "./includes/connection.php";
if(!empty($_POST['username']) && !empty($_POST['enimi']) && !empty($_POST['snimi']) && !empty($_POST['email']) && !empty($_POST['puh']) && !empty($_POST['salasana']) && !empty($_POST['type'])) {
    $username = $_POST['username'];
    $enimi = $_POST['enimi'];
    $snimi = $_POST['snimi'];
    $email = $_POST['email'];
    $puh = $_POST['puh'];
    $salasana = md5($_POST['salasana']);
    $alue = $_POST['alue'];
    $type = $_POST['type'];
    $sql = "SELECT * FROM $type WHERE ktunnus = '$username' OR email = '$email'";
    $query = $db -> query($sql);
    
    if($query -> rowCount() <= 0) {
        
        $sql = "INSERT INTO ".$type."(ktunnus, salasana, sukunimi, etunimi, puh, email, tila) VALUES ('$username', '$salasana', '$snimi', '$enimi', '$puh', '$email', 1)"; 
        $query = $db -> query($sql);
        ?>
        <a href="index.php">Rekisteröintipyyntö on lähetetty, hallinto käsittelee pyyntösi mahdollisimman pian. Paina tästä päästäksesi takaisin kirjautumissivulle</a>
        <?php
        if ($query == false) {
            echo "bad";
        }
    }
    ?>
    <a href="index.php">Takaisin etusivulle</a>
    <?php
}

?>