<?php

class funciones_BD
{

    private $db;
    function __construct()
    {

        //inicio de la conexion de la base marcamos directorio raiz
        require_once $_SERVER['DOCUMENT_ROOT'] . '/conexion/conexion.php';
        $this->db = new conexion();
    }

    //===============INICIO DE SECSION Y SELECTOR DE PERFILS===========

    public function login($usuario, $clave)
    {
        $sql = "SELECT
        u.estado,
        u.idrol,
        u.idusuarios,
        r.rol,
        r.idroles,
        r.estado,
        p.apellidos,
        p.nombres
      FROM
        usuarios u
        inner join roles r on r.idroles = u.idusuarios
        inner join personas p on p.rut = u.fk_rut
      where
        u.estado = 1
        AND r.estado = 1
        AND p.estado = 1
        AND p.rut = :usuario
        AND u.clave = :clave;
        ";
        // u.id_dni = :usuario and u.clave = :clave and u.usuario_estado =1;
        $stmt = $this->db->connect()->prepare($sql);
        //==============================CONVERTIMOS A HTML 
        $u = htmlentities(addslashes($usuario));
        $c = htmlentities(addslashes($clave));

        $stmt->bindValue(":usuario", $u);
        $stmt->bindValue(":clave", $c);

        $stmt->execute();


        $num = 0;

        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $num++;
            $_SESSION["login"] = "ok";
            echo $_SESSION["rol"] = $fila["idrol"];
            echo $_SESSION["rolNombre"] = $fila["rol"];
            echo $_SESSION["nombre"] = strtoupper($fila["nombres"]);
            echo $_SESSION["apellido"] = strtoupper($fila["apellidos"]);
        }

        $opcion = $_SESSION["rol"];


        if ($num > 0) {

            switch ($opcion) {

                case "1":
                    //perfil superadminsitrador
                    echo "<meta http-equiv='refresh' content='0;url=/admin/index.php'>";
                    break;

                case "2":
                    echo " caso 2";
                    break;

                default:
                    echo "<script>alert('error en el perfil...!!!');</script>";
            }
        } else {
            echo "<script>alert('Usuario inexistente o contraseña incorrecta...!!!');</script>";
            echo "<meta http-equiv='refresh' content='0;url=../index.php'>";
        }
    }
}
