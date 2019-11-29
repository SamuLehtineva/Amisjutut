<?php
if(!isset($_SESSION["type"]) || !isset($_SESSION["sessionid"]) || $_SESSION["type"] != "koordinaattori") {
    header("Location: admin_index.php?sivu=login");
}
require "./sup/admin_start.php";
?>

<body>
    <?php
    require "./includes/koordnav.php";
    ?>
    <header class="masthead-admin main bump">
    <div class="container h-75">
    <div class="row h-100 align-items-center">
      <div class="col-12">
        <h1 class="font-weigth-light color-white">Partiopukki - Koordinaattori</h1>
        <a class="btn btn-primary" href="main/logout.php">Log out</a>
        <a class="btn btn-primary" href="admin_index.php?sivu=editfront">Edit frontpage</a>
        <a class="btn btn-primary" href="admin_index.php?sivu=editform">Edit form</a>
        <a class="btn btn-primary" href="admin_index.php?sivu=alue_list">Alueet</a>
        <a class="btn btn-primary" href="admin_index.php?sivu=orders">Varaukset</a>
    </div>
</div>
</div>
</header>
    <script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
