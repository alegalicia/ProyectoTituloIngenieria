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
                    <h3 class="card-title">Buscar Invernadero</h3>
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

                    <div class="input-group ">
                        <input class="form-control py-2 border-right-0 border" type="search" placeholder="Buscar Invernadero" id="buscar">
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
                                <th scope="col">Id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Dirección</th>
                                <th scope="col">Plantas</th>
                                <th scope="col">Sensores</th>
                                <th scope="col">Personas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                                <td> <button type="button" class="bbtn btn-danger mr-3 pr-1">Quitar</button> <button type="button" class="bbtn btn-success mr-3 pr-1">Modificar</button> </td>

                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                                <td>@fat</td>
                                <td> <button type="button" class="bbtn btn-danger mr-3 pr-1">Quitar</button> <button type="button" class="bbtn btn-success mr-3 pr-1">Modificar</button> </td>

                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td> <button type="button" class="bbtn btn-danger mr-3 pr-1">Quitar</button> <button type="button" class="bbtn btn-success mr-3 pr-1">Modificar</button> </td>
                                <td>

                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Smart Agronomy
                </div>
            </div>

        </div>
    </div>

<?php
    include('layout/footer.php');
} else {
    include('sinacseso.php');
}
?>