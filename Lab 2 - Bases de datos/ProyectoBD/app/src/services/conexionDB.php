<?php

class ConexionDB {

    private $dbhost;
    private $usuario;
    private $contrasena;
    private $database;
    private $conexion;


    //Se pone todo en el constructor, porque cuando se crea una nueva conexion, por defecto ya se hace todo el connect

    public function __construct(){
       

        try {

            $this->dbhost = getenv('MYSQL_HOST');
            $this->usuario = getenv('MYSQL_USER');
            $this->contrasena = getenv('MYSQL_PASSWORD');
            $this->database = getenv('MYSQL_DATABASE');
    
            //Los getenv son para obtener las variables de entorno
    
            //PDO es un driver de conexión a bases de datos
            //con new PDO, creamos nueva conexion a la base de datos de tipo mysql ( mysql:host )
    
            //setAttribute añadimos 2 atributos
            // PDO::ATTR_ERRMODE: Dentro de este atributo hay 3 métodos para manejar los errores, excpetion es uno de ellos
            // PDO::ERRMODE_EXCEPTION: si ocurre un error, se lanza una excepción


            $this->conexion = new PDO("mysql:host=$this->dbhost;dbname=$this->database", $this->usuario, $this->contrasena);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    public function desconectar(){
        $this->conexion=null;

    }

    public function getConexion(){
        return $this->conexion;
    }


    //Con el prepare, se prepara, seguridad contra inyeccion de sql
    //stmt significa statement ( sentencia )
    //fetchAll devuelve un formato más facil de leer
    // PDO::FETCH_ASSOC devuelve un array asociativo ( clave -> valor ), en lugar de un array numérico

    public function getInfo(){
        $sql = "SELECT * FROM  cliente";
        //$sql = "SELECT * FROM  cliente WHERE usuario='juan'";
        $stmt = $this->getConexion()->prepare($sql);
        $stmt->execute();
        $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $clientes;
    }

}
