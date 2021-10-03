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
        u.id_rol,
        u.id_usuarios,
        r.rol,
        r.id_roles,
        r.estado,
        p.apellidos,
        p.nombres
      FROM
        usuarios u
        inner join roles r on r.id_roles = u.id_usuarios
        inner join personas p on p.rut = u.rut
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
            $_SESSION["rol"] = $fila["id_rol"];
            $_SESSION["rolNombre"] = $fila["rol"];
            $_SESSION["nombre"] = strtoupper($fila["nombres"]);
            $_SESSION["apellido"] = strtoupper($fila["apellidos"]);
        }

        $opcion = $_SESSION["rol"];


        if ($num > 0) {

            switch ($opcion) {

                case "1":
                    //perfil superadminsitrador
                    echo "<meta http-equiv='refresh' content='0;url=/admin/administrador.php'>";
                    break;

                case "2":
                    echo "<meta http-equiv='refresh' content='0;url=/admin/supervisor.php'>";
                    break;

                case "3":
                    echo "<meta http-equiv='refresh' content='0;url=/admin/agronomo.php'>";
                    break;

                case "4":
                    echo "<meta http-equiv='refresh' content='0;url=/admin/tecnico.php'>";
                    break;

                case "5":
                    echo "<meta http-equiv='refresh' content='0;url=/admin/ejecutivo.php'>";
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
