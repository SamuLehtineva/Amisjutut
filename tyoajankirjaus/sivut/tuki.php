<?php
require "../tavara/alku.php";
require "../tavara/nav.php";
?>
<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 col-xs- sidenav">
        </div>
        <div class="col-sm-10 col-xs-10 text-left">
            <h1>Lähetä viesti tukipalveluun</h1>
            <form action="tuki.php">
                <textarea placeholder="Kirjoita ongelmasi tähän." name="msg" rows="10" cols="100"></textarea>
                <br>
                <input type="submit" value="Lähetä">
            </form>
<?php
$loggedin = $_SESSION["username"];
if(!empty($_GET["msg"])){
    $msg = mysqli_real_escape_string($con, $_GET["msg"]);
	$msg = htmlentities($msg);
	$msg = htmlspecialchars($msg);
    echo "Viestisi on lähetetty tukipalveluun.";
    
    $msg = $msg."\nlähettäjältä\n".$loggedin;
    
    // use wordwrap() if lines are longer than 70 characters
    $msg = wordwrap($msg,70);
    
    // send email
    mail("tyoajankirjaus@truudeli7.net","help ticket",$msg);
   // }
}
/**/
?>
        </div>
    </div>
</div>