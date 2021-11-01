<!-- modificar y eliminar persona -->
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
        <div class="container">
            <div>
                <h1>Smart Agronomy</h1>
                <hr>
            </div>

            <div class="card card-success col-8">
                <div class="card-header">
                    <h3 class="card-title">Buscar Usuario</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <input type="hidden" id="opcion" value="buscar">
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <div class="input-group ">
                        <form class="form-inline">
                            <input class="form-control mr-sm-4" type="search" placeholder="Rut, Nombre o Apellido" aria-label="Search" id="usuarioBuscar">
                            <button class="btn btn-outline-success my-sm-0" type="submit" id="buscar">Buscar</button>
                        </form>
                    </div>
                    <hr>
                    <div id="resultado"></div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Smart Agronomy
                </div>
            </div>

            </div>
        </div>
    </div>
    <?php
    include('layout/footer.php');
    ?>
    <script src="js/adm/admBuscarPersona.js"></script>

<?php
} else {
    include('sinacseso.php');
}
?>