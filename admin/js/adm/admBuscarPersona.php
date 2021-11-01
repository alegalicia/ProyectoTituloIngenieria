<?php
if (!isset($_SESSION["login"])) {
    session_start();
}



if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SESSION["rol"] == 1) {
    // var_dump($_POST);
    $opcion = isset($_REQUEST['opcion']) ? $_REQUEST['opcion'] : isset($_REQUEST['opcion']);
    $buscar = isset($_REQUEST['buscar']) ? $_REQUEST['buscar'] : isset($_REQUEST['buscar']);


    include_once $_SERVER['DOCUMENT_ROOT'] . '/controller/cadm.php';
    $enviar = new controladopersona();

    if ($opcion == "buscar") {
        $resultado = $enviar->buscarPersona($buscar);
        if ($resultado != 0) {
?>
            <table class="table table-striped" id="tablaResultado">
                <thead>
                    <tr>
                        <th scope="col">Rut</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Eliminar / Modificar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($resultado as $clave => $valor) {
                        echo "<tr>";
                        echo "<td>" . $valor['rut'] . "</td>";
                        echo "<td>" . $valor['nombres'] . "</td>";
                        echo "<td>" . $valor['apellidos'] . "</td>";
                        echo "  <td> 
                                <button type='button' 
                                class='bbtn btn-danger mr-3 pr-1 eliminar'
                                id='quitar'
                                >Quitar</button> 
                                
                                <button type='button' 
                                class='bbtn btn-success mr-3 pr-1 modificar'
                                >Modificar</button> 
                            </td>
                        ";
                        echo "</tr>";
                    }

                    unset($resultado);

                    ?>
                </tbody>
            </table>

            <?php
        } else {
            return "sin resultado";
        }
    }

    if ($opcion === "modificar") {

        $resultado = $enviar->modificarPersona($buscar);
        if ($resultado != 0) {
            foreach ($resultado as $clave => $valor) {

            ?>
                <div class="row">
                    <div class="col-md-6">
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">RUT</label>
                            <input type="text" class="form-control" id="rut" placeholder="RUT" disabled=true value="<?php echo $valor['rut'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombre/s</label>
                            <input type="text" class="form-control" id="NombresAct" placeholder="Nombres" value="<?php echo $valor['nombres'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Apellido/s</label>
                            <input type="text" class="form-control" id="apellidosAct" placeholder="Apellidos" value="<?php echo $valor['apellidos'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="celular">Número de Celular</label>
                            <input type="text" class="form-control" placeholder="Número de Celular" id="celularAct" value="<?php echo $valor['celular'] ?>">
                        </div>

                    </div>
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="fecha">Número de Telefono Fijo</label>
                            <input type="text" class="form-control" placeholder="Número de Telefono Fijo" id="telefonoAct" value="<?php echo $valor['telefono'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="fecha">Fecha Nacimiento</label>
                            <input type="date" class="form-control" id="fechaAct" value="<?php echo $valor['fechaNacimiento'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Direcciónn de correo electronico</label>
                            <input type="email" class="form-control" autocomplete="FALSE" id="correoAct" placeholder="Ingresar correo electronico" value="<?php echo $valor['correo'] ?>">
                        </div>
                    </div>
                    <button class="btn btn-success" id="actualizar">Actualicar Usuario</button>
                </div>
<?php
            }
        }
    }

    if ($opcion === "actualizaPersona") {
        $rut = isset($_REQUEST['rut']) ? $_REQUEST['rut'] : isset($_REQUEST['rut']);
        $nombre = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : isset($_REQUEST['nombre']);
        $apellido = isset($_REQUEST['apellido']) ? $_REQUEST['apellido'] : isset($_REQUEST['apellido']);
        $celular = isset($_REQUEST['celular']) ? $_REQUEST['celular'] : isset($_REQUEST['celular']);
        $telefono = isset($_REQUEST['telefono']) ? $_REQUEST['telefono'] : isset($_REQUEST['telefono']);
        $fecha = isset($_REQUEST['fecha']) ? $_REQUEST['fecha'] : isset($_REQUEST['fecha']);
        $correo = isset($_REQUEST['correo']) ? $_REQUEST['correo'] : isset($_REQUEST['correo']);
        echo "actualizado";
        $resultado = $enviar->actualizar($rut, $nombre, $apellido, $celular, $telefono, $fecha, $correo);

        if ($resultado == 1) {
        }
    }

    if ($opcion === "eliminarPersona") {
        $rut = isset($_REQUEST['buscar']) ? $_REQUEST['buscar'] : isset($_REQUEST['buscar']);

        echo "actualizado";
        $resultado = $enviar->eliminiar($rut);

        if ($resultado == 1) {
        }
    }
} else {
    echo 'Sin Acceso...!!!';
}
