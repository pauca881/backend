<?php

include_once 'animal.php';


class Animal_Compania extends Animal{


    private $nombre;
    private $edad;

    public function __construct($nombre, $edad){
        
        parent::__construct($nombre, $edad);
    
    }

    public function getInformacionAnimal() {        

        echo "Nombre: " . $this->getNombre() . "\n";
        echo "Edad: " . $this->getEdad() . "\n";

    }



}

?>