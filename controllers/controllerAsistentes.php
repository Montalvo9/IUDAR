<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../models/modeloAsistentes.php';

$db = new modeloAsistente();
$opcion = $_POST['opcion'] ?? '';

switch ($opcion) {
    case 'lista-asistencias':
        $datos = $db->consulta();

        // Para ver los datos en Postman (como JSON)
        /*echo json_encode([
            'success' => true,
            'data' => $datos
        ]);*/
        
        foreach($datos as $value){
            $lista[] = [
                "id" => $value["id"],
                "nombre" => $value["nombre"],
                "sexo" => $value["sexo"],
                "edad" => $value["edad"],
                "telefono" =>$value["telefono"],
                "iglesia" =>$value["iglesia"],
                "observaciones" =>$value["observaciones"],
                "accion" => "<div class='d-flex gap-1 justify-content-center'>
                             <button class='btn btn-sm btn-outline-primary' onclick='obtenerDatos({$value['id']})'title='Editar'> <i class='fas fa-edit'></i> </button>

                            <button class='btn btn-sm btn-outline-danger' onclick='eliminarCasa({$value['id']})'  title='Eliminar'> <i class='fas fa-trash'></i> </button>
                             </div>"
        ];
        }
          echo json_encode(["data" => $lista]);
    break;
    default:
    echo json_encode(["data" => []]);

}
