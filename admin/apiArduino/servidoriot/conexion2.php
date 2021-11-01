<?php

class conexion{

    const user='cso53794';
    const pass='FLL%jWOhm{3z(2h';
    const db='cso53794_smart';
    const servidor='localhost'; 

    public function conectardb(){
        $conectar= new mysqli(self::servidor, self::user, self::pass, self::db);
        if($conectar->connect_errno){
            die("Error en la coneccion".$conectar->connect_error);
        }
        return $conectar;

    }

}

?>