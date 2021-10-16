<?php
class controladopersona
{
    //=== crear usuario
    public function crearPersona(
    $rol,
    $nombres,
    $apellidos,
    $rut,
    $correo,
    $clave,
    $fecha,
    $celular,
    $telefono)
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/modell/madm.php';

        try {
            $lista = new personas();
            $list = $lista
                ->crearPersona(
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
            if ($list) {
                return 1;
            } else {
                return 0;
            }
        } catch (Exception $e) {
            echo "<script> alert(EL USUARIO YA SE ENCEUNTRA REGISTRADO...!!!');</script>";
        }
    }
}
