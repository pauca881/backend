<?php

include_once 'maquina.php';

class Excavadora implements Maquina{

    private $conductor;
    private $cantidadDeTrabajo;

    public function __construct($conductor, $cantidadDeTrabajo){
            $this->conductor = $conductor;
            $this->cantidadDeTrabajo = $cantidadDeTrabajo;
    }

    public function getInformacionMaquina(){

        echo "Conductor: " . $this->conductor . "\n";
        echo "Cantidad de trabajo: " . $this->cantidadDeTrabajo . "\n";

    }

    public function setConductor($conductor){

        $this->conductor = $conductor;   
    
    }

}

?>
