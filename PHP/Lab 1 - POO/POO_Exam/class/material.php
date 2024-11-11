<?php

require_once 'interfaces/materialBibibliografico.php';
class Material implements MaterialBibibliografico {

    private $titulo;
    private $autor;
    private $año_publicacion;

    public function __construct($titulo, $autor, $año_publicacion){
                
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->año_publicacion = $año_publicacion;

    }

    public function getTitulo(){
        return $this->titulo;
    }
    
    public function getAutorEditor(){
        return $this->autor;
    }

    public function getAno(){
        return $this->año_publicacion;
    }
}

?>
