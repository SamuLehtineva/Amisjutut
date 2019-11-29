<?php
session_start();
require("./includes/connection.php");
if(!empty($_POST["nimi"]) && !empty($_POST["postinumero"])){
    $nimi = $_POST["nimi"];
    $postinumero = $_POST["postinumero"];
    $sql = "INSERT INTO alue (aluenimi, postinumero) VALUES ('$nimi', '$postinumero')";
    $query = $db ->query($sql);
    header("Location: admin_index.php?sivu=alue_list");
}
require("./sup/admin_start.php");
?>
<body>
    <?php
        $type = $_SESSION['type'];
        if($type == "admin") require "includes/adminnav.php";
        else if($type == "koordinaattori") require "includes/koordnav.php";
    ?>
    <div class="main">
        <div class="container">
        <br>
        <h2>Lisää alue</h2>
        <br>
        <form action="admin_index.php?sivu=aluelis" method="post">
            Alueen nimi<br>
            <input type="text" name="nimi" required>
            <br>
            Alueen postinumero
            <br>
            <input type="number" name="postinumero" required>
            <input type="submit" class="btn btn-primary" value="Lisää">
        </form>
        </div>
    </div>
</body>