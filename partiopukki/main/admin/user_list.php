<?php
session_start();
require "./includes/connection.php";
require "./sup/admin_start.php";
?>
<link href="css/stylemain.css" rel="stylesheet" type="text/css">
 <script src="ajax/ajax.js"></script>
<script>
    function ok(id) {
         search(id + ".ok", "ajax/confirm");
         load();
    }
    function remove(id) {
        var yn = confirm("Poistetaanko tämä käyttäjä?");
        if(yn){
            search(id + ".del", "ajax/confirm");
            load();
        }
    }
    function AjaxOnReady(responseText) {
        document.getElementById("content").innerHTML = responseText;
    }
    function load(item) {
        var type = "check";
        if(item != undefined) {
            var text = document.getElementById("text");
            if(item.checked == true) {
                type = "all";
                text.innerHTML = "Näytetään kaikki";
            }
            else text.innerHTML = "Näytetään vain hyväksyttävät";
        }
        else {
            var checked = document.getElementById("change").checked;
            if(checked) type = "all";
        }
        search("update." + type, "ajax/confirm");
    }
</script>
<body onload="load()">
    <?php
        $type = $_SESSION['type'];
        if($type == "admin") require "includes/adminnav.php";
        else if($type == "koordinaattori") require "includes/koordnav.php";
        ?>
        <div class="main bg-gray">
        <div class="col-sm-6">
            <table>
                <tr style="background: none">
                    <td>
                    <label class="switch">
                        <input id="change" onchange="load(this)" type="checkbox" checked>
                        <span id="slider" class="slider"></span>
                    </label>
                    <td>
                    <p id="text" class="text-white">Näytetään vain hyväksyttävät</p></td>
                </td></tr>
            </table>
            <div id="content">
                
            </div>
        </div>
        <br>
    </div>
</body>