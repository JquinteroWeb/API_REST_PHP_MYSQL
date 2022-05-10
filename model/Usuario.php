<?php
class Usuario extends Conexion
{

    public function getUsers()
    {
        try {
            //Conexion
            $con = parent::conectar();
            //Nombres en español
            parent::setNames();
            //Consulta sql
            $query = "SELECT * FROM users WHERE estado = '1'";
            //Preparamos la consulta
            $query = $con->prepare($query);
            //Ejecutamos la consulta
            $query->execute();
            //Sacamos un arrar asociativo de la consulta
            //Se envia por parametro el PDO::FETCH_ASSOC para que solo me traiga los valores que tiene su calve alfanumerica
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            return 'Ops error al consultar' . $e->getMessage();
        }
    }
    public function getUser($id)
    {
        try {
            //Conexion
            $con = parent::conectar();
            //Nombres en español
            parent::setNames();
            //Consulta sql
            $query = "SELECT * FROM users WHERE estado = '1' AND id = ?";
            //Preparamos la consulta
            $query = $con->prepare($query);
            //Establecemos el valor del parametro
            $query->bindValue(1, $id);
            //Ejecutamos la consulta
            $query->execute();
            //Sacamos un arrar asociativo de la consulta
            //Se envia por parametro el PDO::FETCH_ASSOC para que solo me traiga los valores que tiene su calve alfanumerica
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return 'Ops error al consultar' . $e->getMessage();
        }


        return $result;
    }
    public function insertUser($nombre, $edad, $estado = 1)
    {

        try {
            //Conexion
            $con = parent::conectar();
            //Nombres en español
            parent::setNames();
            //Consulta sql
            $query = "INSERT INTO users (id, nombre, edad, estado) VALUES (NULL, ?, ?, ?)";
            //Preparamos la consulta
            $query = $con->prepare($query);
            //Establecemos el valor de los parametros
            $query->bindValue(1, $nombre);
            $query->bindValue(2, $edad);
            $query->bindValue(3, $estado);

            //Ejecutamos la consulta
            $query->execute();
            //Sacamos un arrar asociativo de la consulta
            //Se envia por parametro el PDO::FETCH_ASSOC para que solo me traiga los valores que tiene su calve alfanumerica
            $result = 'Se guardo correctamente el usuario';

            return $result;
        } catch (PDOException $e) {
            return 'Ops error al insertar' . $e->getMessage();
        }
    }
    public function borrarUser($id)
    {
        try {
            //Conexion
            $con = parent::conectar();
            //Nombres en español
            parent::setNames();
            //Consulta sql
            $query = "DELETE FROM users WHERE id = ?";
            //Preparamos la consulta
            $query = $con->prepare($query);
            //Establecemos el valor del parametro
            $query->bindValue(1, $id);
            //Ejecutamos la consulta
            $query->execute();
            //Sacamos un arrar asociativo de la consulta
            //Se envia por parametro el PDO::FETCH_ASSOC para que solo me traiga los valores que tiene su calve alfanumerica
            $result = 'Usuario borrado correctamente';
            return $result;
        } catch (PDOException $e) {
            return 'Ops error al borrar' . $e->getMessage();
        }

        
    }
}
