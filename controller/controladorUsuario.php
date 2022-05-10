<?php
//Requerir los ficheros de para la logica
require_once('../config/conexion.php');
require_once('../model/Usuario.php');


//Tipo de respuesta
header("Content-Type: application/json");

//instanciamos la clase
$users = new Usuario();

//Validamos que exista una opcion enviada por el metodo get
if (!empty($_GET['opcion'])) {
    //Con un Switch validamos la peticion   
    switch ($_GET['opcion']) {
        case 'getAll':
            $allUsers  = $users->getUsers();
            echo json_encode($allUsers);
            break;
        case 'getUser':
            //Capturamos los datos
            $input = json_decode(file_get_contents("php://input", true),true);
            //Validamos el campo
            if (!empty($input['id']) && preg_match('/^\d*$/',$input['id'])) {
                //Consultamos la info
                $user = $users->getUser($input['id']);
                //Devolvemos la informacion
                echo json_encode($user);
            } else {
                echo 'Id invalido';
            }
            break;
        case 'insertUser':
            //Capturamos los datos
            $input = json_decode(file_get_contents("php://input", true),true);
            $usuario_error=[];
            //Validamos los datos enviados por el usuario
            if (empty($input['nombre']) || !preg_match('/^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]*)+$/',$input['nombre'])) {
                $usuario_error['nombre'] = 'Nombre invalido';
            }

            if (empty($input['edad']) || !preg_match('/^\d*$/',$input['edad'])) {
                $usuario_error['edad'] = 'Edad invalida';
            }
            //Revisamos si exiten errores en el array de errores.
            if(count($usuario_error) == 0){
                $user = new Usuario();
                $result = $user->insertUser($input['nombre'],$input['edad']);
                echo json_encode($result);
            }else{
                echo json_encode($usuario_error);
            }
            break;
        case 'deleteUser':
            $input = json_decode(file_get_contents("php://input", true),true);
            //Validamos el campo
            if (!empty($input['id']) && preg_match('/^\d*$/',$input['id'])) {
                //Consultamos la info
                $user = $users->borrarUser($input['id']);
                //Devolvemos la informacion
                echo json_encode($user);
            } else {
                echo 'Id invalido';
            }

            break;
    }
} else {
    echo 'Opcion invalida';
}
