<?php 

include_once 'animal_compania.php';

class Perro extends Animal_Compania{

    private $color;

    public function __construct($nombre, $edad, $color){

        parent::__construct($nombre, $edad);
        $this->color = $color;

    }

    public function getColor(){
        echo $this->color;
    }


}

?>
