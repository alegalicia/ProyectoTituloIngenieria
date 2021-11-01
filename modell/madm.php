<?php
//INSERT INTO `jacinta`.`web_admin_productos` (`nombre_producto`, `descripcion_producto`, `mercado_pago`, `precio`, `fechaVencimiento`, `cantidad_alerta`, `talla`, `color`, `imagen_codigo`, `usuario_crea`, `fecha_cracion`, `usuario_modifica`, `fecha_modificacion`, `estado`) VALUES ('nom', 'drsss', 'merca', 'pre', '01-01-2009', '1', '12', '222222', 'asdad', '1', '02-02-2019', '1', '20-20-2011', '1');

class personas
{
    private $db;
    public function __construct()
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/conexion/conexion.php';
        $this->db = new conexion();
    }

    //========= Crear Persona
    function crearPersona(
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

        strtoupper($nombres);
        strtoupper($apellidos);

        $sql = ("INSERT INTO `personas`(
            `rut`,
            `dv`,
            `nombres`,
            `apellidos`,
            `fechaNacimiento`,
            `celular`,
            `telefono`,
            `correo`,
            `direccionActual`,
            `fechaCreacion`,
            `FechaModificacion`,
            `estado`
        )
        VALUES(
            :rut,
            '3',
            :nombres,
            :apellidos,
            :fecha,
            :celular,
            :telefono,
            :correo,
            'S/D',
            now(),
            now(),
            '1')");

        //$sentencia->bindParam(1, $valor_devuleto, PDO::PARAM_STR, 4000);
        $stmt = $this->db->connect()->prepare($sql);
        $stmt->bindValue(":nombres", $nombres);
        $stmt->bindValue(":apellidos", $apellidos);
        $stmt->bindValue(":rut", $rut);
        $stmt->bindValue(":correo", $correo);
        $stmt->bindValue(":fecha", $fecha);
        $stmt->bindValue(":celular", $celular);
        $stmt->bindValue(":telefono", $telefono);
        $stmt->execute();

        //====regresa cantidad de resultdos
        $cuentaFila = $stmt->rowCount();
        $cuentaColumna = $stmt->columnCount();

        //===========capturamos errores
        $error[] = $stmt->errorCode();

        if (empty($error) && $cuentaFila == 0) {
            if ($cuentaFila == 0) {
                echo "Sin Resultados errors: ";
                return false;
            }
            //====cod de error
            print_r($stmt->errorInfo());
        } else {
            return true;
        }
    }


    //== buscar persona
    function buscarPersona($buscar)
    {
        //strtoupper($buscar);
        $buscar = "%{$buscar}%";
        $sql = ("SELECT * 
        FROM `personas` 
                where (rut LIKE :buscar 
                or apellidos LIKE :buscar
                or nombres LIKE :buscar )
                and estado = 1
                ;");

        $stmt = $this->db->connect()->prepare($sql);
        $stmt->bindValue(":buscar", $buscar);
        $stmt->execute();

        //====regresa cantidad de resultdos
        $cuentaFila = $stmt->rowCount();
        $cuentaColumna = $stmt->columnCount();

        //===========capturamos errores
        $error[] = $stmt->errorCode();

        if (empty($error) && $cuentaFila == 0) {
            if ($cuentaFila == 0) {
                echo "Sin Resultados errors: ";
                return false;
            }
            //====cod de error
            print_r($stmt->errorInfo());
        } else {
            $datos = array();
            while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $datos[] = $fila;
            }
            return $datos;
        }
    }

    //== buscar persona
    function modificarPersona($buscar)
    {
        $sql = ("SELECT * 
        FROM `personas` 
                where rut = :buscar 
                ;");

        $stmt = $this->db->connect()->prepare($sql);
        $stmt->bindValue(":buscar", $buscar);
        $stmt->execute();

        //====regresa cantidad de resultdos
        $cuentaFila = $stmt->rowCount();
        $cuentaColumna = $stmt->columnCount();

        //===========capturamos errores
        $error[] = $stmt->errorCode();

        if (empty($error) && $cuentaFila == 0) {
            if ($cuentaFila == 0) {
                echo "Sin Resultados errors: ";
                return false;
            }
            //====cod de error
            print_r($stmt->errorInfo());
        } else {
            $datos = array();
            while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $datos[] = $fila;
            }
            return $datos;
        }
    }

    //========= Actualiza Persona
    function actualizar($rut, $nombre, $apellido, $celular, $telefono, $fecha, $correo)
    {
        strtoupper($nombre);
        strtoupper($apellido);
        $sql = ("UPDATE personas 
                SET 
                correo = :correo, 
                direccionActual = 'S/D', 
                nombres =:nombre, 
                apellidos = :apellido, 
                celular = :celular, 
                telefono = :telefono
            
                 WHERE rut = :rut ;");

        //$sentencia->bindParam(1, $valor_devuleto, PDO::PARAM_STR, 4000);
        $stmt = $this->db->connect()->prepare($sql);
        $stmt->bindValue(":nombre", $nombre);
        $stmt->bindValue(":apellido", $apellido);
        $stmt->bindValue(":rut", $rut);
        $stmt->bindValue(":correo", $correo);
        $stmt->bindValue(":celular", $celular);
        $stmt->bindValue(":telefono", $telefono);
        $stmt->execute();

        //====regresa cantidad de resultdos
        $cuentaFila = $stmt->rowCount();
        $cuentaColumna = $stmt->columnCount();

        //===========capturamos errores
        $error[] = $stmt->errorCode();

        if (empty($error) && $cuentaFila == 0) {
            if ($cuentaFila == 0) {
                echo "Sin Resultados errors: ";
                return 0;
            }
            //====cod de error
            print_r($stmt->errorInfo());
        } else {
            return 1;
        }
    }

    //========= Actualiza Persona
    function eliminiar($rut)
    {

        $sql = ("UPDATE personas 
                    SET 
                    estado = 0 
                     WHERE rut = :rut ;");

        //$sentencia->bindParam(1, $valor_devuleto, PDO::PARAM_STR, 4000);
        $stmt = $this->db->connect()->prepare($sql);
        $stmt->bindValue(":rut", $rut);

        $stmt->execute();

        //====regresa cantidad de resultdos
        $cuentaFila = $stmt->rowCount();
        $cuentaColumna = $stmt->columnCount();

        //===========capturamos errores
        $error[] = $stmt->errorCode();

        if (empty($error) && $cuentaFila == 0) {
            if ($cuentaFila == 0) {
                echo "Sin Resultados errors: ";
                return 0;
            }
            //====cod de error
            print_r($stmt->errorInfo());
        } else {
            return 1;
        }
    }
}
