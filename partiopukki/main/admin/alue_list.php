<?php
session_start();
require "./includes/connection.php";
require("./sup/admin_start.php");
?>
<body>
    <script src="ajax/ajax.js"></script>
    <script>
        var list = true;
        function del(id) {
            search(id, "ajax/aluelist");
            location.reload();
        }
        function AjaxOnReady(response) {
            if(list)
                document.getElementById("content").innerHTML = response;
            list = true;
        }
        function load(id) {
            search(id, "ajax/aikavali");
        }
        function aadel(id) {
            search(id, "ajax/aikadel");
        }
        function change(id, state) {
            state = state == true ? 2 : 1;
            list = false;
            search(id + "." + state, "ajax/changestate");
        }
        
    </script>
        <?php
            $type = $_SESSION['type'];
            if($type == "admin") require "includes/adminnav.php";
            else if($type == "koordinaattori") require "includes/koordnav.php";
        ?>
    <div class="main container col-lg-12 ">
    <div class="row">
    <div class="col-lg-5">
        <br>
        <h2>Aluelista</h2>
        <table id="list">
            <?php
            echo "<tr><th>Alue</th><th>Postinumero </th><th>Varauksia alueella</th><th>Muokkaa</th><th>Poista alue</th></tr>";
            $sql = "SELECT alue.alueID, alue.aluenimi, alue.postinumero, COUNT(varaus.alueID) AS varaukset FROM alue LEFT JOIN varaus ON alue.alueID = varaus.alueID GROUP BY varaus.alueID";
            foreach($db->query($sql) as $tietue) {
                echo "<tr><td>".$tietue["aluenimi"]."</td><td>".$tietue["postinumero"]."</td><td>".$tietue['varaukset']."</td><td><button class=\"btn-default\" onclick=\"load(".$tietue['alueID'].")\"><i class=\"far fa-edit\"></i></button></td><td><button class=\"btn-default\" onclick=\"del(".$tietue['alueID'].")\"><i class=\"fas fa-trash-alt\"></i></button></td></tr>";
            }
            ?>
            
        </table>
    <a href="admin_index.php?sivu=aluelis">Lisää alue</a>
    </div>
    <div class="col-lg-1"></div>
    <div id="content" class="col-lg-5">
        
    </div>
    
</div>
</div>
<?php
require("./sup/end.php")
?>