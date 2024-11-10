<?php
require_once("producto.php");

class Libro extends Producto{

    private $descuento;

    public function __construct($nombre, $precios, $descuento = 0){

        parent::__construct($nombre, $precios);
        $this->descuento = $descuento;


    }

    public function getDescuento(){

        return $this->descuento;

    }



}
?>
