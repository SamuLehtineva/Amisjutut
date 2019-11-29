<?php
session_start();

require "./includes/connection.php";
require "./sup/start.php";
$type = $_SESSION["type"];
if($type == "admin") {
    $type = "yllapito";
}
$ktunnus1 = $_SESSION["username"];
$sql = "SELECT * FROM $type WHERE ktunnus = '$ktunnus1'";
$query = $db ->query($sql);
$juttu = $query->fetch();

$sukunimi = $juttu["sukunimi"];
$etunimi = $juttu["etunimi"];
$puh = $juttu["puh"];
$email = $juttu["email"];
if(!empty($_POST["ktunnus"]) && !empty($_POST["sukunimi"]) && !empty($_POST["etunimi"]) && !empty($_POST["email"])) {
    $ktunnus = $_POST["ktunnus"];
    $sukunimi = $_POST["sukunimi"];
    $etunimi = $_POST["etunimi"];
    $puh = $_POST["puh"];
    $email = $_POST["email"];
    if(!empty($_POST["salasana"]) && !empty($_POST["salasana1"]) && $_POST["salasana"] == $_POST["salasana1"]) {
        $password = $_POST["salasana"];
        $salasana = md5($password);
        $sql = "UPDATE $type SET ktunnus='$ktunnus', sukunimi='$sukunimi', etunimi='$etunimi', puh='$puh', email='$email', salasana='$salasana' WHERE ktunnus='$ktunnus1'";
        $query = $db->query($sql);
    } else {
        $sql = "UPDATE $type SET ktunnus='$ktunnus', sukunimi='$sukunimi', etunimi='$etunimi', puh='$puh', email='$email' WHERE ktunnus='$ktunnus1'";
        $query = $db->query($sql);
    }
}
require "./sup/admin_start.php";
?>
<body>
    <?php
            $type = $_SESSION['type'];
            if($type == "admin") require "includes/adminnav.php";
            else if($type == "koordinaattori") require "includes/koordnav.php";
            else require "includes/pukkinav.php";
        ?>
    <div class="main">
        <div class="container">
        <h2>Muokkaa tietojasi</h2>
        <br>
        <form action="admin_index.php?sivu=edituser" method="post">
            Käyttäjätunnus
            <br>
            <input type="text" name="ktunnus" value="<?php echo $ktunnus1 ?>" required>
            <br>
            Sukunimi
            <br>
            <input type="text" name="sukunimi" value="<?php echo $sukunimi ?>" required>
            <br>
            Etunimi
            <br>
            <input type="text" name="etunimi" value="<?php echo $etunimi ?>" required>
            <br>
            Puhelin
            <br>
            <input type="text" name="puh" value="<?php echo $puh ?>" required>
            <br>
            Email
            <br>
            <input type="email" name="email" value="<?php echo $email ?>" required>
            <br>
            Salasana
            <br>
            <input type="password" name="salasana">
            <br>
            Salasana uudestaan
            <br>
            <input type="password" name="salasana1">
            <br><br>
            <input type="submit" class="btn btn-primary" value="Tallenna">
        </form>
    </div>
</div>
</body>