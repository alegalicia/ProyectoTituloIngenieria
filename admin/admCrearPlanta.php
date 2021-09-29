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
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-success ">
                <div class="card-header">
                    <h3 class="card-title">Crear Planta</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">

                            <!-- /.form-group -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nombre de planta</label>
                                <input type="text" class="form-control" id="nombres" placeholder="Nombre">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Familia de planta</label>
                                <input type="text" class="form-control" id="apellidos" placeholder="Familia de planta">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Temperatura ambiente recomendada de cultivo</label>
                                <input type="text" class="form-control" id="correo" placeholder="Temperatura ambiente">
                            </div>

                            <div class="form-group">
                                <label for="contrasenia">Humedad de ambiente recomendada de cultivo</label>
                                <input type="text" class="form-control" id="contrasenia" placeholder="Humedad ambiental">
                            </div>

                            <div class="form-group">
                                <label for="contrasenia">Humedad del suelo recomendada de cultivo</label>
                                <input type="text" class="form-control" id="contrasenia" placeholder="Humedad Suelo">
                            </div>
                            <!-- /.col -->
                        </div>
                        <button class="btn btn-success">Crear Planta</button>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Smart Agronomy
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div><!-- /.container-fluid -->

<?php
    include('layout/footer.php');
} else {
    include('sinacseso.php');
}
?>