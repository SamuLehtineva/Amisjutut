<?php
session_start();
require "./sup/start.php";
require "./includes/connection.php";

if(!empty($_POST["email"])) {
    $email = $_POST["email"];
    
    $sql = "SELECT * FROM spalautus WHERE email = '$email'";
    $query = $db -> query($sql);
    
    if($query -> rowCount() <= 0) {
        $found = false;
        $tables = array("pukki", "koordinaattori", "yllapito");
        foreach($tables as $table) {
            $sql = "SELECT * FROM $table WHERE email = '$email'";
            $query = $db -> query($sql);
            if($query -> rowCount() > 0) {
                $found = true;
            }
        }
        
        if($found) {
            $token = md5(rand());
            $date = date_create("y-m-d");
            $pvm = date_create("$date");
            date_add($pvm,date_interval_create_from_date_string("7 days"));
            $pvms = date_format($pvm, "y-m-d");
            
            $sql = "INSERT INTO spalautus (pvm, token, email) VALUES ('$pvms', '$token', '$email')";
            $query = $db -> query($sql);
            $link ="http://partiopukki.truudeli17.net/admin_index.php?sivu=newpass&token=".$token."&email=".$email;
            $title = "Salasanan nollaus";
            SendEmail($email, $title, $link);
            echo "<p>Nollausviestisi on lähetetty, saapuminen voi kestää useita minuutteja";
        }
        else echo "Sähköpostia ei ole olemassa";
    }
    else echo "Olet saanut liian monta palautusviestiä. Ota yhteyttä ylläpitoon";
    
}
else {
    ?>
    <body>
        <section id="snow"></section>
<header class="masthead dots">
  <div class="container h-100">
        <h2>Nollaa Salasanasi</h2>
        <form action="admin_index.php?sivu=reset" method="post">
            <input type="email" name="email" placeholder="Email" required>
            <br>
            <input class="btn btn-primary" type="submit" value="Lähetä">
        </form>
    </body>
<?php
}
