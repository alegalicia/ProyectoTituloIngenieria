<?php
        error_reporting(0);
        if (!isset($_SESSION["login"])) {
            session_start();
        }

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
                           <h3 class="card-title">Crear Invernadero</h3>
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

                                   <div class="form-group">
                                       <label for="exampleInputEmail1">Nombre de Invernadero</label>
                                       <input type="text" class="form-control" id="nombre" placeholder="Nombre de Invernadero a asignar">
                                   </div>

                                   <div class="form-group">
                                       <label for="exampleInputEmail1">Dirección</label>
                                       <input type="text" class="form-control" id="direccion" placeholder="Direcion (Reguión - Ciudad - Direccion)">
                                   </div>

                                   <div class="form-group">
                                       <label for="exampleInputEmail1">Metros Cuadrados</label>
                                       <input type="text" class="form-control" id="metros" placeholder="Metros Cuadrados">
                                   </div>


                                   <button class="btn btn-success" id="crear">Crear Invernadero</button>
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
        ?>