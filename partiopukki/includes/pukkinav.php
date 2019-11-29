<!--Pukin navigointipalkki-->
<div class="sidenav">
    <!--Ylemmät linkit-->
    <p class="text-white padding-none"><i class="fas fa-user-circle"></i> <?php echo $_SESSION['username']; ?></p>
    <p class="text-white" style="font-size: 12px"><?php echo $_SESSION['type']; ?></p>
    <a href="admin_index.php"><i class="fas fa-home"></i> Etusivu</a>
    <a href="admin_index.php?sivu=orders"><i class="fas fa-book"></i> Käynnit</a>
    <a href="admin_index.php?sivu=edituser"><i class="far fa-address-card"></i> Profiili</a>
    <!--Alhaalla olevat linkit linkit-->
    <div style="position: absolute; bottom: 15px">
        <a href="main/logout.php"><i class="fas fa-door-open"></i> Kirjaudu ulos</a>
    </div>
</div>