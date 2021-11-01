<?php

require_once('conexion.php');

$device = $_GET['divice_label'];
$temperature = $_GET['temperature'];
$humidity = $_GET['humidity'];
$token = $_GET['token'];
$msnAlert = $_GET['msnAlert'];

if (!empty($msnAlert)) {
    $msnAlert = "1";
}


if ($token == "smart") {

    $conn = new conexion();

    switch ($device) {

            //sesonres de temperatura y humedad
        case 'tarjeta1':

            

            $query = "INSERT INTO `registros_monitoreo` (`id_registros_monitoreo`, `id_sensores`, `id_tipo_registro`, `registros_monitorio`, `fecha`, `hora`, `estado`) 
                    VALUES (NULL, '1', '1', $humidity , now(), now(), '1');";
            $insert = mysqli_query($conn->conectardb(), $query);


            $query = "INSERT INTO `registros_monitoreo` (`id_registros_monitoreo`, `id_sensores`, `id_tipo_registro`, `registros_monitorio`, `fecha`, `hora`, `estado`) 
                    VALUES (NULL, '1', '2', $temperature , now(), now(), '1');";
            $insert = mysqli_query($conn->conectardb(), $query);

            echo "***DATOS REGISTRADOS***<br>";
            echo "{DEVICE:" . $device . ", TEMP:" . $temperature . ", HUM:" . $humidity . "}";
            break;


        case 'tarjeta2':
            //===========chip de alertas
            $query = "INSERT INTO `alertas` (`id_alertas`, `id_sensor`, `mensaje`, `fecha`, `hora`, `estado`) 
                    VALUES (NULL, '1', $msnAlert , now(), now(), '1');";

            $insert = mysqli_query($conn->conectardb(), $query);

            $device = "Tarjeta de temprana alerta Smart Agronomy: " . date("Y-m-d H:i:s");

            echo "***DATOS REGISTRADOS DEL ALERTA***<br>";


            //echo "{DEVICE:" . $device . ", TEMP:" . $temperature . ", HUM:" . $humidity . "}";

        default:
            echo "<b><spam style='color:red;'>**** TARJETA INEXISTENTE **** *</spam></b><br>";
            break;
    }
} else {
    echo "<b><spam style='color:red;'>***Token Erroneo... !!!**</spam></b><br>";
}
