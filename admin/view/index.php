<?php
error_reporting(0);
if (!isset($_SESSION["login"])) {
    session_start();
}

if ($_SESSION["rol"] == 1) {
    include('layout/header.php');
    include('layout/menu.php');
?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="container">
                    <div class="col align-self-center">
                        <h1>Smart Agronomy</h1>
                    </div>
                    <img src="../admin/imagenes/logo.png" alt="Smart Agronomy">
                </div>
            </div><!-- /.container-fluid -->
        </section>

    </div>
    <!-- /.content-wrapper -->

<?php
    include('layout/footer.php');
} else {
    include('sinacseso.php');
}
?>