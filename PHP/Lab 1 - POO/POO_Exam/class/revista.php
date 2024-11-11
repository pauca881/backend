<?php 

require_once 'material.php';
class Revista extends Material {

    private $numero_edicion;

    public function __construct($titulo, $autor, $año_publicacion, $numero_edicion){
        parent::__construct($titulo, $autor, $año_publicacion);
        $this->numero_edicion = $numero_edicion;
    }

    public function getNumeroEdi(){
        return $this->numero_edicion;
    }

}

?>