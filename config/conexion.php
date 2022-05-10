<?php 
class Conexion{

    protected $con;
    //Hacer conexion con la base de datos
    protected function conectar(){
        try {
           //Hacemos la conexion con PDO
           $con = $this -> con =new PDO("mysql:host=localhost;dbname=usuarios","root","");
           //Devolvemos la conexion
           return $con;
        } catch (PDOException $e) {
            //En caso de error imprimimos el error y paramos la aplicacion
           print "Opss error en la bd ".$e->getMessage().'<br>' ;
           die();
        }
    }
    public function setNames(){
        return $this -> con ->query("SET NAMES 'utf8'");
    }

}
