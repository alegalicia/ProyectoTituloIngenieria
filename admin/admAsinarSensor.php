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
                    <h3 class="card-title">Asignacion de Sensores a Invernadero</h3>
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
                <div class="col-md-8">

                    <div class="form-group">
                        <label>Seleccione Invernadero: </label>
                        <select class="form-control select2" style="width: 100%;">
                            <option selected="selected">Mapocho 01</option>
                        </select>
                    </div>
                    <br>
                    <div class="input-group ">
                        <input class="form-control py-2 border-right-0 border" type="search" placeholder="Buscar Sensor" id="buscar">
                        <span class="input-group-append">
                            <button type="submit">
                                <div class="input-group-text bg-transparent"><i class="fa fa-search"></i></div>
                            </button>
                        </span>
                    </div>
                    <hr>
                    <table class="table table-striped ">
                        <thead>
                            <tr>
                                <th scope="col">Identificador</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Ubicación</th>
                                <th scope="col">Asignar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td> <button class="btn btn-success">Asignar</button></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                                <td> <button class="btn btn-success">Asignar</button></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                                <td> <button class="btn btn-success">Asignar</button></td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- /.form-group -->

                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <hr>
                    <h4>Detalle Asignacioón: </h4>
                    <table class="table table-striped col-6">
                        <thead>
                            <tr>
                                <th scope="col">Identificador</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Ubicación</th>
                                <th scope="col">Modificar</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td> <button type="button" class="bbtn btn-danger mr-3">Quitar</button> </td>

                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                                <td> <button type="button" class="bbtn btn-danger mr-3">Quitar</button> </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                                <td> <button type="button" class="bbtn btn-danger mr-3">Quitar</button> </td>

                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                                <td> <button type="button" class="bbtn btn-danger mr-3">Quitar</button> </td>

                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
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