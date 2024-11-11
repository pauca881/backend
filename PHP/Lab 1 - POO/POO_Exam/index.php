<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 1 POO Exam</title>
</head>
<body>
    
    <form action="index.php" method="post">
    Tipo de material: 
    <input type="radio" name="tipo" value="libro"> Libro
    <input type="radio" name="tipo" value="revista"> Revista
    <br><br>

    Titulo: <input type="text" name="titulo"><br>
    Autor/Editor: <input type="text" name="autor_editor"><br>
    Año publicación: <input type="text" name="ano"><br>
    Numero de páginas: ( solo para libros )<input type="text" name="numero_paginas"><br>
    Numero de edición: ( solo para revistas )<input type="text" name="numero_edicion"><br>
    <input type="submit" value="Submit">

    </form>

</body>
</html>

<?php 
// The exercise problem title is a the end of the file
require_once 'class/libro.php';
require_once 'class/revista.php';

if($_SERVER ['REQUEST_METHOD'] == 'POST'){
    $tipo = $_POST['tipo'];
    $titulo = $_POST['titulo'];
    $autor_editor = $_POST['autor_editor'];
    $ano = $_POST['ano'];
    $numero_paginas = $_POST['numero_paginas'];
    $numero_edicion = $_POST['numero_edicion'];

    if($tipo == 'libro'){
        $material = new Libro($titulo, $autor_editor, $ano, $numero_paginas);
    }
    else{
        $material = new Revista($titulo, $autor_editor, $ano, $numero_edicion);
    }

    //Mostramos la información agregada
    echo "Información de $tipo: <br>";
    echo $material->getTitulo();
    echo "<br>" . "Autor/Editor: " . $material->getAutorEditor();
    echo "<br>" . "Año de publicación: " . $material->getAno();

    if($tipo == 'libro'){
        echo $material->getNumeroPag();
    }
    else{
        echo $material->getNumeroEdi();
    }

}


?>


<!-- 
 Supongamos que una biblioteca necesita un desarrollo
 específico para ayudarle en la gestión de los diferentes tipos
 de materiales de los que dispone, como los libros y las
 revistas. Cada material tiene un título, un autor o editor, y un
 año de publicación.

 Adicionalmente a los atributos comunes, para los libros se
 debe indicar el número de páginas y, para las revistas, el
 número de edición.
 
 En concreto se necesita un programa que permita al usuario
 ingresar información sobre un libro y una revista. De manera
 que la información ingresada debe mostrarse utilizando los
 métodos de las clases correspondientes. 

 -->
