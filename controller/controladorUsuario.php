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
            $id = $_GET['id'];
            if (!empty($id) && preg_match('/^\d*$/', $id)) {
                //Consultamos la info
                $user = $users->getUser($id);
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
