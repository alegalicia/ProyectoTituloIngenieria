<?php

class conexion{

    const user='id17674836_agronomy';
    const pass='j*[MSTUO-c5Sd9%F';
    const db='id17674836_smart';
    const servidor='localhost'; 

    public function conectardb(){
        $conectar= new mysqli(self::servidor, self::user, self::pass, self::db);
        if($conectar->connect_errno){
            die("Error en la coneccion".$conectar->connect_error);
        }
        return $conectar;

    }

}
echo "Prueba Commit 3";
?>