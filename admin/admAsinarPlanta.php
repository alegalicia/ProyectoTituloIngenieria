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
                    <h3 class="card-title">Asignar Planta</h3>
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
                <div class="col-md-6">

                    <div class="form-group">
                        <label>Seleccione Invernadero: </label>
                        <select class="form-control select2" style="width: 100%;">
                            <option selected="selected">Mapocho 01</option>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Seleccione Planta: </label>
                        <select class="form-control select2" style="width: 100%;">
                            <option selected="selected">Naranja</option>
                        </select>
                    </div>

                    <!-- /.form-group -->
                    <button class="btn btn-success">Ingresar Planta a Invernadero</button>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <hr>
                    <h4>Detalle Asignacioón: </h4>
                    <table class="table table-striped col-8">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Temperatura Ambiental</th>
                                <th scope="col">Humedad Ambeintal</th>
                                <th scope="col">Humedad de Suelo</th>
                                <th scope="col">Modificar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Naranja</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td> <button type="button" class="bbtn btn-danger mr-3">Quitar</button> </td>
                            </tr>
                            <tr>
                                <th scope="row">Naranja</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                                <td> <button type="button" class="bbtn btn-danger mr-3">Quitar</button> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

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