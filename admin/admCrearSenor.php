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
                    <h3 class="card-title">Crear Sensor</h3>
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
                                <label for="exampleInputEmail1">Nombre de sensor</label>
                                <input type="text" class="form-control" id="nombre" placeholder="Nombre">
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Tipo Sensor: </label>
                                <select class="form-control select2" style="width: 100%;">
                                    <option selected="selected">Temperatura Ambiente</option>
                                    <option value="1">Humedad Ambiente</option>
                                    <option value="2">Humedad Suelo</option>
                                </select>
                            </div>
                            <!-- /.form-group -->
                            <button class="btn btn-success">Crear Sensor</button>
                        </div>
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