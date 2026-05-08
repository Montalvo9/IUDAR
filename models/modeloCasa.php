<?php
include '../config/connection_rosario.php';

class modeloCasa
{
    private $modelo;
    private $db;

    /**Constructor*/
    public function __construct()
    {
        $this->modelo = array();
        $this->db = RosarioConexion::ConexionRosario();
    }

    /**Funcion que consulta los datos de casa */
    public function consulta()
    {
        $this->modelo = [];
        $query = $this->db->prepare("
        SELECT 
            c.id_casa, 
            c.nombre_casa, 
            c.propietario, 
            c.telefono, 
            c.ubicacion, 
            c.capacidad, 
            c.colchonetas, 
            p.nombre as preferencia, -- Aquí traes el texto, no el ID
            c.transporte, 
            c.observaciones
            FROM casas c
            INNER JOIN preferencias p ON c.id_preferencia = p.id_preferencia;
        ");

        $query->execute(); 
        $resultado = $this->modelo = $query->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    /**Consultamos el listado de la tabla preferencia para guardarlos en la bd y con esos
     * datos llenar el select 
     */

    public function obtenerPreferencia(){
        try{
            $query = $this->db->prepare("SELECT id_preferencia, nombre FROM preferencias"); 
            $query->execute();
            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;

        }catch(PDOException $error){
            return false;
        }
    }
}
