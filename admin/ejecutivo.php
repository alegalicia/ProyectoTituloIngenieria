<?php
error_reporting(0);
if (!isset($_SESSION["login"])) {
    session_start();
}

if ($_SESSION["rol"] == 5) {
    include('layout/header.php');
    //include('layout/menu.php');
?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="container">
            <div>
                <h1>Smart Agronomy</h1>
                <img src="imagenes/logo.png" alt="Smart Agronomy" width="30%">
            </div>
            <h1 class="display-2">Estimado: <?php echo $_SESSION["nombre"] . " " . $_SESSION["apellido"] ?>, estamos trabajando en la construccion de su perfil <span style="color:green;"><b> <?php echo $_SESSION["rolNombre"] ?> </b></span>, Saludos Cordiales TI.</h1>
        </div>
    </div><!-- /.container-fluid -->

<?php
    include('layout/footer.php');
} else {
    include('sinacseso.php');
}
?>