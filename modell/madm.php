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
}
