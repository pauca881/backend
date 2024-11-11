
<?php 
require_once 'material.php';
class Libro extends Material {

    private $numero_paginas;

    public function __construct($titulo, $autor, $año_publicacion, $numero_paginas){
        parent::__construct($titulo, $autor, $año_publicacion);
        $this->numero_paginas = $numero_paginas;
    }

    public function getNumeroPag(){
        return $this->numero_paginas;
    }

}


?>
