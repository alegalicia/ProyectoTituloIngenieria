<?php

    require_once('conexion.php');

   
    $device = $_GET['divice_label'];
    $temperature = $_GET['temperature'];
    $humidity = $_GET['humidity'];

    $conn = new conexion();

    $query = "SELECT * FROM device_state WHERE idDevice = '$device'";
    $select = mysqli_query($conn->conectardb(),$query);

    if($select->num_rows){

    $query = "UPDATE device_state SET temperatura = $temperature, humedad=$humidity WHERE idDevice = '$device'";
    $update = mysqli_query($conn->conectardb(),$query);

    $query = "INSERT INTO device_historic(idDevice, variable, valor, fecha) VALUES ('$device','temperatura','$temperature',NOW())";
    $insert = mysqli_query($conn->conectardb(),$query);

    $query = "INSERT INTO device_historic(idDevice, variable, valor, fecha) VALUES ('$device','humedad','$humidity',NOW())";
    $insert = mysqli_query($conn->conectardb(),$query);
    echo "***DATOS REGISTRADOS***<br>";
    echo"{DEVICE:".$device.", TEMP:".$temperature.", HUM:".$humidity."}";

    }else{
        echo "***LA TARJETA NO EXISTE***<br>";
    }

    
?>