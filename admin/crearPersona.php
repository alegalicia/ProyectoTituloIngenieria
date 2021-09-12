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
                           <h3 class="card-title">Crear Usuario</h3>

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
                                       <label>Seleccione Rol a asignar: </label>
                                       <select class="form-control select2" style="width: 100%;">
                                           <option selected="selected">Administrador General</option>
                                           <option>Supervisor General</option>
                                           <option>Agronomo</option>
                                           <option>Tecnico de campo</option>
                                           <option>Ejecutivo</option>
                                       </select>
                                   </div>

                                   <!-- /.form-group -->
                                   <div class="form-group">
                                       <label for="exampleInputEmail1">Nombre/s</label>
                                       <input type="text" class="form-control" id="nombres" placeholder="Nombres">
                                   </div>

                                   <div class="form-group">
                                       <label for="exampleInputEmail1">Apellido/s</label>
                                       <input type="text" class="form-control" id="apellidos" placeholder="Apellidos">
                                   </div>

                                   <div class="form-group">
                                       <label for="exampleInputEmail1">RUT</label>
                                       <input type="text" class="form-control" id="apellidos" placeholder="RUT">
                                   </div>

                               </div>
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="exampleInputEmail1">Direcciónn de correo electronico</label>
                                       <input type="email" class="form-control" id="correo" placeholder="Ingresar correo electronico">

                                   </div>
                                   <div class="form-group">
                                       <label for="contrasenia">Contraseña</label>
                                       <input type="password" class="form-control" id="contrasenia" placeholder="Contraseña">
                                   </div>
                                   <!-- /.col -->
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