<?php

// Una clase protegida es una clase que no se puede acceder directamente
// desde fuera

class Vehiculo{

    protected $asientos;
    protected $marca;

    //Sin constructor
    // $miCoche = new Coche();
    // $miCoche->marca = "Toyota";
    // $miCoche->modelo = "Corolla";

    //Con constructor
    //$miCoche = new Coche("Toyota", "Corolla");


    function __construct($asientos, $marca){
        $this->asientos = $asientos;
        $this->marca = $marca;
    }

    public function getInformacion(){

        echo 'Asientos: ' . $this->asientos . "\n";
        echo 'Marca: ' . $this->marca;

    }

    public function setAsientos($asientos){

        $this->asientos = $asientos;

    }

    public function getAsientos(){
        return $this->asientos;
    }

}

?>