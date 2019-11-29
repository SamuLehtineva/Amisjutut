<?php
session_start();
if(!isset($_SESSION["type"]) || !isset($_SESSION["sessionid"]) || $_SESSION["type"] != "admin") {
    header("Location: admin_index.php?sivu=login");
}
require "./sup/admin_start.php";
?>
<!doctype html>
<html>

<body>
    <?php
    require "./includes/adminnav.php";
    ?>
<header class="masthead-admin main bump">
<div class="container h-75">
    <div class="row h-100 align-items-center">
      <div class="col-12">
        <h1 class="font-weight-light color-white">Partiopukki - Admin</h1><br>
        <a class="btn btn-primary" href="admin_index.php?sivu=user_list">Lisää käyttäjiä</a>
        <a class="btn btn-primary" href="admin_index.php?sivu=coordination">Koordinaatio</a>
        <a class="btn btn-primary" href="admin_index.php?sivu=editfront">Etusivun muokkaus</a>
        <a class="btn btn-primary" href="admin_index.php?sivu=editform">Varauslomake</a>
        <a class="btn btn-primary" href="admin_index.php?sivu=alue_list">Alueet</a>
        <a class="btn btn-primary" href="admin_index.php?sivu=edituser">Profiili</a>
        <a class="btn btn-primary" href="main/logout.php">Kirjaudu ulos</a>
      </div>
    </div>
  </div>

    </div>
  </div>
</header>



</div>



<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
