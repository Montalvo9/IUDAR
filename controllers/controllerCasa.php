<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../models/modeloCasa.php';

$db = new modeloCasa();
$opcion = $_POST['opcion'] ?? '';

switch ($opcion) {
    case 'lista-casas':
        $datos = $db->consulta();
        
        $lista = [];

        foreach ($datos as $value) {
            $lista[] = [
                "id" => $value["id_casa"],
                "nombre_casa" => $value["nombre_casa"],
                "propietario" => $value["propietario"],
                "telefono" => $value["telefono"],
                "ubicacion" => $value["ubicacion"],
                "capacidad" => $value["capacidad"],
                "colchonetas" => $value["colchonetas"],
                "preferencia" => $value["preferencia"],
                "transporte" => $value["transporte"],
                "observaciones" => $value["observaciones"],
                "accion" => "<div class='d-flex gap-1 justify-content-center'>
                             <button class='btn btn-sm btn-outline-primary' onclick='obtenerDatos({$value['id_casa']})'title='Editar'> <i class='fas fa-edit'></i> </button>

                            <button class='btn btn-sm btn-outline-danger' onclick='eliminarCasa({$value['id_casa']})'  title='Eliminar'> <i class='fas fa-trash'></i> </button>
                             </div>"
            ];
        }
        echo json_encode(["data" => $lista]);
        exit;
        break;

    case 'obtener-preferencias':
        $datos = $db->obtenerPreferencia();
        echo json_encode($datos);
        break;
    case 'insertar-casa':
        $nombre = trim($_POST['nombre'] ?? '');
        $propietario = trim($_POST['propietario'] ?? '');
        $telefono = trim($_POST['telefono'] ?? '');
        $ubicacion = trim ($_POST['ubicacion'] ?? '');
        $capacidad = trim($_POST['capacidad'] ?? '');
        $colchonetas = trim($_POST['colchonetas'] ?? '');
        $preferencia = trim($_POST['preferencia'] ?? '');
        $transporte = trim($_POST['transporte'] ?? '');
        $observaciones = trim($_POST['observaciones'] ?? '');

        //Validacion obligatoria 
        if($nombre === '' || $propietario === '' || $telefono === '' || $ubicacion === '' || $capacidad === '' || $colchonetas === '' || $preferencia === '' || $transporte === ''){
            echo json_encode([
                "status" => "error",
                "mensaje" => "Todos los campos excepto observaciones son obligatorios"
            ]);
            exit;
        }

        $resultado = $db->insertarCasa($nombre, $propietario, $telefono, $ubicacion,$capacidad, $colchonetas, $preferencia, $transporte, $observaciones);
        if($resultado){
             echo json_encode([
                "status" => "success",
                "mensaje" => "Casa registrada correctamente"
            ]);
        }else{
            echo json_encode([
                "status" => "error",
                "mensaje" => "Error al registrar la casa"
            ]);
        }
        break;
    default:
        echo json_encode(["data" => []]);
}
