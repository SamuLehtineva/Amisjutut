<?php
session_start();
require "./includes/connection.php";

if(!empty($_POST["token"]) && !empty($_POST["pass1"]) && !empty($_POST["pass2"])) {
    
    $token = $_POST['token'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    
    $email = $_POST['email'];
    if($pass1 == $pass2) {
        $tables = array("pukki", "koordinaattori", "yllapito");
        $notFound = true;
        $pass1 = md5($pass1);
        foreach($tables as $table) {
            $sql = "SELECT * FROM $table WHERE email = '$email'";
            $query = $db -> query($sql);
            
            if($query != false) {
                if($query -> rowCount() > 0) {
                    $notFound = false;
                    $sql = "UPDATE $table SET salasana = '$pass1' WHERE email = '$email'";
                    $query = $db -> query($sql);
                    echo $sql;
                   /*
                    if($query != false) {
                        $sql = "DELETE FROM spalautus WHERE token = '$token'";
                        $query = $db -> query($sql);
                        if($query != false) {
                            echo "Salasanasi on vaihdettu!";
                        }
                    }*/
                }
            }
            else echo "$table failed sql";
        }
        if($notFound) {
            echo "This thing doesn't exist? Are you even alive?";   
        }
    }
    else
        echo "Salasanat eivät täsmää";
}
else if(empty($_GET["token"]) || empty($_GET["email"])) {
    header("Location: admin_index.php?sivu=reset");
}
$email = $_GET["email"];
$token = $_GET["token"];

$sql = "SELECT * FROM spalautus WHERE token = '$token'";
$query = $db -> query($sql);

if($query -> rowCount() <= 0) {
    header("Location: admin_index.php?sivu=reset");
}
else {
?>
<script>
    function check() {
        var p1 = document.getElementById("pass1");
        var p2 = document.getElementById("pass2");
        
        if(p1.value == p2.value) {
            document.getElementById("submit").disabled = false;
        }
        else document.getElementById("submit").disabled = true;
    }
</script>
<body onload="check()">
    <h4>Syötä uusi salasana</h4>
    <form action="admin_index.php?sivu=newpass" method="post">
        <input id="pass1" type="password" name="pass1">
        <br>
        <h4>Syötä salasana uudestaan</h4>
        <input oninput="check()" id="pass2" type="password" name="pass2">
        <br>
        <input type="text" name="token" value="<?php echo $token; ?>">
        <input type="text" name="email" value="<?php echo $email; ?>">
        <input id="submit" type="submit" value="Lähetä">
    </form>
</body>
<?php
}
?>
