<?php
/*
This file has the edit for the Form page --> This file has a document counterpart called saveForm.php
*/
if(!isset($_SESSION["type"]) || !isset($_SESSION["sessionid"]) || $_SESSION["type"] != "koordinaattori" AND $_SESSION["type"] != "admin") {
    header("Location: admin_index.php?sivu=login");
}

require "./sup/admin_start.php";
?>
    <script src="ajax/ajax.js"></script>
    <script>

        function onLoad() {
            search("update", "ajax/getform");
        }
        function AjaxOnReady(responseText) {
            document.getElementById("content").innerHTML = responseText;
        }
        function del(id) {
            search("d." + id, "ajax/getform");
        }
        function redir() {
            var yn = confirm("Haluatko varmasti poistua?");
            if(yn == true) {
                window.location.href = "index.php?sivu=formtest";
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
            <h2>Lomakkeen muokkaus</h2>
            <br>
            <form id="content" action="admin_index.php?sivu=saveform" method="post">
                
            </form>
        </div>
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>