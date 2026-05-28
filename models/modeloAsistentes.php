<?php
/**<!-- MODELO ASISTENTES QUE SE REFIERE A HUESPEDES --> */
include '../config/connection_rosario.php'; 

class modeloAsistente{
    private $modelo; 
    private $db; 

    /**Constructor */
    public function __construct()
    {
        $this->modelo = array();
        $this->db = RosarioConexion::ConexionRosario();
    }

    /**Funcion que consulta los datos de los asistentes */
    function consulta(){
        $this->modelo = [];
        $query = $this->db->prepare("
        SELECT 
        a.id,
        a.nombre, 
        a.sexo,
        a.edad,
        a.telefono,
        i.nombre as iglesia, -- aqui traemos datos de la tabla iglesias
        a.observaciones
        FROM asistentes a
        INNER JOIN
        iglesias i ON a.id_iglesia = i.id_iglesia;
        ");

        $query->execute(); 
        $resultado = $this->modelo = $query->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }
}

?>