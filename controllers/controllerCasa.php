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

                            <button class='btn btn-sm btn-outline-danger' onclick='eliminarProducto({$value['id_casa']})'  title='Eliminar'> <i class='fas fa-trash'></i> </button>
                             </div>"
            ];
        }
       echo json_encode(["data" => $lista]);
        exit;
        break;
}
