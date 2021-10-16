<?php
if (!isset($_SESSION["login"])) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SESSION["rol"] == 1) {
    //var_dump($_POST);
    $rol = isset($_REQUEST['rol']) ? $_REQUEST['rol'] : isset($_REQUEST['rol']);
    $nombres = isset($_REQUEST['nombres']) ? $_REQUEST['nombres'] : isset($_REQUEST['nombres']);
    $apellidos = isset($_REQUEST['apellidos']) ? $_REQUEST['apellidos'] : isset($_REQUEST['apellidos']);
    $rut = isset($_REQUEST['rut']) ? $_REQUEST['rut'] : isset($_REQUEST['rut']);
    $correo = isset($_REQUEST['correo']) ? $_REQUEST['correo'] : isset($_REQUEST['correo']);
    $clave = isset($_REQUEST['clave']) ? $_REQUEST['clave'] : isset($_REQUEST['clave']);
    $telefono = isset($_REQUEST['telefono']) ? $_REQUEST['telefono'] : isset($_REQUEST['telefono']);
    $celular = isset($_REQUEST['celular']) ? $_REQUEST['celular'] : isset($_REQUEST['celular']);
    $fecha = isset($_REQUEST['fecha']) ? $_REQUEST['fecha'] : isset($_REQUEST['fecha']);

    include_once $_SERVER['DOCUMENT_ROOT'] . '/controller/cadm.php';
    $enviar = new controladopersona();
    $resultado = $enviar->crearPersona(
        $rol,
        $nombres,
        $apellidos,
        $rut,
        $correo,
        $clave,
        $fecha,
        $celular,
        $telefono
    );
    echo $resultado;
    
    if ($resultado != 1) {
        return 0;
    } else {
        return;
    }
} else {
    echo 'Sin Acceso...!!!';
}
