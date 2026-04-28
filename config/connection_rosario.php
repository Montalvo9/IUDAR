<?php
require_once 'rosario.php';

class RosarioConexion{
    static function ConexionRosario(){
        try{

        $dbrosario = new PDO(DSN,USERROSARIO, PASSWORD );

        return $dbrosario;

        }catch(PDOException $error){
            die($error->getMessage());
        }
    }
}

?>