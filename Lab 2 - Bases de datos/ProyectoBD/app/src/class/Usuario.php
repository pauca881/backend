<?php
require_once('./interfaces/Usuario.php');

class Usuario implements UsuarioInterface {
    private $nombre;
    private $email;

    // Constructor que inicializa las propiedades
    public function __construct($nombre, $email) {
        $this->nombre = $nombre;
        $this->email = $email;
    }

    // Métodos para obtener las propiedades
    public function getNombre() {
        return $this->nombre;
    }

    public function getEmail() {
        return $this->email;
    }
}
?>
