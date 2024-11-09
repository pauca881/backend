<?php


// Las clases són plantillas que representan las propiedades y funciones del objeto

// Los constructores són metodos unicos que se utilizan para la creación de objetos 
// Si no se crean, se crearán por defecto

// Las instancias son objetos que se crean a partir de las clases 


include 'class/vehiculo.php';

$vehiculo1 = new Vehiculo(2, "Toyota");
echo $vehiculo1->getInformacion();

$vehiculo2 = new Vehiculo(3, "Ford");
echo $vehiculo2->getInformacion();

$vehiculo2 -> setAsientos(4);
echo "\n" . "Los asientos del vehiculo 2 son: " . $vehiculo2->getAsientos();


// --- Abstracción ---
//Capacidad de representar un objeto del mundo real de manera más simplificada
//Es decir, permite ocultar los detalles complejos y mostrar solo lo esencial

//Ejemplo: Animal tiene un método hacerSonido(). Perro o gato pueden hacer sonido diferentes,
//pero no necesito saber qué sonido hace cada uno. Class perro y Class gato tiene su hacerSonido() diferente.

//Herencia
//Permite a una clase secundaria a heredar propiedades y métodos de una clase principal
//Perro hereda propierdades de Animal, pero tiene también características unicas

// Ir a animal.php --->

include 'class/perro.php';

$perro_marron = new Perro("Roco", 3, "marron");
$perro_marron->getInformacionAnimal();
$perro_marron->getColor();


// --- Interfaces ---
// Permite definir un conjunto de métodos que las clases que las usen deben interpretar
// Como un contrato que le dices a una clase que métodos debe tener

//Ir a maquina.php --->

include 'class/excavadora.php';

$maquina1 = new Excavadora("Juan", 10);
$maquina1->getInformacionMaquina();
$maquina1->setConductor("Javier");
$maquina1->getInformacionMaquina();



?>

