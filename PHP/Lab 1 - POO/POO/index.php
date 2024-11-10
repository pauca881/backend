<!DOCTYPE html>
<html>
<head>
    <title>Action Learning Lab1</title>
</head>
<body>
    <h1>Información de la tienda</h1>
    <form method="post" action="index.php">
        <label for="libro">Nombre Libro:</label>
        <input type="text" id="libro" name="libro" ><br><br>

        <label for="precio_libro">Precio Libro:</label>
        <input type="number" id="precio_libro" name="precio_libro" ><br><br>

        <label for="prenda">Nombre Prenda:</label>
        <input type="text" id="prenda" name="prenda" ><br><br>

        <label for="precio_prenda">Precio Prenda:</label>
        <input type="number" id="precio_prenda" name="precio_prenda" ><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>

<?php

    require_once('./class/libro.php');
    require_once('./class/ropa.php');

//Si es post envia
//Si el camp no existeix, envia una camp buit ( isset )
//Si la variable existeix isset(variable) envia, sino envia ''
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombreLibro = isset($_POST['libro']) ? $_POST['libro'] : '';
    $precioLibro = isset($_POST['precio_libro']) ? $_POST['precio_libro'] : '';
    $nombrePrenda = isset($_POST['prenda']) ? $_POST['prenda'] : '';
    $precioPrenda = isset($_POST['precio_prenda']) ? $_POST['precio_prenda'] : '';
    $descuentoPrenda = 0;
    $productos = [];

    if ($nomnbreLibro != ''){

        $libro = new Libro($nombreLibro, $precioLibro);
        $productos[] = $libro;

    }
    if ($nombrePrenda != ''){
        if (strtolower($nombrePrenda) == 'pantalones'){
            $descuentoPrenda == $precioPrenda * 0.25;

        }

        $prenda = new Ropa($nombrePrenda, $precioPrenda, $descuentoPrenda);
        $productos[] = $prenda;

    }

    $total = 0;
    foreach ($productos as $key => $producto) {
        echo "{$producto->getNombre()} => Precio {$producto->getPrecio()} Descuento => {$producto->getDescuento()} <br/>";
        $precioDescuento = $producto->getPrecio() - $producto->getDescuento();
        if ($producto->getDescuento() > 0 ){

            echo "Precio {$producto->getNombre()} con descuento: $precioDescuento <br/>";
            
        }
        $total = $total + $precioDescuento;


    }

    echo "El precio total será $total";
}

?>
