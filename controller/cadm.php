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
        $telefono
    ) {
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
            echo "<script> alert('EL USUARIO YA SE ENCEUNTRA REGISTRADO...!!!');</script>";
        }
    }

    //=== buscar usuario
    public function buscarPersona($buscar)
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/modell/madm.php';

        try {
            $lista = new personas();
            $list = $lista->buscarPersona($buscar);
            if ($list) {
                return $list;
            } else {
                return 0;
            }
        } catch (Exception $e) {
            echo "<script> alert('EL USUARIO NO SE ENCONTRO...!!!');</script>";
        }
    }

    //=== buscar usuario
    public function modificarPersona($buscar)
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/modell/madm.php';

        try {
            $lista = new personas();
            $list = $lista->modificarPersona($buscar);
            if ($list) {
                return $list;
            } else {
                return 0;
            }
        } catch (Exception $e) {
            echo "<script> alert('EL USUARIO NO SE ENCONTRO...!!!');</script>";
        }
    }

    //=== buscar para actualizar
    public function actualizar($rut, $nombre, $apellido, $celular, $telefono, $fecha, $correo)
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/modell/madm.php';
        try {
            $lista = new personas();
            $list = $lista->actualizar($rut, $nombre, $apellido, $celular, $telefono, $fecha, $correo);
            if ($list) {
                return 1;
            } else {
                return 0;
            }
        } catch (Exception $e) {
            echo "<script> alert('EL USUARIO NO SE ENCONTRO...!!!');</script>";
        }
    }

    //=== buscar para actualizar
    public function eliminiar($rut)
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/modell/madm.php';
        try {
            $lista = new personas();
            $list = $lista->eliminiar($rut);
            if ($list) {
                return 1;
            } else {
                return 0;
            }
        } catch (Exception $e) {
            echo "<script> alert('EL USUARIO NO SE ENCONTRO...!!!');</script>";
        }
    }
}
