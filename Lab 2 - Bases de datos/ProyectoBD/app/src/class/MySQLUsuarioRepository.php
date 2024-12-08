<?php

class MYSQLUsuarioRepository {

    //El repositorio, envés de hacer la conexion directa con la BBDD,
    //maneja el acceso y manipulacion de datos

    //ConexionDB.php se encarga solo de la conexión con la base de datos. Abre la conexión y la cierra.
    //MYSQLUsuarioRepository.php se encarga de realizar operaciones sobre los usuarios (como obtener, agregar, modificar o eliminar usuarios). Depende de la conexión establecida en ConexionDB.php.


    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function obtenerUsuarios(){

        $sql = "SELECT * FROM usuarios";
        $stmt = $this->db->getConexion()->prepare($sql);
        $stmt->execute();
        
        //fetchAll devuelve un formato más facil de leer
        // PDO::FETCH_ASSOC devuelve un array asociativo ( clave -> valor ), en lugar de un array numérico
        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $usuarios;
    }

    public function agregarUsuario($nombre, $email){

        $sql = "INSERT INTO usuarios (nombre, email) VALUES (:nombre, :email)";
        
        // stmt -> statement -> consulta/sentencia
        //Prepare, prepara la consulta de manera segura
        $stmt = $this->db->getConexion()->prepare($sql);

        //Bindparam, se vinculan los valores $nombre con los valores :nombres que se asignan en el prepare
        //Así cuando se ejectue, se insertarán los valores $nombre y $email, envés de ':nombre' y ':email'
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);

        return $stmt->execute();

    }

}