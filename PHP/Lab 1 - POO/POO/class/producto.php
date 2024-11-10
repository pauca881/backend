<?php

require_once("../interfaces/precio.php");

class Producto implements Precio{

    private $nombre;
    private $precio;

    public function __construct($nombre, $precio){
        $this->nombre = $nombre;
        $this->precio = $precio;
    }


    // Getters y Setters
    public function getNombre(){
        return $this->nombre;
    }

    public function getPrecio(){
        return $this->precio;
    }


}


?>