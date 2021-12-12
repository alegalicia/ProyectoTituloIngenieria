<?php

// the message
$mensaje = 'ALERTA SMARTAGRONOMY - INVERNADERO #1 - SENSOR #1';


$para      = 'alegalicia@gmail.com, nramirez@pintopiga.com';
$titulo    = 'Alerta de Sensor ### Invernadero #1';
$cabeceras = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($para, $titulo, $mensaje, $cabeceras);