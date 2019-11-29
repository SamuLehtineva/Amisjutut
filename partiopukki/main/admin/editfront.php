<?php
/*
Editing for the Front page. The edit file has a counterpart --> saveFront.php.
*/
if(!isset($_SESSION["type"]) || !isset($_SESSION["sessionid"]) || $_SESSION["type"] != "koordinaattori" && $_SESSION["type"] != "admin") {
    header("Location: admin_index.php?sivu=login");
}
require "./sup/admin_start.php";
?>
<!doctype html>
<html>

    <script src="ajax/ajax.js"></script>
    <script>

        function onLoad() {
            search("update", "ajax/editfront");
        }
        function AjaxOnReady(responseText) {
            document.getElementById("content").innerHTML = responseText;
        }
        function del(id) {
            search("d." + id, "ajax/editfront");
        }
        function redir() {
            var yn = confirm("Haluatko varmasti poistua?");
            if(yn == true) {
                window.location.href = "index.php?sivu=front";
            }
        }
    </script>
</head>
<body onload="onLoad()">
    <?php
            $type = $_SESSION['type'];
            if($type == "admin") require "includes/adminnav.php";
            else if($type == "koordinaattori") require "includes/koordnav.php";
        ?>
        <div class="container">
            <br>
            <h2>Etusivun muokkaus</h2>
            <br>
            <form id="content" action="admin_index.php?sivu=saveFront" method="post">
            </form>
        </div>
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>